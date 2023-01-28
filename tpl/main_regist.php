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


<h1 class="CenterAL"> REGISTRATION </h1>

<div id="maincontainer" >

  

        <div id="registerbox" class="registerbox" active="false">
        <form action="main_regist.php?hashid=<?php echo$hashId; ?>"
         method="POST" enctype="multipart/form-data">

            <p >Welcome MR/MRS <?php echo htmlspecialchars($newarray["name"], ENT_QUOTES);   ?> </p>
            <input type="password" class="textbox" name="password" placeholder="password" autocomplete="new-password">
            <br>
     
            <select name="countries"  class="countries">

   
            <!-- LIST OF THE PREFECTURE -->
            <option value="Country" selected>Country</option>

            <?php foreach (getCountries() as  $value) : ?> 

            <option value="<?php echo $value; ?>"selected ><?php echo $value; ?></option>


            <?php endforeach; ?>


            </select>

            <br>

            <input type="file" class="submitfile" name="image"  >
            <br><br><br>

          

        <input type="submit"  name="submitOne" class="submit" 
        value="内容を確認して登録">

           



            </form>
        </div>




</div>
    
</body>
</html>