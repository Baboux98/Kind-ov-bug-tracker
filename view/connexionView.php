<?php ob_start(); ?>
<!-- ************************************************************ -->

<section class="jumbotron container">
      <h1 class="text-center">Déclarez vos pannes</h1>
</section>

<!-- ************************************************************ -->
<?php 
    if ($_GET['error'])
    {
        ?>
        <div class="alert alert-danger text-center" role="alert">
            <?=$_GET['error']?>
        </div>
    <?php 
    } ?>
<!-- ************************************************************ -->
<div id="fortesting"></div>

<section class="container">
    <form class="form-signin" action="index.php?action=checkconnexion" method="post">
        <h1 class="h3 mb-3 font-weight-bold text-center">Connexion</h1>
        <div class="form-group">
            <label class="font-weight-bold" for="login">Identifiant:</label>
            <input type="text" class="form-control" placeholder="BJ**** ou 00**" id="login" name="login" required>    
        </div>
        <div class="form-group">
            <label class="font-weight-bold" for="password">Mot de passe:</label>
            <input type="password" class="form-control" id="password" name="password" required>    
        </div>
        <div class="form-check text-center">
            <label class="form-check-label" for="rememberMe">
                <input class="form-check-input" type="checkbox" id="rememberMe" name="rememberMe">
                Se souvenir de moi
            </label>
        </div>
        <br>
        <div class="text-center">
            <button type="submit" class="btn btn-success">Se connecter</button>
        </div>    
    </form>
 </section>

<!-- ************************************************************ -->

 <?php $content = ob_get_clean(); ?>
<!-- ************************************************************ -->

<?php require('public/template.php'); ?>