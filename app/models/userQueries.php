<?php

namespace Model;

class User
{
    public static function find($userName)
    {
        $db = \DB::get_instance();
        $stmt = $db->prepare("SELECT * FROM users where uname = ? LIMIT 1");
        $stmt->execute([$userName]);
        $row = $stmt->fetch();
        return $row;
    }
    public static function insert($userName, $email, $password)
    {
        $db = \DB::get_instance();
        $stmt = $db->prepare("insert into users value(?,?,?,'user')");
        $stmt->execute([$userName,$email,$password]);
    }
    public static function return($userName, $bookId)
    {
        session_start();
        $db = \DB::Get_instance();
        $stmt = $db->prepare("update issue set status='return' where uname=? and book_id=?");
        $stmt->execute([$userName,$bookId]);
    }
    public static function issue($userName, $bookId)
    {
        session_start();
        $db = \DB::Get_instance();
        $stmt = $db->prepare("insert into issue values(?,?,'pending')");
        $stmt->execute([$bookId,$userName]);
    }
}
