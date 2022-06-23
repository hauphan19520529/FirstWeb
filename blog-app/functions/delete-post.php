<?php

session_start();

include "connect-db.php";

$id = $_GET['id'];
$post_user = $_GET['user_id'];
$current_user = $_SESSION['userID'];

if($current_user === $post_user)
{   $query1="delete from post where postID = (?)";
    $sth = $con->prepare($query1);
    $sth->bind_param('s', $id);
    $sth->execute();

    $query2="delete from comment where postID = (?)";
    $sth = $con->prepare($query2);
    $sth->bind_param('s', $post_user);
    $sth->execute();
    
    header("location: ../feed.php");
    die;
}else
{
    ?>
    <script>alert("Cannot delete other user's posts")</script>
    <?php
    header("location: ../feed.php");
    die;
}

?>