<?php

$nome = $_POST["nome"];
$dateTime = new DateTime($_POST["dataProcedimento"]);
$dataFormatada = $dateTime->format('d-m-Y');
$opcaoSelecionada = $_POST["opcoes"];

switch($opcaoSelecionada){
    case "limpeza":
        $procedimento = "Limpeza de pele";
        break;
    case "preenchimento":
        $procedimento = "Preenchimento Labial";
        break;
    case "massagem":
        $procedimento = "Massagem modeladora";
        break;
    case "ventosa":
        $procedimento = "Ventosaterapia";
        break;
}



function formatarTelefone($telefone) {
    // Remover caracteres não numéricos do telefone
    $telefoneNumerico = preg_replace("/[^0-9]/", "", $telefone);

    // Adicionar os parênteses e hífen no formato desejado
    $telefoneFormatado = sprintf("(%s) %s-%s",
        substr($telefoneNumerico, 0, 2),
        substr($telefoneNumerico, 2, 5),
        substr($telefoneNumerico, 7)
    );

    return $telefoneFormatado;
}

$telefoneNv = formatarTelefone($_POST["telefone"]);

include("script.php");


if(mysqli_query($conexao,"INSERT INTO clientes(nome,telefone,procedimento,data_procedimento) VALUES('$nome','$telefoneNv','$procedimento','$dataFormatada')")){
    echo "Sucesso";
    echo "<br><button><a href='index.html'>Voltar para pagina inicial</a></button>";
}else{
    echo "não cadastrou";
}




?>