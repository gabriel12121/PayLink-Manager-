<?php
// Configurações do Mercado Pago
$accessToken = 'SEU_ACCESS_TOKEN_DO_MERCADO_PAGO';

// Função para criar o link de pagamento
function criarLinkPagamento($descricao, $quantidade, $precoUnitario, $accessToken) {
    $url = "https://api.mercadopago.com/checkout/preferences";

    $dados = [
        "items" => [
            [
                "title" => $descricao,
                "quantity" => $quantidade,
                "unit_price" => $precoUnitario,
                "currency_id" => "BRL"
            ]
        ],
        "back_urls" => [
            "success" => "http://seusite.com/sucesso",
            "failure" => "http://seusite.com/falha",
            "pending" => "http://seusite.com/pendente"
        ],
        "auto_return" => "approved"
    ];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "Authorization: Bearer $accessToken",
        "Content-Type: application/json"
    ]);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($dados));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $resposta = curl_exec($ch);

    if (curl_errno($ch)) {
        echo "Erro ao comunicar com o Mercado Pago: " . curl_error($ch);
        curl_close($ch);
        return null;
    }

    curl_close($ch);
    $respostaDecodificada = json_decode($resposta, true);

    return $respostaDecodificada['init_point'] ?? null;
}

// Processar o formulário
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $descricao = $_POST['descricao'];
    $quantidade = (int)$_POST['quantidade'];
    $preco = (float)$_POST['preco'];

    $linkPagamento = criarLinkPagamento($descricao, $quantidade, $preco, $accessToken);

    if ($linkPagamento) {
        echo "<div class='link-gerado'>";
        echo "<h2>Link Gerado com Sucesso!</h2>";
        echo "<p><a href='$linkPagamento' target='_blank'>Clique aqui para acessar o link de pagamento</a></p>";
        echo "</div>";
    } else {
        echo "<p>Erro ao gerar o link de pagamento. Tente novamente.</p>";
    }
} else {
    echo "<p>Método inválido. Por favor, envie os dados através do formulário.</p>";
}
?>
