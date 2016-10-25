<?php
include"conn/conn.php";
if (isset($_POST['login'])){
    $username=mysqli_real_escape_string($conn,$_POST['username']);
    $password=md5(mysqli_real_escape_string($conn,$_POST['password']).'H4ND1P12');
    $sql="select * from t_user where username='$username' and password='$password' ";
    $result=mysqli_query($conn,$sql);
    $cek=mysqli_num_rows($result);
    $row=mysqli_fetch_assoc($result);
    $username=$row['username'];
    $password=$row['password'];
    $level=$row['level'];
    if($cek){
      $_SESSION['username']=$username;
      $_SESSION['password']=$password;
      $_SESSION['level']=$level;
      
      if($level==1){
      ?><script language="javascript">document.location.href="dataadm/index.php";</script><?php
      
      }     
      else{
      } 
        ?><script language="javascript">document.location.href="index.php?er=1";</script><?php
    }
}
  ?>

<div id="loginModal" class="modal show" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <?php if(isset($_GET['er'])){          
            echo '<script>
          alert(" Login Failed !"); window.location="index.php"; </script>';                                        
         }?>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h1 class="text-center">Login</h1>
      </div>
      <div class="modal-body">
        <form action="" method="post" role="form" class="form col-md-12 center-block">
          <div class="form-group">
            <input type="text" class="form-control input-lg" name="username" placeholder="Username">
          </div>
          <div class="form-group">
            <input type="password" class="form-control input-lg" name="password" placeholder="Password">
          </div>
          <div class="form-group">
            <button type="submit" name="login" class="btn btn-primary btn-lg btn-block">Sign In</button>              
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <div class="col-md-12">          
        </div>	
      </div>
    </div>
  </div>
</div>