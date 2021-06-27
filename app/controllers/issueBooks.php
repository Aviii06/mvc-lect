<?php

namespace Controller;

class IssueBooks
{
    public function get()
    {
        session_start();
        \Controller\Utils::loggedInUser();
        echo \View\Loader::make()->render("templates/issue.twig", array(
            "books" => \Controller\Utils::checkIssue(),
            "role" => $_SESSION['role'],
        ));
    }
    public function post()
    {
        session_start();
        \Controller\Utils::loggedInUser();
        \Model\User::issue($_SESSION['uname'], $_POST['book_id']);
        header('Location: /issueBooks');
    }
}
