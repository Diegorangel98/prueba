<?php
    $alert = "";
    session_start();
    //print_r($_POST['correo']);
    if(!empty($_SESSION['active']))
        {
            header('location: system/');
        }else{

    if(!empty($_POST)){
        if(empty($_POST['correo']) || empty($_POST['pass'])){
            $alert = 'Ingrese su Usuario y Contraseña';
        }else{
            require_once "conection.php";

            $user = mysqli_real_escape_string($conection,$_POST['correo']);
            $pass = mysqli_real_escape_string($conection,$_POST['pass']);

            $query = mysqli_query($conection,"SELECT * FROM usuario WHERE correo = '$user' AND clave = '$pass'");
            $result = mysqli_num_rows($query);

            if($result > 0){
                $data = mysqli_fetch_array($query);
                
                $_SESSION['active'] = true;
                $_SESSION['idUser'] = $data['idusuario'];
                $_SESSION['nombre'] = $data['nombre'];
                $_SESSION['correo']  = $data['correo'];
                

                header('location: system/');
            }else{
                $alert = 'Usuario o Contraseña incorrecta';
                session_destroy();
            }
        }

    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet"/>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"rel="stylesheet"/>
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.css" rel="stylesheet"/>
    <!--css Custom-->
    <link rel="stylesheet" href="./styles/style.css">
    <title>Computer Manager</title>
</head>
<body>
    <section id="fd" class="vh-100">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10">
              <div class="card" style="border-radius: 1rem;">
                <div class="row g-0">
                  <div class="col-md-6 col-lg-5 d-none d-md-block">
                    <img
                      src="./img/Img.jpg"
                      alt="login form"
                      class="img-fluid" style="border-radius: 1rem 0 0 1rem;"
                    />
                  </div>
                  <div class="col-md-6 col-lg-7 d-flex align-items-center">
                    <div class="card-body p-4 p-lg-5 text-black">
      
                      <form method="post">
      
                        <div class="d-flex align-items-center mb-3 pb-1">
                          <i id="cubo" class="fas fa-cubes fa-2x me-3"></i>
                          <span class="h1 fw-bold mb-0">CM SYS</span>
                        </div>
      
                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Ingresa a tu cuenta</h5>
      
                        <div class="form-outline mb-4">
                          <input type="email" id="form2Example17" class="form-control form-control-lg"  name="correo">
                          <label class="form-label" for="form2Example17">Direccion De Correo</label>
                        </div>
      
                        <div class="form-outline mb-4">
                          <input name="pass" type="password" id="form2Example27" class="form-control form-control-lg" />
                          <label class="form-label" for="form2Example27">Contraseña</label>
                        </div>
      
                        <div class="pt-1 mb-4">
                          <button class="btn btn-dark btn-lg btn-block" type="submit">Ingresa</button>
                        </div>
                        <div class="alert"><?php echo isset($alert) ? $alert : '' ; ?></div>
                        <a class="small text-muted" href="#!">Olvidaste tu contraseña?</a> <br>
                        
                        <a href="#!" class="small text-muted">Terms of use.</a>
                        <a href="#!" class="small text-muted">Privacy policy</a>
                      </form>
      
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.js"></script>
</body>
</html>