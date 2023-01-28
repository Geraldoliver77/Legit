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


<h1 class="CenterAL">CONFIRM</h1>

<div id="maincontainer" >

  

        <div id="registerbox" class="registerbox" active="false">
             <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" 
             enctype="multipart/form-data">

            <p >NAME：<?php echo htmlspecialchars($name, ENT_QUOTES);   ?> </p>
            <p> LOGIN ID：<?php echo htmlspecialchars($login, ENT_QUOTES);?> </p>
            <p>PASSWORD：<?php echo $passwordDot ; ?></p>
            <p>E-MAIL：<?php echo htmlspecialchars($email, ENT_QUOTES);  ?> </p>

           

<input type="submit" name="submit" class="submit" value="内容を確認して登録">
<br>
<input type="submit" name="submitback" class="submitback" value="戻る">
           



            </form>
        </div>




</div>
    
</body>
</html>