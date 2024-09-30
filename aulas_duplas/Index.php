<?php
include 'conexion.php';

$sql = "SELECT p.professor_id, p.nome, a.aula_id, a.sala 
        FROM Professor p 
        JOIN Diaria d ON p.professor_id = d.professor_id 
        JOIN Aulas a ON d.diaria_id = a.diaria_id";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Lista de Professores e Aulas</title>
    <link rel="stylesheet" type="text/css" href="style.css"> 
</head>
<body>
    <h1>Professores e Aulas</h1>
    <a href="add.php">Adicionar Professor</a>
    <table border="1">
        <tr>
            <th>Nome do Professor</th>
            <th>Sala</th>
            <th>Ações</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo htmlspecialchars($row['nome']); ?></td>
                <td><?php echo htmlspecialchars($row['sala']); ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $row['aula_id']; ?>">Editar</a>
                    <a href="delet.php?id=<?php echo $row['aula_id']; ?>">Deletar</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>

<?php $conn->close(); ?>