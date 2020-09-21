<?php require('view/trainee/navView.php') ?>

<?php ob_start() ?>
<h5 class="mt-5 mb-5 text-success text-center form-signin">Details de ticket</h5>

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
    <div class = "row my-4">
        <div class> 
            <span class ="h5 text-success col ">Demandeur : </span><?=getfirstnameAndLastname($ticket['employee_number'])?>
        </div>
    </div>
    <div class = "row my-4">
        <div class> 
            <span class ="h5 text-success col ">Attributeur : </span><?=getfirstnameAndLastname($ticket['admin_number'])?>
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
    <?php if($ticket['comment']) : ?>
        <div class = "row my-4">
            <div class> 
                <span class ="h5 text-success col ">Commentaire: </span><?=showComment($ticket['comment'])?>
            </div>
        </div>
    <?php endif; ?>
</div>
    <!--**************************************************-->
<?php if($ticket['statut']!="close") : ?>
    <div>
        <h5 class="mt-5 mb-1 text-success text-center form-signin">Rapport d'intervention</h5>
        <form class="py-2 px-4" action="index.php?action=reporting&amp;id=<?=$ticket['id']?>" method="post">
            <div class = "form-group">
                <label for="statut">Type de rapport :</label>
                <select class="form-control" id="statut" name="statut">
                    <option>Succès</option>
                    <option>Echec</option>
                </select>
            </div>
            <div class = "form-group">
                <label for="report">Rapport :</label> <br>
                <textarea class="form-control" id = "report" name="report" rows="2" required></textarea>
            </div>
            <div class=" mb-1">
                <input class=" form-control-file btn bg-success text-white" type="file" name="theFile">
            </div>
            <div class="text-center">
                <input class="btn bg-success text-white" name ="submit" type="submit" value="Faire un rapport">
            </div>
        </form>
    </div>
<?php endif; ?>
    <!--**************************************************-->
    <div class="text-center">
        <a class="btn bg-success text-white" href="index.php">Retour</a>
    </div>
<!--**************************************************-->
<?php $content = ob_get_clean() ?>

<?php require('public/template.php') ?>