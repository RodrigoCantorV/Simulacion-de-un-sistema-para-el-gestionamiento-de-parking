<html lang="en">
    <head>
        <meta charset="UTF-8">
<link rel="stylesheet"href="style.css"
<meta name ="viewport"content="width=device-width,user-scalable=no,initial-scale=1.0,maximun-scale=1.0,minimun-scale=1.0">

<link rel="stylesheet" type="text/css" href="../codigo_css2/entorno-administrador-estadistica-a.css">

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
 
<!--///AQUI INICA EL FORMATO PARA MOSTRAR TODAS LAS PERSONAS EXTERNAS (internas) QUE HAN INGRESADO A LA UDEC/////-->

<form class="muestra_ingresos">

<h1>TABLA DE INFORMACION PERSONAS EXTERNAS QUE HAN INGRESADOS</h1>
<br>
<table>
<tr>
<td>NUMERO DE INGRESO </td>
<td>FECHA</td>
<td>HORA_ENT</td>
<td>HORA_SAL</td>
<td>SOLICITUD DE INGRESO</td>
<td>ESTACIONAMIENTO</td>
</tr>
<?php
include("abrir_conexion.php");
$resultados = mysqli_query($conexion,"SELECT * FROM ingreso WHERE solicitud >'1'");
while($mostrar=mysqli_fetch_array($resultados)){

  ?>

<tr>
  <td><?php echo $mostrar['num_ingreso']?></td>
  <td><?php echo $mostrar['fecha']?></td>
  <td><?php echo $mostrar['hora_en']?></td>
  <td><?php echo $mostrar['hora_sa']?></td>
   <td><?php echo $mostrar['solicitud']?></td>
<td><?php echo $mostrar['espacio']?></td>
<?php
}
?>
</table>
  <?php
  echo"PERSONAS REGISTRADAS:   TOTALES "; echo mysqli_num_rows($resultados);
   ?>  
</form>



<!--///AQUI TERMINA EL FORMATO PARA MOSTRAR TODAS LAS PERSONAS EXTERNAS (internas) QUE HAN INGRESADO A LA UDEC/////-->





<!--///AQUI INICA EL FORMATO PARA MOSTRAR TODAS LAS PERSONAS EXTERNAS (internas) QUE HAN INGRESADO A LA UDEC/////-->

<form class="muestra_ingresosI">

<h1>TABLA DE INFORMACION INGRESADOS QUE SON DE LA UNIVERSIDAD</h1>
<br>
<table>
<tr>
<td>NUMERO DE INGRESO </td>
<td>FECHA</td>
<td>HORA_ENT</td>
<td>HORA_SAL</td>
<td>CODIGOS DE LA UDEC</td>
<td>ESTACIONAMIENTO</td>
</tr>
<?php
include("abrir_conexion.php");
$resultados = mysqli_query($conexion,"SELECT * FROM ingreso WHERE codigou like '%1612%'");
while($mostrar=mysqli_fetch_array($resultados)){

  ?>

<tr>
  <td><?php echo $mostrar['num_ingreso']?></td>
  <td><?php echo $mostrar['fecha']?></td>
  <td><?php echo $mostrar['hora_en']?></td>
  <td><?php echo $mostrar['hora_sa']?></td>
   <td><?php echo $mostrar['codigou']?></td>
<td><?php echo $mostrar['espacio']?></td>
<?php
}
?>
</table>
  <?php
  echo"PERSONAS REGISTRADAS:   TOTALES "; echo mysqli_num_rows($resultados);
   ?>  
</form>



<!--///AQUI TERMINA EL FORMATO PARA MOSTRAR TODAS LAS PERSONAS EXTERNAS (internas) QUE HAN INGRESADO A LA UDEC/////-->






<!--//////////AQUI INICIAMOS CON EL CREACCION DEL FORMCULARIO DE ingrreso de personas internas a la udec/////////////////////-->

<form class ="p-internas" method="POST" action= entorno-administrador-estadisticas.php>
      <h1>BOTON PARA BUSCAR INGRESO DE PERSONAS INTERNAS</h1>
       <br><br>
 

<input type="submit"value="CONSULTAR"class="btn btn-primary"name="btn_consul"> 

<table>
<tr>
<td><label for="fecha"><p>FECHA</p></label></td>
<td><input type="text" name="fecha" class="form-control" id="fecha" placeholder="Escribe la fecha"></td>

</tr>
</table>

</form>





<form class="tablapertenecen">
  <h1>TABLA PARA BUSQUEDA POR FECHA INTERNAS<h1>
    <br><br>
 
<table>
  <tr>
<td>NUMERO DE INGRESO</td>
<td>FECHA</td>
<td>HORA ENTRADA</td>
<td>HORA SALIDA </td>
<td>CODIGO U</td>
<td>ESPACIO</td>
  </tr>
  <?php

if (isset($_POST['btn_consul']))
{
  include("abrir_conexion.php");
  $existe=0;
  $fecha = $_POST['fecha'];
 
  $resultados = mysqli_query($conexion,"SELECT * FROM ingreso WHERE fecha ='$fecha'");
  while ($mostrar=mysqli_fetch_array($resultados))

   {
     ?>
  <tr>
    <td><?php echo $mostrar ['num_ingreso']?></td>
    <td><?php echo $mostrar ['fecha'] ?></td>
    <td><?php echo $mostrar ['hora_en'] ?></td>
    <td><?php echo $mostrar ['hora_sa'] ?></td>
    <td><?php echo $mostrar ['codigou'] ?></td>
    <td><?php echo $mostrar ['espacio']. 
    $existe++;
    ?></td>
                
  </tr>
 
<?php

 }

?>

<?php
 }
?>

</table>
</form>






</section>








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