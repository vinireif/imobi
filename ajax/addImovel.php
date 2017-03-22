<?php

include("../pages/includes/connect.php");
session_start();

$id = 0;
$idUsuario = $_SESSION["idUsuario"];
$titulo = $_POST["titulo"];
$descricao = $_POST["descricao"];
$idCidade = $_POST["idCidade"];
$endereco = $_POST["endereco"];
$referencia = $_POST["referencia"];
$valor = $_POST["valor"];
$email = $_POST["email"];
$telefone1 = $_POST["telefone1"];
$telefone2 = $_POST["telefone2"];
$site= $_POST["site"];
$idFinalidade = $_POST["idFinalidade"];
$idTipo = $_POST["idTipo"];
$quartos = $_POST["quartos"];
$suites = $_POST["suites"];
$banheiros = $_POST["banheiros"];
$garagem = $_POST["garagem"];
$imgDir = $_SESSION["idUsuario"];
$dataCadastro = "now()";
$dataEdicao = "now()";
$ativo = 1;

//Validações
if($titulo == ""){
    echo "Informe um Título";
    return;
}
if($descricao == ""){
    echo "Informe uma Descrição";
    return;
}
if($idCidade == 0 || $idCidade == null){
    echo "Informe a Cidade";
    return;
}
if($endereco == ""){
    echo "Informe um Endereço";
    return;
}

$sql = "insert into imovel values ($id,$idUsuario,'$titulo','$descricao',$idCidade,"
        . "'$endereco','$referencia',$valor,'$email','$telefone1','$telefone2','$site',"
        . "$idFinalidade,$idTipo,$quartos,$suites,$banheiros,$garagem,$imgDir, $dataCadastro, "
        . "$dataEdicao, $ativo)";

$res = mysqli_query($conexao, $sql);

if($res){
    echo "Imóvel cadastrado com sucesso!";
} else {
    echo "Erro ao cadastrar imóvel";
    echo $res;
} 
    
?>
