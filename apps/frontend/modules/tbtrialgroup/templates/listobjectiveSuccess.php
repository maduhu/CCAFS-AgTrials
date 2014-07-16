<link href="/sfAdminThemejRollerPlugin/css/jquery/custom-theme/jquery-ui.custom.css" rel="stylesheet" type="text/css" />
<link href="/sfAdminThemejRollerPlugin/css/jroller.css" rel="stylesheet" type="text/css" />
<link href="/sfAdminThemejRollerPlugin/css/fg.menu.css" rel="stylesheet" type="text/css" />
<link href="/sfAdminThemejRollerPlugin/css/fg.buttons.css" rel="stylesheet" type="text/css" />
<link href="/sfAdminThemejRollerPlugin/css/ui.selectmenu.css" rel="stylesheet" type="text/css" />
<link href="/autocompletemultiple/autocomplete.css" rel="stylesheet" type="text/css" />
<link href="/autocompletemultiple/jquery-ui/css/reset.css" rel="stylesheet" type="text/css" />
<script src="/autocompletemultiple/jquery-1.4.3.min.js" type="text/javascript"></script>
<script src="/autocompletemultiple/jquery-ui/js/jquery-ui-1.8.6.custom.min.js" type="text/javascript"></script>
<script src="/autocompletemultiple/autocomplete.js" type="text/javascript"></script>
<?php
$ArrWidth = array('5%', '95%');
$IdObjective = "";
?>
<script>
    var IdObjective = parent.document.getElementById("tb_trialgroup_id_objective").value
    function SelectObjective(Object) {
        var Valor = Object.value;
        var Name = "";
        if (Object.checked) {
            Name = $('#ObjectiveName' + Valor).attr('value');
            parent.document.getElementById("tb_trialgroup_id_objective").value = Valor;
            parent.document.getElementById("nameobjective").value = Name;
            self.parent.tb_remove();
        }
    }
</script>
<div class="sf_admin_edit ui-widget ui-widget-content ui-corner-all" id="sf_admin_container">
    <div class="fg-toolbar ui-widget-header ui-corner-all">
        <h1>List Objectives</h1>
    </div>
    <div id="sf_admin_content">
        <div class="sf_admin_form">
            <br>
            <form id="listobjective" name="listobjective" action="<?php echo url_for('@listobjective'); ?>" enctype="multipart/form-data" method="post">
                <table width="100%" cellspacing="1" cellpadding="10" border="1">
                    <tr bgcolor="#C7C7C7">
                        <td width="<?php echo $ArrWidth[0]; ?>"><label></label></td>
                        <td width="<?php echo $ArrWidth[1]; ?>"><label><b>Name</b></label></td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <div id="DivPPal">
                                <?php echo Listobjectives($ArrWidth); ?>
                            </div>
                        </td>
                    </tr>
                </table>
            </form>
            <br>
        </div>
    </div>
</div>