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
        $_SESSION['message'] = 'failed';
    }
    else{
        $nr = mysqli_num_rows($result);
        if($nr == 0){
            $_SESSION['message'] = 'success';
        }
    }
    header("Location:login.php");
}
?>