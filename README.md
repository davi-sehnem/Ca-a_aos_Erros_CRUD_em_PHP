# Caça aos Erros: CRUD em PHP

# Código 1:

## die("Erro na conexão: " . $conn->connect_error) 
Aqui falta o ";".

## $stmt->bind_param("ssi", $nome, $email, $id)
Aqui falta o ";" também.

## $resultado = $conn->query($sql)
Aqui falta o ";" também.

## O link de editar na tabela
``` <a href="index.php?excluir=<?= $usuario['id'] ?>"> Excluir </a> ```
<br>
Antes ou depois do excluir falta colocar o editar.

## Falha de Segurança
``` <?= $usuario['nome'] ?> <?= $usuario['email'] ?> ```
<br>
Dados cadastrados sendo colocados diretamente no HTML.

# Código 2:

## Erro 1: Update

``` $sql = "UPDATE produtos SET nome = ?, categoria = ?, preco = ? WHERE id = ?"; ```
<br>
Aqui o código possui 4 valores.

``` $stmt->bind_param( "ssdi", $nome, $categoria, $preco, $estoque, $id ); ```
<br>
Mas aqui existem 5 valores.

## Erro 2: While no Delete
```$sql = "DELETE FROM produtos WHILE id = ?";```
<br>O While não faz sentido aqui, o certo seria usar o Where.

## Erro 3: Atualização no estoque
```$sql = "UPDATE produtos SET nome = ?, categoria = ?, preco = ? WHERE id = ?";```
<br>
Falta colocar o "estoque = ?".

## Erro 4: Tipo incorreto do preço no cadastro





        