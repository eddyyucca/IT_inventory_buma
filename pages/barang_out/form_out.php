<?php
require '../koneksi.php';
require '../function.php';
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Form Pengambilan barang</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../../plugins/iCheck/square/blue.css">

</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <img src="../../logo.jpg" class="pull-right" style="height:38px; width:95px;">
  <div class="login-box-body">
  <?php 
        
        $id= mysqli_real_escape_string($koneksi,$_GET['id']);
        $query=mysqli_query($koneksi, "SELECT  * FROM stock  where id_brng='$id' ") or die($conn->error);
        $row=mysqli_fetch_array($query);
   ?>
  <form action="#" method="post">
   
      <div class="form-group has-feedback">
      <img src="../uploads/<?php echo $row['image'] ?>"  style="height:320px; width:320px; ">
      </div>
      <p class="login-box-msg"><?php echo $row['nma_brng'] ?> | <b>Stock:<?php echo $row['stock'] ?></b></p>
      <input type="hidden" class="form-control" name="id_brng" value="<?php echo $row['id_brng'] ?>" >
      <div class="form-group has-feedback">
      
      <input type="number" name="qty" class="form-control" placeholder="Qty" required>
      <span class="glyphicon glyphicon-hand-left form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <textarea type="text" name="deskripsi" rows="4" class="form-control" placeholder="Keperluan..." required></textarea>
        <span class="glyphicon glyphicon-edit form-control-feedback"></span>
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-12">
          <button type="submit" name="brngkeluar1" class="btn btn-primary btn-block btn-flat pull-right">Cek Out</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
    <div class="social-auth-links text-center">
      <p>- Form pengembilan Barang -</p>
    </div>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="../../plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
