<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerar QR Code</title>
    <style>
        /* Adicionar o mesmo estilo da home */
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        header, footer {
            background-color: #333;
            color: #fff;
            padding: 15px;
            text-align: center;
        }

        nav a {
            padding: 14px 20px;
            text-decoration: none;
            color: #fff;
        }

        nav {
            background-color: #444;
            overflow: hidden;
        }

        nav a:hover {
            background-color: #575757;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .form-container {
            text-align: center;
        }

        .form-container input, .form-container select {
            padding: 10px;
            font-size: 16px;
            margin: 10px;
        }

        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px;
            position: fixed;
            width: 100%;
            bottom: 0;
        }
    </style>
</head>
<body>
    <!-- Cabeçalho -->
    <header>
        <h1>Gerar QR Code</h1>
    </header>

    <!-- Menu de Navegação -->
    <nav>
        <a href="index.php">Home</a>
        <a href="gerar_link_pagamento.php">Gerar Link de Pagamento</a>
        <a href="gerar_pix.php">Gerar Pix</a>
    </nav>

    <!-- Formulário para Gerar QR Code -->
    <div class="container">
        <div class="form-container">
            <h2>Escolha o Gateway e o Valor</h2>
            <form method="POST" action="gerar_qrcode.php">
                <label for="gateway">Selecione o Gateway:</label>
                <select name="gateway" id="gateway" required>
                    <option value="mercadopago">Mercado Pago</option>
                    <option value="pagseguro">PagSeguro</option>
                    <option value="picpay">PicPay</option>
                    <option value="nubank">Nubank (Pix)</option>
                </select><br><br>

                <label for="amount">Valor:</label>
                <input type="number" name="amount" id="amount" required><br><br>

                <button type="submit">Gerar QR Code</button>
            </form>
        </
