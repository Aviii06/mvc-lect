<?php

namespace Controller;

class Admin
{
    public function get()
    {
        session_start();
        if ($_SESSION['role'] === "admin") {
            echo \View\Loader::make()->render("templates/admin.twig", array());
        } else {
            header('Location: /');
        }
    }
}
