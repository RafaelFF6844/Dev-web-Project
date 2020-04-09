<?php
session_start(); 
$conn = mysqli_connect(
    'localhost',
    'root',
    '',
    'proyecto'
);

if(isset($_POST['Logout'])){
    $_SESSION['status'] = 'failed';
    header("Location: index.php");
}

if(isset($_POST['Register'])){
    $Usuario = $_POST['Usuario'];
    $Contra = $_POST['Contra'];
    $query = "INSERT INTO usuarios(Correo, Clave) VALUES ('$Usuario', '$Contra')";
    $result = mysqli_query($conn, $query);

    if(!$result){
        $_SESSION['message'] = 'Datos no guardados';
        $_SESSION['message-type'] = 'danger';
    }
    else{
        $_SESSION['message'] = 'Datos guardados correctamente';
        $_SESSION['message-type'] = 'success';
    }
    header("Location: Admin.php");
}

if(isset($_POST['GuardarNoticia'])){
    
    $Foto = $_POST['FotosU'];
    $Titulo = $_POST['Titulo'];
    $Noticia = $_POST['Contenido'];
    $Resumen = $_POST['Resumen'];
    $bool = true;
    if($_POST['select'] == 'guardar'){   
    $_SESSION['message'] = "Para guardar su noticia debe llenar";
    if(empty($Titulo)){
        $bool = false;
        $_SESSION['message'] .= ", El titulo";
    }
    if(empty($Noticia)){
        $bool = false;
        $_SESSION['message'] .= ", la Noticia";
    }
    if(empty($Foto)){
        $bool = false;
        $_SESSION['message'] .= ", la foto";
    }
    if(empty($Resumen)){
        $bool = false;
        $_SESSION['message'] .= ", el resumen";
    }
    if($bool){
        //guardar
        $query = "INSERT INTO noticias(Titulo, Resumen, Foto, Noticia) VALUES ('$Titulo', '$Resumen', '$Foto', '$Noticia')";
        $result = mysqli_query($conn, $query);

        if(!$result){ 
            $_SESSION['message-type'] = 'danger';
            $_SESSION['message1'] .= "Datos no guardados";
            header("Location: Admin.php");
        }
        else{
            $_SESSION['message-type'] = 'success';
            $_SESSION['message1'] .= "Datos guardados exitosamente";
            header("Location: Admin.php");
        }
    }
    else{
        //no guardar
        $_SESSION['message-type'] = 'danger';
        $_SESSION['message1'] .= "Caso no guardado";
        header("Location: Admin.php");
    }
    }else{
       $ID = $_POST['select'];
       $query = "update noticias set Titulo = '$Titulo', Resumen = '$Resumen', Foto = '$Foto', Noticia = '$Noticia' where id = $ID";
       $result = mysqli_query($conn, $query);

       $_SESSION['message-type'] = 'success';
       $_SESSION['message1'] .= "Datos actualizados exitosamente";
       header("Location: Admin.php");
    }

}

if(isset($_POST['GuardarCaso'])){
    $bool = true;
    $Cedula = $_POST['Cedula'];
    $Nombre = $_POST['Nombre'];
    $Apellido = $_POST['Apellido'];
    $Nacimiento = "2001-08-30";
    $Pais = $_POST['Pais'];
    $Ciudad = $_POST['Ciudad'];
    $Latitud = $_POST['Latitud'];
    $Longitud = $_POST['Longitud'];
    $Contagio = $_POST['Contagio'];
    $Comentario = $_POST['Comentario'];
    $_SESSION['message'] = "Para guardar su caso debe llenar";

    if(empty($Cedula) || strlen($Cedula) != 11){
        $bool = false;
        $_SESSION['message'] .= ", la cedula";
    }
    if(empty($Nombre)){
        $bool = false;
        $_SESSION['message'] .= ", el nombre";
    }
    if(empty($Apellido)){
        $bool = false;
        $_SESSION['message'] .= ", el apellido";
    }
    if(empty($Nacimiento)){
        $bool = false;
        $_SESSION['message'] .= ", la fecha de nacimiento";
    }
    if(empty($Pais)){
        $bool = false;
        $_SESSION['message'] .= ", el pais";
    }
    if(empty($Ciudad)){
        $bool = false;
        $_SESSION['message'] .= ", la ciudad";
    }
    if(empty($Latitud)){
        $bool = false;
        $_SESSION['message'] .= ", la latitud";
    }
    if(empty($Longitud)){
        $bool = false;
        $_SESSION['message'] .= ", la longitud";
    }
    if(empty($Contagio)){
        $bool = false;
        $_SESSION['message'] .= ", la fecha de contagio";
    }
    if(empty($Comentario)){
        $bool = false;
        $_SESSION['message'] .= ", el comentario.";
    }
    if($bool){
        //guardar
        $query = "INSERT INTO casos(Cedula, Nombre, Apellido, Nacimiento, Pais, Ciudad, Latitud, Longitud, Contagio, Comentario) VALUES ('$Cedula', '$Nombre', '$Apellido', '$Nacimiento', '$Pais','$Ciudad', '$Latitud', '$Longitud','$Contagio', '$Comentario')";
        $result = mysqli_query($conn, $query);

        if(!$result){ 
            $_SESSION['message-type'] = 'danger';
            $_SESSION['message1'] .= "Datos no guardados";
            header("Location: Admin.php");
        }
        else{
            $_SESSION['message-type'] = 'success';
            $_SESSION['message1'] .= "Datos guardados exitosamente";
            header("Location: Admin.php");

            function getSslPage($url)
            {
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
                curl_setopt($ch, CURLOPT_HEADER, false);
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_REFERER, $url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
                $result = curl_exec($ch);
                return $result;
            }

            $apiToken = "1066250777:AAEmVzDzBtS74cF4TtCszojR2FoyuY-N9FI";
            $mensaje="!Un nuevo Caso de Covid-19 ha sido DETECTADO!🔥
             $Nombre $Apellido Fue puesto en cuarentena.
             Pais: $Pais.
             Para mas Casos Visite nuestra Web-Page.";

            $data = [
                'chat_id' => '@covidlifex',
                'text' => $mensaje

            ];
            $response = getSslPage("https://api.telegram.org/bot$apiToken/sendMessage?".http_build_query($data) );
            // Do what you want with result
        }
    }
    else{
        //no guardar
        $_SESSION['message-type'] = 'danger';
        $_SESSION['message1'] .= "Caso no guardado";
        header("Location: Admin.php");
    }
}

if(isset($_GET['idB'])){
    $id = $_GET['idB'];
    $query = "delete from casos where id = $id";
    $result = mysqli_query($conn, $query);

    if(!$result){
        die("Query failed");
    }
 
    header("Location:Admin.php");
}

if(isset($_GET['idE'])){
    $id = $_GET['id'];
    $query = "delete from Registro where id = $id";
    $result = mysqli_query($conn, $query);

    if(!$result){
        die("Query failed");
    }
 
    header("Location:index.php");
}

if(isset($_GET['idBn'])){
    $id = $_GET['idBn'];
    $query = "delete from noticias where id = $id";
    $result = mysqli_query($conn, $query);

    if(!$result){
        die("Query failed");
    }
 
    header("Location:Admin.php");
}

if(isset($_GET['idU'])){
    $id = $_GET['idU'];
    $query = "delete from usuarios where id = $id";
    $result = mysqli_query($conn, $query);

    if(!$result){
        die("Query failed");
    }
 
    header("Location:Admin.php");
}

if(isset($_POST['Euser'])){
    $id = $_POST['ide'];
    $User = $_POST['Nuser'];
    $Contra = $_POST['Ncontra'];
    $query = "update usuarios set Correo = '$User', Clave = '$Contra' where id = $id";
    $result = mysqli_query($conn, $query);

    if(!$result){
        die("Query failed");
    }
 
    header("Location:Admin.php");
}

if(isset($_GET['lgt'])){
    $_SESSION['status'] = 'failed';
    header("Location:Admin.php");
}   
?>
