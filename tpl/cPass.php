<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- <link rel="stylesheet" href="css/mainstyle.scss"> -->
    <link href="css/checkstyle.scss" rel="stylesheet" type="text/css"> 

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


<h1 class="CenterAL"> CHANGE <?php echo$_GET["change"]; ?> </h1>

<div id="maincontainer" >

  

        <div id="registerbox" class="registerbox" active="false">
        <form action="<?php echo $_SERVER['PHP_SELF']?>?id=<?php echo$_GET["id"]??"";?>&&change=<?php echo$_GET["change"]??"";?>" method="POST"> 

            <p >Welcome MR/MRS  <?php echo htmlspecialchars
            ($functionId[0]["name"], ENT_QUOTES);   ?> </p>

        <?php if($_GET["change"] == "pass"): ?>

            <input type="password" class="textbox" name="password" 
            placeholder="old password" 
            autocomplete="new-password">
            <br><br><br>
           
            <input type="password" class="textbox" name="oldpassword" 
            placeholder="new password" 
            autocomplete="new-password">
            <br>

              
        <br><br>
        <input type="submit"  name="submitpass" class="submit" 
        value="UPDATE">
        <br>
        <input type="submit"  name="back" class="submitback" 
        value="戻る">
           
        <?php endif;?>  

        
        <?php if($_GET["change"] == "username"): ?>

        <input type="password" class="textbox" name="password" 
         placeholder="password" 
         autocomplete="new-password">
        <br><br><br>

        <input type="textbox" class="textbox" name="username" 
        placeholder="new login id" 
        autocomplete="new-password">
        <br>

  
        <br><br>
        <input type="submit"  name="submitusername" class="submit" 
        value="UPDATE">
        <br>
        <input type="submit"  name="back" class="submitback" 
        value="戻る">

    <?php endif;?>  

        
            <?php if($_GET["change"] == "region"): ?>

        <input type="password" class="textbox" name="password" 
        placeholder="password" 
        autocomplete="new-password">
        <br>

        <select name="region"  class="countries">

   
            <!-- LIST OF THE PREFECTURE -->
            <option value="Country" selected>Country</option>

            <?php foreach (getCountries() as  $value) : ?> 

            <option value="<?php echo $value; ?>"selected ><?php echo $value; ?></option>


            <?php endforeach; ?>


            </select>


        <br><br>
        <input type="submit"  name="submituseraddress" class="submit" 
        value="UPDATE">
        <br>
        <input type="submit"  name="back" class="submitback" 
        value="戻る">

        <?php endif;?> 


             <?php if($_GET["change"] == "email"): ?>

            <input type="password" class="textbox" name="password" 
            placeholder="password" 
            autocomplete="new-password">
            <br><br>

            <input type="text" class="textbox" name="email" value=""
             placeholder="new E-MAIL">

            <br><br>
            <input type="submit"  name="submituseremail" class="submit" 
            value="UPDATE">
            <br>
            <input type="submit"  name="back" class="submitback" 
            value="戻る">

            <?php endif;?> 


            <?php if($_GET["change"] == "name"): ?>

            <input type="password" class="textbox" name="password" 
            placeholder="password" 
            autocomplete="new-password">
            <br><br>

            <input type="text" class="textbox" name="name" value=""
            placeholder="new name">

            <br><br>
            <input type="submit"  name="submitname" class="submit" 
            value="UPDATE">
            <br>
            <input type="submit"  name="back" class="submitback" 
            value="戻る">

            <?php endif;?> 









            </form>
        </div>




</div>
    
</body>
</html>