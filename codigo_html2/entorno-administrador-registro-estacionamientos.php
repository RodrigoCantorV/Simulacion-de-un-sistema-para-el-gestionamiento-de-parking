<html lang="en">
    <head>
        <meta charset="UTF-8">
<link rel="stylesheet"href="style.css"
<meta name ="viewport"content="width=device-width,user-scalable=no,initial-scale=1.0,maximun-scale=1.0,minimun-scale=1.0">

<link rel="stylesheet" type="text/css" href="../codigo_css2/entorno-administrador-registro-estacionamientos-a.css">

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
 









<!--//////////////////////////////INICIO DEL FORMATO PARA INSERTAR ESTACIONAMIENTOS////////////////////////////////////////////////////-->



<form class="parquing"method="POST" action=entorno-administrador-registro-estacionamientos.php>


<h1>REGISTRO DE ESTACIONAMIENTOS</h1>
<br>


 <table>
  <tr>
<td><label for="numero"><p>NUMERO</p></label></td>
<td><input type="text" name="numero" class="form-control" id="numero" placeholder="Escribe el documento"></td>
  

<td><label for="zona"><p>ZONA</p></label></td>
<td><select name="zona">
<option value="">ZONA </option>
<option value="1">ZONA 1</option>
<option value="2">ZONA 2</option>
<option value="3">ZONA 3</option>
<option value="4">ZONA 4</option>
</select></td>


<td><label for="tipo"><p>TIPO</p></label></td>
<td><select name="tipo">
<option value="">TIPO </option>
<option value="CARRO">CARRO</option>
<option value="MOTO">MOTO</option>
<option value="OTRO">OTRO</option>

</select></td>



<td><label for="discapacitado"><p>DISCAPACITADO</p></label></td>
<td><select name="discapacitado">
<option value="">DISCAPACITADO </option>
<option value="SI">SI</option>
<option value="NO">NO</option>

</select></td>




<td><label for="estado"><p>ESTADO</p></label></td>
<td><select name="estado">
<option value="">ESTADO </option>
<option value="ACTIVO">ACTIVO</option>
<option value="INACTIVO">INACTIVO</option>

</select></td>
</tr>


 </table>
<br>
<input type="submit"value="REGISTRAR"class="btn btn-primary"name="btn_regis" id="popo" > 
<input type="submit"value="MODIFICAR"class="btn btn-warning"name="btn_modif"> 


</form>
<!--//////////////////////FIN DEL FORMULARIO PARA INSERTAR LOS ESTACIONAMIENTOS/////////////-->



<!--////////////////////// INICIO DEL BOTON PARA REGISTRO DE LOS ESTACIONAMIENTOS///////////////////////////////////-->


<?php
if (isset($_POST['btn_regis']))
{
include("abrir_conexion.php");
  $numero = $_POST['numero'];
  $zona = $_POST['zona'];
  $tipo = $_POST['tipo'];
  $discapacitado = $_POST['discapacitado'];
  $estado = $_POST['estado'];

      //INSERTAR
  mysqli_query($conexion, "INSERT INTO estacionamiento (numero,zona,tipo,discapacitado,estado) values ('$numero','$zona','$tipo','$discapacitado','$estado')"); 
      
}
 ?>




<!--////////////////////// FIN DEL BOTON PARA REGISTRO DE LOS ESTACIONAMIENTOS///////////////////////////////////-->









<!--//////////////////////////INICIO DE FORMULARIO PARA CONSULTAR ESPECIFICAMENTE//////////////////////////////-->

<form class="parquing2"method="POST" action=entorno-administrador-registro-estacionamientos.php>
<table class="tabla_a">
<tr>
<td>
<label for="zona"><p>ZONA<p></label>
<input type="text" name="zona" class="form-control" id="zona" placeholder="Escribe la zona deseada">
<input type="submit" value="CONSULTAR"  class="btn btn-primary"    name="btn_consultarzona">
</td>
<td>
<label for="numero"><p>NUMERO<p></label>
<input type="text" name="numero" class="form-control" id="numero" placeholder="Escribe el campo deseado">
<input type="submit" value="CONSULTAR"  class="btn btn-primary"    name="btn_consultarnumero">
</td>

</tr>
</table>
<table class="tabla_b">
<tr>
<td>NUMERO </td>
<td>ZONA</td>
<td>TIPO</td>
<td>DISCAPACITADO</td>
<td>ESTADO</td>
</tr>


<!--///////////////////////////////////INICIO PARA 1 BOTON PARA CONSULTAS ESPECIFICAS/////////////////////////////-->
  <?php
  include("abrir_conexion.php");
if( $zona = $_POST['zona'] AND isset($_POST['btn_consultarzona']))
{
  include("abrir_conexion.php");
  $existe=0;
  $zona = $_POST['zona'];
  $resultados = mysqli_query($conexion,"SELECT * FROM estacionamiento WHERE zona ='$zona'"  );

  while ($mostrar=mysqli_fetch_array($resultados))

   {
     ?>
  <tr>
    <td><?php echo $mostrar ['numero']?></td>
    <td><?php echo $mostrar ['zona'] ?></td>
    <td><?php echo $mostrar ['tipo'] ?></td>
    <td><?php echo $mostrar ['discapacitado'] ?> </td>
    <td><?php echo $mostrar ['estado'] . 
    $existe++;
    ?></td>
        
  </tr>
  


<?php

 }
 if ($existe==0) {
  echo "ZONA NO EXISTE";
    }
 else{
  echo "ZONA ENCONTRADA: ";
 }
?>
<?php

 }

?>

  
<!--///////////////////////////////////FIN PARA 1 BOTON PARA CONSULTAS ESPECIFICAS/////////////////////////////-->




<!--///////////////////////////////////INICIO PARA 2 BOTON PARA CONSULTAS ESPECIFICAS/////////////////////////////-->
  <?php
if ( $numero = $_POST['numero'] AND isset($_POST['btn_consultarzona']))
{
  include("abrir_conexion");
  $existe=0;
  $numero = $_POST['numero'];
  $resultados = mysqli_query($conexion,"SELECT * FROM estacionamiento WHERE numero ='$numero'"  );

  while ($mostrar=mysqli_fetch_array($resultados))

   {
     ?>
  <tr>
    <td><?php echo $mostrar ['numero']?></td>
    <td><?php echo $mostrar ['zona'] ?></td>
    <td><?php echo $mostrar ['tipo'] ?></td>
    <td><?php echo $mostrar ['discapacitado'] ?> </td>
    <td><?php echo $mostrar ['estado'] . 
    $existe++;
    ?></td>
                
  </tr>
<?php

 }
 if ($existe==0) {
  echo "ESTACIONAMIENTO NO EXISTE";
    }
 else{
  echo "ESTACIONAMIENTOS ENCONTRADOS :";
 }
?>
<?php
 }

?>
     



<!--///////////////////////////////////FIN PARA 2 BOTON PARA CONSULTAS ESPECIFICAS/////////////////////////////-->




<!--///////////////////////////////////INICIO PARA 3 BOTON PARA CONSULTAS ESPECIFICAS/////////////////////////////-->


 <?php
   include("abrir_conexion.php");
 if ( $numero = $_POST['numero'] AND $zona = $_POST['zona'] AND  isset($_POST['btn_consultarnumero']))
{
  include("abrir_conexion.php");
  $existe=0;
  $numero = $_POST['numero'];
  $zona = $_POST['zona'];
  $resultados = mysqli_query($conexion,"SELECT * FROM estacionamiento WHERE numero ='$numero' AND zona='$zona'"  );
  while ($mostrar=mysqli_fetch_array($resultados))

   {
     ?>
  <tr>
    <td><?php echo $mostrar ['numero']?></td>
    <td><?php echo $mostrar ['zona'] ?></td>
    <td><?php echo $mostrar ['tipo'] ?></td>
    <td><?php echo $mostrar ['discapacitado'] ?> </td>
    <td><?php echo $mostrar ['estado'] . 
    $existe++;
    ?></td>  
  </tr>
<?php

 }
 if ($existe==0) {
  echo "ESTACIONAMIENTO NO EXISTE";
    }
 else{
  echo "ESTACIONAMIENTOS ENCONTRADO: ";
 }
?>
<?php
 }
?>

  <?php
  echo"ESTACIONAMIENTOS TOTALES "; echo mysqli_num_rows($resultados);
   ?>  
<!--///////////////////////////////////FIN PARA 3 BOTON PARA CONSULTAS ESPECIFICAS/////////////////////////////-->



</table>

</form>


<!--//////////////////////////FIN DE FORMULARIO PARA CONSULTAR ESPECIFICAMENTE//////////////////////////////-->
























<!--////////////////////TABBLA PARA MOSTRAR TODOS LOS ESTACIONAMIENTOS/////////////////////////////-->

<form class="muestra_estacionamientos">
<h1>TABLA DE INFORMACION ESTACIONAMIENTOS REGISTRADOS</h1> 
<br>
<table>
<tr> 
<td>NUMERO </td>
<td>ZONA</td>
<td>TIPO</td>
<td>DISCAPACITADO</td>
<td>ESTADO</td>
</tr>

<?php
include("abrir_conexion.php");
$resultados = mysqli_query($conexion,"SELECT * FROM estacionamiento");
while($mostrar=mysqli_fetch_array($resultados)){

  ?>

<tr>
  <td><?php echo $mostrar['numero']?></td>
  <td><?php echo $mostrar['zona']?></td>
  <td><?php echo $mostrar['tipo']?></td>
  <td><?php echo $mostrar['discapacitado']?></td>
   <td><?php echo $mostrar['estado']?></td>

<?php
}
?>

</table>

<br>
<?php
  echo"ESTACIONAMIENTOS TOTALES "; echo mysqli_num_rows($resultados);
   ?> 

</form>
<!--//////////////////////////FIN DE TABLA PARA MOSTRAR TODOS LOS ESTACIONAMIENTOS///////////////////////////////////-->




<!--////////////////////TABBLA PARA MOSTRAR LOS PARA DISCAPACITADOS/////////////////////////////-->

<form class="muestra_estacionamientos2">
<h1>TABLA DE INFORMACION ESTACIONAMIENTOS DISCAPACITADOS</h1> 
<br>
<table>
<tr> 
<td>NUMERO </td>
<td>ZONA</td>
<td>TIPO</td>
<td>DISCAPACITADO</td>
<td>ESTADO</td>
</tr>

<?php
include("abrir_conexion.php");
$resultados = mysqli_query($conexion,"SELECT * FROM estacionamiento WHERE discapacitado='SI'");
while($mostrar=mysqli_fetch_array($resultados)){

  ?>

<tr>
  <td><?php echo $mostrar['numero']?></td>
  <td><?php echo $mostrar['zona']?></td>
  <td><?php echo $mostrar['tipo']?></td>
  <td><?php echo $mostrar['discapacitado']?></td>
   <td><?php echo $mostrar['estado']?></td>

<?php
}
?>

</table>

<br>
<?php
  echo"ESTACIONAMIENTOS PARA DISCAPACITADOS "; echo mysqli_num_rows($resultados);
   ?> 

</form>
<!--//////////////////////////FIN DE TABLA PARA MOSTRAR LOS ESTACIONAMIENTOS PARA DISCAPACITADO///////////////////////////////////-->




<!--////////////////////TABBLA PARA MOSTRAR TODOS LOS ESTACIONAMIENTOS QUE ESTAN ACTIVOS/////////////////////////////-->

<form class="muestra_estacionamientos3">
<h1>TABLA DE INFORMACION ESTACIONAMIENTOS ACTIVOS</h1> 
<br>
<table>
<tr> 
<td>NUMERO </td>
<td>ZONA</td>
<td>TIPO</td>
<td>DISCAPACITADO</td>
<td>ESTADO</td>
</tr>

<?php
include("abrir_conexion.php");
$resultados = mysqli_query($conexion,"SELECT * FROM estacionamiento WHERE estado='ACTIVO'");
while($mostrar=mysqli_fetch_array($resultados)){

  ?>

<tr>
  <td><?php echo $mostrar['numero']?></td>
  <td><?php echo $mostrar['zona']?></td>
  <td><?php echo $mostrar['tipo']?></td>
  <td><?php echo $mostrar['discapacitado']?></td>
   <td><?php echo $mostrar['estado']?></td>

<?php
}
?>

</table>

<br>
<?php
  echo"ESTACIONAMIENTOS TOTALES "; echo mysqli_num_rows($resultados);
   ?> 

</form>
<!--//////////////////////////FIN DE TABLA PARA MOSTRAR TODOS LOS ESTACIONAMIENTOS QUE ESTAN ACTIVOS///////////////////////////////////-->








<!--////////////////////TABBLA PARA MOSTRAR TODOS LOS ESTACIONAMIENTOS QUE ESTAN INACTIVOS/////////////////////////////-->

<form class="muestra_estacionamientos4">
<h1>TABLA DE INFORMACION ESTACIONAMIENTOS INACTIVOS</h1> 
<br>
<table>
<tr> 
<td>NUMERO </td>
<td>ZONA</td>
<td>TIPO</td>
<td>DISCAPACITADO</td>
<td>ESTADO</td>
</tr>

<?php
include("abrir_conexion.php");
$resultados = mysqli_query($conexion,"SELECT * FROM estacionamiento WHERE estado='INACTIVO'");
while($mostrar=mysqli_fetch_array($resultados)){

  ?>

<tr>
  <td><?php echo $mostrar['numero']?></td>
  <td><?php echo $mostrar['zona']?></td>
  <td><?php echo $mostrar['tipo']?></td>
  <td><?php echo $mostrar['discapacitado']?></td>
   <td><?php echo $mostrar['estado']?></td>

<?php
}
?>

</table>

<br>
<?php
  echo"ESTACIONAMIENTOS TOTALES "; echo mysqli_num_rows($resultados);
   ?> 

</form>
<!--//////////////////////////FIN DE TABLA PARA MOSTRAR TODOS LOS ESTACIONAMIENTOS QUE ESTAN INACTIVOS///////////////////////////////////-->




<!--///////////////////////////////////INICIO DEL 3 BOTON PARA MODIFICAR /////////////////////////////-->

  <?php
    include("abrir_conexion.php");
if(isset($_POST['btn_modif']))
{


$tipo          = $_POST ['tipo'];
$discapacitado = $_POST ['discapacitado'];
$estado  = $_POST ['estado'];

if($numero==""&& $zona=="")
{
  echo "LOS COMAPOS SON OBLIGATORIOS";
}
else
{
//ACTUALICESE
$conexion->query("UPDATE estacionamiento SET discapacitado='$discapacitado', tipo='$tipo',estado='$estado' WHERE numero='$numero'"); 
mysqli_query($conexion); 

}
}

?>

<!--///////////////////////////////////FIN DEL 3 BOTON PARA MODIFICAR /////////////////////////////-->








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