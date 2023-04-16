<html lang="en">
    <head>

 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      

 <link rel="stylesheet" type="text/css" href="../codigo_css2/modelado_login_guarda_salida.css">

    
    </head>
    <meta charset="UTF-8">
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
 

 <!--///////////////////////////////////////////////////AQUI GENERAMOS NUESTRAS IMAGENES MOVIBLES///////////////////////////////////////-->
 <div class="slider">       
        <ul> 
        <li><img src="../fotosUdec/udec1.jpg"alt=""height="503"><p></p></li>
        <li><img src="../fotosUdec/udec2.jpg"alt=""height="503px"></li>
        <li><img src="../fotosUdec/udec3.jpg"alt=""height="503px"></li>
        <li><img src="../fotosUdec/udec4.jpg"alt="" height="503px" width="100%"></li>
        </ul>
        </div>
<!--/////////////////////////////////////////////////////////////AQUI TERMINAMAS AMAGENES MOVILES////////////////////////////////////////////-->


 <!--////////////////////////////////////////////////////AQUI GENERAMOS NUESTRO FORMULARIO ADMIN///////////////////////////////////////-->




<form class="form-inline" method="POST" action="guardaS.php" name="login2">

 <div class="form-group">
    
<h1>LOGIN SALIDA</h1>
 <img src="../fotosUdec/login.png"width="100mm"></img>  
        
 
<label for="usser">USUARIO</label>
<input type="text"class="form-control" id="usser" placeholder="Escribe tu Usuaio" name="usser">

<label for="pass">CONTRASEÑA</label>
 <input type="password" class="form-control" id="pass" placeholder="Contraseña" name="pass"> 

<label for="zona">ZONA</label>
 <input type="text" class="form-control" id="zona" placeholder="zona" name="zona"> 

<p><input type="submit" id="enviar" class="btn btn-success" value="INICIAR SESIÓN" name="btn_index">




</select
  
  
  <p class="danger"align="center">

        <b>
            <?php
            session_start();
            ob_start();
                if(isset($_SESSION['sesion_exito']))
                {
                    if($_SESSION['sesion_exito']==2)
                        {
                            echo "COMPLETA LOS CAMPOS";
                        }
                    if($_SESSION['sesion_exito']==3)
                        {
                            echo "DATOS INCORRECTOS";
                        }
                }
                else
                {
                    $_SESSION['sesion_exito']=0;
                }
                
            ?>
        </b>

         <h3>    
      
        <p class="bg-success" align="center">
        <b>
            <?php
                if($_SESSION['sesion_exito']==4)
                    {echo "GRACIAS POR USAR NUESTROS SERVICIOS";}
                $_SESSION['sesion_exito']=0; //Despues de confirmar el error, igualo lo variable a 0
            ?>
        </b>
        </p>
    </h3>
  

</div>
</form>

<!--/////////////////////////////////////////////////////////////AQUI TERMINA NUESTRO FORMULARIO///////////////////////////////////////-->


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
                          <a > laura@gmail.com</a>]
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
    </body>



</html>