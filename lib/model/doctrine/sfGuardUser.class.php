<?php

/**
 * sfGuardUser
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    trialsites
 * @subpackage model
 * @author     Herlin R. Espinosa G. - CIAT-DAPA
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class sfGuardUser extends PluginsfGuardUser {

    //INICIO FUNCION PARA GRABAR O ACTUALIZAR
    public function save(Doctrine_Connection $conn = null) {
        //VERIFICAMOS LA CLAVE
        $EmailAddress = strtolower($this->getEmailAddress());
        $Username = $this->getUsername();
        if (!(ereg("^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@+([_a-zA-Z0-9-]+\.)*[a-zA-Z0-9-]{2,200}\.[a-zA-Z]{2,6}$", $EmailAddress))) {
            echo "<script> alert('*** Email Address Error! ***'); window.history.back();</script>";
            die();
        }

        //ACTIVACION Y PASSWORD DEL USUARIO
        if ($this->getId() != '') {
            $user_id = $this->getId();
            $Password = $this->getPassword();
            $IsActive = $this->getIsActive();

            if ($Password == '' && $IsActive == 1) {
                $cadena = "[^A-Z0-9]";
                $Password = substr(eregi_replace($cadena, "", md5(rand())) . eregi_replace($cadena, "", md5(rand())) . eregi_replace($cadena, "", md5(rand())), 0, 6);
                $this->setPassword($Password);

                //ENVIO DE NOTIFICACION A USUARIO DE ACTIVACION
                $sent = date("d-M-Y") . " " . date("h:i:s");
                $destinatario = trim($EmailAddress);
                $asunto = "Trial Sites Account Notification - Account Activated - Don't reply";
                $cuerpo = "<html>";
                $cuerpo .= "<head>";
                $cuerpo .= "<title>Account Notification - Account Activated - Don't reply </title>";
                $cuerpo .= "</head>";
                $cuerpo .= "<body>";
                $cuerpo .= "<h1>Welcome Trial Sites!</h1>";
                $cuerpo .= "<p>";
                $cuerpo .= "<br><b>Your account Activated.</b><br><br>";
                $cuerpo .= "<b>Username: </b>$Username<br> <b>Password: </b>$Password<br><br><br><a href='http://www.agtrials.org/login' target='blank'>www.agtrials.org</a><br><br><b>Please remember to change your password. After you login: ADMIN>>CHANGE PASSWORD</b>";
                $cuerpo .= "</p>";
                $cuerpo .= "<br><br><b>Sent:</b> $sent ";
                $cuerpo .= "</body>";
                $cuerpo .= "</html>";
                $headers = "MIME-Version: 1.0\r\n";
                $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
                $headers .= "From: Trial Sites - Don't reply <noreplyagtrials@gmail.com>\r\n";

                if (!mail($destinatario, $asunto, $cuerpo, $headers)) {
                    echo "<script> alert('*** Email Error! ***'); window.history.back();</script>";
                    die();
                }

                //ENVIO DE NOTIFICACION A ADMINISTRADORES DE ACTIVACION
                $SFusername = sfContext::getInstance()->getUser()->getUsername();
                $destinatario = trim("a.jarvis@cgiar.org;g.hyman@cgiar.org;andrewfarrow72@gmail.com;h.r.espinosa@cgiar.org");
                $asunto = "Trial Sites Account Notification - Account Activated - Don't reply";
                $cuerpo = "<html>";
                $cuerpo .= "<head>";
                $cuerpo .= "<title>Account Notification - Account Activated - Don't reply </title>";
                $cuerpo .= "</head>";
                $cuerpo .= "<body>";
                $cuerpo .= "<p>";
                $cuerpo .= "<br><b>Account Activated.</b><br><br>";
                $cuerpo .= "<b>Activated by: </b>$SFusername<br>";
                $cuerpo .= "<b>Username: </b>$Username<br><br>";
                $cuerpo .= "</p>";
                $cuerpo .= "<br><br><b>Sent:</b> $sent ";
                $cuerpo .= "</body>";
                $cuerpo .= "</html>";
                $headers = "MIME-Version: 1.0\r\n";
                $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
                $headers .= "From: Trial Sites - Don't reply <noreplyagtrials@gmail.com>\r\n";
                if (!mail($destinatario, $asunto, $cuerpo, $headers)) {
                    echo "<script> alert('*** Email Error! ***'); window.history.back();</script>";
                    die();
                }

                //CREACION REGISTRO tb_contactperson
                $C_TbContactperson = Doctrine::getTable('TbContactperson')->findOneByCnpremail(trim($EmailAddress));
                if (count($C_TbContactperson) <= 1) {
                    $SfGuardUserInformation = Doctrine::getTable('SfGuardUserInformation')->findOneByUserId($user_id);
                    $TbContactperson = new TbContactperson();
                    $TbContactperson->setIdInstitution($SfGuardUserInformation->getIdInstitution());
                    $TbContactperson->setIdCountry($SfGuardUserInformation->getIdCountry());
                    $TbContactperson->setIdContactpersontype(3);
                    $TbContactperson->setCnprfirstname($this->getFirstName());
                    $TbContactperson->setCnprlastname($this->getLastName());
                    $TbContactperson->setCnpraddress($SfGuardUserInformation->getAddress());
                    $TbContactperson->setCnprphone($SfGuardUserInformation->getTelephone());
                    $TbContactperson->setCnpremail(trim($EmailAddress));
                    $TbContactperson->setCreatedAt(date('Y-m-d') . " " . date('H:i:s'));
                    $TbContactperson->setIdUser(1);
                    $TbContactperson->save();
                }
            }
        }
        return parent::save($conn);
    }

}