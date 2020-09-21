<?php ob_start(); ?>
<!-- ************************************************************ -->
<div class="row h-100">
    <div class="col-sm-12 my-auto">
        <img src="public/images/error 404.jpg" alt="">
    </div>
</div>
<!-- ************************************************************ -->

 <?php $content = ob_get_clean(); ?>
<!-- ************************************************************ -->

<?php require('public/template.php'); ?>