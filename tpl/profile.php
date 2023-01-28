<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="css/profilestyle.scss">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Insert Username here to display their profile -->
    <title>User's Profile</title>
</head>
<body>

<div class="contentalt">

    <a href="cPicture.php?id=<?php echo $_GET["id"]; ?>"> <img class="image-cropper center" src="userprofile/<?php echo$_GET["id"]; ?>/img_<?php
      echo $_GET["id"]; ?>.jpg"></a>




</div>


<p>プロフィールページへようこそ、該当している項目を選んで貰えると変更はできます</p>


<form action="<?php echo $_SERVER['PHP_SELF']?>?id=<?php echo $_GET["id"]; ?>" method="POST" 
            enctype="multipart/form-data">
    <div class="container">

            <div class="item CenterAL"><input class="submit" type="submit" name="transactions"  value="投稿一覧表示"></div>
            <div class="item CenterAL"><input class="submit" name="name" type="submit" value="名前変更"></div>
            <div class="item CenterAL"><input class="submit" name="email" type="submit" value="メールアドレス変更"></div>
            <div class="item CenterAL"><input class="submit" name="address" type="submit" value="地方変更"></div>
            <div class="item CenterAL"><input class="submit" name="username" type="submit" value="ログインID変更"></div>
            <div class="item CenterAL"><input class="submit" name="cPassword" type="submit" value="パスワード変更"></div>
            <div class="item CenterAL"><input class="submit" name="back" type="submit" value="↩"></div>
            <div class="item CenterAL"><input class="submitout" name="signout" type="submit" value="ログアウト"></div>

    </div>
</form> 
</body>
</html>