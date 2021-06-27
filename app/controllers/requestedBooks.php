<?php

namespace Controller;

class RequestedBooks
{
    public function get()
    {
        session_start();
        \Controller\Utils::loggedInAdmin();
        echo \View\Loader::make()->render("templates/requestedBooks.twig", array(
            "books" => \Model\Book::getSpecific('pending',''), 
        ));
    }
    public function post()
    {
        session_start();
        if(\Controller\Utils::isSetAll($_POST['action']))
        {
        \Controller\Utils::loggedInAdmin();
        if ($_POST['action'] === 'Accept') {
            \Model\Admin::confirmIssue($_SESSION['uname'], $_POST['book_id']);
        } else {
            \Model\Admin::rejectIssue($_SESSION['uname'], $_POST['book_id']);
        }
        header('Location: /requestedBooks');
        }
    }
}
