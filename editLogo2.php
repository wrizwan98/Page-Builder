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
            <!-- Example row of columns -->
            <div class="row">
                <div class="social-wrapper">
                    <div class="col-md-6">
                        <a href="index.php" target="_blank"><i><font color="white">View Live Site</font></i></a>

                    </div>

                </div>
            </div>

        </div>

        <!-- /container -->

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



    <br><br><br><br><br><br>
    <div class="container">






        <?php include ('db_connect.php')?>
        <?php
    if (isset($_POST['submit'])) {
$dir="assets/images/";
$file_name = $dir . basename($_FILES['image']['name']);
$fileUpload=1;
$imageType=pathinfo($file_name,PATHINFO_EXTENSION);
    if(file_exists($file_name))
{
echo "file already exists,please rename and upload again "; ?><br>
        
<?php
$fileUpload=0;
}
if($imageType!='jpg' && $imageType!='gif' && $imageType!='png')
{
echo "image should bein jpg or gif or png format "; ?><br>
    <?php
$fileUpload=0;
}
if($fileUpload!=1)
{
echo "please try again with valid image";?><br>
<?php
echo "to go back home page <a href='admindetails.php?id=$ID'>Click Here</a>";
}
else
{
    $copied = move_uploaded_file($_FILES['image']['tmp_name'], $file_name);
    if ($copied) 
    {
        $sql = mysqli_query($conn, "UPDATE contactdetails SET logo='$file_name' where user = $ID");
       echo "succesfull updated";?><br>
        <?php
        header("Location:admindetails.php?id=$ID");
      // echo "to go back home page<a href='admindetails.php?id=$ID'>Click Here</a>";
    }
    else 
    {
        echo "There are An Errors In Uploading!";
    }
}
    }
            
?>

        <script src="assets/js/vendor/jquery-1.11.2.min.js"></script>
        <script src="assets/js/vendor/bootstrap.min.js"></script>

        <script src="assets/js/plugins.js"></script>
        <script src="assets/js/modernizr.js"></script>
        <script src="assets/js/main.js"></script>
    </div>

</body>

</html>
