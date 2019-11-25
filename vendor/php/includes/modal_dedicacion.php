 <!-- Modal -->
 <div class="modal fade" id="modalDedicacion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modificar dedicación</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="vendor/php/add_dedicacion.php" method="POST" >
            <div class="form-row">
                <div class="form-group col-md-3">
                  <label for="inputDedicacion">Dedicacion</label>
                  <input type="number" min="1" max="100" class="form-control" name="dedicacion" id="inputEmail4" placeholder="0 al 100" requerid>
                </div>
                <div class="form-group date form_datetime col-md-9 col-sm-9">
                    <label class="control-label" for="datetimepicker-default">Fecha</label>
                    <input type='text' class="form-control" id='datetimepicker1' name="fecha" placeholder="Ingresar fecha.."required />
                </div>
            </div>
          </div>
        <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Aceptar</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
        </form>
      </div>
    </div>
  </div>
</div>