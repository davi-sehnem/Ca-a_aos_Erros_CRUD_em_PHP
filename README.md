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
``` step="0.01" ```
O formulario possui step="0.01".

<br>

O correto é usar o double.
```$stmt->bind_param( "ssdi", $nome, $categoria, $preco, $estoque);```

## Erro 5: Edição depende de atualizar
``` if (isset($_POST['atualizar'])) { ```
O problema é que não tem esse campo atualizar sendo eviado pelo formulário.

<br>

Então o formulário envia 'cadastrar' e não 'atualizar':
```<button type="submit" name="cadastrar">Cadastrar Produto</button>```

## Erro 6: Falta de edição
O código não tem interface funcional nem ação disponivel para fazer edição.







        