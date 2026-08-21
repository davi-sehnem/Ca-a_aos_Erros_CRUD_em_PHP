<?php

 session_start();
    include("../database/conexao.php");

    if (!isset($_SESSION["usuario"])) {
        header("Location: index.php");
        exit();
    }

    $id = isset($_GET["id"]) ? (int)$_GET["id"] : 0; 

    $sql = "SELECT * FROM usuarios WHERE id = $id";
    $resultado = $conn -> query($sql);

    $usuario = $resultado -> fetch_assoc();

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $novoNome = $_POST["nome"] ?? "";
        $novoEmail = $_POST["email"] ?? "";

        if(!empty($novoNome) && !empty($novoEmail)){
  
      $sql = "UPDATE usuarios SET nome = ?, email = ? WHERE id = ?";
      $stmt = mysqli_prepare($conn, $sql);
      mysqli_stmt_bind_param($stmt, "ssi", $novoNome, $novoEmail, $id);

        if (mysqli_stmt_execute($stmt)) {
            header("Location:../codigo_1/index.php");
            exit();
        } else {
            echo "<script>alert('Erro: usuario inválido!')</script>";
        }

        mysqli_stmt_close($stmt);
      } 
        $usuario['nome'] = $novoNome;
        $usuario['email'] = $novoEmail;
    }


?>




<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
</head>

<body>

    <h2> Editar Usuario </h2>

    <form action="editar.php?id=<?php echo $id; ?>" method="POST">
        <label for="nome">Nome</label>
      <input type="text" name="nome" value="<?php echo $usuario['nome']; ?>">
      <br>
      <br>
      <label for="descricao">Email</label>
      <input type="text" name="email" value="<?php echo $usuario['email']; ?>">
      <br>
      <br>
      <button  type="submit">Enviar </button> 
      <br>
    </form>

</body>

</html>