<?php

namespace Controller;

class Main
{
    public function get()
    {
        session_start();
        \Controller\Utils::loggedInUserRedirectToLogin();
        echo \View\Loader::make()->render("templates/main.twig", array(
            "books" => \Model\Book::getSpecific('remind',''),
            "role" => $_SESSION['role'],
        ));
    }
}
