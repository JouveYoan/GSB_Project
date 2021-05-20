<?php

?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta charset="UTF-8">
        <title>Intranet du Laboratoire Galaxy-Swiss Bourdin</title>
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="./styles/bootstrap/bootstrap.css" rel="stylesheet">
        <link href="./styles/style.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
           <?php if ($estConnecte) {
                $uc = filter_input(INPUT_GET, 'uc', FILTER_SANITIZE_STRING);
            ?>
            <div class="header">
                <div class="row vertical-align">
                    <div class="col-md-4">
                        <h1>
                            <img src="./images/logo.jpg" class="img-responsive"
                                 alt="Laboratoire Galaxy-Swiss Bourdin"
                                 title="Laboratoire Galaxy-Swiss Bourdin">
                        </h1>
                    </div>
                    <div class="col-md-8">
                        <ul class="nav nav-pills pull-right" role="tablist">
                            <li <?php if (!$uc || $uc == 'accueil') { ?>class="active"<?php } ?>>
                                <a href="index.php">
                                    <span class="glyphicon glyphicon-home"></span>
                                    Accueil
                                </a>
                            </li>
                        <?php

                        if(isset($pageUserList)){
                              foreach($pageUserList as $pageUser){
                                  ?>
                            <li <?php if ($uc == $pageUser['uc']) { ?>class="active"<?php } ?>>
                                <a href="index.php?uc=<?php echo $pageUser['uc']?>">
                                    <span class="glyphicon glyphicon-<?php echo $pageUser['icon'] ?>"></span>
                                    <?php echo $pageUser['libelle'] ?>
                                </a>
                            </li>
                            <?php
                              }
                         }
                        ?>

                            <li <?php if ($uc == 'deconnexion') { ?>class="active"<?php } ?>>
                                <a href="index.php?uc=deconnexion&action=demandeDeconnexion">
                                    <span class="glyphicon glyphicon-log-out"></span>
                                    Déconnexion
                                </a>
                            </li>
                        </ul>

                    </div>
                </div>
            </div>
            <?php
        } else {?>
            <h1>
                <img src="./images/logo.jpg"
                     class="img-responsive center-block"
                     alt="Laboratoire Galaxy-Swiss Bourdin"
                     title="Laboratoire Galaxy-Swiss Bourdin">
            </h1>
                <?php

        }