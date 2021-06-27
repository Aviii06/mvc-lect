<?php

namespace Controller;

class Home
{
    public function get()
    {
        session_start();
        if (isset($_SESSION['role'])) {
            if ($_SESSION['role'] === 'admin') {
                echo \View\Loader::make()->render("templates/admin.twig", array(
                    "books" => \Model\Book::getAll(),
                ));
            } else {
                echo \View\Loader::make()->render("templates/main.twig", array(
                    "books" => \Model\Book::getSpecific('remind',''),
                    "role" => $_SESSION['role'],
                ));
            }
        } else {
            echo \View\Loader::make()->render("templates/home.twig", array(
                "books" => \Model\Book::getAll(),
            ));
        }
    }
}
