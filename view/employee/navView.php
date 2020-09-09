<?php ob_start() ?>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>
<div id="navbarContent" class="collapse navbar-collapse">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="index.php?action=listTickets">My tickets</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.php?action=makeTicket">Créer un ticket</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.php?action=deconnexion">Deconnexion</a>
        </li>
    </ul>
</div>
<?php $nav_content = ob_get_clean() ?>