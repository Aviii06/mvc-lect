<?php

namespace Controller;

class ReturnBooks
{
    public function get()
    {
        session_start();
        \Controller\Utils::loggedInUser();
        echo \View\Loader::make()->render("templates/returnUser.twig", array(
            "books" => \Model\Book::getSpecific('taken', 'remind'),
            "role" => $_SESSION['role'],
        ));

    }
    public function post()
    {
        session_start();
        \Controller\Utils::loggedInUser();
        \Model\User::return($_SESSION['uname'], $_POST['book_id']);
        header('Location: /returnBooks');
    }
}
