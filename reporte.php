<html>
<?php error_reporting(0);
 include_once'./menu.php'; 
 $cbosensor=$_POST['cbosensor'];
$btnfecha=$_POST['btnfecha'];
$btnHora1=$_POST['btnHora1'];
$btnHora2=$_POST['btnHora2'];
date_default_timezone_set('America/Lima'); 
 ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <center><h1>
        REPORTE DE DATOS CAPTADOS POR LOS SENSORES
        <small></small>
            </h1></center>
<!--      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>-->
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <?php
      ?>
        <center>
       <h2>LISTADO DE SENSORES</h2>
        <form action="reporte.php" method="POST"  >
         <table>
                <tr>
                    <td>Seleccione sensor :</td>
                    <td><select name="cbosensor">
<option value="valores">Monoxido de carbono</option>
<option value="valores1">Dioxido de carbono</option>
<option value="valores2">Amoniaco</option>
                               
                        </select></td>
                        
                        
</table>
            <table>
                <tr>
                    <td>Seleccionar Fecha :</td><td><input type="date" name="btnfecha" value="<?php //echo date("Y-m-d");?>"></td>
                    
                </tr>
                <tr>
                    <td>Seleccionar hora Inicio :</td><td><input type="time" name="btnHora1" value="<?php //echo date("H:i:s");?>"></td>
                </tr>
 <tr>
                    <td>Seleccionar hora Final :</td><td><input type="time" name="btnHora2" value="<?php //echo date("H:i:s");?>"></td>
                </tr>
            </table>
            <td><input type="submit" value="Mostrar" name="btnenviar" /></td>
                           </form> 
                            </center>   
                
        <center>
        <table border="2" width="300">
          <tr><td colspan="3"><a href="pdfrgas.php?cbosensor=<?php echo $cbosensor;?>&&btnfecha=<?php echo $btnfecha;?>&&btnHora1=<?php echo $btnHora1;?>&&btnHora2=<?php echo $btnHora2;?>" target="_blank"><input type="buttom" name="btnDescargar" value="Descargar Reporte"></a></td></tr>
            <tr>
                <td>N°</td>
                 <td>Valor</td>
                  <td>Fecha y hora</td>
                 
            </tr>
             </tr>
           <?php
           $conex= new mysqli("localhost","root","","sensores");
           if ($btnfecha==null && $btnHora1==null && $btnHora2==null) {
          $resultado = $conex->query("Select * from $cbosensor  order by tiempo desc limit 100");
           } else if ($btnHora1==null && $btnHora2==null) {
          $resultado = $conex->query("Select * from $cbosensor where tiempo like '%$btnfecha%' order by tiempo desc limit 100");
           } else{$resultado = $conex->query("Select * from $cbosensor where tiempo >='".$btnfecha." ".$btnHora1."'  and tiempo <='".$btnfecha." ".$btnHora2."' order by tiempo desc limit 100");}

           
            while ($row1 = $resultado->fetch_array()) {

           ?>
                <tr>
                    <td><?php echo $row1['id']; ?></td>
                    <td><?php echo $row1['valor']; ?></td>
                    <td><?php echo $row1['tiempo']; ?></td>
                  
                </tr>
              <?php
            }
              ?>
                
            
          </center>
              
        </table>
         
    </section>
  
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
<!--      Anything you want-->
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2019 <a href="#">Sistema de Monitoreo</a>.</strong> Todos los derechos reservados.
  </footer>

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>
