<?php

namespace Controller;

class ReturnedBooks
{
    public function get()
    {
        session_start();
        \Controller\Utils::loggedInAdmin();
        echo \View\Loader::make()->render("templates/returnedBooks.twig", array(
            "books" => \Model\Book::getSpecific('return',''),
        ));
    }
    public function post()
    {
        session_start();
        \Controller\Utils::loggedInAdmin();
        if ($_POST['action'] === 'Accept') {
            \Model\Admin::confirmReturn($_SESSION['uname'], $_POST['book_id']);
        } else {
            \Model\Admin::changeStatusAdmin($_SESSION['uname'], $_POST['book_id'],'taken');
        }
        echo \View\Loader::make()->render("templates/returnedBooks.twig", array(
            "books" => \Model\Book::getSpecific('return',''),
        ));
    }
}
