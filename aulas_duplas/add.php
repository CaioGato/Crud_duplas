<?php
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $sala = $_POST['sala'];

    $conn->query("INSERT INTO Professor (nome) VALUES ('$nome')");
    $professor_id = $conn->insert_id;

    $conn->query("INSERT INTO Diaria (professor_id) VALUES ($professor_id)");
    $diaria_id = $conn->insert_id;

    $conn->query("INSERT INTO Aulas (diaria_id, sala) VALUES ($diaria_id, '$sala')");

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Adicionar Professor</title>
    <link rel="stylesheet" type="text/css" href="style.css"> <!-- Importando o CSS -->
</head>
<body>
    <h1>Adicionar Professor e Aula</h1>
    <form method="post">
        <label for="nome">Nome do Professor:</label>
        <input type="text" name="nome" id="nome" required><br>
        
        <label for="sala">Sala:</label>
        <input type="text" name="sala" id="sala" required><br>
        
        <input type="submit" value="Adicionar">
    </form>
    <a href="index.php">Voltar para a lista</a>
</body>
</html>

<?php $conn->close(); ?>