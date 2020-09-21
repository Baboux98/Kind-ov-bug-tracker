<?php require('view/employee/navView.php') ?>

<?php ob_start() ?>
<!--**************************************************-->

<!--**************************************************-->
</div class="">
    <h5 class="mt-5 mb-2 text-success text-center form-signin">Déclarez votre panne</h5>
    <form class="py-2 px-4"action="index.php?action=openTicket" method="post">
        <div class = "form-group">
            <label for="type">Type :</label> <br>
            <select class="form-control" id="type" name="type"required>
                <option>information</option>
                <option>systeme</option>
                <option>support</option>
            </select>
        </div>
        <div class = "form-group">
            <label for="title">Titre :</label> <br>
            <input class="form-control" id = "title" name="title" required>
        </div>
        <div class = "form-group">
            <label for="description">Description :</label> <br>
            <textarea class="form-control" id = "description" name="description" rows="2" required></textarea>
        </div>
        <div class = "form-group">
            <label for="priority">Importance :</label> <br>
            <select class="form-control" id="priority" name="priority" required>
                <option>forte</option>
                <option>moyen</option>
                <option>faible</option>
            </select>
        </div>
        <div class ="mb-2">
            <input class=" form-control btn bg-success text-white" type="file" name="theFile">
        </div>
        <div class="text-center">
            <a class="btn bg-success text-white" href="index.php?action=listTickets">Retour</a>
            <input class=" toastable btn bg-success text-white" name ="submit" type="submit" value="Ouvrir un ticket">
        </div>
    </form>
</div>
<!--**************************************************-->
<?php $content = ob_get_clean() ?>

<?php require('public/template.php') ?>