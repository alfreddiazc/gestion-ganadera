 <?php  

if ($_GET['form']=='add') { ?> 

  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Registrar Tipo Vegetales
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=start"><i class="fa fa-home"></i> Inicio </a></li>
      <li><a href="?module=animales"> Ganado </a></li>
      <li class="active"> Tipo Vegetales </li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/tipo_vegetacion/proses.php?act=insert" method="POST">
            <div class="box-body">
              <?php  
    
              $query_id = mysqli_query($mysqli, "SELECT RIGHT(id,6) as id FROM vegetacion
                                                ORDER BY id DESC LIMIT 1")
                                                or die('error '.mysqli_error($mysqli));

              $count = mysqli_num_rows($query_id);

              if ($count <> 0) {
            
                  $data_id = mysqli_fetch_assoc($query_id);
                  $codigo    = $data_id['id']+1;
              } else {
                  $codigo = 1;
              }

              $buat_id   = str_pad($codigo, 6, "0", STR_PAD_LEFT);
              $codigo = "B$buat_id";
              ?>


              <div class="form-group">
                <label class="col-sm-2 control-label">Vegetacion</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="nombre" autocomplete="off" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Descripcion</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="observaciopn" autocomplete="off" required>
                </div>
              </div>

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Guardar">
                  <a href="?module=tipo_vegetacion" class="btn btn-default btn-reset">Cancelar</a>
                </div>
              </div>
            </div><!-- /.box footer -->
          </form>
        </div><!-- /.box -->
      </div><!--/.col -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->
<?php
}

elseif ($_GET['form']=='edit') { 
  if (isset($_GET['id'])) {

      $query = mysqli_query($mysqli, "SELECT tipo_vegetacion,nombre,observacion FROM vegetacion WHERE id='$_GET[id]'") 
                                      or die('error: '.mysqli_error($mysqli));
      $data  = mysqli_fetch_assoc($query);
    }
?>

  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Modificar Vegetacion
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=start"><i class="fa fa-home"></i> Inicio </a></li>
      <li><a href="?module=animales"> Ganado </a></li>
      <li class="active"> Modificar Vegetacion </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/tipo_vegetacion/proses.php?act=update" method="POST">
            <div class="box-body">
              
               <div class="form-group">
                <label class="col-sm-2 control-label">tipo vegetacion</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="nombre" value="<?php echo $data['nombre']; ?>" readonly required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Descripcion</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="observacion" autocomplete="off" value="<?php echo $data['observacion']; ?>" required>
                </div>
              </div>
             

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Guardar">
                  <a href="?module=tipo_vegetacion" class="btn btn-danger btn-reset">Cancelar</a>
                </div>
              </div>
            </div><!-- /.box footer -->
          </form>
        </div><!-- /.box -->
      </div><!--/.col -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->
<?php
}
?>