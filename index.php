<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Administrator</title>	
  <link rel="shortcut icon" href="dist/img/seamolec.png" type="image/x-icon">    
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/font-awesome.css">    
  <link rel="stylesheet" href="assets/css/ionicons.min.css">
  <link rel="stylesheet" href="assets/dist/css/AdminLTE.min.css">         
  <link rel="stylesheet" href="assets/dist/css/skins/_all-skins.min.css">	
  <link href="assets/css/datatables.bootstrap.min.css" rel="stylesheet">	 
  <link href="bootstrap/js/jquery-ui.css" rel="stylesheet" />
  <script type="text/javascript" src="bootstrap/js/jquery.js"></script>
  <script type="text/javascript" src="bootstrap/js/jquery-ui.js"></script>
   <script type="text/javascript">
    $(document).ready(function(){
      $(".tanggal").datepicker({
  	  dateFormat : "dd-mm-yy",
  	  changeMonth : true,
  	  changeYear : true,	  
  	});
    });
  </script>  
</head>
  <!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-blue layout-top-nav">
   
  <?php	
  session_start();
  //error_reporting(0);
  ?>
    <div class="wrapper">     
      <div class="content-wrapper">
		    <?php
                $folder = (isset($_REQUEST['fo'])&& $_REQUEST['fo'] !=NULL)?$_REQUEST['fo']:'';
                $file = (isset($_REQUEST['fi'])&& $_REQUEST['fi'] !=NULL)?$_REQUEST['fi']:'';
                if(file_exists($folder."/".$file.".php"))
                {
                    include($folder."/".$file.".php");
                }else{
                    include("home.php");
                }
        ?>    
      </div><!-- /.content-wrapper -->     
    </div>
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>    
    <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>    
    <script src="plugins/fastclick/fastclick.min.js"></script>    
    <script src="dist/js/app.min.js"></script>    
    <script src="dist/js/demo.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap.min.js"></script>
    
</body>
</html>
