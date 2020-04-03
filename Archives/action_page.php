<?php
session_start(); 
$conn = mysqli_connect(
    'localhost',
    'root',
    '',
    'proyecto'
);

if(isset($_POST['Login'])){
    $Usuario = $_POST['Usuario'];
    $Contra = $_POST['Contra'];
    $query = "select * from usuarios where Correo = '$Usuario' and Clave = '$Contra'";
    $result = mysqli_query($conn, $query);  
    
    if(!$result){
        $_SESSION['status'] = 'failed';
        header("Location: index.php");
    }
    else{
        $nr = mysqli_num_rows($result);    
        if($nr == 1){
            $_SESSION['status'] = 'success';
            header("Location: Admin.php");
        }
    }
}

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
    echo "noticia";
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
if(isset($_POST['FrmNtc'])){
echo "si";
}
?>
