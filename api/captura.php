<?php
header('Content-Type: application/json');

// Receber dados JSON
$dados = json_decode(file_get_contents('php://input'), true);

if (!$dados || empty($dados['nome']) || empty($dados['whatsapp'])) {
    echo json_encode(['sucesso' => false, 'mensagem' => 'Dados incompletos.']);
    exit;
}

try {
    // Ligar ao SQLite (cria o ficheiro leads.sqlite automaticamente na mesma pasta)
    $pdo = new PDO('sqlite:leads.sqlite');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Criar tabela se não existir
    $queryCriarTabela = "
        CREATE TABLE IF NOT EXISTS leads (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            nome TEXT NOT NULL,
            whatsapp TEXT NOT NULL,
            data_registo DATETIME DEFAULT CURRENT_TIMESTAMP
        )
    ";
    $pdo->exec($queryCriarTabela);

    // Inserir dados
    $stmt = $pdo->prepare('INSERT INTO leads (nome, whatsapp) VALUES (:nome, :whatsapp)');
    $stmt->execute([
        ':nome' => htmlspecialchars($dados['nome']),
        ':whatsapp' => htmlspecialchars($dados['whatsapp'])
    ]);

    // Opcional: Aqui poderia disparar um Webhook para o n8n usando cURL

    echo json_encode(['sucesso' => true, 'mensagem' => 'Lead guardada com sucesso.']);
} catch (PDOException $e) {
    echo json_encode(['sucesso' => false, 'mensagem' => 'Erro na base de dados: ' . $e->getMessage()]);
}
?>
