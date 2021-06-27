<?php

namespace Controller;

class GiveReminder
{
    public function get()
    {
        session_start();
        \Controller\Utils::loggedInAdmin();
        echo \View\Loader::make()->render("templates/remind.twig", array(
            "books" => \Model\Book::getSpecific('taken',''),
        ));
    }
    public function post()
    {
        session_start();
        \Controller\Utils::loggedInAdmin();
        \Model\Admin::changeStatusAdmin($_SESSION['uname'], $_POST['book_id'],'remind');
        header('Location: /remindBooks');
    }
}
