<html lang="en">
    <head>
        <meta charset="UTF-8">
<link rel="stylesheet"href="style.css"
<meta name ="viewport"content="width=device-width,user-scalable=no,initial-scale=1.0,maximun-scale=1.0,minimun-scale=1.0">

<link rel="stylesheet" type="text/css" href="../codigo_css2/entorno-administrador_a.css">

    </head>
  
    <title>ESTACIONAMIENTO UDEC</title>
    <body> 

<!--/////////////////////////////////////////////////////////////AQUI GENERAMOS NUESTRA CABECERA///////////////////////////////////////-->
    <header>
        
              <div id="header">
                <ul class="nav">

                <li><img src="../fotosUdec/logo_udec.png" width="200px"></li>

               <li><a href="inicio.php">INICIO</a></li>
                <li><img src="../fotosUdec/logo_udec.png"></img> </li>  
                      

               <li><a href="entorno-administrador.php">ADMINISTRADOR</a></li>
                <li> <img src="../fotosUdec/admin.png"width="100px"></img></li> 
           
             
              
               <li><a href="#">ESTACIONAMIENTO</a></li>
               <li><img src="../fotosUdec/estacionamiento.png"></img></li>   
               </ul>
              </div>

        </header>
              
       

 <!--/////////////////////////////////////////////////////////////AQUI TERMINA NUESTRA CABECERA///////////////////////////////////////-->






<!-- CODIGO PARA ENTRAR A LA PLATAFORMA DEL ADMINISTRADOR (OJO SE TUVO PRIMERO QUE HABER CREALO EL LOGIN)///////////////////////////-->  
<?php
    session_start();
    ob_start();

    if(isset($_POST['btn_index']))//Verifico que el boton "iniciar sesion" fue oprimido
    {
      $_SESSION['sesion_exito']=0;

      $usser = $_POST['usser'];
      $pass = $_POST['pass'];

      if($usser=="" || $pass=="")
      {
        $_SESSION['sesion_exito']=2;//2 sera error de campos vacios
      }
      else
      {
        include("abrir_conexion.php");  
        $_SESSION['sesion_exito']=3;//3 Datos Incorrectos
        $resultados = mysqli_query($conexion,"SELECT * FROM $tabla_db1 WHERE usser = '$usser' AND pass = '$pass'");
        while($consulta = mysqli_fetch_array($resultados))
            {
               $_SESSION['sesion_exito']=1;//Inicio Sesion :D
            }
        include("cerrar_conexion.php");
      }
    }

    if($_SESSION['sesion_exito']<>1)
    {
      header('Location:entorno-login-administrador.php');
    }
  ?>


<!-- AQUI TERMINA NUESTRO CODIGO PARA ENTRAR A LA PLATAFORMA DEL ADMINISTRADOR (OJO SE TUVO PRIMERO QUE HABER CREALO EL LOGIN)///////-->  





<!--AQUI CREACMOS NUESTRO PANEL LATERAL IZQUIERDO DONDE VIAJAREMOS POR TODAS LAS ACCIONES QUE PUEDE HACER NUESTRO ADMINISTRADOR-->

<section class="menu">
  <ul>
<a href="entorno-administrador.php">INICIO</a>
<a href="entorno-administrador-registro-guardas.php">GUARDAS</a>
<a href="entorno-administrador-registro-estacionamientos.php">ESTACIONAMIENTOS</a>
<a href="entorno-administrador-estadisticas.php">ESTADISTICA</a>
 <a class="btn btn btn-danger" href="cerrar_sesion.php" role="button">CERRAR SESIÓN</a>

  </ul>
</section>

<!--FINN  AQUI CREACMOS NUESTRO PANEL LATERAL IZQUIERDO DONDE VIAJAREMOS POR TODAS LAS ACCIONES QUE PUEDE HACER NUESTRO ADMINISTRADOR-->









<!--///////////////////////DENTRO DE ESTA SECCION FORMATO COLOCAREMOS TODA LA INFORMACION QUE NECESITEMOS//////////////////////////////-->

<section class ="formato">
 



<!--//////////////////AQUI INICIA EL FORMATO DE LOS DATOS DEL ADMINISTRADOR/////////////////////////////////-->


<form>
<div class="perfil">
  <h2>BIENVENIDO</h2>
  <br><br>
  <table class="table">
<tr>
  <td>
<li>CEDULA</li><br>
<li>CODIGO</li><br>
<li>ROL</li><br>
<li>1 NOMBRE</li><br>
<li>2 NOMBRE</li><br>
<li>1 APELLIDO</li><br>
<li>2 APELLIDO</li><br>
<li>FECHA</li><br>
<li>GENERO</li><br>
<li>CORREO</li><br>
<li>CELULAR</li><br>
<li>TELEFONO</li>

  </td>
  <td>
  <?php
 include("abrir_conexion.php");
 $resultados = mysqli_query($conexion,"SELECT * FROM $tabla_db1");
while ($mostrar=mysqli_fetch_array($resultados)) {
  ?>
 <ul>
<li><?php echo $mostrar['doc'] ?></li><br>
<li><?php echo $mostrar['cod'] ?> </li><br>
<li><?php echo $mostrar['rol']  ?> </li><br>
<li><?php echo $mostrar['nombre1']  ?> </li><br>
<li><?php echo $mostrar['nombre2']  ?> </li><br>
<li><?php echo $mostrar['apellido1']  ?> </li><br>
<li><?php echo $mostrar['apellido2']  ?> </li><br>
<li><?php echo $mostrar['nacimiento']  ?> </li><br>
<li><?php echo $mostrar['genero']  ?> </li><br>
<li><?php echo $mostrar['correo']  ?> </li><br>
<li><?php echo $mostrar['celular']  ?> </li><br>
<li><?php echo $mostrar['telefono']  ?> </li>

 </ul>
<?php
}
?>
</td>
</tr>
</table>
</div>
</form>
<!--////////TERMINA EL CUADRO QUE MUESTRE LA INFORMACION PERSONAL DE NUESTRO ADMINISTRADOR/////////////////-->








<!--//////////////////////////////CREACION DE FORMATO ADMINISTRADOR ///////////////////////////////////////-->



<form class ="datos" method="POST" action=entorno-administrador.php>
                                
<input type="submit" value="ACTUALIZAR"  class="btn btn-primary"    name="btn_actualizar">


<br><br>
<table>
<tr>
<td><label for="doc"><p>DOCUMENTO</p></label></td>
<td><input type="text" name="doc" class="form-control" id="doc" placeholder="Escribe tu documento"></td>

<td><label for="cod"><p>CODIGO</p></label></td>
<td><input type="text" name="cod" class="form-control" id="cod" placeholder="Escribe tu Codigo"></td>

</tr>

<tr>


<td><label for="nombre1"><p>NOMBRE1<p></label></td>
<td><input type="text" name="nombre1" class="form-control" id="nombre1" placeholder="Escribe tu primer nombre"></td>

<td><label for="nombre2"><p>NOMBRE2<p></label></td>
<td><input type="text" name="nombre2" class="form-control" id="nombre2" placeholder="Escribe tu segundo nombre"></td>

</tr>


<tr>
<td><label for="apellido1"><p>APELLIDO1<p></label></td>
<td><input type="text" name="apellido1" class="form-control" id="apellido1" placeholder="Escribe tu primer apellido"></td>

<td><label for="apellido2"><p>APELLIDO2<p></label></td>
<td><input type="text" name="apellido2" class="form-control" id="apellido2" placeholder="Escribe tu segundo apellido"></td>

</tr>



<tr>
<td><label for="nacimiento"><p>NACIMIENTO<p></label></td>
<td><input type="text" name="nacimiento" class="form-control" id="nacimiento" placeholder="Escribe tu fecha de naci"></td>

<td><label for="genero"><p>GENERO<p></label></td>
<td><select name="genero">
<option >GENERO</option>
<option value="M">MASCULINO</option>
<option value="F">FEMENINO</option>
</select></td>
</tr>


<tr>
<td><label for="correo"><p>CORREO<p></label></td>
<td><input type="text" name="correo" class="form-control" id="correo" placeholder="Escribe tu correo"></td>

<td><label for="celular"><p>CELULAR<p></label></td>
<td><input type="text" name="celular" class="form-control" id="celular" placeholder="Escribe tu celular"></td>

 </tr>

<tr>
<td><label for="telefono"><p>TELEFONO<p></label></td>
<td><input type="text" name="telefono" class="form-control" id="telefono" placeholder="Escribe tu telefono"></td>

 <td><label for="rol"><p>ROL</label></p></td>
<td><input type="text" name="rol" class="form-control" id="rol" placeholder="Escribe tu Rol"></td>

</tr>

<tr>
<td><label for="user"><p>USUARIO<p></label></td>
<td><input type="text" name="user" class="form-control" id="user" placeholder="Escribe tu correo"></td>

<td><label for="pass"><p>CONTRASENA<p></label></td>
<td><input type="text" name="pass" class="form-control" id="pass" placeholder="Escribe tu contrasena"></td>
    

   
</tr>
</table>

</form>

<!--/////////////////////////////////////AQUI TERMINA EL FORMULARIO PARA CREAR EL ADMINISTRADOR////////////-->





<!--/////////////////BOTON ACTUALIZAR INFORMACION DEL ADMINISTRADOR/////////////////////////////////////////-->
<form class="campos">
<?php
  include("abrir_conexion.php");
if(isset($_POST['btn_actualizar']))
{
$doc = $_POST ['doc'];
$cod = $_POST ['cod'];
$rol = $_POST ['rol'];
$nombre1 = $_POST ['nombre1'];
$nombre2 = $_POST ['nombre2'];
$apellido1 = $_POST ['apellido1'];
$apellido2 = $_POST ['apellido2'];
$nacimiento = $_POST ['nacimiento'];
$genero = $_POST ['genero'];
$correo = $_POST ['correo'];
$celular = $_POST ['celular'];
$telefono = $_POST ['telefono'];
$user = $_POST ['user'];
$pass = $_POST ['pass'];
if($doc=="")
{
  echo "LOS COMAPOS SON OBLIGATORIOS";
}
else
{
//ACTUALICESE
$conexion->query("UPDATE $tabla_db1 SET
genero='$genero' 
WHERE doc='$doc'");
mysqli_query($conexion); 

}
}

?>
</form>
<!--/////////AQUI TERMINAN EL BOTON PARA ACTUALIZAR LA INFORMACION DEL ADMINISTRADOR////////////////////////-->








</section>

<!--///////////////////////FIN  DE ESTA SECCION FORMATO COLOCAREMOS TODA LA INFORMACION QUE NECESITEMOS//////////////////////////////-->








<!--/////////////////////////////////////////////////////////////INICIA PIE DE PAGINA PRESENTACION////////////////////////////////////////////-->
    <footer>
   

             <section class="primero">
                <div >
                    <ul>
                        <li>
                            <a>Línea gratuita: 01 8000 180 414 | e-mail: info@ucundinamarca.edu.co</a>
                        </li>
                         <li>
                            <a >Sede Administrativa: Dg 18 No. 20-29 Fusagasugá | (+57 1) 828 1483</a>
                        </li>
                         <li>
                          <a > Seccional Girardot: Carrera 19 Nº 24 - 209 | (+57 1) 833 5071</a>
                        </li>
                         <li>
                          <a >  Seccional Ubaté: Calle 6 Nº 9 - 80 | (+57 1) 855 3055</a>
                        </li>
                         <li>
                          <a > Extensión Chía: Autopista Chía - Cajicá | Sector "El Cuarenta" | (+57 1) 828 1483 Ext. 418</a>
                        </li>
                         <li>
                        <a >  Extensión Chocontá: Carrera 3 Nº 5 -71 | (+57 1) 856 2520</a>
                        </li>
                         <li>
                        <a >  Extensión Facatativá: Calle 14 con Avenida 15 | (+57 1) 892 0706</a>
                        </li>
                         <li>
                         <a > Extensión Soacha: Diagonal 9 No. 4B-85 | (+57 1) 721 9220</a>
                        </li>
                         <li>
                         <a >    Extensión Zipaquirá: Carrera 7 No. 1-31 | (+57 1) 851 5792</a>
                         </li>
                         <li>
                         <a > Oficinas Bogotá D.C.: Carrera 20 No. 39-32 Teusaquillo | (+57 1) 744 8180</a>
                        </li>
                        </ul>
        
                        </div>
               </section>


         <section class="segundo">
    <div>
             <ul>
                        <li>
                            <a>Ingeniero de sistemas RODRIGO CANTOR VASQUEZ | SOACHA |(+57) 312 5722928</a>
                        </li>
                         <li>
                            <a>rcvunicun@gmail.com || cvrodirgo@ucundinamarca.edu.co</a>
                        </li>
                         <li>
                          <a >Ingeniera de sistemas LAURA VANESSA ALBA GONZALES | FUSAGASUGA |(+57) 310 3252857</a>
                        </li>
                         <li>
                          <a > laura@gmail.com</a>
                        </li>
                         <li>
                          <a > Ingeniero  de sistemas YEFERSON ORTIZ BOLIVAR | FUSAGASUGA | (+57) 311 8989607</a>
                        </li>
                         <li>
                        <a >  yeferson@gmail.com</a>
                        </li>
                         <li>
                        <a >  </a>
                         <li>
                         <a > </a>
                        </li>
                         <li>
                         <a >  </a>
                         </li>
                         <li><a > </a>
                         </li>
                    </ul>
    </div>
    </section> 



      
    </footer>


           <!--//////////////////////////////////////EMPESAMOS CON UN CUADRO QUE MUESTRE LA INFORMACION PERSONAL DE NUESTRO ADMINISTRADOR//////////////////-->

 
    </body>



</html>