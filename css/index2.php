<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="css/mainstyle.scss">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BRIDGE Landing Page</title>
    <script type="text/javascript" src="js/index.js"></script>
</head>
<body class="LandingBG">


<!-- CSS Connection Established -->

<!-- Homepage Design Language: Middle Logo Main Button, Upon Click Redirect, Animated Entry, BG Default -->
<img id="img" class="HPLogo, Pulse" onclick="LogoClick()" src="img/Bridge_Main_Logo.png">

<h1 class="CenterAL">LEGIT</h1>

<div id="container" class="noexist">

    <button id="login" class="buttoncraft" onclick="Login()">LOGIN<br>
    
        <div id="loginform" class="loginformno" active="false">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" 
            enctype="multipart/form-data">
    
            
                <input type="text" class="textbox" name="nameLogin" value="" placeholder="Login ID を記入して下さい">
                <input type="password" class="textbox" name="passLogin" value="" placeholder="Password を記入して下さい">

                <input type="submit" name="submitlogin" class="submit" value="ログイン">

                <input type="submit" class="submitback" value="戻る">


            </form>
        </div>

    </button>

    <button id="register" class="buttoncraft" onclick="Register()">REGISTER<br>

        <div id="registerform" class="registerformno" active="false">
             <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" 
             enctype="multipart/form-data">
    
            
                <input type="text" class="textbox" name="entryName" value="<?php echo $_SESSION["entryName"]??""; ?>" placeholder="Name を記入して下さい">

                <input type="text" class="textbox" name="email" value="<?php echo $_SESSION["email"]??""; ?>" placeholder="E-MAIL を記入して下さい">
   

                <input type="text" class="textbox" name="loginId"  value="<?php echo $_SESSION["loginId"]??"";  ?>" placeholder="Login ID を記入して下さい">
    

                <input type="password" class="textbox" name="password"  value="<?php echo $_SESSION["password"]??"";  ?>" placeholder="Password を記入して下さい" autocomplete="new-password">
            

                <input type="submit" name="submitregister" class="submit" value="登録">

                <input type="submit" class="submitback" value="戻る">



            </form>
        </div>

    </button>


</div>
    
</body>
</html>