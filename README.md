# Caça aos Erros: CRUD em PHP

## die("Erro na conexão: " . $conn->connect_error) 
Aqui falta o ";".

## $stmt->bind_param("ssi", $nome, $email, $id)
Aqui falta o ";" também.

## $resultado = $conn->query($sql)
Aqui falta o ";" também.

## O link de editar na tabela
``` <a href="index.php?excluir=<?= $usuario['id'] ?>"> Excluir </a> ```
Antes ou depois do excluir falta colocar o editar.