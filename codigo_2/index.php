<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "crud_aula";

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Erro na conexão com o banco: " . $conn->connect_error);
}


// CADASTRAR PRODUTO
if (isset($_POST['cadastrar'])) {

    $nome = $_POST['nome'];
    $categoria = $_POST['categoria'];
    $preco = $_POST['preco'];
    $quantidade = $_POST['quantidade'];

    $sql = "INSERT INTO produtos
            (nome, categoria, preco, quantidade)
            VALUES (?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);

    $stmt->bind_param("ssdi", $nome, $categoria, $preco, $quantidade);

    $stmt->execute();

    header("Location: index.php");
    exit;
}


// EXCLUIR PRODUTO
if (isset($_GET['excluir'])) {

    $id = $_GET['excluir'];

    $sql = "DELETE FROM produtos WHERE id = ?";

    $stmt = $conn->prepare($sql);

    $stmt->bind_param("i", $id);

    $stmt->execute();

    header("Location: index.php");
    exit;
}


// ATUALIZAR PRODUTO
if (isset($_POST['atualizar'])) {

    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $categoria = $_POST['categoria'];
    $preco = $_POST['preco'];
    $quantidade = $_POST['quantidade'];

    $sql = "UPDATE produtos
            SET nome = ?, categoria = ?, preco = ?
            quantidade = ?
            WHERE id = ?";

    $stmt = $conn->prepare($sql);

    $stmt->bind_param(
        "ssdii",
        $nome,
        $categoria,
        $preco,
        $quantidade,
        $id
    );

    $stmt->execute();

    header("Location: index.php");
    exit;
}


// BUSCAR PRODUTOS

$sql = "SELECT id, nome, categoria, preco, quantidade
        FROM produtos
        ORDER BY id DESC";

$resultado = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <title>CRUD de Produtos</title>

</head>

<body>

    <h1>Cadastro de Produtos</h1>

    <!-- FORMULÁRIO DE CADASTRO -->

    <form method="POST">

        <label>Nome:</label>

        <input
            type="text"
            name="nome"
            required>

        <br><br>

        <label>Categoria:</label>

        <input
            type="text"
            name="categoria"
            required>

        <br><br>

        <label>Preço:</label>

        <input
            type="number"
            name="preco"
            step="0.01"
            required>

        <br><br>

        <label>Quantidade:</label>

        <input
            type="number"
            name="quantidade"
            min="1"
            required>

        <br><br>

        <button type="submit" name="cadastrar">
            Cadastrar Produto
        </button>

    </form>

    <br>

    <!-- LISTAGEM -->

    <h2>Produtos cadastrados</h2>

    <table border="1">

        <tr>

            <th>ID</th>
            <th>Nome</th>
            <th>Categoria</th>
            <th>Preço</th>
            <th>Quantidade</th>
            <th>Ações</th>

        </tr>

        <?php while ($produto = $resultado->fetch_assoc()) { ?>

            <tr>

                <td>
                    <?= $produto['id'] ?>
                </td>

                <td>
                    <?= $produto['nome'] ?>
                </td>

                <td>
                    <?= $produto['categoria'] ?>
                </td>

                <td>
                    <?= number_format($produto['preco'], 2, ',', '.') ?>
                </td>

                <td>
                    <?= $produto['quantidade'] ?>
                </td>

                <td>

                    <a href="index.php?excluir=<?= $produto['id'] ?>">
                        Excluir
                    </a>

                </td>

            </tr>

        <?php } ?>

    </table>

</body>

</html>