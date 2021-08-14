<?php
require_once("partials/header.php");
require('IP.txt');
if ($_SESSION['info']) {
    require('bin/redirect.php');
    $userType = $_SESSION['info']['id_user_type'];
    switch ($userType) {
        case "Administrador":
            $userType = 1;
            break;
        case "Analista":
            $userType = 2;
            break;
        case "Usuario":
            $userType = 3;
            break;
    }
    redirectUser($userType);
}
?>
    <body>
    <main>
        <div class="container my-5">
            <div class="row pt-5">
                <div class="col text-center ">
                    <h3>
                        Bienvenido a UTH Social estamos presentando la integradora
                    </h3>
                    <small class="small">El lugar donde todos decimos lo que pensamos</small>
                </div>
            </div>
            <div class="row text-center my-5">
            </div>
        </div>
        <div class="container my-5">
            <div class="row">
                <div class="col-12  col-xl-8 offset-md-0 offset-xl-2 w-100 text-center">
                </div>
            </div>
        </div>
    </main>
    </body>

<?php


require_once("partials/footer.php");
