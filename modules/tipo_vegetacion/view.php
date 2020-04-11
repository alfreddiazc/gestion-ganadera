<section class="content-header">
  <h1>
    <i class="fa fa-folder-o icon-title"></i> Listado de Vegetacion

    <a class="btn btn-success btn-social pull-right" href="?module=form_tipo_vegetacion&form=add" title="agregar" data-toggle="tooltip">
      <i class="fa fa-plus"></i> Registrar Vegetacion
    </a>
  </h1>

</section>


<section class="content">
  <div class="row">
    <div class="col-md-12">

    <?php  

    if (empty($_GET['alert'])) {
      echo "";
    } 
  
    elseif ($_GET['alert'] == 1) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
             Nuevos Vegetacion de potreros han sido  almacenado correctamente.
            </div>";
    }

    elseif ($_GET['alert'] == 2) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
             Datos de la vegetacion han sido modificados correcamente.
            </div>";
    }

    elseif ($_GET['alert'] == 3) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
            Se eliminaron los datos de la vegetacion
            </div>";
    }
    ?>

      <div class="box box-primary">
        <div class="box-body">
    
          <table id="dataTables1" class="table table-bordered table-striped table-hover">
      
            <thead>
              <tr>
                <th class="center">Codigo</th>
                <th class="center">tipo vegetacion</th>
                <th class="center">Descripcion</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
            <?php  

            $query = mysqli_query($mysqli, "SELECT tipo_vegetacion,nombre,observacion FROM vegetacion ORDER BY tipo_vegetacion DESC")
                                            or die('error: '.mysqli_error($mysqli));

            while ($data = mysqli_fetch_assoc($query)) { 
              $tipo_vegetacion = format_rupiah($data['tipo_vegetacion']);
           
              echo "<tr>
                      <td width='30' class='center'>$data[tipo_vegetacion]</td>
                      <td width='80' class='center'>$data[nombre]</td>
                      <td width='180'>$data[observacion]</td>
                      <td class='center' width='80'>
                        <div>
                          <a data-toggle='tooltip' data-placement='top' title='modificar' style='margin-right:5px' class='btn btn-primary btn-sm' href='?module=form_tipo_vegetacion&form=edit&id=$data[tipo_vegetacion]'>
                              <i style='color:#fff' class='glyphicon glyphicon-edit'></i>
                          </a>";
            ?>
                          <a data-toggle="tooltip" data-placement="top" title="Eliminar" class="btn btn-danger btn-sm" href="modules/tipo_vegetacion/proses.php?act=delete&id=<?php echo $data['tipo_vegetacion'];?>" onclick="return confirm('estas seguro de eliminar el vegetal <?php echo $data['nombre']; ?> ?');">
                              <i style="color:#fff" class="glyphicon glyphicon-trash"></i>
                          </a>
            <?php
              echo "    </div>
                      </td>
                    </tr>";
            }
            ?>
            </tbody>
          </table>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!--/.col -->
  </div>   <!-- /.row -->
</section><!-- /.content