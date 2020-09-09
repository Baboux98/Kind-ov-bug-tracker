<?php require('view/employee/navView.php') ?>

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
            <span class ="h5 text-success col">Description : </span><?=$ticket['description_']?>
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
           <span class ="h5 text-success col ">Commentaire: </span><?=showComment($ticket['comment'])?>
       </div>
    </div>
    <div class="text-center">
            <a class="btn bg-success text-white" href="index.php">Retour</a>
    </div>
</div>
<!--**************************************************-->
<?php $content = ob_get_clean() ?>

<?php require('public/template.php') ?>