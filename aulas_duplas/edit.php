<?php
include 'conexion.php';

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $sala = $_POST['sala'];

    $conn->query("UPDATE Professor SET nome='$nome' WHERE professor_id=$id");

    $conn->query("UPDATE Aulas a 
                  JOIN Diaria d ON a.diaria_id = d.diaria_id 
                  SET a.sala='$sala' 
                  WHERE d.professor_id=$id");

    header("Location: index.php");
}

$professor = $conn->query("SELECT p.nome, a.sala 
                            FROM Professor p 
                            JOIN Diaria d ON p.professor_id = d.professor_id 
                            JOIN Aulas a ON d.diaria_id = a.diaria_id 
                            WHERE p.professor_id=$id")->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar Professor</title>
</head>
<body>
    <h1>Editar Professor</h1>
    <form method="post">
        Nome: <input type="text" name="nome" value="<?php echo $professor['nome']; ?>" required><br>
        Sala: <input type="text" name="sala" value="<?php echo $professor['sala']; ?>" required><br>
        <input type="submit" value="Salvar">
    </form>
</body>
</html>

<?php $conn->close(); ?>