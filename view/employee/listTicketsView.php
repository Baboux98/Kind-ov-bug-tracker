<?php require('view/employee/navView.php') ?>
<?php ob_start() ?>
<div>
    <a  class ="btn btn-success mb-2" href="index.php?action=makeTicket">Créer un ticket</a>
</div>

<!--**************************************************-->
<div>
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>Ticket</th>
                <th>Type</th>
                <th>statut</th>
                <th>Priority</th>
                <th>Date et heure</th>
                <th>Actions</th>
            </tr>
        </thead>
        <?php
            while($ticket=$tickets->fetch())
            {  ?>       
                <tr>
                    <td><?=$ticket['title']?></td>
                    <td><?=$ticket['type_']?></td>
                    <td><?=$ticket['statut']?></td>
                    <td><?=$ticket['priority']?></td>
                    <td><?=$ticket['date_ticket']?></td>
                    <td><a class="btn btn-success text-white" href="index.php?action=details&id=<?=$ticket['id']?>">Détails</a></td>  
                </tr>
                <?php   
            }
            $tickets->closeCursor();    
        ?>
    </table> 
</div>


<!--**************************************************-->


<?php $content = ob_get_clean() ?>

<?php require('public/template.php') ?>