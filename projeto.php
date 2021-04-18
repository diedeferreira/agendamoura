<?php
//Verifica o envia de dados 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = (isset($_POST["id"]) && $_POST["id"] != null) ? $_POST["id"] : "";
    $nome = (isset($_POST["nome"]) && $_POST["nome"] != null) ? $_POST["nome"] : "";
    $end = (isset($_POST["end"]) && $_POST["end"] != null) ? $_POST["end"] : "";
    $celular = (isset($_POST["cel"]) && $_POST["cel"] != null) ? $_POST["cel"] : null;
} else if (!isset($id)) {
    $id = (isset($_GET["id"]) && $_GET["id"] != null) ? $_GET["id"] : "";
    $nome = NULL;
    $end = NULL;
    $celular = NULL;
//cria conexao com b.dados
}   try {
        $conexao = new PDO("mysql:host=localhost; dbname=crudsimples", "root");
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conexao->exec("set names utf8");        
    } catch (PDOException $erro) {
        echo "Erro na conexão:" . $erro->getMessage();
    }
// bloco salva dados
if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "save" && $nome != "") {
    try {
        if ($id != "") {
            $stmt = $conexao->prepare("UPDATE contatos SET nome=?, endereco=?, celular=? WHERE id = ?");
            $stmt->bindParam(4, $id);
                } else {
                $stmt = $conexao->prepare("INSERT INTO contatos (nome, endereco, celular) VALUES (?, ?, ?)");
    }
        $stmt->bindParam(1, $nome);
        $stmt->bindParam(2, $end);
        $stmt->bindParam(3, $celular);
             
        if ($stmt->execute()) {
        if ($stmt->rowCount() > 0) {
            echo "Dados cadastrados com sucesso!";
                $id = null;
                $nome = null;   
                $end = null;
                $celular = null;
        } else {
            echo "Erro ao tentar efetivar cadastro";
            }
        } else {
            throw new PDOException("Erro: Não foi possível executar a declaração sql");
        }
        } catch (PDOException $erro) {
            echo "Erro: " . $erro->getMessage();
        }
    }
// bloco if que recuppera informacoes     
if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "upd" && $id != "") {
    try {
        $stmt = $conexao->prepare("SELECT * FROM contatos WHERE id = ?");
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        if ($stmt->execute()) {
            $rs = $stmt->fetch(PDO::FETCH_OBJ);
            $id = $rs->id;
            $nome = $rs->nome;
            $end = $rs->end;
            $celular = $rs->celular;
        } else {
            throw new PDOException("Erro: Não foi possível executar a declaração sql");
            }
        } catch (PDOException $erro) {
            echo "Erro: ".$erro->getMessage();
        }
    }

//if utilizado para delete
    if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "del" && $id != "") {
        try {
            $stmt = $conexao->prepare("DELETE FROM contatos WHERE id = ?");
            $stmt->bindParam(1, $id, PDO::PARAM_INT);
            if ($stmt->execute()) {
                echo "Registo foi excluído com êxito";
                $id = null;
            } else {
                throw new PDOException("Erro: Não foi possível executar a declaração sql");
            }
        } catch (PDOException $erro) {
            echo "Erro: ".$erro->getMessage();
        }}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda de Contatos</title>
</head>
<body>
    <form action="?act=save" method="POST" name="form1">
    <h1>Agenda de Contatos</h1>
    <hr>
    <input type="hidden" name="id" <?php
    if (isset($id) && $id != null || $id != "") {
        echo "value=\"{$id}\"";
    }
    ?> />
    Nome:
    <input type="text" name="nome" <?php
    if (isset($nome) && $nome != null || $nome != ""){
        echo "value=\"{$nome}\"";
    }
    ?> />
    Endereço: 
    <input type="text" name="end" <?php
    if (isset($end) && $end != null || $end != "") {
        echo "value=\"{$end}\"";
    }
    ?> />
    Celular:
    <input type="text" name="cel"  <?php
    if (isset($celular) && $celular != null || $celular != ""){
        echo "value=\"{$celular}\"";
    }
    ?> />
    <input type="submit" value="Salvar"/>
    <input type="reset" value="Novo"/>
    <hr>
    </form>
    <table border="1" width="100%">
    <tr>
        <th>Nome</th>
        <th>Endereço</th>
        <th>Celular</th>
        <th>Ações</th>
    </tr>
    <?php
    try {
     $stmt = $conexao->prepare("SELECT * FROM contatos order by nome");
         if ($stmt->execute()) {
            while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
                echo "<tr>";
                echo "<td>".$rs->nome."</td><td>".$rs->endereco."</td><td>".$rs->celular
                           ."</td><td><center><a href=\"?act=upd&id=" . $rs->id ."\">[Alterar]</a>"
                           ."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"
                           ."<a href=\"?act=del&id=" . $rs->id . "\">[Excluir]</a></center></td>";
                echo "</tr>";
            }
        } else {
            echo "Erro: Não foi possível recuperar os dados do banco de dados";
        }
    } catch (PDOException $erro) {
    echo "Erro: ".$erro->getMessage();
    }
    ?>
</table>
</body>
</html>
