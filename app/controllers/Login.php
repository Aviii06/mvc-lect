<?php

namespace Controller;

class Login
{
    public function get()
    {
        if ($_SESSION['loggedIn']) {
            header('Location: main');
        } else {
            echo \View\Loader::make()->render("templates/login.twig", array(
                "status"=>"no problemo",
            ));
        }
    }
    public function post()
    {
        session_start();
        if (\Controller\Utils::isSetAll($_POST["uname"], $_POST["password"])) {
            $userName = $_POST["uname"];
            $password = $_POST["password"];
            $row=\Model\User::find($userName);
            if (isset($row) && hash('sha256', $password) == $row["password"]) {
                $_SESSION['uname'] = $userName;
                $_SESSION['role'] = \Model\User::find($userName, $password)['role'];
                $_SESSION['loggedIn'] = true;
                header('Location: /main');
            }
            else{
                $_SESSION['loggedIn'] = false;
                echo \View\Loader::make()->render("templates/login.twig", array(
                    "status"=>"wrong username or password",
                ));
            }
        }
        else{
            echo \View\Loader::make()->render("templates/login.twig", array(
                "status"=> "Can't leave fields empty",
            ));
        }
    }
}
