<?php require('view/admin/navView.php') ?>

<?php ob_start() ?>
<!--**************************************************-->

<!--**************************************************-->
</div class="">
    <h5 class="mt-5 mb-2 text-success text-center form-signin">Editez le ticket</h5>
    <form class="py-2 px-4"action="index.php?action=doEditing&id=<?=$ticket['id']?>" method="post">
        <div class = "form-group">
            <label for="type">Type :</label> <br>
            <select class="form-control" id="type" name="type" >
                <option><?=$ticket['type_']?></option>
                <option>information</option>
                <option>systeme</option>
                <option>support</option>
            </select>
        </div>
        <div class = "form-group">
            <label for="title">Titre :</label> <br>
            <input class="form-control" id = "title" value="<?=$ticket['title']?>" name="title" readonly>
        </div>
        <div class = "form-group">
            <label for="description">Description :</label> <br>
            <textarea class="form-control" id = "description" name="description" rows="2" readonly><?=$ticket['description_']?></textarea>
        </div>
        <div class = "form-group">
            <label for="priority">Importance :</label> <br>
            <select class="form-control" id="priority" name="priority" >
                <option><?=$ticket['priority']?></option>
                <option>forte</option>
                <option>moyen</option>
                <option>faible</option>
            </select>
        </div>
        <div class = "form-group">
            <label for="assignement">Attribuer à :</label> <br>
            <select class="form-control" id="assignement" name="assignement" >
                <option value=<?=NULL?>>-Selectionner un stagiaire-</option>
                <?php
                while($trainee = $trainees->fetch())
                { ?>
                    <option value ="<?=$trainee['employee_number']?>"><?=getfirstnameAndLastname($trainee['employee_number'])?></option>
        <?php    } ?>
            </select>
        </div>
        <div class="text-center">
            <a class="btn bg-success text-white" href="index.php?action=doEdit">Retour</a>
            <input class="btn bg-success text-white" name ="submit" type="submit" value="Enregistrer">
        </div>
    </form>

</div>
<!--**************************************************-->
<?php $content = ob_get_clean() ?>

<?php require('public/template.php') ?>