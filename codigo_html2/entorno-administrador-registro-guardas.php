<html lang="en">
    <head>
        <meta charset="UTF-8">
<link rel="stylesheet"href="style.css"
<meta name ="viewport"content="width=device-width,user-scalable=no,initial-scale=1.0,maximun-scale=1.0,minimun-scale=1.0">

<link rel="stylesheet" type="text/css" href="../codigo_css2/entorno-administrador-registro-guardas.css">
<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
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
                      

               <li><a href="entornologinadministrador.php">ADMINISTRADOR</a></li>
                <li> <img src="../fotosUdec/admin.png"width="100px"></img></li> 
           
               <li><a href="">LOGIN GUARDA</a>
                <ul>
               <li><a href="login_guarda_entrada.php">GUARDA_ENTRADA</a></li>
                   <li><a href="login_guarda_salida.php">GUARDA_SALIDA</a></li> 
                </ul>
                <li><img src="../fotosUdec/guarda.png" width="80px"></img></li>  
               </li>
               

               <li><a href="">ESTACIONAMIENTO</a></li>
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
      header('Location:login.php');
    }
  ?>


<!-- AQUI TERMINA NUESTRO CODIGO PARA ENTRAR A LA PLATAFORMA DEL ADMINISTRADOR (OJO SE TUVO PRIMERO QUE HABER CREALO EL LOGIN)///////-->  





<!--AQUI CREACMOS NUESTRO PANEL LATERAL IZQUIERDO DONDE VIAJAREMOS POR TODAS LAS ACCIONES QUE PUEDE HACER NUESTRO ADMINISTRADOR-->

<section class="menu">
  <ul>
<a href="entorno-administrador.php">INICIO</a>
<a href="entorno-administrador-registro-guardas.php">GUARDAS</a>
<a href="entorno-administrador-registro-estacionamientos.php">ESTACIONAMIENTOS</a>
<<a href="entorno-administrador-estadisticas.php">ESTADISTICA</a>
 <a class="btn btn btn-danger" href="cerrar_sesion.php" role="button">CERRAR SESIÓN</a>

  </ul>
</section>

<!--FINN  AQUI CREACMOS NUESTRO PANEL LATERAL IZQUIERDO DONDE VIAJAREMOS POR TODAS LAS ACCIONES QUE PUEDE HACER NUESTRO ADMINISTRADOR-->












<!--///////////////////////DENTRO DE ESTA SECCION FORMATO COLOCAREMOS TODA LA INFORMACION QUE NECESITEMOS//////////////////////////////-->

<section class ="formato">
 


<!--//////////AQUI INICIAMOS CON EL CREACCION DEL FORMCULARIO DE REGISTRO DE GUARDAS/////////////////////-->

<form class ="guarda" method="POST" action=entorno-administrador-registro-guardas.php>
                                
<input type="submit"value="REGISTRAR"class="btn btn-primary"name="btn_registrar"> 
<input type="submit"value="CONSULTAR"class="btn btn-primary"name="btn_consultar"> 
<input type="submit"value="ACTUALIZAR"class="btn btn-primary"name="btn_actualizar">  
<table>
<tr>
<td><label for="docu"><p>DOCUMENTO</p></label></td>
<td><input type="text" name="docu" class="form-control" id="docu" placeholder="Escribe el documento"></td>

<td><label for="cod"><p>CODIGO</p></label></td>
<td><input type="text" name="cod" class="form-control" id="cod" placeholder="Escribe el Codigo"></td>

<td><label for="zona"><p>ZONA<p></label></td>
<td><select name="zona" id="zona">
<option value="ENTRADA">ENTRADA</option>
<option value="SALIDA">SALIDA</option>
</select></td>

</tr>
<tr>
<td><label for="nombre1"><p>NOMBRE1<p></label></td>
<td><input type="text" name="nombre1" class="form-control" id="nombre1" placeholder="Escribe  primer nombre"></td>

<td><label for="nombre2_2"><p>NOMBRE2<p></label></td>
<td><input type="text" name="nombre2" class="form-control" id="nombre2_2" placeholder="Escribe el segundo nombre"></td>

<td><label for="apellido1"><p>APELLIDO1<p></label></td>
<td><input type="text" name="apellido1" class="form-control" id="apellido1" placeholder="Escribe el primer apellido"></td>


</tr>
<tr>
<td><label for="apellido2"><p>APELLIDO2<p></label></td>
<td><input type="text" name="apellido2" class="form-control" id="apellido2" placeholder="Escribe el segundo apellido"></td>

<td><label for="nacimiento"><p>NACIMIENTO<p></label></td>
<td><input type="text" name="nacimiento" class="form-control" id="nacimiento" placeholder="Escribe el fecha de naci"></td>

<td><label for="genero"><p>GENERO<p></label></td>
<td><select name="genero">
<option >GENERO</option>
<option value="M">MASCULINO</option>
<option value="F">FEMENINO</option>
</select></td>
</tr>

<tr>
<td><label for="correo"><p>CORREO<p></label></td>
<td><input type="text" name="correo" class="form-control" id="correo" placeholder="Escribe el correo"></td>

<td><label for="celular"><p>CELULAR<p></label></td>
<td><input type="text" name="celular" class="form-control" id="celular" placeholder="Escribe el celular"></td>

<td><label for="telefono"><p>TELEFONO<p></label></td>
<td><input type="text" name="telefono" class="form-control" id="telefono" placeholder="Escribe el telefono"></td>
</tr>

<tr>
<td><label for="usser"><p>USUARIO<p></label></td>
<td><input type="text" name="usser" class="form-control" id="usser" placeholder="Escribe el correo"></td>

<td><label for="pass"><p>CONTRASENA<p></label></td>
<td><input type="text" name="pass" class="form-control" id="pass" placeholder="Escribe el contrasena"></td>

<td><label for="user"><p>ADMINISTRADOR<p></label></td>
<td><select name="doc" id="doc">
<option value="">SELECCIONAL EL ADMIN</option>
<?php
 include("abrir_conexion.php");
$resultados = mysqli_query($conexion,"SELECT * FROM administrador");
while($fila =$resultados->fetch_array()){
echo"<option value='".$fila['doc']."'>".$fila['nombre1']."</option>";
}
?>


</select>
</td>
    
</tr>
</table>
</form>



<!--////////////////////AQUI TERMINA LA CREACCION DEL FORMCULARIO DE LOSGUARDAS//////////////////////////-->








<!--///////////////////////AQUI EMPIZA LA EL FORMULARIO DE TODOS LOS GUARDAS REGISTRADOS//////////////////-->

<form class="consulta">
<a>TABLA DE INFORMACION GUARDAS REGISTRADOS</a>
<br><br>
<table>
<tr>
<td>DOCUMENTO</td>
<td>CODIGO</td>
<td>ZONA</td>
<td>1ER NOMBRE</td>
<td>2DO NOMBRE</td>
<td>1ER APELLIDO</td>
<td>2DO APELLIDO</td>
<td>NACIMIENTO</td>
<td>GENERO</td>
<td>CORREO</td>
<td>CELULAR</td>
<td>TELEFONO</td>
<td>USUARIO</td>
<td>CONTRASENA</td>
</tr>
<?php
include("abrir_conexion.php");
$resultados = mysqli_query($conexion,"SELECT * FROM guarda");
while($mostrar=mysqli_fetch_array($resultados)){

  ?>

<tr>
  <td><?php echo $mostrar['docu']?></td>
  <td><?php echo $mostrar['cod']?></td>
  <td><?php echo $mostrar['zona']?></td>
  <td><?php echo $mostrar['nombre1']?></td>
  <td><?php echo $mostrar['nombre2']?></td>
  <td><?php echo $mostrar['apellido1']?></td>
  <td><?php echo $mostrar['apellido2']?></td>
  <td><?php echo $mostrar['nacimiento']?></td>
  <td><?php echo $mostrar['genero']?></td>
  <td><?php echo $mostrar['correo']?></td>
  <td><?php echo $mostrar['celular']?></td>
  <td><?php echo $mostrar['telefono']?></td>
  <td><?php echo $mostrar['usser']?></td>
  <td><?php echo $mostrar['pass']?></td>
</tr>
<?php
}
?>
</table>
</form>


<!--////////////////AQUI TERMINA EL FORMULARIO PARA QUE ME MUESTRE TODOS LOS GUARDAS//////////////////////-->









<!--///////////////////INICIO DE BOTON PARA CONSULTAR LA INFORMACION DEL GUARDA (CONSULTA)/////////////////-->
<form class="deco">
  <a>TABLA PARA BUSQUEDA ESPECIFICA DE GUARDAS REGISTRADOS</a>
  <br><br>
<table>
  <tr>
<td>DOCUMENTO</td>
<td>CODIGO</td>
<td>ZONA</td>
<td>NOMBRE1</td>
<td>NOMBRE2</td>
<td>APELLIDO1</td>
<td>APELLIDO2</td>
<td>NACIMIENTO</td>
<td>GENERO</td>
<td>CORREO</td>
<td>CELULAR</td>
<td>TELEFONO</td>
<td>USUARIO</td>
<td>CONTRASENA</td>
  </tr>
  <?php

if (isset($_POST['btn_consultar']))
{
  include("abrir_conexion.php");
  $existe=0;
  $docu = $_POST['docu'];
 
  $resultados = mysqli_query($conexion,"SELECT * FROM guarda WHERE docu ='$docu'");
  while ($mostrar=mysqli_fetch_array($resultados))

   {
     ?>
  <tr>
    <td><?php echo $mostrar ['docu']?></td>
    <td><?php echo $mostrar ['cod'] ?></td>
    <td><?php echo $mostrar ['zona'] ?></td>
    <td><?php echo $mostrar ['nombre1'] ?></td>
    <td><?php echo $mostrar ['nombre2'] ?></td>
    <td><?php echo $mostrar ['apellido1'] ?></td>
    <td><?php echo $mostrar ['apellido2'] ?></td>
    <td><?php echo $mostrar ['nacimiento'] ?></td>
    <td><?php echo $mostrar ['genero'] ?></td>
    <td><?php echo $mostrar ['correo'] ?></td>
    <td><?php echo $mostrar ['celular'] ?></td>
    <td><?php echo $mostrar ['telefono'] ?></td>
    <td><?php echo $mostrar ['usser'] ?></td>
    <td><?php echo $mostrar ['pass']. 
    $existe++;
    ?></td>
                
  </tr>
 
<?php

 }

 if ($existe==0) {
   echo "DOCUMENTO NO EXISTE";
    }
 else{
  echo "DOCUMENTO ENCONTRADO";
 }

?>

<?php
 }
?>

</form>
</table>

<!--//////////////////////////////AQUI TERMINA EL BOTON DE CONSULTAR LA INFORMACION DEL GUARDA/////////////////////////////////-->





<!--////////////////////// INICIO DEL BOTON PARA REGISTRO DE LOS GUARDAS///////////////////////////////////-->


<?php
if (isset($_POST['btn_registrar']))
{
    include("abrir_conexion.php");
  $docu = $_POST['docu'];
  $cod = $_POST['cod'];
  $zona = $_POST['zona'];
  $nombre1 = $_POST['nombre1'];
  $nombre2 = $_POST['nombre2'];
  $apellido1 = $_POST['apellido1'];
  $apellido2 = $_POST['apellido2'];
  $nacimiento = $_POST['nacimiento'];
  $genero = $_POST['genero'];
  $correo = $_POST['correo'];
  $celular = $_POST['celular'];
  $telefono = $_POST['telefono'];
  $usser = $_POST['usser'];
  $pass = $_POST['pass'];
  $doc = $_POST['doc'];
 
      //INSERTAR
  mysqli_query($conexion, "INSERT INTO guarda
  (docu,cod,zona,nombre1,nombre2,apellido1,apellido2,nacimiento,genero,correo,celular,telefono,usser,pass,doc) 
    values 
  ('$docu','$cod','$zona','$nombre1','$nombre2','$apellido1','$apellido2','$nacimiento','$genero','$correo','$celular','$telefono','$usser','$pass','$doc')"); 
       
}
 ?>
<!--////////////////////// FIN DEL BOTON PARA REGISTRO DE LOS GUARDAS///////////////////////////////////-->







<!--/////////////////BOTON ACTUALIZAR INFORMACION DE LOS GUARDAS/////////////////////////////////////////-->
<form class="campos">
<?php

if(isset($_POST['btn_actualizar']))
    include("abrir_conexion.php");
{
$docu = $_POST['docu'];
  $cod = $_POST['cod'];
  $zona = $_POST['zona'];
  $nombre1 = $_POST['nombre1'];
  $nombre2 = $_POST['nombre2'];
  $apellido1 = $_POST['apellido1'];
  $apellido2 = $_POST['apellido2'];
  $nacimiento = $_POST['nacimiento'];
  $genero = $_POST['genero'];
  $correo = $_POST['correo'];
  $celular = $_POST['celular'];
  $telefono = $_POST['telefono'];
  $usser = $_POST['usser'];
  $pass = $_POST['pass'];
  $doc = $_POST['doc'];
if($docu=="")
{
  echo "LOS COMAPOS SON OBLIGATORIOS";
}
else
{
//ACTUALICESE
$conexion->query("UPDATE guarda SET nombre1='$nombre1'  WHERE docu='$docu'");
mysqli_query($conexion); 

}
}

?>
</form>
<!--///////////////////////////// FIN BOTON ACTUALIZAR INFORMACION DE LOS GUARDAS/////////////////////////////////////////-->









</section>

<!--///////////////////////FIN  DE ESTA SECCION FORMATO COLOCAREMOS TODA LA INFORMACION QUE NECESITEMOS//////////////////////////////-->








<!--/////////////////////////////////////////////////////////////INICIA PIE DE PAGINA PRESENTACION////////////////////////////////////////////-->
    <footer>
   

             <class class="primero">
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
               </class>


         <form class="segundo">
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
    </form> 



      
    </footer>


           <!--//////////////////////////////////////EMPESAMOS CON UN CUADRO QUE MUESTRE LA INFORMACION PERSONAL DE NUESTRO ADMINISTRADOR//////////////////-->

 
    </body>



</html>