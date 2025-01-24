<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciar APIs</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Gerenciar APIs</h1>
    </header>
    <nav>
        <a href="home.php">Home</a>
        <a href="gerar_pagamento.php">Gerar Pagamento</a>
        <a href="gerar_qrcode.php">Gerar QR Code</a>
        <a href="gerar_pix.php">Gerar PIX</a>
        <a href="gerenciar_apis.php" class="active">Gerenciar APIs</a>
    </nav>
    <div class="container">
        <h2>Insira ou Atualize as Chaves de API</h2>
        <form action="gerenciar_apis.php" method="POST">
            <label for="mercadopago">API Mercado Pago:</label>
            <input type="text" id="mercadopago" name="mercadopago" placeholder="Insira a chave do Mercado Pago">

            <label for="pagseguro">API PagSeguro:</label>
            <input type="text" id="pagseguro" name="pagseguro" placeholder="Insira a chave do PagSeguro">

            <label for="picpay">API PicPay:</label>
            <input type="text" id="picpay" name="picpay" placeholder="Insira a chave do PicPay">

            <label for="nubank">API Nubank:</label>
            <input type="text" id="nubank" name="nubank" placeholder="Insira a chave do Nubank">

            <button type="submit">Salvar APIs</button>
        </form>

        <?php
        $filePath = 'apis.json';

        // Carregar as chaves existentes
        $apiKeys = file_exists($filePath) ? json_decode(file_get_contents($filePath), true) : [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $apiKeys['mercadopago'] = $_POST['mercadopago'] ?? $apiKeys['mercadopago'] ?? '';
            $apiKeys['pagseguro'] = $_POST['pagseguro'] ?? $apiKeys['pagseguro'] ?? '';
            $apiKeys['picpay'] = $_POST['picpay'] ?? $apiKeys['picpay'] ?? '';
            $apiKeys['nubank'] = $_POST['nubank'] ?? $apiKeys['nubank'] ?? '';

            // Salvar no arquivo
            file_put_contents($filePath, json_encode($apiKeys));

            echo "<div class='result'>Chaves de API salvas com sucesso!</div>";
        }

        // Exibir as chaves existentes
        if (!empty($apiKeys)) {
            echo "<h3>Chaves de API Salvas:</h3><ul>";
            foreach ($apiKeys as $key => $value) {
                echo "<li><strong>" . ucfirst($key) . ":</strong> " . htmlspecialchars($value) . "</li>";
            }
            echo "</ul>";
        }
        ?>
    </div>
    <footer>
        <p>&copy; 2025 Sistema de Pagamentos</p>
    </footer>
</body>
</html>