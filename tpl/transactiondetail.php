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

<h1>MY TRANSACTIONS</h1>

<div class="container">
    <div class="contentalt">
        <div class="requests">
            <h2>TRANSACTIONS DETAIL</h2>
            <form action="<?php echo $_SERVER['PHP_SELF']?>?id=<?php echo $_GET["id"]; ?>" method="POST" 
            enctype="multipart/form-data"> 
            <input type="submit"  name="back" class="backdetail" 
            value="戻る">

            </form>

        </div>


    <div class="userDetails">
       <table>

            <?php for ($i=0; $i < count($value) ; $i++) : ?>
            <?php $image  =explode(",",$value[$i]["img"]); ?>
            <?php $functionComment = getComment("localhost","root","","legit" , $value[$i]["id"]); ?>
            <?php for ($a=0; $a < count($image) ; $a++) : ?>

        <tr> 
            <img class="image-list" src="images/task/<?php echo$value[$i]["userid"]; ?>/<?php echo$image[$a]; ?>">
            <?php endfor;  ?>

            <td class="title"> 
                <a class="title" style="font-size:1em" href="#">
                <?php echo$value[$i]["name"]; ?> </a>
            </td>
        </tr>

        <tr>
            <td class="date">
                <?php echo$value[$i]["date"]; ?>
            </td>
   
            <td class="category">  
                <?php echo $functionId[0]["name"]; ?> 
            </td>
        </tr>

        <tr>
            <td colspan="2" class="description">
                <?php echo$value[$i]["description"]; ?> 
                <br>
                <div class="delupcontainer">
                <form action="<?php echo $_SERVER['PHP_SELF']?>?id=<?php echo $_GET["id"]; ?>&&postid=<?php echo$_GET["postid"]?>" method="POST" 
                    enctype="multipart/form-data">            
                    <input type="submit"  name="delete" class="deleteButton" 
                    value="DELETE">
                </form>
                </div>
            </td>
        </tr>

        <?php endfor;  ?>  

       </table>
    </div>

       <h2>COMMENT LIST</h2>
       <div class="commentList">

        <table>
     
            <?php foreach ($functionComment as $value) : ?>
                <tr>
                    <th rowspan="3"> <img class="image-user" src="userprofile/<?php echo$value["commentatorid"]; ?>/img_<?php
                    echo $value["commentatorid"]; ?>.jpg"></th>  
                </tr>

                <tr>
                    <td class="date"><?php echo$value["date"]; ?></td>         
                </tr>

                <tr>
                    <td class="description"> <?php echo$value["message"]; ?> </td>
                    <td class ="username"><?php echo$value["commentator"];; ?></td>
                </tr>

            <?php endforeach;  ?>    
        </table>
        </div>

        <br>
        <h2>COMMENT</h2>

        <form action="<?php echo $_SERVER['PHP_SELF']?>?id=<?php echo $_GET["id"]; ?>&&postid=<?php echo$_GET["postid"]?>" method="POST" 
        enctype="multipart/form-data"> 
        <br>
        <textarea class="textboxdesc" name="comments" placeholder= "WRITE HERE"></textarea>        
        <br>
        <input type="submit" name="sendcomments" class="sendcomment" value="send">
        </form>

        <br><br><br>
      
</form>

</body>
</html>