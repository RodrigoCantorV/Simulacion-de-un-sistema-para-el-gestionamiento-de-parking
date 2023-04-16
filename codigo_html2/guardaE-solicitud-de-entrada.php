<html lang="en">
    <head>
        <meta charset="UTF-8">
<link rel="stylesheet"href="style.css"
<meta name ="viewport"content="width=device-width,user-scalable=no,initial-scale=1.0,maximun-scale=1.0,minimun-scale=1.0">

<link rel="stylesheet" type="text/css" href="../codigo_css2/guardaE-solicitud-de-entrada.css">

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

      if($usser=="" || $pass==""|| $zona<>"ENTRADA")
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
      header('Location:login_guarda_entrada.php');
    }
  ?>


<!-- AQUI TERMINA NUESTRO CODIGO PARA ENTRAR A LA PLATAFORMA DEL GUARDA (OJO SE TUVO PRIMERO QUE HABER CREALO EL LOGIN)///////////////////////////-->  








<!--AQUI CREACMOS NUESTRO PANEL LATERAL IZQUIERDO DONDE VIAJAREMOS POR TODAS LAS ACCIONES QUE PUEDE HACER NUESTRO GUARDA DE ENTRADA-->

<section class="menu">
  <ul>
<a href="guardaE.php">REGISTRO DE PERSONAS EXTERNAS </a>
<a href="guardaE-solicitud-de-entrada.php">SOLICITUD DE ENTRADA</a>
<a href="guardaE-solicitud-de-personas-externas.php">INGRESO DE PERSONAS EXTERNAS</a>
<a href="guardaE-solicitud-de-personas-internas.php">INGRESO DE PERSONAS INTERNAS</a>
 <a class="btn btn btn-danger" href="cerrar_sesion.php" role="button">CERRAR SESIÓN</a>

  </ul>
</section>

<!--FINN  AQUI CREACMOS NUESTRO PANEL LATERAL IZQUIERDO DONDE VIAJAREMOS POR TODAS LAS ACCIONES QUE PUEDE HACER NUESTRO GUARDA DE ENTRADA-->



<!--///////////////////////DENTRO DE ESTA SECCION FORMATO COLOCAREMOS TODA LA INFORMACION QUE NECESITEMOS//////////////////////////////-->

<section class ="formato">
 






<!--//////////AQUI INICIAMOS CON EL CREACCION DEL FORMCULARIO DE REGISTRO DE LAS PERSONAS QUE NO SON DE LA UNIVERSIDAD/////////////////////-->

<form class ="perso_afue" method="POST" action= guardaE-solicitud-de-entrada.php>
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








<!--//////////AQUI INICIAMOS CON EL CREACCION DEL FORMCULARIO DE REGISTRO NUMERO DE SOLICITUD/////////////////////-->

<form class ="num_solicitud" method="POST" action=guardaE-solicitud-de-entrada.php>
<h1>REGISTRO DE NUMERO DE SOLICITUD</h1>                                
<input type="submit"value="REGISTRAR"class="btn btn-primary"name="btn_registrarsolicitud">  
<br><br>
<table>
<tr>
<td><label for="fecha"><p>FECHA</p></label></td>
<td><input type="text" name="fecha" class="form-control" id="fecha" placeholder="Escribe la fecha"></td>

<td><label for="hora_ini"><p>HORA_INI</p></label></td>
<td><input type="text" name="hora_ini" class="form-control" id="hora_ini" placeholder="Escribe la hora inicial"></td>

<td><label for="identificacion"><p>IDENTIFICACION<p></label></td>
<td><select name="identificacion" id="identificaion">
<option >IDENTIFICACION</option>
<?php
 include("abrir_conexion");
$resultados = mysqli_query($conexion,"SELECT * FROM perso_afue");
while($fila =$resultados->fetch_array()){
echo"<option value='".$fila['identificacion']."'>".$fila['nombre']."_".$fila['apellido']."</option>";
}
?>

<td><label for="codigo"><p>CODIGO_UDEC<p></label></td>
<td><select name="codigo" id="codigo">
<option value="">SELECCIONE EL CODIGO</option>
<?php
 include("abrir_conexion"); 
$resultados = mysqli_query($conexion,"SELECT * FROM udec_cod  WHERE estado='INACTIVO'");
while($fila =$resultados->fetch_array()){
echo"<option value='".$fila['codigo']."'>".$fila['codigo']."</option>";
 }

?>


</select>
</td>
    
</tr>
</table>





<!--//////////INICIO DE BOTON PARA REGISTRAR EL NUMERO DE SOLICITUDES RECLAMADAS///////////////-->

<?php
 include("abrir_conexion.php");
  $solicitud = $_POST['solicitud'];
  $fecha = $_POST['fecha'];
  $hora_ini = $_POST['hora_ini'];
  $hora_fin = $_POST['hora_fin'];
  $identificacion = $_POST['identificacion'];
  $codigo = $_POST['codigo'];

if (isset($_POST['btn_registrarsolicitud']))
{ 
if ($identificacion=="IDENTIFICACION"){
echo "LOS CAMPOS SON OBLIGATORIOS";
}
else{
   mysqli_query($conexion, "INSERT INTO num_solicitud (solicitud,fecha,hora_ini,hora_fin,identificacion,codigo) values ('$solicitud','$fecha','$hora_ini','$hora_fin','$identificacion','$codigo')"); 
}
 
    
}
 ?>

<!--//////////FIN DE BOTON PARA REGISTRAR EL NUMERO DE SOLICITUDES RECLAMADAS///////////////-->






</form>



<!--////////////////////AQUI TERMINA LA CREACCION DEL FORMCULARIO DE NUMERO DE SOLICITUD//////////////////////////-->







<!--////////////////////INICIO TABBLA PARA MOSTRAR LOS NUMEROS DE SOLICITUDES RECLAMADAS/////////////////////////////-->


<form class="muestra_solicitud">
<h1>TABLA DE NUMERO DE SOLICITUDES RECLAMADAS</h1>
<br>
<table>
<tr>
<td>SOLICITUD </td>
<td>FECHA</td>
<td>HORA INICIAL</td>
<td>HORA FINAL</td>
<td>IDENTIFIACACION</td>
<td>CODIGO</td>
</tr>
<?php
include("abrir_conexion");
$resultados = mysqli_query($conexion,"SELECT * FROM num_solicitud");
while($mostrar=mysqli_fetch_array($resultados)){

  ?>
<tr>
  <td><?php echo $mostrar['solicitud']?></td>
  <td><?php echo $mostrar['fecha']?></td>
  <td><?php echo $mostrar['hora_ini']?></td>
  <td><?php echo $mostrar['hora_fin']?></td>
  <td><?php echo $mostrar['identificacion']?></td>
  <td><?php echo $mostrar['codigo']?></td>
  
<?php
}
?>
</table>
</form>


<!--////////////////////FIN TABBLA PARA MOSTRAR LOS NUMEROS DE SOLICITUDES RECLAMADAS/////////////////////////////-->








<!--////////////////////INICIO TABBLA PARA MOSTRAR LOS CODIGOS DE LA UDEC DISPONIBLES/////////////////////////////-->
<form>
<div class="tablacodigoactivo">
<form>
<h1>TABLA DE INFORMACION DE CODIGOS EN USO</h1>
<table>
<tr>
<td>CODIGO </td>
<td>ACTIVO</td>
</tr>
<?php
include("abrir_conexion");
$resultados = mysqli_query($conexion,"SELECT * FROM udec_cod WHERE estado='ACTIVO'");
while($mostrar=mysqli_fetch_array($resultados)){

  ?>

<tr>
  <td><?php echo $mostrar['codigo']?></td>
  <td><?php echo $mostrar['estado']?></td>

  
<?php
}
?>
</table>
</form>
</div>
</form>

<!--////////////////////FIN TABBLA PARA MOSTRAR LOS CODIGOS DE LA UDEC DISPONIBLES/////////////////////////////-->









<!--////////////////////INICIO TABBLA PARA MOSTRAR LOS CODIGOS DE LA UDEC NO DISPONIBLES/////////////////////////////-->
<form>
<div class="tablacodigoinactivo">
<form>
<h1>TABLA DE INFORMACION DE CODIGOS DISPONIBLES<h1>
<table>
<tr>
<td>CODIGO </td>
<td>ACTIVO</td>
</tr>
<?php
include("abrir_conexion");
$resultados = mysqli_query($conexion,"SELECT * FROM udec_cod WHERE estado='INACTIVO'");
while($mostrar=mysqli_fetch_array($resultados)){

  ?>

<tr>
  <td><?php echo $mostrar['codigo']?></td>
  <td><?php echo $mostrar['estado']?></td>

  
<?php
}
?>
</table>
</form>
</div>
</form>

<!--////////////////////FIN TABBLA PARA MOSTRAR LOS CODIGOS DE LA UDEC  NO DISPONIBLES/////////////////////////////-->







<!-- INICIO DE FORMULARIO DE BOTON PARA MODIFICAR LOS ESTADOS DE LOS CODIGOS-->


<form class ="datos" method="POST" action=guardaE-solicitud-de-entrada.php>
                                
<input type="submit" value="ACTUALIZAR"  class="btn btn-primary"   name="btn_modificarcod">
<table>
<tr>
<td><label for="codigo"><p>CODIGO</p></label></td>
<td><input type="text" name="codigo" class="form-control" id="codigo" placeholder="Escribe el codigo"></td>

<td><label for="estado"><p>ESTADO<p></label></td>
<td><select name="estado">
<option >ESTADO</option>
<option value="ACTIVO">ACTIVO</option>

</select></td>

</tr>

</table>

</form>


<!-- FIN DEL FORMULARIO PARA EL BOTON <DEL></DEL> MODIFICAR LOS ESTADOS DE LOS CODIGOS-->




<!--INICIO DEL BOTON MODIFICAR ESTADO DEL CODIGO-->

<?php
  include("abrir_conexion.php");
if(isset($_POST['btn_modificarcod']))
{

$codigo= $_POST ['codigo'];

$estado= $_POST ['estado'];

if($codigo=="")
{
  echo "LOS COMAPOS SON OBLIGATORIOS";
}
else
{
//ACTUALICESE
$conexion->query("UPDATE udec_cod SET  codigo='$codigo',estado='$estado' WHERE codigo='$codigo'"); 
mysqli_query($conexion); 

}
}

?>

<!--FIN DEL ESTADO DEL BOTON PARA MODIFICAR EL ESTADO DE LA UDEC-->
















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