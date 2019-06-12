<?php 
    $ID = $_GET['ID'];
    $id = $_GET['id'];
include ('db_connect.php');
session_start();
?>

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
                        <a href="index.php" target="_blank"><i><font color="white">View Live Site</font></i></a>
                    </div>
                </div>
            </div>
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
                    $query2 = "SELECT * FROM contactdetails where user = $id";  
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

    <div class="container1">
        <div class="imgcontainer1"></div>
        <div>
            <label>Are You Sure You Want To Delete This Page?</label>
        </div>
        <br>
        <a href="deletePage.php?id=<?php echo $ID ?>&ID=<?php echo $id ?>"><button name="signup" class="submit" style="font-size: 15px"> YES </button> </a>
        <a href="adminpage.php?id=<?php echo $ID ?>"><button name="signup" class="submit" style="font-size: 15px">NO</button></a>
    </div>

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
