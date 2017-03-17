<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?=$title?></title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?=base_url()?>assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?=base_url()?>dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/plugins/iCheck/square/blue.css">

</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="#"><b>Teknik-</b>Informatika</a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Register a new membership</p>

    <form action="<?=$action?>" id="form1" method="POST">
      <div class="form-group has-feedback">
        <input type="text" name="nama" id="nama" class="form-control" placeholder="Full name">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="text" name="username" id="username" class="form-control" placeholder="Username">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" id="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="pwd" id="pwd" class="form-control" placeholder="Retype password">
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox" name="setuju" id="setuju" value=""> I agree to the <a href="#">terms</a>
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="button" id="reg" class="btn btn-primary btn-block btn-flat" onclick="register()">Register</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

   <!--  <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign up using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign up using
        Google+</a>
    </div> -->

    <a href="login" class="text-center">I already have a membership</a>
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

<!-- jQuery 2.2.3 -->
<script src="<?=base_url()?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?=base_url()?>assets/bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?=base_url()?>assets/plugins/iCheck/icheck.min.js"></script>
<script src="<?=base_url()?>assets/plugins/validate/jquery.validation.js"></script>
<script type="text/javascript">

  $(document).ready(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
    $("#form1").validate();
  });

  /*function cek(){
    var pw = $("#password").val();
    var pw1 = $("#pwd").val();
    var nama = $("#nama").val();
    var usr = $("#username").val();
    if(pw == "" || pw1 == "" || nama == "" || usr == ""){
      alert("Lengkapi form.");
    }else{
      register();
    }
  }
*/
  function register(){

      if($("#setuju").is(":checked")){
        var pw = $("#password").val();
        var pw1 = $("#pwd").val();
        var nama = $("#nama").val();
        var usr = $("#username").val();
        if(pw == pw1){
          $.ajax({
            url:"<?=base_url()?>register/cek_data",
            data: {nama:nama, usr:usr},
            dataType: "JSON",
            type:"GET",
            success:function(res){
              if(res==0){
                $("#form1").submit();
              }else{
                alert("Nama atau username sudah dipakai."); 
              }
            }
          });
        }else{
          alert("Password not match.");
          return false;
        }
      }else{
        alert("Mohon Check Agreement");
      }
    }
</script>
</body>
</html>
