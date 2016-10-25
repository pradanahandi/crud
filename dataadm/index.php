<?php session_start(); 
    if(isset($_SESSION['level'])){
        $level=$_SESSION['level'];
?>
<!DOCTYPE html>
<html class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SIERRA ADMIN</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="asset/js/html5.js"></script>
    <![endif]-->

    <!-- core js files -->
    <script src="asset/js/jquery-1.11.0.min.js"></script>
    <script src="asset/js/bootstrap.min.js"></script>
    <script src="asset/js/modernizr.custom.js"></script>
    <script src="asset/js/core.js"></script>
    <!-- core js files -->

    <link rel="stylesheet" href="asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="asset/css/font-awesome.min.css">
    <link rel="stylesheet" href="asset/css/style.css">


    <link rel="stylesheet" href="asset/css/plugins/chosen/chosen.css">
    <script src="asset/js/plugins/chosen.jquery.min.js"></script>

    <link rel="stylesheet" href="asset/datatable/media/css/demo_table.css">
    <link rel="stylesheet" href="asset/css/dtable.css">
    <script src="asset/datatable/media/js/jquery.dataTables.min.js"></script>
    <script src="asset/datatable/media/js/sorting.js"></script>

    <script src="asset/js/plugins/jquery.tipsy.js"></script>
    <link rel="stylesheet" href="asset/css/plugins/files/tipsy.css">

    <link rel="stylesheet" href="asset/css/plugins/datepicker/datepicker.css">
    <script src="asset/js/plugins/bootstrap-datepicker.js"></script>
    <script src="asset/js/plugins/jquery.maskedinput.min.js"></script>

    <script src="asset/js/plugins/bootstrap3-typeahead.min.js"></script>

    <script src="asset/js/plugins/bootbox.min.js"></script>
    <script src="asset/js/plugins/jquery.dlmenu.js"></script>

    <link rel="stylesheet" href="asset/css/plugins/files/bootstrap-checkbox.css">
    <script src="asset/js/plugins/bootstrap-checkbox.js"></script>

    <!--<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300&subset=latin,latin-ext' rel='stylesheet' type='text/css'>-->

    <script type="text/javascript">
        var ac_siteURL='';  //PHP Application üzerinde autocomplete verisi işlenmesi için temel adres tanımlaması için
    </script>

</head>
<body>    
    <?php    
        include '../conn/conn.php';       
        if(isset($_POST['btn_simpan'])){
            $judul = $_POST['judul'];
            $keterangan = $_POST['keterangan'];
            $file_video = $_FILES['file_video']['name'];
            $file_doc = $_FILES['file_doc']['name'];
            $status = 1;            

            $simpan=("INSERT INTO t_isi VALUES ('','$judul','$keterangan','$file_video', '$file_doc', '$status')");
            $conn->query($simpan);

            move_uploaded_file($_FILES['file_video']['tmp_name'],"../assets/video/".$_FILES['file_video']['name']);
            move_uploaded_file($_FILES['file_doc']['tmp_name'],"../assets/dok/".$_FILES['file_doc']['name']);
            echo  '<script>
                     alert("DATA TERSIMPAN") ; window.location="index.php";</script>';   
        }     
                 
        // --- Fungsi Delete


            if(isset($_GET['id'])){
                $file_video = "SELECT file_video FROM t_isi WHERE id='".$_GET['id']."'";
                $result = $conn->query($file_video);
                if($result->num_rows > 0){
                    $row = $result->fetch_assoc();
                    if(file_exists("../assets/video/$row[file_video]")){
                        unlink("../assets/video/$row[file_video]");
                    }
                }
                $file_doc = "SELECT file_doc FROM t_isi WHERE id='".$_GET['id']."'";
                $result1 = $conn->query($file_doc);
                if($result1->num_rows > 0){
                    $rows = $result1->fetch_assoc();
                    if(file_exists("../assets/dok/$row[file_doc]")){
                        unlink("../assets/dok/$row[file_doc]");
                    }
                }     
                $sql = $conn->query("DELETE FROM t_isi WHERE id=".$_GET['id']);  
                echo '<script language="JavaScript">alert("Data berhasil Hapus");
                document.location.href="index.php";</script> ';
            } 
        
              
    ?>
    <div id="application">
        <div id="topLine">                
            <div class="topcontent hidden-xs">
                <i class="fa fa-tachometer"></i>  SEAMOLEC
            </div>
            <div class="topmenu">
                <ul>
                    <li>
                        <a href="#" class="ta">
                        <!--<img src="https://2.gravatar.com/avatar/621675677724d411a372dcdb1e50dbab6" width="50px" class="img-circle" />-->
                        <span><?php echo $_SESSION['username'];?></span>
                        <i class="fa fa-sort-desc"></i>
                        </a>
                        <ul>
                            <li><a href="#">Profil</a></li>
                            <li><a href="logout.php">Sign Out</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>        
        <div id="appContent">
            <div class="appcontent" >
                <div class="appbreadcrumb">
                    <ol class="breadcrumb">
                        <li><a class="menuButton" href="index.php"><i class="fa fa-bars"></i> Menu</a></li>
                        <li><a href="#">Home</a></li>
                        <li><a href="#" class="active">Data</a></li>                        
                    </ol>
                </div>                
                <div class="content">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="widget">
                                <div class="whead">
                                    <h6><i class="fa fa-cloud"></i> Form Input Content</h6>
                                </div>
                                <div class="wbody">                                                                     
                                    <form action="" method="post" enctype="multipart/form-data" role="form" name="form beranda">
                                        <table class="table table-responsive">

                                            <tr>
                                                <td>Title</td>
                                                <td><input type="text" class="form-control" name="judul" placeholder="Insert your title" /></td>
                                            </tr>  
                                            <tr>
                                                <td>About</td>
                                                <td><input type="text" class="form-control" name="keterangan" placeholder="Insert your about" /></td>
                                            </tr>   
                                            <tr>
                                                <td>File Video</td>
                                                <td><input type="file" class="form-control" name="file_video"></td>
                                            </tr>   
                                            <tr>
                                                <td>File Doc</td>
                                                <td><input type="file" class="form-control" name="file_doc"></td>
                                            </tr>             
                                            <tr>
                                                <td></td>
                                                <td><input type="submit" class="btn btn-primary" name="btn_simpan"></td>
                                            </tr>                                                                                        
                                        </table>
                                    </form>
                                </div>
                            </div>
                        </div>                
                                            
                        <div class="col-md-12">
                            <div class="widget">
                                <div class="whead">
                                    <h6>Data Content</h6>
                                </div>
                                <div class="wbody">
                                <table cellpadding="0" cellspacing="0" border="0" class="display dtable table-responsive" id="example1" width="100%" data-table-ajax="">
                                <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>About</th>
                                    <th>File Video</th>
                                    <th>File Doc</th>
                                    <th colspan="2">Action</th>
                                </tr>
                                </thead>
                                <?php                  
                                  include '../conn/conn.php';
                                  
                                  $data = "SELECT * FROM t_isi";
                                  $panggil = $conn->query($data);
                                  while ($row = $panggil->fetch_assoc()){
                                ?>
                              <tbody>
                                <tr>                  
                                  <td><?php echo $row['judul'];?></td>
                                  <td><?php echo $row['keterangan'];?></td>
                                  <td><?php echo $row['file_video'];?></td>
                                  <td><?php echo $row['file_doc'];?></td>                  
                                  <td>
                                    <!--<a href="index.php?aksi=update&id=<?php echo $row['id'];?>">Edit</a>-->
                                    <a href='dataedit.php?id=<?php echo ($row['id']);?>'> Edit</a> |
                                    
                                  </td>       
                                  <td>
                                    <a href='index.php?id=<?php echo $row['id']; ?>' OnClick="return confirm('YAKIN HAPUS?')"><font color='red'>  Delete</font></a>
                                  </td>    
                                </tr>                
                              </tbody>   
                             <?php } ?>
                            <tfoot>
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                            </tfoot>
                            </table>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <div class="clearfix"></div>
                        </div>
                    <div class="clearfix"></div>
                    </div>
                <div class="ara"></div>
                </div>
            </div>
        </div>
    </div>
    <?php
    }else{
        session_destroy();
        header('Location:../index.php');
    }
    ?>  
</body>
</html>