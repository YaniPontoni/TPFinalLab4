<?php

namespace Controllers;

class HomeController
{
    public function Index($message = "")
    {
        require_once(VIEWS_PATH . "login.php");
    }

    public function logout($message = "")
    {
        if (!empty($_SESSION["userLogged"])) {

            unset($_SESSION["userLogged"]);
        }

        session_destroy();

        header("location:../index.php");
    }
}
