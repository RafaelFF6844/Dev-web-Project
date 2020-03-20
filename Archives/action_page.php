<?php
session_start(); 
$conn = mysqli_connect(
    'localhost',
    'root',
    '',
    'proyecto'
);

if(isset($_POST['Login'])){
    $Correo = $_POST['Correo'];
    $Contra = $_POST['Contra'];
    $query = "select * from usuarios where Correo = '$Correo' and Clave = '$Contra'";
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
    
}
?>