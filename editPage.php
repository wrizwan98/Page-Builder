<?php 
$ID = $_GET['id'];
$id = $_GET['ID'];

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

$sql1 = "UPDATE `user` SET `content`= '".$content."' WHERE `id` = $ID";
    $query1 = mysqli_query( $con, $sql1);
                                         
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <title>CMS</title>
        <link rel="stylesheet" type="text/css" href="plugins/bootstrap-3.3.6/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="plugins/font-awesome-4.5.0/css/font-awesome.min.css" />
        <!-- Start of KEditor styles -->
        <link rel="stylesheet" type="text/css" href="dist/css/keditor.min.css" />
        <link rel="stylesheet" type="text/css" href="dist/css/keditor-components.min.css" />
        <!-- End of KEditor styles -->
        <link rel="stylesheet" type="text/css" href="plugins/code-prettify/src/prettify.css" />
        <link rel="stylesheet" type="text/css" href="css/examples.css" />
    </head>
    
    <body>
        
        
        <nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
          
          <li class="active"><a href="adminpage.php?id=<?php echo $id; ?>" >Back to Pages <span class="sr-only"></span></a></li>
        <li class="active"><a href="#" id="save">Save <span class="sr-only"></span></a></li>
          <li class="active"><a href="page.php?id=<?php echo $id ?>&ID=<?php echo $ID; ?>" target="_blank" >View Page <span class="sr-only"></span></a></li>
          
      </ul>
      
      
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
        
            
        <!-- <div class="btn btn-lg btn-info" id="save">Save</div> -->
            
            <div id="content-area">
        
        <?php
            
            $sql2 = "SELECT `content` FROM `user` WHERE `id` = $ID";
                
                $query2 = mysqli_query($con, $sql2);
                $row = mysqli_fetch_assoc($query2);
                
                echo $row['content'];
                
        ?>
        
        
        </div>
        <div data-keditor="html">
        </div>
        
        <script type="text/javascript" src="plugins/jquery-1.11.3/jquery-1.11.3.min.js"></script>
        <script type="text/javascript" src="plugins/bootstrap-3.3.6/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="plugins/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
        <script type="text/javascript" src="plugins/jquery.nicescroll-3.6.6/jquery.nicescroll.min.js"></script>
        <script type="text/javascript" src="plugins/ckeditor-4.5.6/ckeditor.js"></script>
        <script type="text/javascript" src="plugins/ckeditor-4.5.6/adapters/jquery.js"></script>
        <script type="text/javascript" src="plugins/formBuilder-2.5.3/form-builder.min.js"></script>
        <script type="text/javascript" src="plugins/formBuilder-2.5.3/form-render.min.js"></script>
        <!-- Start of KEditor scripts -->
        <script type="text/javascript" src="dist/js/keditor.js"></script>
        <script type="text/javascript" src="dist/js/keditor-components.js"></script>
        <!-- End of KEditor scripts -->
        <script type="text/javascript" src="plugins/code-prettify/src/prettify.js"></script>
        <script type="text/javascript" src="plugins/js-beautify-1.7.5/js/lib/beautify.js"></script>
        <script type="text/javascript" src="plugins/js-beautify-1.7.5/js/lib/beautify-html.js"></script>
        <!--<script type="text/javascript" src="js/examples.js"></script> -->
        <script type="text/javascript" data-keditor="script">
            $(function () {
                $('#content-area').keditor();
               $("#save").click(function(){
                   
                   $.ajax({
                       type: 'post',
                       data: { action: "send-content",
                                content: $('#content-area').keditor('getContent')
                   },
                       
                       success: function(data){
                       //console.log(data);
                           alert("saved");
                   },
                       
                       error : function(data){
                           //console.log(data);
                           alert("error");
                    }
                   
                   });
                   
                  // console.log($('#content-area').keditor('getContent'));
               });
               
            });
        </script>
    </body>
</html>
