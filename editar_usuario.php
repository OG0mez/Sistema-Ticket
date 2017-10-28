<?php require_once("class/class.php");


if (isset($_SESSION["session_tickets"])) {

$nomses='';
$tra=new trabajo();

$nom=$tra->get_datos_usuario($_SESSION["session_tickets"]);
$nomses=$nom[0]['NOMBRES'].' '.$nom[0]['APELLIDOS'];
$coduser=$nom[0]['COD_USUARIO'];

//cerrar sesion cuando este vencida
$fecahInicio=$_SESSION["ultima_conexion"];
  $ahora=date("Y-n-j H:i:s");   
  $duracion = (strtotime($ahora)-strtotime($fecahInicio));

  if ($duracion >=300) {
    session_destroy();
    header("Location: login.php");
  }else{

    $_SESSION["ultima_conexion"]=$ahora;
  }

require_once("template/header.php") ;


$tra=new trabajo();
if ($_GET['idp'] !='') {
  # code...
  $prt=$tra->get_datos_usuario($_GET['idp']);
}else {
  header("Location: usuarios.php");
  }

?>
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
             <?php require_once("template/menu.php") ?>
          </div>
      </aside>
      <!--sidebar end-->

      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              <!--state overview start-->
              <div class="row state-overview">
                  
                 
                  
                  
              </div>
              <!--state overview end-->

              <div class="row">
                  

                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading"><font><font>
                             Edicion de usuario
                          </font></font></header>
                          <div class="panel-body">
                              <form class="form-horizontal" name="formprod" id="formprod" action="inter_accion.php" method="post" >
                                  
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label"><font><font>Nombres</font></font></label>
                                       <div class="col-sm-10">
                                          <input type="text" name="nombre" id="nombre" class="form-control" value="<?=$prt[0]['NOMBRES']?>" required></input>
                                             
                                      </div>
                                  </div>
                                   <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label"><font><font>Apellidos</font></font></label>
                                      <div class="col-sm-10">
                                          <input type="text" name="apellido" id="apellido" class="form-control" value="<?=$prt[0]['APELLIDOS']?>" required>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label"><font><font>E-mail</font></font></label>
                                      <div class="col-sm-10">
                                          <input type="text" name="email" id="email" class="form-control" value="<?=$prt[0]['CORREO']?>" required>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label"><font><font>Telefono</font></font></label>
                                      <div class="col-sm-10">
                                          <input type="text" name="telefono" id="telefono" class="form-control" value="<?=$prt[0]['TELEFONO']?>" required>
                                      </div>
                                  </div>

                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label"><font><font>Perfil</font></font></label>
                                      <div class="col-sm-10">
                                        <select name="perfil" id="perfil" class="form-control m-bot15" required>
                                               <option value="<?=$prt[0]['PERFIL']?>" selected><font><font>Supervisor</font></font></option>
                                              <option value=""><font><font>Elegir...</font></font></option>
                                              <option value="ADMIN"><font><font>Administrador</font></font></option>
                                              <option value="SUP"><font><font>Supervisor</font></font></option>
                                              <option value="AGENT"><font><font>Agente</font></font></option>
                                          </select>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label"><font><font>Nombre usuario</font></font></label>
                                      <div class="col-sm-10">
                                          <input type="text" name="username" id="username" class="form-control" value="<?=$prt[0]['NOMBRE_USUARIO']?>" required>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label"><font><font>Password</font></font></label>
                                      <div class="col-sm-10">
                                          <input type="password" name="pass" id="pass" class="form-control" value="<?=$prt[0]['PASSWORD']?>" required>
                                          <input type="hidden" name="flagprod" id="flagprod" value="25">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label"><font><font>Estado usuario</font></font></label>
                                      <div class="col-sm-10">
                                          <input type="text" name="estado" id="estado" class="form-control" value="<?=$prt[0]['ESTADO']?>" required>
                                          <input type="hidden" name="iduss" id="iduss" value="<?=$_GET['idp']?>">
                                      </div>
                                  </div>
                                
                                  
                                  <div>
                                
                                  
                                   <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label"><font><font></font></font></label>
                                      <div class="col-sm-10">
                                         <button type="submit" class="btn btn-success">Guardar Edicion</button>
                                          <button type="button" class="btn btn-danger" onclick="reset()">Cancelar</button>

                                      </div>
                                  </div>
                                  
                                  
                              </form>
                          </div>
                      </section>
                     
                     
                    
                                     
                      

                     

                  </div>




                  <div class="col-lg-4">
                      <!--new earning start-->
                      
                      <!--new earning end-->

                      <!--total earning start-->
                     
                      <!--total earning end-->
                  </div>
              </div>
              <div class="row">
                  <div class="col-lg-4">

                      <!--user info table end-->
                  </div>

                      <!--weather statement end-->
                  </div>
              </div>

          </section>
      </section>


      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              2017 &copy; Programción 4-Virtual-01
          </div>
      </footer>
      <!--footer end-->
  </section>

      <!-- js placed at the end of the document so the pages load faster -->
      <script src="js/jquery.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script class="include" type="text/javascript" src="js/jquery.dcjqaccordion.2.7.js"></script>
      <script src="js/jquery.scrollTo.min.js"></script>
   
      <script src="js/jquery.customSelect.min.js" ></script>
      <script src="js/respond.min.js" ></script>

          <!--right slidebar-->
          <script src="js/slidebars.min.js"></script>

          <!--common script for all pages-->
          <script src="js/common-scripts.js"></script>

          <!--script for this page-->
         
         
          <script src="js/count.js"></script>
           <script src="js/advanced-form-components.js"></script>

  <script>

      //owl carousel

      $(document).ready(function() {
          $("#owl-demo").owlCarousel({
              navigation : true,
              slideSpeed : 300,
              paginationSpeed : 400,
              singleItem : true,
			  autoPlay:true

          });
      });

      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
<?php
}else
{
  echo "
  <script type='text/javascript'>
  alert('Debe loguearse primero para acceder a este contenido');
  window.location='login.php';
  </script>
  ";
}
?>
