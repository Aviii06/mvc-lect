<?php

namespace Controller;

class Register
{
    function get()
    {
        session_start();
        if ($_SESSION['log'] === true) {
            echo \View\Loader::make()->render("templates/main.twig", array(
                "books" => \Model\book::getSpecific('remind',''),
            ));
        } else {
            echo \View\Loader::make()->render("templates/register.twig", array(
                "status"=>"no problemo",
            ));
        }
    }
    function post()
    {
        session_start();
        if (\Controller\Utils::isSetAll($_POST['password'], $_POST['uname'], $_POST['confirmPassword'],$_POST['email'])) {
            if ($_POST['password'] === $_POST['confirmPassword']) {
                $userName=$_POST['uname'];
                if (!(\Model\User::find($userName))) {
                    $userName = $_POST['uname'];
                    $password = hash('sha256', $_POST['password']);
                    \Model\User::insert($_POST['uname'], $_POST['email'], $password);
                    echo \View\Loader::make()->render("templates/main.twig", array(
                        "books" => \Model\Book::getSpecific('remind',''),
                    ));
                    session_unset();
                    session_destroy();
                    $_SESSION['uname'] = $userName;
                    $_SESSION['role'] = \Model\User::find($userName, $password)["role"];
                    $_SESSION['log'] = true;
                } else {
                    echo \View\Loader::make()->render("templates/register.twig", array(
                        "status"=>"username already exists",
                    ));
                }
            } else {
                echo \View\Loader::make()->render("templates/register.twig", array(
                    "status"=> "Passwords don't match",
                ));
            }
        }
        else{
            echo \View\Loader::make()->render("templates/register.twig", array(
                "status"=> "Can't leave fields empty",
            ));
        }
    }
}
