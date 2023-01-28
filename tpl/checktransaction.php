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


<h1 class="CenterAL"><?php echo$action; ?>  CONFIRMATION</h1>

<div id="maincontainer" >

  <?php if ($action == "delete")  :  ?>

        <div id="registerbox" class="registerbox" active="false">
             <form action="<?php echo $_SERVER['PHP_SELF']; ?>?id=<?php echo $getcombineid; ?>&&action=<?php echo$action;?>" method="POST" 
             enctype="multipart/form-data">


             <?php foreach ($functionPost as $value) : ?>
            <p><br><?php echo htmlspecialchars($value["name"], ENT_QUOTES);   ?> </p>
            <p> BRAND：<?php echo htmlspecialchars($value["brand"], ENT_QUOTES);?> </p>
            <p>DESCRIPTON：<?php echo $value["description"] ; ?></p>
            <p>DATE：<?php echo htmlspecialchars($value["date"], ENT_QUOTES);  ?> </p>
            <?php endforeach;  ?>
           

<input type="submit" name="delete" class="submit" value="DELETE">
<br>
<input type="submit" name="submitback" class="submitback" value="戻る">
           
    <?php endif;  ?>


        

        <?php if ($action == "update" && $updatename =="update")  :  ?>

        <div id="registerbox" class="registerbox" active="false">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>?id=<?php echo $getcombineid; ?>&&action=<?php echo$action;?>" method="POST" 
            enctype="multipart/form-data">

         <?php foreach ($functionPost as $values) : ?>
            
            <input type="text" class="textbox" name="title" value="<?php echo$_POST["title"]??""; ?>" placeholder="<?php echo $values["title"]; ?>" >
                
            <br>
      
            
            <select name="type"  class="countries">

            <option style="font-family: sans-serif" value="CHOOSE A TYPE" selected>CHOOSE A TYPE</option>
                        
            <option style="font-family: sans-serif" value="OFFER" >OFFER</option>
            <option style="font-family: sans-serif" value="REQUEST" >REQUEST</option>

            </select>
            
            <br>    

            <select name="category"  class="countries">

        
            <option style="font-family: sans-serif" value="CHOOSE A CATEGORY" selected>CHOOSE A CATEGORY</option>

            <?php foreach (getCategories() as $key=> $value) : ?> 
            
            <option style="font-family: sans-serif" value="<?php echo strtoupper($value); ?>" ><?php echo strtoupper($value); ?></option>


            <?php endforeach; ?>


            </select>

                <br>
    


        <br><br><br>

        <textarea class="textboxdesc" name="description" placeholder= "<?php echo $values["description"]; ?> "></textarea>



        <br><br><br>

        <?php endforeach;  ?>
        

        <input type="submit" name="<?php echo$updatename; ?>" class="submit" value="<?php echo$update; ?>">
        <br>
        <input type="submit" name="submitback" class="submitback" value="戻る">
        
        <?php endif;  ?>

        

            </form>
        </div>









        <?php if ($action == "update" && $updatename =="confirm")  :  ?>

        <div id="registerbox" class="registerbox" active="false">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>?id=<?php echo $getcombineid; ?>&&action=<?php echo$action;?>" method="POST" 
            enctype="multipart/form-data">

        <?php foreach ($functionPost as $values) : ?>
            

            

            <p >title：<?php echo htmlspecialchars($_POST["title"], ENT_QUOTES);   ?> </p>
            <p> TYPE：<?php echo htmlspecialchars($_POST["type"], ENT_QUOTES);?> </p>
            <p> CATEGORY：<?php echo $_POST["category"] ?></p>
            <p> DESCRIPTION：<?php echo htmlspecialchars($_POST["description"], ENT_QUOTES);  ?> </p> 



            

        <br><br><br>

        <?php endforeach;  ?>


        <input type="submit" name="<?php echo$updatename; ?>" class="submit" value="<?php echo$update; ?>">
        <br>
        <input type="submit" name="submitback" class="submitback" value="戻る">

        <?php endif;  ?>



            </form>
        </div>






</div>
    
</body>
</html>