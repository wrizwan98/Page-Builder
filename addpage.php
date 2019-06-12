<?php 
    $ID = $_GET['id']; 
    include ('db_connect.php'); //Connection to the database 
    session_start(); //Start the session
?>

<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>CMS</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="assets/css/styles.css">

    <!--Theme custom css -->
    <link rel="stylesheet" href="assets/css/style.css">

    <!--Theme Responsive css-->
    <link rel="stylesheet" href="assets/css/responsive.css" />

    <script src="assets/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>

    <!-- favicons
    ================================================== -->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    
    </head>

<style>
    .button {
        background-color: #4CAF50; /* Green */
        border: none;
        color: white;
        padding: 16px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 14px;
        margin: 4px 2px;
        -webkit-transition-duration: 0.4s; /* Safari */
        transition-duration: 0.4s;
        cursor: pointer;
    }

    .button1 {
        background-color: white; 
        color: black; 
        border: 2px solid #4CAF50;
    }

    .button1:hover {
        background-color: #4CAF50;
        color: white;
    }
</style>

<body>

    <div class='preloader'>
        <div class='loaded'>&nbsp;</div>
    </div>
    
    <!-- Sections -->
    <section id="social" class="social">
        <div class="container">
            <div class="row">
                <div class="social-wrapper">
                    <div class="col-md-6">
                        <a href="index.php?id=<?php echo $ID ?>" target="_blank"><i><font color="white">View Live Site</font></i></a>
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
                    $query2 = "SELECT * FROM contactdetails where user = $ID";  
                    $result2 = mysqli_query($conn, $query2);  
                        if(mysqli_num_rows($result2) > 0)  
                            {
                                while($row = mysqli_fetch_array($result2))  
                                    { 
                ?>
                <a class="navbar-brand" href="index.php?id=<?php echo $ID ?>"><img src="<?php echo $row['logo']; ?>" height="<?php echo $row['h']; ?>" width="<?php echo $row['w']; ?>" alt="Logo" /></a>
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
                <li class="login"><a href="logout.php?id=<?php echo $ID ?>" style="text-decoration:none">logout</a>
                    <?php                   }
                                    }
                     }else{ ?>
                <li class="login"><a href="signIn.php?id=<?php echo $ID ?>" style="text-decoration:none">login</a>
                    <?php } ?>
            </ul>
        </div>
    </nav>


    <body>
        <a href="adminpage.php?id=<?php echo $ID ?>"><button class="button button1">Back To Pages</button></a><br>
        <div class="container1">
            <div class="imgcontainer1">
                <form action="addpage2.php?id=<?php echo $ID ?>" method="post" enctype="multipart/form-data">
                    <div>
                        <div>
                            <input type="text" name="id" id="id" hidden>
                        </div>
                    </div>
                    <div>
                        <label>Name</label>
                        <div>
                            <input type="text" name="name" id="name" required>
                        </div>
                        <br>
                        <div>
                            <button name="signup" class="submit" style="font-size: 15px">Add</button>
                        </div>
                    </div>
                </form>
                <br>
            </div>
        </div>
    </body>

    <script src="assets/js/vendor/jquery-1.11.2.min.js"></script>
    <script src="assets/js/vendor/bootstrap.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/modernizr.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>