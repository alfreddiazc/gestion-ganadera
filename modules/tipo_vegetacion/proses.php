
<?php
session_start();

require_once "../../config/database.php";

if (empty($_SESSION['username']) && empty($_SESSION['password'])){
    echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}

else {
    if ($_GET['act']=='insert') {
        if (isset($_POST['Guardar'])) {
     
            $tipo_vegetacion  = mysqli_real_escape_string($mysqli, trim($_POST['tipo_vegetacion']));
            $nombre  = mysqli_real_escape_string($mysqli, trim($_POST['nombre']));
            $observacion  = mysqli_real_escape_string($mysqli, trim($_POST['observacion']));
        
            $created_user = $_SESSION['id_user'];

  
            $query = mysqli_query($mysqli, "INSERT INTO vegetacion(tipo_vegetacion,nombre,observacion) 
                                            VALUES('$tipo_vegetacion','$nombre','$observacion')")
                                            or die('error '.mysqli_error($mysqli));    

        
            if ($query) {
         
                header("location: ../../main.php?module=tipo_vegetacion&alert=1");
            }   
        }   
    }
    
    elseif ($_GET['act']=='update') {
        if (isset($_POST['Guardar'])) {
            if (isset($_POST['id'])) {
        
                $tipo_vegetacion  = mysqli_real_escape_string($mysqli, trim($_POST['tipo_vegetacion']));
                $nombre  = mysqli_real_escape_string($mysqli, trim($_POST['nombre']));
                $observacion  = mysqli_real_escape_string($mysqli, trim($_POST['observacion']));
           
                $updated_user = $_SESSION['id_user'];

                $query = mysqli_query($mysqli, "UPDATE vegetacion SET  nombre       = '$nombre'
                                                            WHERE tipo_vegetacion       = '$tipo_vegetacion'")
                                                or die('error: '.mysqli_error($mysqli));

    
                if ($query) {
                  header("location: ../../main.php?module=tipo_vegetacion&alert=2");
                }         
            }
        }
    }

    elseif ($_GET['act']=='delete') {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
      
            $query = mysqli_query($mysqli, "DELETE FROM vegetacion WHERE tipo_vegetacion='$tipo_vegetacion'")
                                            or die('error '.mysqli_error($mysqli));


            if ($query) {
     
                header("location: ../../main.php?module=tipo_vegetacion&alert=3");
            }
        }
    }       
}       
?>