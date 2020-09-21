<?php require('view/admin/navView.php') ?>

<?php ob_start() ?>
<h5 class="mt-2 mb-5 text-success text-center form-signin">Details de ticket</h5>
  
<?php  $ticketStatut= (string)$ticket['statut']?>
<!--**************************************************-->
<div class = "container ">
    <div class = "row  my-4">
        <div>
            <span class ="h5 text-success col ">Titre : </span><?=$ticket['title']?>
        </div>
    </div>
    <div class = "row my-4">
        <div>
            <span class ="h5 text-success col">Description : </span><?=htmlspecialchars($ticket['description_'])?>
        </div>
    </div>
    <div class = "row my-4">
        <div>
            <span class ="h5 text-success col">Type : </span><?=$ticket['type_']?>
        </div>
        <div>
            <span class ="h5 text-success col">statut : </span><?=$ticket['statut']?>
        </div>
        <div>
            <span class ="h5 text-success col">Importance : </span><?=$ticket['priority']?>
        </div>
    </div>
    <div class = "row my-4">
        <div class> 
            <span class ="h5 text-success col ">Date : </span><?=$ticket['date_ticket']?>
        </div>
    </div>
    <div class = "row my-4">
        <div class> 
            <span class ="h5 text-success col ">Attribué à : </span><?=getfirstnameAndLastname($ticket['trainee_number'])?>
        </div>
    </div>
    <!--****************************************************-->
    <?php if($ticket['file_']):?>
    <div class = "row my-4">
        <div class> 
            <span class ="h5 text-success col ">ficher: </span>
            <a href="<?=$ticket['file_']?>" target="_blank"> <?='fichier'.$ticket['id']?> </a>
        </div>
    </div>
    <?php endif;?>
  <!--****************************************************-->   
<!--**************************************************-->
    <?php if($ticket['comment'] || $ticket['statut'] =="close" ) : ?>
        <div class = "row my-4">
            <div class> 
                <span class ="h5 text-success col ">Commentaire: </span><?=showComment($ticket['comment'])?>
            </div>
        </div>
    <?php else : ?>
        <form action="index.php?action=commenting&id=<?=$ticket['id']?>" method="post">
            <label class="h5 text-success" for="comment">Ajouter un commentaire</label>    
            <div class ="row">
                <input class="form-control col-10 mr-1" type="text" id="comment" name="comment" required> 
                <input class="btn bg-success text-white col" type="submit" value="Commenter">
            </div>
        </form>
    <?php endif; ?>
    
<!--**************************************************-->
    <div >
        <h5 class="mt-2 mb-2 text-success text-center form-signin">Rapport d'intervention</h5>
        <?php 
        while($intervention = $interventions->fetch())
        { ?>
            <div class = "container BOA-border my-2">
                <div class="row my-4">
                    <div >
                        <span class ="h5 text-success col">Stagiaire : </span><?=getfirstnameAndLastname($intervention['trainee_number'])?>
                    </div>
                </div>
                <div class = "row my-4">
                    <div class> 
                        <span class ="h5 text-success col ">Statut : </span><?=$intervention['statut']?>
                    </div>
                </div>
                <?php if($intervention['file_']):?>
                    <div class = "row my-4">
                        <div class> 
                            <span class ="h5 text-success col ">ficher : </span>
                            <a href="<?=$intervention['file_']?>" target="_blank"> <?='fichier'.$ticket['id']?> </a>
                        </div>
                    </div>
                <?php endif;?>
                <div class = "row my-4">
                    <div class> 
                        <span class ="h5 text-success col "> Rapport: </span><?=$intervention['report']?>
                    </div>
                </div>
            </div>
        <?php  $report = (string)$intervention['report'];
               $interventionStatut = (string)$intervention['statut'];
        } 
        $interventions->closeCursor;
        ?>
    </div>
    <div class="text-center">
        <?php if($ticketStatut == "open" || empty($ticket['trainee_number']) && $interventionStatut =="Succès") :?>
            <a class="btn bg-success text-white" href="index.php?action=closeTicket&amp;id=<?=$ticket['id']?>">Fermer le ticket</a>
        <?php endif; ?>
        <?php if($interventionStatut =="Echec" || empty($ticket['trainee_number']) && $ticketStatut == "open") :?>
            <a class="btn bg-success text-white" href="index.php?action=editTicket&id=<?=$ticket['id']?>">Editer</a>
        <?php endif; ?>
        <a class="btn bg-success text-white" href="index.php">Retour</a>
    </div>
</div>
<!--**************************************************-->
<?php $content = ob_get_clean() ?>

<?php require('public/template.php') ?>