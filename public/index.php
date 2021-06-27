<?php

require __DIR__ . "/../vendor/autoload.php";
Toro::serve(array(
    "/" => "\Controller\Home",
    "/login" => "\Controller\Login",
    "/register" => '\Controller\Register',
    "/logout" => "\Controller\Logout",
    "/admin" => "\Controller\Admin",
    "/issueBooks" => "\Controller\IssueBooks",
    "/returnBooks" => "\Controller\ReturnBooks",
    "/main" => "\Controller\Main",
    "/addBooks" => "\Controller\AddBooks",
    "/requestedBooks" => "\Controller\RequestedBooks",
    "/returnedBooks" => "\Controller\ReturnedBooks",
    "/remindBooks" => "\Controller\GiveReminder"
));
