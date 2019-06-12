<?php include ('db_connect.php')?>
<?php
session_start()?>

<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>CMS</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap-theme.min.css">

    <!--For Plugins external css-->
    <link rel="stylesheet" href="assets/css/plugins.css" />
    <link rel="stylesheet" href="assets/css/roboto-webfont.css" />

    <link rel="stylesheet" href="assets/css/styles.css">

    <!--Theme custom css -->
    <link rel="stylesheet" href="assets/css/style.css">

    <!--Theme Responsive css-->
    <link rel="stylesheet" href="assets/css/responsive.css" />

    <script src="assets/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
</head>

<body>
    <div class='preloader'>
        <div class='loaded'>&nbsp;</div>
    </div>
    <!-- Sections -->
    <section id="social" class="social">
        <div class="container">
            <!-- Example row of columns -->
            <div class="row">
                <div class="social-wrapper">
                    <div class="col-md-6">
                        <div class="col-md-6">
                            <div class="social-contact">
                                <?php 
 $query = "SELECT * FROM contactdetails";  
 $result = mysqli_query($conn, $query);  
            
                if(mysqli_num_rows($result) > 0)  
                {  
                     while($row = mysqli_fetch_array($result))  
                     {  
                ?>
                                <a href="#"><i class="fa fa-phone"></i>
                                    <?php echo $row["number"];?></a>
                                <a href="#"><i class="fa fa-envelope"></i>
                                    <?php echo $row["email"];?></a>
                                <p class="w3-right" style="color:white;">
                                    <a href="viewCart.php"><i class="fa fa-shopping-cart w3-margin-right"></i></a>

                                </p>
                            </div>
                            <?php  
                     }  
                }  
                ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /container -->
        </div>
    </section>

<nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <?php
                    $query2 = "SELECT * FROM contactdetails";  
                    $result2 = mysqli_query($conn, $query2);  
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
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <?php if(isset($_SESSION['username'])){?>
                <li>Welcome
                    <?php 
                            $query = "SELECT name FROM customers WHERE Username= ". $_SESSION['username'];    
                            $result = mysqli_query($conn, $query);                         
                                if(mysqli_num_rows($result) > 0)  
                                    {  
                                        while($row = mysqli_fetch_array($result))  
                                            {                          
                                                echo $row['name']; ?>
                </li>
                <li class="login"><a href="logout.php" style="text-decoration:none">logout</a>
                    <?php                   }
                                    }
                     }else{ ?>
                <li class="login"><a href="signIn.php" style="text-decoration:none">login</a>
                    <?php } ?>
            </ul>
        </div>
    </nav>

    <div class="container">
        <?php
        include "db_connect.php":
        /*
				$servername="localhost";
				$username="root";
				$password="";
				$dbname="wrashid4";
        
				$conn = mysqli_connect($servername, $username, $password, $dbname) or
				die(mysqli_error($conn, "Could not connect"));
				
				//echo "xxx ".$update;
				
				*/
				
				$username = $_POST['username'];
				$password = $_POST['password'];
				
				
				
				$sqli = "UPDATE customers SET password = '$password' WHERE username = '$username'";
				$retval = mysqli_query($conn, $sqli);
				
				if($retval) {
					echo "Password changed successfully";  
					}else {
					die('Password not changed: '. mysqli_error($conn));
					
					mysqli_close($conn);
					
				}
			?>
        <p>Click <a href="signIn.php">here</a> to go back</p>



        <!--Footer-->
        <footer id="footer" class="footer">
            <div class="container">
                <div class="row">
                    <div class="footer-wrapper">

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="footer-brand">
                                <?php
 $query2 = "SELECT logo FROM contactdetails";  
 $result2 = mysqli_query($conn, $query2);  
            
                 if(mysqli_num_rows($result2) > 0)  
                {
                     
 while($row = mysqli_fetch_array($result2))  
                     { ?>
                                <a class="navbar-brand" href="index.php"><img src="<?php echo $row['logo']; ?>" height="55" width="200" alt="Logo" /></a>
                            </div>

                            <?php 
}
}

?>
                        </div>

                </div>
            </div>
        </footer>

        <script src="assets/js/vendor/jquery-1.11.2.min.js"></script>
        <script src="assets/js/vendor/bootstrap.min.js"></script>

        <script src="assets/js/plugins.js"></script>
        <script src="assets/js/modernizr.js"></script>
        <script src="assets/js/main.js"></script>
    </div>

</body>

</html>
