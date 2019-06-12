<?php $ID = $_GET['id'];
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

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

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

    <br><br><br><br><br><br>
    <div class="container">
        <?php
				$Username = $_POST['username'];
                $Name = $_POST['name'];
                $Email = $_POST['email'];
				$Password = $_POST['password'];
        
        $result=mysqli_query($conn, "SELECT Username FROM customers WHERE Username='$Username'");
if(!mysqli_fetch_array($result,MYSQLI_ASSOC))
  {
				
				$sqli = "Insert INTO customers SET Password = '$Password', Email = '$Email', Username = '$Username', name = '$Name'";
        
				
                
				$retval = mysqli_query($conn, $sqli);
				
				if($retval) {
					echo "User Added successfully";  
					}else {
					die('User not Added: '. mysqli_error($conn));
					mysqli_close($conn);
				}
        
                header("Location:adduser3.php?id=$ID&un=$Username");
 
                ?>
        
			
        <p>Click <a href="adduser3.php?id=<?php echo $ID;?>&un=<?php echo $Username;?>">here</a> to go back</p>
        
        <?php
        }else {
        header("Location: admin.php?fault=1"); 

        }
?>
        
    </div>

        <script src="assets/js/vendor/jquery-1.11.2.min.js"></script>
        <script src="assets/js/vendor/bootstrap.min.js"></script>
        <script src="assets/js/plugins.js"></script>
        <script src="assets/js/modernizr.js"></script>
        <script src="assets/js/main.js"></script>
</body>
</html>
