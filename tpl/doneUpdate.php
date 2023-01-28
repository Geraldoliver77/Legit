<?php

///////////////サブミットボタンはここからになります//////////////////////
if(isset($_POST["back"])){  

    $id=$_GET['id'];


    header("location:../home.php?id=$id");

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- <link rel="stylesheet" href="css/mainstyle.scss"> -->
    <link href="../css/checkstyle.scss" rel="stylesheet" type="text/css"> 
    <link rel="stylesheet" href="../css/profilestyle.scss">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BRIDGE Landing Page</title>

    <!-- <style>
        p{
            color:white;
        }
    </style> -->

</head>
<body class="LandingBG">


<!-- CSS Connection Established -->


  <h1 class="CenterAL">Complete </h1>
  <h1 class="CenterAL">redirecting in 2 seconds </h1>

        <div id="registerbox"  active="false">
        <form action="<?php echo $_SERVER['PHP_SELF']?>?id=<?php echo$_GET["id"]??"";?>" method="POST" enctype="multipart/form-data">
        <meta http-equiv="refresh" content="2;url=../home.php?id=<?php echo$_GET["id"]??""?>" />
    

<!--会員登録にもどる-->
<br>



</div>    



            </form>
        </div>




</div>
    
</body>
</html>