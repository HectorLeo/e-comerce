
<!DOCTYPE html>
<html>
    <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title> Crystal Media | Log in</title>

      <meta name="viewport" content="width=device-width, initial-scale=1">
      
      <link rel="stylesheet" href="assets\lte\plugins\fontawesome-free\css\all.min.css">
      <link rel="stylesheet" href="assets\lte\plugins\icheck-bootstrap\icheck-bootstrap.min.css">

      <link rel="stylesheet" href="assets\lte\dist\css\adminlte.min.css">

      <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

      <!-- Google Font: Source Sans Pro -->
      <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    </head>
    <body class="hold-transition login-page">
        <div class="login-box">
          <div class="login-logo">
            <a href="#"><b>Crystal Media</b>Admin</a>
          </div>
          <!-- /.login-logo -->
          <div class="card">
            <div class="card-body login-card-body">
              <p class="login-box-msg">Iniciar Sesión</p>
              <form method="POST" action=" {{route('login_post')}}">
                {{ csrf_field() }}
                <div class="input-group mb-3">
                <input type="email" name="email" class="form-control" value="{{old('email')}}" placeholder="Correo">
                {!! $errors->first('email','<span class="help-block">:message</span>') !!}
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-envelope"></span>
                    </div>
                  </div>
                </div>
                <div class="input-group mb-3">
                  <input type="password" name="password" id="contrasena" class="form-control" placeholder="Contraseña">
                  {!! $errors->first('password','<span class="help-block">:message</span>') !!}
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-lock"></span>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <!-- /.col -->
                  <div class="col-12">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Iniciar</button>
                  </div>
                  <!-- /.col -->
                </div>
              </form>
        
              <!--div class="social-auth-links text-center mb-3">
                <p>- OR -</p>
                <a href="#" class="btn btn-block btn-primary">
                  <i class="fab fa-facebook mr-2"></i> Iniciar sesion con Facebook
                </a>
                <a href="#" class="btn btn-block btn-danger">
                  <i class="fab fa-google-plus mr-2"></i> Iniciar sesion con Google+
                </a>
              </div>
              < /.social-auth-links
        
              <p class="mb-1">
                <a href="#">I forgot my password</a>
              </p>
              <p class="mb-0">
                <a href="register.html" class="text-center">Register a new membership</a>
              </p>
            </div>
            /.login-card-body -->
          </div>
        </div>
        <!-- /.login-box -->
        
        <!-- jQuery -->
        <script src="../../plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        
        </body>
    </div>
</html>