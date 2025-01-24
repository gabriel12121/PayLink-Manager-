<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerar Link de Pagamento</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Gerar Link de Pagamento</h1>
    </header>

    <?php include 'menu.php'; ?>

    <div class="container">
        <h2>Gerar Link de Pagamento</h2>
        <form method="POST" action="processar_pagamento.php">
            <label for="gateway">Selecione o Gateway:</label>
            <select name="gateway" id="gateway" required>
                <option value="mercadopago">Mercado Pago</option>
                <option value="pagseguro">PagSeguro</option>
                <option value="picpay">PicPay</option>
                <option value="nubank">Nubank (Pix)</option>
            </select>

            <label for="amount">Valor do Pagamento:</label>
            <input type="number" name="amount" id="amount" placeholder="Ex: 100.00" required>

            <button type="submit">Gerar Link</button>
        </form>
    </div>

    <footer>
        <p>&copy; 2025 Sistema de Pagamentos. Todos os direitos reservados.</p>
    </footer>
</body>
</html>
