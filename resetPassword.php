<?php 
include ('db_connect.php');
$con = new mysqli($servername, $username, $password, $dbname);
session_start();
?>

<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>CMS</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

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

    <body>
<br><br><br><br>
        <div class="container1">
            <form action="reset.php" method="post" enctype="multipart/form-data">
                <div>
                    <label>Phone Number</label>
                    <div>
                        <input type="text" name="username" id="username" required>
                    </div>
                </div>
                <div>

                    <label>New Password</label>
                    <div>
                        <input type="password" name="password" id="password" required>
                    </div>
                    <br>
                    <div>

                        <button class="submit">Change</button>
                    </div>
                </div>
            </form>

        </div>
    </body>

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
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="copyright">
                    </div>
                </div>
            </div>
        </div>
    </footer>


    <div class="scrollup">
        <a href="#"><i class="fa fa-chevron-up"></i></a>
    </div>


    <script src="assets/js/vendor/jquery-1.11.2.min.js"></script>
    <script src="assets/js/vendor/bootstrap.min.js"></script>

    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/modernizr.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>
