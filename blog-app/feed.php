<?php 
session_start();

	include("functions/connect-db.php");
	include("functions/functions.php");

	$user_data = check_login($con);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="css/feed-style.css" rel="stylesheet">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo $user_data['userID']?></title>
</head>
<body>
    <!-- HEADER -->
    <?php 
        include "assets/header.php";
    ?>
    <!-- CREATE POST -->
    <div class="new-post">
        <form action="feed.php" method="post">
            <textarea name="content" placeholder="Write something..." style="height:200px"></textarea> <br>
            <input type="submit" name="create-post" value="Post">
        </form>
    </div>
    <div class="post-comment-section">
    <?php 
        include "functions/create-post.php";
    ?>
    <hr>
    <!-- FEED -->
    <?php include "functions/get-post.php" ?>
    <!-- FOOTER -->
    <?php include "assets/footer.php"?>
    </div>
</body>
</html>

