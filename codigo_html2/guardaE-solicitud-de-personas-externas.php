<html lang="en">
    <head>
        <meta charset="UTF-8">
<link rel="stylesheet"href="style.css"
<meta name ="viewport"content="width=device-width,user-scalable=no,initial-scale=1.0,maximun-scale=1.0,minimun-scale=1.0">

<link rel="stylesheet" type="text/css" href="../codigo_css2/modelado-guardaE-solicitud-de-personas-externas-b.css">

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
 





<!--////////////////////INICIO TABBLA PARA MOSTRAR LOS ESTACIONAMIENTOS/////////////////////////////-->
<form class="muestra_estacionamientos">

<h1>TABLA DE INFORMACION ESTACIONAMIENTOS REGISTRADOS</h1>
<br>
<table>
<tr>
<td>ESPACIO </td>
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
   <td><?php echo $mostrar['espacio']?></td>
  <td><?php echo $mostrar['numero']?></td>
  <td><?php echo $mostrar['zona']?></td>
  <td><?php echo $mostrar['tipo']?></td>
  <td><?php echo $mostrar['discapacitado']?></td>
  <td><?php echo $mostrar['estado']?></td>
  
<?php
}
?>
</table>
</form>


<!--//////////////////////////FIN DE TABLA PARA MOSTRAR LOS ESTACIONAMIENTOS///////////////////////////////////-->







<!--//////////////////////////////INICIO DEL FORMATO PARA MODIFICAR ESTACIONAMIENTOS////////////////////////////////////////////////////-->



<form class="parquing" method="POST" action=guardaE-solicitud-de-personas-externas.php>
  <input type="submit"value="MODIFICAR"class="btn btn-warning"name="btn_modifi"> 
<h1>ESTADOS ESTACIONAMIENTOS</h1>
 <table>
<tr>
  <td>
<label for="zona"><p>ZONA<p></label>

<input type="text" name="zona" class="form-control" id="zona" placeholder="Escribe la zona deseada">
</td>
<td>
<label for="numero"><p>NUMERO<p></label>
<input type="text" name="numero" class="form-control" id="numero" placeholder="Escribe el campo deseado">

</td>
<td>
<label for="estado"><p>ESTADO</p></label>
<select name="estado">
<option value="">ESTADO </option>
<option value="ACTIVO">ACTIVO</option>

</select>
</td>
</table>




<!--/////////////////BOTON ACTUALIZAE EL ESTADO DEL ESTACIONAMIENTO/////////////////////////////////////////-->
<?php
  include("abrir_conexion.php");
if(isset($_POST['btn_modifi']))
{

$numero  = $_POST ['numero'];
$zona  = $_POST ['zona'];
$estado  = $_POST ['estado'];
if($numero==""&& $zona=="")
{
  echo "LOS COMAPOS SON OBLIGATORIOS";
}
else
{
//ACTUALICESE
$conexion->query("UPDATE estacionamiento SET estado='$estado' WHERE numero='$numero' AND zona='$zona'"); 
mysqli_query($conexion); 

}
}

?>
</form>

<!--/////////AQUI TERMINAN EL BOTON PARA ACTUALIZAR EL ESTADO DEL ESTACIONAMIENTO////////////////////////-->




</form>

<!--//////////////////////FIN DEL FORMULARIO PARA MOSTRAR ESTACIONAMIENTOS/////////////-->





<!--//////////AQUI INICIAMOS CON EL CREACCION DEL FORMCULARIO DE ingrreso de personas externas a la udec/////////////////////-->

<form class ="p-externas" method="POST" action=guardaE-solicitud-de-personas-externas.php>
                                
<input type="submit"value="REGISTRAR"class="btn btn-primary"name="btn_registrar"> 

<table>
<tr>


<td><label for="fecha"><p>FECHA</p></label></td>
<td><input type="text" name="fecha" class="form-control" id="fecha" placeholder="Escribe la fecha"></td>

<td><label for="hora_en"><p>HORA ENTRADA<p></label></td>
<td><input type="text" name="hora_en" class="form-control" id="hora_en" placeholder="Escribe la hora de entrada"></td>

</tr>
<tr>


  
<td><label for="solicitud"><p>SOLICITUD<p></label></td>
<td><select name="solicitud" id="solicitud">
<option value="">LA SOLICITUD</option>
<?php
 include("abrir_conexion.php");
$resultados = mysqli_query($conexion,"SELECT * FROM num_solicitud ");
while($fila =$resultados->fetch_array()){
echo"<option value='".$fila['solicitud']."'>".$fila['solicitud']."</option>";
}
?>


</select>
</td>
 

<td><label for="espacio"><p>ESTACIONAMIENTO<p></label></td>
<td><select name="espacio" id="espacio">
<option value="">SELECCIONAL EL ESTACIONAMIENTO</option>
<?php
 include("abrir_conexion.php");
$resultados = mysqli_query($conexion,"SELECT * FROM estacionamiento WHERE estado ='INACTIVO'");
while($fila =$resultados->fetch_array()){
echo"<option value='".$fila['espacio']."'>".$fila['espacio']."</option>";
}
?>


</select>
</td>
    
</tr>
</table>
<br>

<!--//////////INICIO DE BOTON PARA REGISTRAR EL INGRESO DE PERSONAS EXTERNAS A LA UDEC///////////////-->

<?php
  include("abrir_conexion.php");
$fecha = $_POST['fecha'];
  $hora_en = $_POST['hora_en'];
  $hora_sa = $_POST['hora_sa'];
  $solicitud = $_POST['solicitud'];
  $espacio = $_POST['espacio'];
if (isset($_POST['btn_registrar'])){


  if($solicitud==""){
   echo "LA SOLICITUD ES OBLIGATORIA";
  } else
  mysqli_query($conexion, "INSERT INTO ingreso (fecha,hora_en,hora_sa,solicitud,espacio) values ('$fecha','$hora_en','$hora_sa','$solicitud','$espacio')"); 
    
}

 ?>
<!--//////////FIN DE BOTON PARA REGISTRAR EL INGRESO DE PERSONAS EXTERNAS A LA UDEC///////////////-->






</form>



<!--////////////////////AQUI TERMINA LA CREACCION DEL FORMCULARIO DEl ingreso DE PERSONAS EXTERNAS A LA UDEC//////////////////////////-->








<!--///AQUI INICA EL FORMATO PARA MOSTRAR TODAS LAS PERSONAS EXTERNAS (internas) QUE HAN INGRESADO A LA UDEC/////-->

<form class="muestra_ingresos">

<h1>TABLA DE INFORMACION INGRESADOS</h1>
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
</form>





<!--///AQUI TERMINA EL FORMATO PARA MOSTRAR TODAS LAS PERSONAS EXTERNAS (internas) QUE HAN INGRESADO A LA UDEC/////-->






































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