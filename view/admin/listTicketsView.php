<?php require('view/admin/navView.php') ?>
<?php ob_start() ?>
<!--**************************************************-->
<?php if($_GET['success']):?>
<div aria-live="polite" aria-atomic="true" style="position: relative;">
  <div class="toast bg-success" data-autohide="false" style="position: absolute; top: 0; right: 0;">
    <div class="toast-header">
      <strong class="mr-auto">Notification</strong>
      <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="toast-body">
        <?=$_GET['success']?>
    </div>
  </div>
</div>
<?php endif;?>
<!--**************************************************-->

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
                <th>Demandeur</th>
                <th>Attriubé à</th>
                <th>Date et heure</th>
                <th>Actions</th>
            </tr>
        </thead>
        <?php
            while($ticket=$tickets->fetch())
            {  ?>       
                <tr>
                    <td class ="col-2"><?=$ticket['title']?></td>
                    <td><?=$ticket['type_']?></td>
                    <td><?=$ticket['statut']?></td>
                    <td><?=$ticket['priority']?></td>
                    <td><?=getfirstnameAndLastname($ticket['employee_number'])?></td>
                    <td><?=getfirstnameAndLastname($ticket['trainee_number']);?></td>
                    <td><?=$ticket['date_ticket']?></td>
                    <td>
                        <a class="btn btn-success text-white" href="index.php?action=details&id=<?=$ticket['id']?>">Détails</a>
                    </td>
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