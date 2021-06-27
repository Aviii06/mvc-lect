<?php

namespace Model;

class Admin
{
    public static function insertBook($bookId, $bookName, $capacity)
    {
        $db = \DB::get_instance();
        $stmt = $db->prepare("insert into book values(?,?,?)");
        $stmt->execute([$bookId, $bookName, $capacity]);
    }

    public static function confirmIssue($userName, $bookId)
    {
        $db = \DB::Get_instance();
        session_start();
        $stmt = $db->prepare("update issue set status= 'taken' where uname= ? and book_id= ?");
        $stmt->execute([$userName, $bookId]);
        $stmt2 = $db->prepare("select capacity from book where book_id= ?");
        $stmt2->execute([$bookId]);
        $row = $stmt2->fetch();
        $stmt3 = $db->prepare("update book set capacity= ? where book_id= ?");
        $num = (int)$row['capacity'];
        $stmt3->execute([$num-1, $bookId]);
    }
    public static function rejectIssue($userName, $bookId)
    {
        $db = \DB::Get_instance();
        session_start();
        $stmt = $db->prepare("delete from issue where uname=? and book_id=?");
        $stmt->execute([$userName, $bookId]);
    }
    public static function confirmReturn($userName, $bookId)
    {
        $db = \DB::Get_instance();
        session_start();
        $stmt = $db->prepare("delete from issue where uname=? and book_id=?");
        $stmt->execute([$_SESSION['uname'], $_POST['book_id']]);
        $stmt2 = $db->prepare("select capacity from book where book_id= ?");
        $stmt2->execute([$bookId]);
        $row = $stmt2->fetch();
        $stmt3 = $db->prepare("update book set capacity= ? where book_id= ?");
        $num = (int)$row['capacity'];
        $stmt3->execute([$num+1,$bookId]);
    }
    public static function changeStatusAdmin($userName, $bookId,$status)
    {
        $db = \DB::Get_instance();
        session_start();
        $stmt = $db->prepare("update issue set status= ? where uname= ? and book_id= ?");
        $stmt->execute([$status,$userName,$bookId]);
    }
}
