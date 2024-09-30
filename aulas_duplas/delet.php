<?php
include 'conexion.php';

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $conn->query("DELETE a, d 
                  FROM Aulas a 
                  JOIN Diaria d ON a.diaria_id = d.diaria_id 
                  WHERE d.professor_id=$id");

    $conn->query("DELETE FROM Professor WHERE professor_id=$id");

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Deletar Professor</title>
</head>
<body>
    <h1>Deletar Professor</h1>
    <form method="post">
        <p>Tem certeza que deseja deletar este professor?</p>
        <input type="submit" value="Deletar">
        <a href="index.php">Cancelar</a>
    </form>
</body>
</html>

<?php $conn->close(); ?>