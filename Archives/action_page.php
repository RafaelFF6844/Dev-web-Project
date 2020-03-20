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
?>