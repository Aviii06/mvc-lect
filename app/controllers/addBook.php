<?php

namespace Controller;

class AddBooks
{
    public function get()
    {
        session_start();
        \Controller\Utils::loggedInAdmin();
        echo \View\Loader::make()->render("templates/addBooks.twig", array(
            "status" => "no problemo",
        ));
    }
    public function post()
    {
        session_start();
        \Controller\Utils::loggedInAdmin();
        $rows = \Model\Book::getAll();
        $flag = 0;
        if (\Controller\Utils::isSetAll($_POST['book_id'], $_POST['book_name'], $_POST['capacity'])) {
            foreach ($rows as $i) {
                if ($i['book_id'] === $_POST['book_id']) {
                    $flag = 1;
                }
            }
            if ($flag === 0) {
                \Model\admin::insertBook($_POST['book_id'], $_POST['book_name'], $_POST['capacity']);
                header('Location:/addBooks ');
            } else {
                echo \View\Loader::make()->render("templates/addBooks.twig", array(
                    "status" => "exists",
                ));
            }
        }
        else{
            echo \View\Loader::make()->render("templates/addBooks.twig", array(
                "status" => "Fields cannot be left empty",
            ));
        }
    }
}
