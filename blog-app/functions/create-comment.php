<?php
    if(isset($_POST["create-comment"])) {
        $comment_id=random_num(7);
        $comment_content=htmlspecialchars($_POST["comment-content"]);
        $date=date("Y-m-d H:i:s");
        $id=$user_data['userID'];
        $comment_post=$_POST['comment-post'];
        $query = "insert into comment (commentID,postID,userID,content,date) values ('$comment_id','$comment_post','$id','$comment_content','$date')";

        mysqli_query($con, $query);
        header("Location: #");
        die;

    }
?>