<?php
    if(isset($_POST["create-post"])) {
        $post_id=random_num(7);
        $post_content=htmlspecialchars($_POST["content"]);
        
        $id=$user_data['userID'];
        $query = "insert into post (postID,userID,content) values ('$post_id','$id','$post_content')";

        mysqli_query($con, $query);
        header("Location: #");

    }
?>