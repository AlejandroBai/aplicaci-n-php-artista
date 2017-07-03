<?php
  function conecta_bd(){
    $c = mysqli_connect( 'localhost', 'root', '', 'agenda' );
    		mysqli_set_charset($c, 'utf8');
    		return $c;
  }

  function menuPrincipal($opcion){
    echo "<div id='barraMenu'>";
    if($opcion==1){
      echo "<a href='../index.php'> Inicio </a>";
      echo "<a href='./contacto.php'> Contacto </a>";
      echo "<a href='./acceder.php'> Acceder </a>";
    }elseif($opcion==2){
      echo "<a href='./index.php'> Inicio </a>";
      echo "<a href='./php/contacto.php'> Contacto </a>";
      echo "<a href='./php/acceder.php'> Acceder </a>";
    }
    echo "</div>";
  }

  function menuLogeado($opcion){
    echo "<div id='barraMenu'>";
    if($opcion==1){
      echo "<a href='../indexLog.php'> Inicio </a>";
      echo "<a href='./noticias.php'> Noticias </a>";
      echo "<a href='./clientes.php'> Clientes </a>";
      echo "<a href='./trabajos.php'> Trabajos </a>";
      echo "<a href='./citas.php'> Citas </a>";
      echo "<a href='./contactoLog.php'> Contacto </a>";
      echo "<a href='./destroy.php'> Salir </a>";
    }elseif($opcion==2){
      echo "<a href='./indexLog.php'> Inicio </a>";
      echo "<a href='./php/noticias.php'> Noticias </a>";
      echo "<a href='./php/clientes.php'> Clientes </a>";
      echo "<a href='./php/trabajos.php'> Trabajos </a>";
      echo "<a href='./php/citas.php'> Citas </a>";
      echo "<a href='./php/contactoLog.php'> Contacto </a>";
      echo "<a href='./php/destroy.php'> Salir </a>";
    }
    echo "</div>";
  }

  function menuCliente(){
    echo "<div id='barraMenu'>";
    echo "<a href='./misTrabajos.php'> Inicio </a>";
      echo "<a href='./misTrabajos.php'> Mis trabajos </a>";
      echo "<a href='./misDatosPersonales.php'> Mis datos personales </a>";
      echo "<a href='./misCitas.php'> Mis citas </a>";
      echo "<a href='./contactoCliente.php'> Contacto </a>";
      echo "<a href='./destroy.php'> Salir </a>";
    echo "</div>";
  }

  function imagenAleatoria($opcion){
    $conexion = conecta_bd();
    $consulta = "select * from trabajos";
    $datos = mysqli_query($conexion, $consulta);
    $numeroFilas = mysqli_num_rows($datos);

    if($opcion==1){
      echo "<div id='fondoAleatorio'><img src='../img/trabajos/" . mt_rand(1,$numeroFilas) . ".jpg'></div>";
    }elseif($opcion==2) {
      echo "<div id='fondoAleatorio'><img src='./img/trabajos/" . mt_rand(1,$numeroFilas) . ".jpg'></div>";
    }


    mysqli_close($conexion);
  }

  function tresNoticias($opcion){
    $conexion = conecta_bd();
    $consulta = "select * from noticias
                  order by fecha desc
                  limit 3";
    $resultado = mysqli_query($conexion, $consulta);

    if($opcion==1){
      echo "<section id='noticias'>";
      echo "<h1>Últimas noticias</h1>";
      echo "<div id='contenedorNoticias'>";
      for ($i=0; $i < 3; $i++) {
        $fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC);
        echo "<div id='cajaNoticia'>";
        echo "<h2>$fila[titular]</h2><br>";
        echo "<div id='imgNoticias'>";
        echo "<img src='../img/noticias/$fila[imagen]'><br><br>";
        echo "</div>";
        echo "<form action='../php/noticia_completa.php' method='post'>";
        echo "<input type='hidden' name='id' value='$fila[id]'>";
        echo "<input type='submit' name='enviar' value='Leer más'>";
        echo "</form>";
        echo "</div>";
      }
    }elseif ($opcion==2) {
      echo "<section id='noticias'>";
      echo "<h1>Últimas noticias</h1>";
      echo "<div id='contenedorNoticias'>";
      for ($i=0; $i < 3; $i++) {
        $fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC);
        echo "<div id='cajaNoticia'>";
        echo "<h2>$fila[titular]</h2><br>";
        echo "<div id='imgNoticias'>";
        echo "<img src='./img/noticias/$fila[imagen]'><br><br>";
        echo "</div>";
        echo "<form action='./php/noticia_completa.php' method='post'>";
        echo "<input type='hidden' name='id' value='$fila[id]'>";
        echo "<input type='submit' name='enviar' value='Leer más'>";
        echo "</form>";
        echo "</div>";

      }
    }

    echo "</div>";
    echo "</section>";

    mysqli_close($conexion);
  }

  function todasNoticias(){
    $conexion = conecta_bd();
    $consulta = "select * from noticias order by fecha desc";
    $resultado = mysqli_query($conexion, $consulta);
    $numeroFilas = mysqli_num_rows($resultado);

    echo "<section id='todasNoticias'>";
    echo "<h1>Todas las noticias</h1>";
    echo "<div id='contenedorTodasNoticias'>";
    for ($i=0; $i < $numeroFilas; $i++) {
      $fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC);
      echo "<div id='cajaNoticia'>";
        echo "<h2>$fila[titular]</h2><br>";
        echo "<div id='imgNoticias'>";
          echo "<img src='../img/noticias/$fila[imagen]'><br>";
        echo "</div>";
        echo "<form action='./noticia_completa.php' method='post'>";
  			  echo "<input type='hidden' name='id' value='$fila[id]'>";
  			  echo "<input type='submit' name='enviar' value='Leer más'>";
			  echo "</form>";
      echo "</div>";
    }
    echo "</div>";
    echo "</section>";

    mysqli_close($conexion);
  }

  function footer(){
    echo "<div id='footer'>";
      echo "<div>";
        echo "<i class='ion-social-facebook'></i>";
        echo "<i class='ion-social-twitter'></i>";
        echo "<i class='ion-social-googleplus'></i>";
      echo "</div>";
    echo "</div>";

  }

  function acceder(){

    session_start();

    echo "<div id='formulario'>";
    echo "<form action='./acceder.php' method='POST'>";
    echo "<input type='text' name='user' placeholder='Usuario' required='true'><br>";
    echo "<input type='password' name='password' placeholder='Contraseña' required='true'><br>";
    echo "<label for='check'>Mantener sesión iniciada</label>";
    echo "<input id='check' type='checkbox' name='checkSession'>";
    echo "<input type='submit' name='send' value='Enviar'>";
    echo "</form>";


    if(isset($_COOKIE['sesion'])){
      session_decode($_COOKIE['sesion']);

      if(isset($_SESSION['admin'])){

        header('location: ../indexLog.php');

      }else{

        header('location: misTrabajos.php');
      }
    }

    if(isset($_POST['send'])){
      $user = $_POST['user'];
      $password = $_POST['password'];

      if($user == "admin" && $password == "admin"){

        $_SESSION['admin'] = 'admin';
        if($_POST['checkSession'] == true) {
          setcookie('sesion', session_encode(), time()+3600, '/');
        }

        echo "<p class='correcto'>Eres el Administrador<br>Bienvenido al sistema</p>";
        header('location: ../indexLog.php');
      }else{

        $conexion = conecta_bd();
        $consulta = "select nombre_usuario, pass, id from clientes where nombre_usuario = '$user' and pass = '$password'";
        $resultado = mysqli_query($conexion, $consulta);
        $numeroFilas = mysqli_num_rows($resultado);

          //Si el resultado te devuelve una fila, existe
          if($numeroFilas == 1){

            $fila = mysqli_fetch_array($resultado);

            $_SESSION['id'] = $fila['id'];

            if($_POST['checkSession'] == true) {
              setcookie('sesion', session_encode(), time()+3600, '/');
            }else{

            }
            echo "<p class='correcto'>Eres cliente<br>Bienvenido al sistema</p>";
            header('location: ./misTrabajos.php');

          }else{
            echo "<p class='incorrecto'>Su login o Contraseña son Incorrectos</p>";
          }
          mysqli_close($conexion);
      }
    }

    echo "</div>";
  }
 ?>
