<?php
require ('../conexion.php');
$getUsuario= $_POST["x"];
$query_usuario= mysqli_query($enlace, "SELECT u.usuariominusculas, d.dedicacion, DATE_FORMAT(d.fecha,'%m/%Y') as fecha_dedicacion FROM usuarios u
                                        INNER JOIN dedicaciones d ON d.usuario=u.usuariominusculas
                                        WHERE usuariominusculas='$getUsuario'
                                        ORDER BY d.fecha DESC
                                        LIMIT 12");
  $sumador = 0;                           
foreach($query_usuario AS $row){
    $usuario = $row['usuariominusculas'];
    $dedicacion = $row['dedicacion'];
    $fecha_dedicacion = $row['fecha_dedicacion'];
}?>
<!-- Modal -->
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modificar o agregar dedicación</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="vendor/php/add_dedicacion.php" method="POST" id="searchForm">
          <div class="form-row">
              <input type="hidden" name="usuario" value="<?php echo $usuario  ?>"/>
              <div class="form-group col-md-3">
                <label for="inputDedicacion">Dedicacion</label>
                <input type="number" min="1" max="100" class="form-control" name="dedicacion" id="inputEmail4" placeholder="0 al 100" requerid/>
              </div>
              <div class="form-group date form_datetime col-md-9 col-sm-9">
                  <label class="control-label" for="datetimepicker-default">Fecha</label>
                  <input type='text' class="form-control" id='datetimepicker1' name="fecha" placeholder="Ingrese el mes y año" required/>
              </div>
          </div>
          <div class="table-responsive">
              <table class="table table-sm">
                <thead>
                  <tr>
                      <th>#</th>
                      <th>Usuario</th>
                      <th>%</th>
                      <th>Fecha</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($query_usuario AS $row){ 
                  ?>
                  <tr>
                    <td><?php echo ++$sumador ?></td>
                    <td><?php echo $row['usuariominusculas']; ?></td>
                    <td><?php echo $row['dedicacion']; ?></td>
                    <td><?php echo $row['fecha_dedicacion']; ?></td>
                  </tr>
                  <?php }?>   
                </tbody>
              </table>
            </div>
      </div>
      <div class="modal-footer">
        <button onclick="form_submit()" class="btn btn-primary">Aceptar</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
      </div>
      </form>  
    </div>
  </div>
  <script type="text/javascript">
  $(function () {
                $('#datetimepicker1').datetimepicker({
                    timeZone:'UTC -3',
                    format:'MM/YYYY',
                    icons: {time:'far fa-clock'}
                    
                });
            });
            function form_submit() {
              document.getElementById("searchForm").submit();
            } 
  </script>