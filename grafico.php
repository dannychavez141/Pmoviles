<html>
<?php error_reporting(0);
 include_once'./menu.php'; 
 ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
<!--      <h1>
        Page Header
        <small>Optional description</small>
      </h1>-->
<!--      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>-->
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
<?php
//index.php
$connect = mysqli_connect("localhost", "root", "", "sensores");
$query = 'SELECT * FROM valores v,valores1 v1,valores2 v2 order by v.tiempo limit 1';
$result = mysqli_query($connect, $query);
while($row = mysqli_fetch_array($result))
{$mon=$row[1];
  $dio=$row[5];
  $met=$row[8];
 $peligro="#FF0000";
 $ok="#F0FF00";
 $normal="#08FF00";
 $txpeligro="PELIGRO";
 $txok="ACEPTABLE";
 $txnormal="NORMAL";
if ($mon<500) {
  $color1=$normal;
  $msj1=$txnormal;
}else if ($mon>=500 && $mon<900) {
  $color1=$ok;
  $msj1=$txok;
} else if ($mon>=900) {
  $color1=$peligro;
  $msj1=$txpeligro;
}
if ($dio<500) {
  $color2=$normal;
  $msj2=$txnormal;
}else if ($dio>=500 && $dio<1200) {
  $color2=$ok;
  $msj2=$txok;
} else if ($dio>=1200) {
  $color2=$peligro;
  $msj2=$txpeligro;
}
if ($met<500) {
  $color3=$normal;
  $msj3=$txnormal;
}else if ($met>=500 && $met<1100) {
  $color3=$ok;
  $msj3=$txok;
} else if ($met>=1200) {
  $color3=$peligro;
  $msj3=$txpeligro;
}
?>
      <table  class="table" border="4">
        <?php  ?>
        <tr align="center"><td bgcolor="#F3751E">ESTADO:</td><td bgcolor=" <?php echo $color1;?>" ><?php echo $msj1;?></td><td bgcolor=" <?php echo $color2;?>" ><?php echo $msj2;?></td><td bgcolor=" <?php echo $color3;?>"><?php echo $msj3;?></td>
        </tr><tr bgcolor="#21D5C5" align="center"><td bgcolor="#F3751E">VALOR:</td><td><?php echo $mon; ?></td><td><?php echo $dio; ?></td><td><?php echo $met; ?></td></tr>
        <tr bgcolor="#21D5C5" align="center"><td bgcolor="#F3751E">GAS:</td><td>MONOXIDO DE CARBONO</td><td>DIOXIDO DE CARBONO</td><td>METANO</td></tr>
      </table>
      <?php } ?>
        
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


<!-- REQUIRED JS SCRIPTS -->

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