<?php

session_start();
include_once './conexao.php';
//Verificar se o usuário clicou no botão, clicou no botão acessa o IF e tenta cadastrar, caso contrario acessa o ELSE
$SendCadImg = filter_input(INPUT_POST, 'SendCadImg', FILTER_SANITIZE_STRING);
if ($SendCadImg) {
    //Receber os dados do formulário
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);
    $largura = filter_input(INPUT_POST, 'largura', FILTER_SANITIZE_STRING);
    $peso = filter_input(INPUT_POST, 'peso', FILTER_SANITIZE_STRING);
    $quantidade = filter_input(INPUT_POST, 'quantidade', FILTER_SANITIZE_STRING);
    $altura = filter_input(INPUT_POST, 'altura', FILTER_SANITIZE_STRING);
    $profundidade = filter_input(INPUT_POST, 'profundidade', FILTER_SANITIZE_STRING);
    $valor = filter_input(INPUT_POST, 'valor', FILTER_SANITIZE_STRING);

    $nome_imagem = $_FILES['imagem']['name'];
    //var_dump($_FILES['imagem']);
    //Inserir no BD
    $result_img = "INSERT INTO produtos (nome,descricao,largura,peso,quantidade,altura,profundidade,imagem, valor) VALUES (:nome,:descricao,:largura,:peso,:quantidade,:altura,:profundidade,:imagem,:valor)";
    $insert_msg = $conn->prepare($result_img);
    $insert_msg->bindParam(':nome', $nome);
    $insert_msg->bindParam(':descricao', $descricao);
    $insert_msg->bindParam(':largura', $largura);
    $insert_msg->bindParam(':peso', $peso);
    $insert_msg->bindParam(':quantidade', $quantidade);
    $insert_msg->bindParam(':altura', $altura);
    $insert_msg->bindParam(':profundidade', $profundidade);
    $insert_msg->bindParam(':imagem', $nome_imagem);
    $insert_msg->bindParam(':valor', $valor);

    //Verificar se os dados foram inseridos com sucesso
    if ($insert_msg->execute()) {
        //Recuperar último ID inserido no banco de dados
        $ultimo_id = $conn->lastInsertId();

        //Diretório onde o arquivo vai ser salvo
        $diretorio = 'imagens/'; //.'/';

        //Criar a pasta de foto 
       // mkdir($diretorio, 0755);
        
        if(move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorio.$nome_imagem)){
            $_SESSION['msg'] = "<p style='color:green;'>Dados salvo com sucesso e upload da imagem realizado com sucesso</p>";
            header("Location: index.php");
        }else{
            $_SESSION['msg'] = "<p><span style='color:green;'>Dados salvo com sucesso. </span><span style='color:red;'>Erro ao realizar o upload da imagem</span></p>";
            header("Location: index.php");
        }        
    } else {
        $_SESSION['msg'] = "<p style='color:red;'>Erro ao salvar os dados</p>";
        header("Location: index.php");
    }
} else {
    $_SESSION['msg'] = "<p style='color:red;'>Erro ao salvar os dados</p>";
    header("Location: index.php");
}