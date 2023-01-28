<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- <link rel="stylesheet" href="css/mainstyle.scss"> -->
    <link href="css/checkstyle.scss" rel="stylesheet" type="text/css"> 

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LEGIT Landing Page</title>

</head>
<body class="LandingBG">


<!-- CSS Connection Established -->


<h1 class="CenterAL"> CHANGE PROFILE PICTURE </h1>

<div id="maincontainer" >

  

        <div id="registerbox" class="registerbox" active="false">
        <form action="<?php echo $_SERVER['PHP_SELF']?>?id=<?php echo$_GET["id"]??"";?>" 
        method="POST" enctype="multipart/form-data">

            <p >Welcome MR/MRS  <?php echo htmlspecialchars
            ($functionId[0]["name"], ENT_QUOTES);   ?> </p>


            <div class="contentalt">

           

            <a href="#"> <img class="image-cropper center" src="userprofile/<?php echo$_GET["id"]; ?>/img_<?php
            echo $_GET["id"]; ?>.jpg"></a>

            </div>

            <input type="password" class="textbox" name="password" 
            placeholder="password" 
            autocomplete="new-password">
            <br><br><br>

               
            <input type="file" class="updatefile" name="images" >
         
            <br>

              
        <br><br>
        <input type="submit"  name="submitfile" class="submit" 
        value="UPDATE">
        <br>
        <input type="submit"  name="back" class="submitback" 
        value="戻る">
           
      
      







            </form>
        </div>




</div>
    
</body>
</html>