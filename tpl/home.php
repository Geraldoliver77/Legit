<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="css/homestyle.scss">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LEGIT HOME Page</title>
</head>
<body>

<div class="container">
  <div class="box">
    <span></span>
    <div class="content">
      <h2>要求</h2>
      <p>フォルムに依頼／サービス提供のためのアクセス端末です。あなたの商品をLEGITかどうかを証明していきましょう</p>
    <a href="offer.php?id=<?php echo$_GET["id"]; ?>">アップロード！</a>
    </div>
  </div>
  <div class="box">
    <span></span>
    <div class="content">
      <h2>コネクト</h2>
      <p>最近の投稿のすべてをCONNECTの端末で見ることができます。今すぐCONNECTネットワークに参加しよう</p>
      <a href="bulletin.php?id=<?php echo$_GET["id"]; ?>">コネクト！</a>
    </div>
  </div>
  <div class="box">
    <span></span>
    <div class="contentalt">
      <h2>プロフィール</h2>

      <a href="profile.php?id=<?php echo$_GET["id"]; ?>">     
       <!-- To Oliver: Insert Profile Picture Here,
       No Explanation Necessary -->
      <img class="image-cropper" src="userprofile/<?php echo$_GET["id"]; ?>/img_<?php
      echo $_GET["id"]; ?>.jpg"></a>
    </div>
  </div>
</div>
  
    
</body>
</html>