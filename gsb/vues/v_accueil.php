<?php

?>
<div id="accueil">
    <h2>
        Gestion des frais - Visiteur : <?php
            echo $_SESSION['prenom'] . ' ' . $_SESSION['nom']?>
    </h2>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <span class="glyphicon glyphicon-bookmark"></span>
                    Navigation
                </h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12 col-md-12">
                        <?php
                        if(isset($pageUserList)){
                              foreach($pageUserList as $pageUser){
                                  ?>
                        <a href="index.php?uc=<?php echo $pageUser['uc'] ?>"
                           class="btn btn-info btn-lg" role="button">
                            <span class="glyphicon glyphicon-<?php echo $pageUser['icon'] ?>"></span>
                            <br><?php echo $pageUser['libelle'] ?>
                        </a>
                            <?php
                              }
                         }
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
