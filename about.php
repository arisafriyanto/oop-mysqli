<?php

    require_once "core/init.php";

    if(!Session::exists('username'))
    {
        header("location: login.php");
    }

    $username = Session::get('username');

    require_once "templates/header.php";
    
?>

<div class="container mt-3"><br>
    <div class="jumbotron mt-4">
        <h1 class="display-4"> About Me</h1>
        <img src="assets/img/aff.jpg" alt="Aris Afriyanto" width="200" class="rounded-circle">
        <p class="lead">Hii, my name is <?= ucwords(Session::get('username')); ?></p>
            <hr class="my-4">
        <p class="lead">
            <a href="account_detail.php?username=<?=$username;?>" class="btn btn-primary">Account Detail</a>
        </p>
    </div>
</div>

<?php 

    require_once "templates/footer.php";

?>