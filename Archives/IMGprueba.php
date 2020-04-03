<?php 
$conn = mysqli_connect(
    'localhost',
    'root',
    '',
    'foto'
);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        $query = "select foto3 from foto1 top";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($result);
    ?>
    <img src="<?php echo $row['foto3']?>">
</body>
</html>