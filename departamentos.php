<?php require_once("class/class.php");


if (isset($_SESSION["session_tickets"])) {

$nomses='';
$tra=new trabajo();
$prt=$tra->traer_deptos();


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
                  

                 <div class="col-sm-12">
              <section class="panel">
              <header class="panel-heading">
                  Departamentos
             <span class="tools pull-right">
                <a href="javascript:;" class="fa fa-chevron-down"></a>
                <a href="javascript:;" class="fa fa-times"></a>
             </span>
              </header>

              <div class="panel-body">
              <a href="ingresar_depto.php"><button type="button" class="btn btn-success"><i class="fa fa-cloud-upload"></i> Nuevo Departamento </button></a>
              <div class="adv-table">
              <div id="dynamic-table_wrapper" class="dataTables_wrapper form-inline" role="grid"><div class="row-fluid">

              </div>
              
              <table class="display table table-bordered table-striped dataTable" id="dynamic-table" aria-describedby="dynamic-table_info">
              <thead>
              <tr role="row">
              <th class="sorting" role="columnheader" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending" style="width: 100.778px;">Identificador</th>
              <th class="sorting" role="columnheader" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 278.778px;">Nombre</th>
              <th class="hidden-phone sorting" role="columnheader" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 93.778px;">Area</th>
              <th class="hidden-phone" rowspan="1" colspan="1"  style="width: 206.778px;">Acciones</th></tr>
              </thead>
              
              <tfoot>
              <tr><th rowspan="1" colspan="1">Identificador</th><th rowspan="1" colspan="1">Nombre</th><th rowspan="1" colspan="1">Area</th>
              <th class="hidden-phone" rowspan="1" colspan="1">Accion</th>

              </tr>
              </tfoot>
              <tbody role="alert" aria-live="polite" aria-relevant="all">
              <?php foreach ($prt as $key ) { ?>
                

              <tr class="gradeX odd">
                  <td class=" "> <?=$key['ID_DEPTO']?> </td>
                  <td class=" "><?=$key['NOMBRE']?></td>
                  <td class="center hidden-phone"><?=$key['AREA']?></td>
                 
                   <td class="">
                     <a href="editar_usuario.php?idp=<?=$key['ID_DEPTO']?>"><button type="button" class="btn btn-success btn-sm"><i class="fa fa-edit"></i><font><font class=""> Editar </font></font></button></a>
                     <a href="#"> <button type="button" class="btn btn-danger btn-sm" onclick="eliminar_depto(<?=$key['ID_DEPTO']?>);"><i class="fa fa-trash-o"></i><font><font class=""> Eliminar </font></font></button></a>
                   </td>
              </tr>
             <?php }
              ?>         
                 
               
             </tbody></table><div class="row-fluid"><div class="span6"></div><div class="span6"></div></div></div>
              </div>
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
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                  <div class="modal-dialog">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><font><font>×</font></font></button>
                                              <h4 class="modal-title"><font><font>modal Tittle</font></font></h4>
                                          </div>
                                          <div class="modal-body"><font><font>

                                              Cuerpo pasa aquí ...

                                          </font></font></div>
                                          <div class="modal-footer">
                                              <button data-dismiss="modal" class="btn btn-default" type="button"><font><font>Cerca</font></font></button>
                                              <button class="btn btn-success" type="button"><font><font>Guardar cambios</font></font></button>
                                          </div>
                                      </div>
                                  </div>
                              </div>


      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              2017 &copy; Programación 4 - Virtual-01
          </div>
      </footer>
      <!--footer end-->
  </section>

      <!-- js placed at the end of the document so the pages load faster -->
      <script src="js/jquery.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script class="include" type="text/javascript" src="js/jquery.dcjqaccordion.2.7.js"></script>
      <script src="js/jquery.scrollTo.min.js"></script>
      <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
      <script src="js/jquery.sparkline.js" type="text/javascript"></script>
      <script src="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
      
      <script type="text/javascript" language="javascript" src="assets/advanced-datatable/media/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="assets/data-tables/DT_bootstrap.js"></script>
     
      <script src="js/jquery.customSelect.min.js" ></script>
      <script src="js/respond.min.js" ></script>

          <!--right slidebar-->
          <script src="js/slidebars.min.js"></script>

          <!--common script for all pages-->
          <script src="js/common-scripts.js"></script>

          <!--script for this page-->
          
          <script src="js/count.js"></script>
           <script src="js/advanced-form-components.js"></script>

             <!--dynamic table initialization -->
    <script src="js/dynamic_table_init.js"></script>

  <script>
 
   function eliminar_depto (idusuario) {
     if (idusuario !='') {
      var answer = confirm("Deseas eliminar este usuario?");
      if (answer){
            window.location='inter_accion.php?flagprod=40&idusuario='+idusuario;
    }
    else{
       alert('No se ha elegido Usuario!.');
       return false; 
    }
     }else{
      alert('No se ha elegido Usuario!.');
      return false;
     }
   }
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
