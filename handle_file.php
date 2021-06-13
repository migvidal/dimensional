<?php

//comprobar formulario completado
if (!is_uploaded_file($_FILES["archivo-modelo"]["tmp_name"])) {
// comprobar formato archivo
    header('Location: upload.php');
    exit();
}
// sanitize y filter
// ...

// cosas
$target_dir = "modelos/";
$target_file = $target_dir . basename($_FILES["archivo-modelo"]["name"]);
$uploadOk = 1;
//$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// obtener datos
$extension = pathinfo($_FILES["archivo-modelo"]["name"], PATHINFO_EXTENSION);
//echo $extension;


// Check file size
if ($_FILES["archivo-modelo"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Comprobar si error
if ($uploadOk == 0) {
    echo 'Error';
} else {
    //subir
    if(is_uploaded_file($_FILES["archivo-modelo"]["tmp_name"])){
        $nombreArchivo = time().".".$extension;
        move_uploaded_file($_FILES["archivo-modelo"]["tmp_name"], "modelos/".$nombreArchivo);
        $_SESSION['nombre_archivo'] = $nombreArchivo;
    }

    //mandar a preview
    header('Location: preview_upload.php');
}
?>