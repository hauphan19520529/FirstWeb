<div class="post">
<!-- GET POST-->
<?php
    $current_user = $user_data['userID'];
    $sql="SELECT * FROM POST";
    $get_post=mysqli_query($con, $sql);

    while($posts=mysqli_fetch_assoc($get_post)) {
        $post_ID=$posts['postID'];
        $post_user=$posts['userID'];
        $post_content=$posts['content'];
        //$post_date=$posts['date'];


        // GET username
        $sql="select username from user where userID='$post_user'";
        $result=mysqli_query($con,$sql);
        $get_username=mysqli_fetch_assoc($result);
        $name=$get_username['username'];
        // RENDER POST
        ?>
        <hr><p><?php echo $post_content ?></p><span><?php echo $name ?></span><br>
        <?php $q_delete = "functions/delete-post.php?id=".$post_ID."&user_id=".$post_user ?>
        <button><a href="<?php echo $q_delete?>">Delete</a></button>
        <?php
        // GET COMMENT
        include "get-comment.php";
        // COMMENT BOX
        ?>
        <div class="new-comment">
                <form action="feed.php" method="post" id="comment">
                    <textarea name="comment-content" placeholder="Write comment" style="height: 30px"></textarea> <br>
                    <input name="comment-post" value="<?php echo "$post_ID"?>" hidden>
                    <input type="submit" name="create-comment" value="Comment"> <hr>
                </form>
        </div>
        <?php
        include "create-comment.php";
    }
?>
</div>