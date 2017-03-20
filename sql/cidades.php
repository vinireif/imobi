<?php
include("../pages/includes/connect.php");
$id = $_GET['id'];
$res = mysqli_query($conexao, "SELECT id, nome FROM cidades where estados_id = $id");

while ($row = mysqli_fetch_assoc($res)) {
    $cidades[] = array(
        'id' => $row['id'],
        'descricao' => $row['nome']
    );
}

echo( json_encode($cidades) );
?>
