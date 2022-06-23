<div class="comment">
<!-- GET comment-->
<?php
    $sql="SELECT * FROM comment where postID = '$post_ID' order by date asc";
    $get_comment=mysqli_query($con, $sql);

    while($comments=mysqli_fetch_assoc($get_comment)) 
    {
        $comment_user=$comments['userID'];
        $comment_content=$comments['content'];
        //$post_date=$posts['date'];


        // GET username
        $sql="select username from user where userID='$comment_user'";
        $result=mysqli_query($con,$sql);
        $get_username=mysqli_fetch_assoc($result);
        $name=$get_username['username'];
        // RENDER comment
        ?>
        <hr><p><?php echo $name ?>: <?php echo $comment_content ?></p><br>
        <?php
    }
?>
</div>