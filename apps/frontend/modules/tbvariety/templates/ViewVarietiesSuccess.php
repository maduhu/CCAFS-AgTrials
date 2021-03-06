<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="title" content="The Global Agricultural Trial Repository - CGIAR - CCAFS - CIAT" />
<meta name="description" content="The Global Agricultural Trial Repository" />
<meta name="keywords" content="Trials, Sites, Bibliography, CGIAR, CCAFS, CIAT" />
<meta name="language" content="en" />
<meta name="robots" content="index, follow" />
<title>The Global Agricultural Trial Repository - CGIAR - CCAFS - CIAT</title>
<link rel="stylesheet" type="text/css" media="screen" href="/sfAdminThemejRollerPlugin/css/reset.css" />
<link rel="stylesheet" type="text/css" media="screen" href="/mqThickboxPlugin/css/thickbox.css" />
<link rel="stylesheet" type="text/css" media="screen" href="/css/main.css" />
<link rel="stylesheet" type="text/css" media="screen" href="/css/jquery.alerts.css" />
<link rel="stylesheet" type="text/css" media="screen" href="/sfAdminThemejRollerPlugin/css/jquery/custom-theme/jquery-ui.custom.css" />
<link rel="stylesheet" type="text/css" media="screen" href="/sfAdminThemejRollerPlugin/css/jroller.css" />
<link rel="stylesheet" type="text/css" media="screen" href="/sfAdminThemejRollerPlugin/css/fg.menu.css" />
<link rel="stylesheet" type="text/css" media="screen" href="/sfAdminThemejRollerPlugin/css/fg.buttons.css" />
<link rel="stylesheet" type="text/css" media="screen" href="/sfAdminThemejRollerPlugin/css/ui.selectmenu.css" />
<script type="text/javascript" src="/sfAdminThemejRollerPlugin/js/jquery.min.js"></script>
<script type="text/javascript" src="/sfAdminThemejRollerPlugin/js/jquery-ui.custom.min.js"></script>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <link rel="shortcut icon" href="/images/favicon.ico" />
        <script type="text/javascript">
            $(document).ready(function(){ $("#navmenu-h li,#navmenu-v li").hover( function() { $(this).addClass("iehover"); }, function() { $(this).removeClass("iehover"); } ); });
            var _gaq = _gaq || [];
            _gaq.push(['_setAccount', 'UA-22429807-1']);
            _gaq.push(['_trackPageview']);

            (function() {
                var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
                ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
            })();
        </script>
        <style type="text/css">
            .bodyview {
                text-align:center;
                margin:0 auto;
            }

            #contenido{
                margin: 0 auto;
                text-align:left;
                width:650px;
            }
        </style>
    </head>
    <body class="bodyview" align="center">
        <div id="contenido">
            <div class="sf_admin_edit ui-widget ui-widget-content ui-corner-all" id="sf_admin_container">
                <div class="fg-toolbar ui-widget-header ui-corner-all">
                    <h1>View Variety</h1>
                </div>
                <div id="sf_admin_content">
                    <div class="sf_admin_form">
                        </br>
                        <label>Name:</label>
                        <values><?php echo $Variety[0]->vrtname; ?></values>
                        </br>
                        <label>Origin:</label>
                        <values><?php echo $Variety[0]->orgname; ?></values>
                        </br>
                        <label>Synonym:</label>
                        <values><?php echo $Variety[0]->vrtsynonymous; ?></values>
                        </br>
                        <label>Description:</label>
                        <values><?php echo $Variety[0]->vrtdescription; ?></values>
                        </br></br>
                        <?php if ($Variety[0]->id_genebank != '') {
                        ?>
                            <label>
                                <a onclick="window.open('http://seeds.iriscouch.com/#/accessions/<?php echo $Variety[0]->id_genebank; ?>','Genebank','height=800,width=900,scrollbars=1')" href="#">View Genebank Data</a>
                            </label>
                            </br></br>
                        <?php } ?>
                        <input type="button" value="Close" OnClick="window.close();"/>
                        </br>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
