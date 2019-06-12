<?php 
include ('db_connect.php');
session_start();

$user = $_SESSION['username'];
//echo $_SESSION['username'];


$query3 = "SELECT * FROM customers where Username = $user";  
                    $result3 = mysqli_query($conn, $query3);  
                        if(mysqli_num_rows($result3) > 0)  
                            {
                                while($row = mysqli_fetch_array($result3))  
                                    { 
                                        $ID = $row['id'];
                                                            }
}
?>
<?php
if ($_SESSION['username'])
{ 
  
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
                        <a href="index.php?id=<?php echo $ID; ?>" target="_blank"><i><font color="white">View Live Site</font></i></a>
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
                <li><font color="black">Welcome
                    <?php 
                            $query = "SELECT name FROM customers WHERE Username= ". $_SESSION['username'];    
                            $result = mysqli_query($conn, $query);                         
                                if(mysqli_num_rows($result) > 0)  
                                    {  
                                        while($row = mysqli_fetch_array($result))  
                                            {                          
                                                echo $row['name']; ?>
                </font></li>
                <li class="login"><a href="logout.php?id=<?php echo $ID ?>" style="text-decoration:none">logout</a>
                    <?php                   }
                                    }
                     }else{ ?>
                <li class="login"><a href="signIn.php?id=<?php echo $ID ?>" style="text-decoration:none">login</a>
                          <?php 
}

				

?>
            </ul>
        </div>
    </nav>

    <p font size="5px">Click an option below to modify pages or click the headings above to see cutomer's view of the website.</p>
    
    <br><br><br>

    
<!-- Sections -->
    <div class="row">
        <div class="portfolio-wrapper text-center">


            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="community-edition">
                    <a href="admindetails.php?id=<?php echo $ID; ?>"><img src="assets/images/edit.jpg" width="120" height="100"></a>
                    <h4><a href="admindetails.php?id=<?php echo $ID; ?>">Change Company Logo</a></h4>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="community-edition">
                    <a href="adminpage.php?id=<?php echo $ID; ?>"><img src="assets/images/pages.png" width="120" height="100"></a>
                    <h4><a href="adminpage.php?id=<?php echo $ID; ?>">Manage Pages</a></h4>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="community-edition">
                    <a href="editHome.php?id=<?php echo $ID; ?>"><img src="assets/images/home.png" width="120" height="100"></a>
                    <h4><a href="editHome.php?id=<?php echo $ID; ?>">Edit HomePage</a></h4>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="community-edition">
                    <a href="bg.php?id=<?php echo $ID; ?>"><img src="assets/images/paint.jpg" width="150" height="100"></a>
                    <h4><a href="bg.php?id=<?php echo $ID; ?>">Colours</a></h4>
                </div>
            </div>
        </div>
    </div>
    <br>
    
    
                          


    <script src="assets/js/vendor/jquery-1.11.2.min.js"></script>
    <script src="assets/js/vendor/bootstrap.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/modernizr.js"></script>
    <script src="assets/js/main.js"></script>
	
</body>
</html>

<?php 

}else {
	header("Location: signIn.php");
}
?>