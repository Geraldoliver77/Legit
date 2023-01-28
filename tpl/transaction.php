<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="css/transactionstyle.scss">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="js/index.js"></script>
    <!-- Insert Username here to display their profile -->
    <title>transaction</title>
</head>

<h1>MY POST</h1>

<div class="container">

    <div class="contentalt">
          
        <div class="requests">

            <h2>VERIFY</h2>
           
            
       

        <form action="<?php echo $_SERVER['PHP_SELF']?>?id=<?php echo $_GET["id"]; ?>" method="POST" 
            enctype="multipart/form-data"> 
            <input type="submit"  name="back" class="submitback" 
        value="戻る">

            </form>

            <form action="<?php echo $_SERVER['PHP_SELF']?>?id=<?php echo $_GET["id"]; ?>&&action=reqsearch" method="POST" 
            enctype="multipart/form-data">           
            <input class="submit" type="text" name="reqsearch" placeholder="Search" >
                <input class="searchbutton" name="reqsubmitsearch" type="submit" value="🔎︎" >
            </form>
       

        </div>


      
        <table>
        <?php if ($reqflag < 1 ) :   ?>
    
    <?php for ($i=0; $i < count($value) ; $i++) : ?>

    <?php $image  =explode(",",$value[$i]["img"]); ?>

        <?php $functionComment = getComment("localhost","root","","legit" , $value[$i]["id"]); ?>


        <tr>
            <th rowspan="3"> <img class="image-cropper" src="images/task/<?php echo$value[$i]["userid"]; ?>/<?php echo$image[0]; ?>"></th>
        <td class="title"> <a class="title" style="font-size:1em" href="transactiondetail.php?id=<?php echo$_GET["id"]; ?>&&postid=<?php echo$value[$i]["id"]?>">
        <?php echo$value[$i]["name"]; ?> </a></td>
        </tr>

        <tr>
            <td class="date"><?php echo$value[$i]["date"]; ?></td>
            <td class="category"><?php echo$value[$i]["brand"]; ?></td>
        </tr>

        <tr>
            <td class="description"> <?php echo$value[$i]["description"]; ?> </td>
            <td class ="comments"><?php echo count($functionComment); ?> Comments </td>
        </tr>

       

        <?php endfor;  ?>    
 
        <?php else :   ?>    

        <?php foreach ($arraysearch as $value) : ?>
        
        <tr>
            <th rowspan="3"> <img class="image-cropper" src="userprofile/<?php echo$value["userid"]; ?>/img_<?php
            echo $value["userid"]; ?>.jpg"></th>
            <td class="title"><?php echo$value["title"]; ?></td>
        </tr>

        <tr>
            <td class="date"><?php echo$value["date"]; ?></td>
            <td class="category"><?php echo$value["category"]; ?></td>
        </tr>

        <tr>
            <td colspan="2" class="description"> <?php echo$value["description"]; ?> </td>
        </tr>

        <?php endforeach;  ?>

        <?php endif; ?>

      

        </table>
     

        <br>
        <?php if ($reqpage->get_data() != "NULL"  ) :   ?>
        <?php  $reqpage->page_list($class ,"transaction.php?id=$getid&&reqpage_num"); ?>
        <?php endif; ?>
      
        <h1>_______________________________</h1>
       
       
</div>
</form>

</body>
</html>