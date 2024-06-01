<?php
// Configuração do banco de dados
$servername = "localhost";
$username = "seu_usuario";
$password = "sua_senha";
$dbname = "seu_banco_de_dados";

// Conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica conexão
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

// Recebe os dados do formulário
$nome = $_POST['nome'];
$sexo = $_POST['sexo'];
$email = $_POST['email'];
$data_chegada = $_POST['data_chegada'];
$num_noites = $_POST['num_noites'];
$num_hospedes = $_POST['num_hospedes'];
$total_estimado = $_POST['total_estimado'];
$mensagem = $_POST['mensagem'];
$newsletter = isset($_POST['newsletter']) ? $_POST['newsletter'] : 'nao';

// Insere os dados no banco de dados
$sql = "INSERT INTO reservas (nome, sexo, email, data_chegada, num_noites, num_hospedes, total_estimado, mensagem, newsletter)
VALUES ('$nome', '$sexo', '$email', '$data_chegada', '$num_noites', '$num_hospedes', '$total_estimado', '$mensagem', '$newsletter')";

if ($conn->query($sql) === TRUE) {
    echo "Reserva efetuada com sucesso!";
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
