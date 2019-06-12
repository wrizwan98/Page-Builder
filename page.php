<?php 
$ID = $_GET['ID'];
$id = $_GET['id'];

session_start();
require "dbCon.php";
    $con = mysqli_connect( $host, $username, $password, $db_name );

function clean($str){
    global $con;
    $str = trim($str);
    $str = stripslashes($str);
    $str = htmlentities($str, ENT_QUOTES);
    $str = mysqli_real_escape_string($con, $str);
    return $str;
}

// if( isset( $_SESSION['username'])) {
 //   $thisuser - clean($_SESSION['username']);

//} 

if( isset ($_POST['action'])) {
    $content = mysqli_real_escape_string($con,$_POST['content']);

$sql1 = "UPDATE `home` SET `content`= '".$content."' WHERE `id` = $ID";
    $query1 = mysqli_query( $con, $sql1);
                                         
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <title>CMS</title>
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="assets/css/bootstrap-theme.min.css">


    <!--For Plugins external css-->
    <link rel="stylesheet" href="assets/css/plugins.css" />


    <!--Theme custom css -->
    <link rel="stylesheet" href="assets/css/style.css">

    <!--Theme Responsive css-->
    <link rel="stylesheet" href="assets/css/responsive.css" />

    <link rel="stylesheet" href="assets/css/cart.css" />

    <script src="assets/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
        
<style>
       <?php
 $query3 = "SELECT bg FROM contactdetails where user = $id";  
 $result3 = mysqli_query($conn, $query3);  
            
                 if(mysqli_num_rows($result3) > 0)  
                {
                     
 while($row = mysqli_fetch_array($result3))  
                     { ?>

ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: <?php echo $row['bg']; ?>;
}

 <?php 
}
}

?>

li {
  float: left;
}

       <?php
 $query3 = "SELECT * FROM contactdetails  where user = $id";  
 $result3 = mysqli_query($con, $query3);  
            
                 if(mysqli_num_rows($result3) > 0)  
                {
                     
 while($row = mysqli_fetch_array($result3))  
                     { ?>    
    
li a {
  display: block;
  color: <?php echo $row['ntxt']; ?>;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover:not(.active) {
  background-color: <?php echo $row['nhover']; ?>;
}
<?php 
}
}

?>


</style>        
        
    </head>
        <?php
 $query3 = "SELECT bg FROM contactdetails  where user = $id";  
 $result3 = mysqli_query($con, $query3);  
            
                 if(mysqli_num_rows($result3) > 0)  
                {
                     
 while($row = mysqli_fetch_array($result3))  
                     { ?>
    <body style="background-color:<?php echo $row['bg']; ?>;">
        
                    <?php 
}
}

?>
        
        
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <?php
                    $query2 = "SELECT * FROM contactdetails where user = $id";  
                    $result2 = mysqli_query($con, $query2);  
                        if(mysqli_num_rows($result2) > 0)  
                            {
                                while($row = mysqli_fetch_array($result2))  
                                    { 
                ?>
                <a class="navbar-brand" href="index.php"><img src="<?php echo $row['logo']; ?>" height="<?php echo $row['h']; ?>" width="<?php echo $row['w']; ?>" alt="Logo" /></a>
            </div>
                <?php 
                                    }
                            }?>
        </div>
		
		
<ul>
    
<?php
/*
 $query5 = "SELECT welcome FROM contactdetails where user = $id";  
 $result5 = mysqli_query($con, $query5);  
            
           
                     
 while($row = mysqli_fetch_array($result5))  
                     { 
				 $C = $row['welcome'];
		
     if(isset($_SESSION['username'])){?>
                <li style="float:right"><font color="<?php echo $C; ?>">Welcome
                    <?php  
                            $query = "SELECT name FROM customers WHERE Username= ". $_SESSION['username'];    
                            $result = mysqli_query($con, $query);                         
                                if(mysqli_num_rows($result) > 0)  
                                    {  
                                        while($row = mysqli_fetch_array($result))  
                                            {                          
                                                echo $row['name']; ?>
                </font></li>
                <li style="float:right"><a href="logout.php" style="text-decoration:none">Logout</a>
                    <?php                   }
                                    }
                     }else{ ?>
                <li style="float:right"><a href="signIn.php" style="text-decoration:none">Login</a>
                          <?php 
}

 }
*/
?>

<br>
<?php
 $query3 = "SELECT * FROM user where user = $id";  
 $result3 = mysqli_query($con, $query3);  
            
                 if(mysqli_num_rows($result3) > 0)  
                {
                     
 while($row = mysqli_fetch_array($result3))  
                     { ?>

                    <li style="float:right"><a  href="page.php?ID=<?php echo $row['id']; ?>&id=<?php echo $id ?>">
                            <?php echo $row['username']; ?></a>&nbsp;&nbsp;</li>

                    <?php 
}
}
?>
 
  <li style="float:right"><a href="index.php?id=<?php echo $id ?>">Home</a>&nbsp;&nbsp;</li>
 
</ul>
    <br><br>    
            
        <!-- <div class="btn btn-lg btn-info" id="save">Save</div> -->
            
            <div class="container">
        
        <?php
            
            $sql2 = "SELECT content FROM user where user = $id";
                
                $query2 = mysqli_query($con, $sql2);
                $row = mysqli_fetch_assoc($query2);
                
                echo $row['content'];
                
        ?>
        
        
        </div>
        <div data-keditor="html">
        </div>
        
        <script type="text/javascript" src="plugins/jquery-1.11.3/jquery-1.11.3.min.js"></script>
        <script type="text/javascript" src="plugins/bootstrap-3.3.6/js/bootstrap.min.js"></script>
        
        <script type="text/javascript" src="plugins/formBuilder-2.5.3/form-builder.min.js"></script>
        <script type="text/javascript" src="plugins/formBuilder-2.5.3/form-render.min.js"></script>
        
        <!-- End of KEditor scripts -->
        <script type="text/javascript" src="plugins/code-prettify/src/prettify.js"></script>
        <script type="text/javascript" src="plugins/js-beautify-1.7.5/js/lib/beautify.js"></script>
        <script type="text/javascript" src="plugins/js-beautify-1.7.5/js/lib/beautify-html.js"></script>
        <!--<script type="text/javascript" src="js/examples.js"></script> -->
       
    </body>
</html>
