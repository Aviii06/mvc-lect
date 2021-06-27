<?php

namespace Model;

class Book
{
  public static function getAll()
  {
    $db = \DB::Get_instance();
    $stmt = $db->prepare("select * from book order by book_id asc");
    $stmt->execute();
    $rows = $stmt->fetchAll();
    return $rows;
  }
  public static function getSpecificIssue()
  {
    $db = \DB::Get_instance();
    session_start();
    $stmt = $db->prepare("select book.book_id,book.book_name,book.capacity from book join issue on issue.book_id=book.book_id where issue.uname=?  ");
    $stmt->execute([$_SESSION['uname']]);
    $rows = $stmt->fetchAll();
    return $rows;
  }
  public static function getSpecific($para, $para2)
  {
    $db = \DB::Get_instance();
    session_start();
    $stmt = $db->prepare("select i.book_id,i.uname,i.status,b.book_name,b.capacity from issue as i left join book as b on b.book_id=i.book_id where i.uname=? and b.capacity > 0 and i.status=? or i.status=?");
    $stmt->execute([$_SESSION['uname'],$para,$para2]);
    $rows = $stmt->fetchAll();
    return $rows;
  }
}
