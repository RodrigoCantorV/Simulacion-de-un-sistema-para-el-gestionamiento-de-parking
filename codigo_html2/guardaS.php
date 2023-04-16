<html lang="en">
    <head>
        <meta charset="UTF-8">
<link rel="stylesheet"href="style.css"
<meta name ="viewport"content="width=device-width,user-scalable=no,initial-scale=1.0,maximun-scale=1.0,minimun-scale=1.0">

<link rel="stylesheet" type="text/css" href="../codigo_css2/modelado_guarda_salida-b.css">

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
                      

              <li><a href="entorno-login-administrador.php">ADMINISTRADOR</a></li>
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



<!-- CODIGO PARA ENTRAR A LA PLATAFORMA DEL GUARDA DE ENTRADA (OJO SE TUVO PRIMERO QUE HABER CREALO EL LOGIN)///////////////////////////-->  
<?php
    session_start();
    ob_start();

    if(isset($_POST['btn_index']))//Verifico que el boton "iniciar sesion" fue oprimido
    {
      $_SESSION['sesion_exito']=0;

      $usser = $_POST['usser'];
      $pass = $_POST['pass'];
      $zona = $_POST['zona'];

      if($usser=="" || $pass==""|| $zona<>"SALIDA")
      {
        $_SESSION['sesion_exito']=2;//2 sera error de campos vacios
      }
      else
      {
        include("abrir_conexion.php");  
        $_SESSION['sesion_exito']=3;//3 Datos Incorrectos
        $resultados = mysqli_query($conexion,"SELECT * FROM guarda WHERE usser = '$usser' AND pass = '$pass'AND zona ='$zona'");
        while($consulta = mysqli_fetch_array($resultados))
            {
               $_SESSION['sesion_exito']=1;//Inicio Sesion :D
            }
        include("cerrar_conexion.php");
      }
    }

    if($_SESSION['sesion_exito']<>1)
    {
      header('Location:login_guarda_salida.php');
    }
  ?>


<!-- AQUI TERMINA NUESTRO CODIGO PARA ENTRAR A LA PLATAFORMA DEL GUARDA (OJO SE TUVO PRIMERO QUE HABER CREALO EL LOGIN)///////////////////////////-->  








<!--AQUI CREACMOS NUESTRO PANEL LATERAL IZQUIERDO DONDE VIAJAREMOS POR TODAS LAS ACCIONES QUE PUEDE HACER NUESTRO GUARDA DE ENTRADA-->

<section class="menu">
  <ul>
<a href="guardaS.php">REGISTRO DE PERSONAS EXTERNAS </a>
<a href="guardaS-solicitud-de-entrada.php">SOLICITUD DE ENTRADA</a>
<a href="guardaS-solicitud-de-personas-externas.php">INGRESO DE PERSONAS EXTERNAS</a>
<a href="guardaS-solicitud-de-personas-internas.php">INGRESO DE PERSONAS INTERNAS</a>
 <a class="btn btn btn-danger" href="cerrar_sesion.php" role="button">CERRAR SESIÓN</a>

  </ul>
</section>

<!--FINN  AQUI CREACMOS NUESTRO PANEL LATERAL IZQUIERDO DONDE VIAJAREMOS POR TODAS LAS ACCIONES QUE PUEDE HACER NUESTRO GUARDA DE ENTRADA-->



<!--///////////////////////DENTRO DE ESTA SECCION FORMATO COLOCAREMOS TODA LA INFORMACION QUE NECESITEMOS//////////////////////////////-->

<section class ="formato">
 






<!--//////////AQUI INICIAMOS CON EL CREACCION DEL FORMCULARIO DE REGISTRO DE LAS PERSONAS QUE NO SON DE LA UNIVERSIDAD/////////////////////-->

<form class ="perso_afue" method="POST" action= guardaS.php>
<h1>REGISTRO DE PERSONAS EXTERNAS A LA UNIVERSIDAD</h1>                         
<table>
<tr>

<td> <input type="submit"value="CONSULTAR"class="btn btn-primary"name="btn_consult"> </td>

</tr>

<tr>
<td><label for="identificacion"><p>IDENTIFICACION</p></label></td>
<td><label for="nombre"><p>NOMBRE</p></label></td>
<td><label for="apellido"><p>APELLIDO</p></label></td>
</tr>
<tr>
<td><input type="text" name="identificacion" class="form-control" id="identificacion" placeholder="Escribe la identificacion"></td>
<td><input type="text" name="nombre" class="form-control" id="nombre" placeholder="Escribe el Codigo"></td>
<td><input type="text" name="apellido" class="form-control" id="apellido" placeholder="Escribe el Apellido"></td>
</tr>



</table>
</form>

<!--////////////////////AQUI TERMINA LA CREACCION DEL FORMCULARIO LAS PERSONAS EXTERNAS A LA UDEC//////////////////////////-->








<!--///////INICIO DE LA TABLA PARA LA CONSULTA GENERAL DEL LAS PERSONAS EXTERNAS A LA UDEC (CONSULTA)/////////////////-->


<form class="consulta">
<h1>TABLA DE INFORMACION PERSONAS REGISTRADOS</h1>
<table>
<tr>
<td>IDENTIFICACION</td>
<td>NOMBRE</td>
<td>APELLIDO</td>
</tr>
<?php
include("abrir_conexion.php");
$resultados = mysqli_query($conexion,"SELECT * FROM perso_afue");
while($mostrar=mysqli_fetch_array($resultados)){

  ?>
<tr>
  <td><?php echo $mostrar['identificacion']?></td>
  <td><?php echo $mostrar['nombre']?></td>
  <td><?php echo $mostrar['apellido']?></td>

</tr>
<?php
}
?>



</table>
  <?php
  echo"PERSONAS REGISTRADAS:   TOTALES "; echo mysqli_num_rows($resultados);
   ?>  
</form>


<!--///////FIN DE LA TABLA PARA LA CONSULTA GENERAL DEL LAS PERSONAS EXTERNAS A LA UDEC (CONSULTA)/////////////////-->









<!--///INICIO DEL FORMULARIO PARA QUE ATRVEZ DEL BOTON  CONSULTAR BUSCAR LA INFORMACION DE LAS PERSONAS EXTERNAS REGISTRADAS (CONSULTA)///////-->


<form class="deco">
<table class="p_afue">
  <h1>CONSULTA DE DOCUMENTO ESPECIFICO</h1>
  <br>
  <tr>
<td>identificacion</td>
<td>nombre</td>
<td>apellido</td>

  </tr>
  <?php

if (isset($_POST['btn_consult']))                                                                                   
{
  include("abrir_conexion");
  $existe=0;
  $identificacion = $_POST['identificacion'];
 
  $resultados = mysqli_query($conexion,"SELECT * FROM perso_afue WHERE identificacion ='$identificacion'");
  while ($mostrar=mysqli_fetch_array($resultados))

   {
     ?>
  <tr>
    <td><?php echo $mostrar ['identificacion']?></td>
    <td><?php echo $mostrar ['nombre'] ?></td>
    <td><?php echo $mostrar ['apellido'].
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
</table>
</form>


<!--///INICIO DEL FORMULARIO PARA QUE ATRVEZ DEL BOTON  CONSULTAR BUSCAR LA INFORMACION DE LAS PERSONAS EXTERNAS REGISTRADAS (CONSULTA)///////-->






<!--////////////////////// INICIO DEL BOTON PARA REGISTRO DE LAS PERSONAS QUE NO SON DE LA UNIVERSIDAD///////////////////////////////////-->

    <?php
if (isset($_POST['btn_regis']))
{
  include("abrir_conexion.php");

  $identificacion = $_POST['identificacion'];
  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];

 
      //INSERTAR
  mysqli_query($conexion, "INSERT INTO perso_afue (identificacion,nombre,apellido) values ('$identificacion','$nombre','$apellido')"); 
     include("cerrar_conexion.php");
}
 ?>

<!--////////////////////// FIN DEL BOTON PARA REGISTRO DE LAS PERSONAS///////////////////////////////////-->






















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
