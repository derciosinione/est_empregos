<?php

require '../../backend/Config/DbContext.php';

use Config\DbContext;

$dbContext = new DbContext();

// Verificar se o ID da oferta de emprego foi passado através da URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Preparar e executar a consulta SQL para excluir o trabalho
    $sql = "DELETE FROM JobOffers WHERE Id=?";
    $stmt = $dbContext->getConnection()->prepare($sql);
    
    // Verificar se a preparação da consulta foi bem-sucedida
    if ($stmt) {
        // Vincular o parâmetro ID à consulta preparada
        $stmt->bind_param('i', $id);
        
        // Executar a consulta preparada
        if ($stmt->execute()) {
            // Redirecionar de volta para a página de trabalhos se a exclusão for bem-sucedida
            header("Location: jobs.php");
            exit();
        } else {
            // Caso contrário, exibir uma mensagem de erro
            echo "Erro ao excluir o registro: " . $stmt->error;
        }
    } else {
        // Se a preparação da consulta falhar, exibir uma mensagem de erro
        echo "Erro ao preparar a consulta SQL.";
    }
} else {
    // Se o ID não estiver definido na URL, exibir uma mensagem de solicitação inválida
    echo "Solicitação inválida.";
    exit();
}
?>
