<nav>
    <a href="home.php" class="<?= basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : '' ?>">Home</a>
    <a href="gerar_link_pagamento.php" class="<?= basename($_SERVER['PHP_SELF']) == 'gerar_link_pagamento.php' ? 'active' : '' ?>">Gerar Link de Pagamento</a>
    <a href="gerar_qrcode.php" class="<?= basename($_SERVER['PHP_SELF']) == 'gerar_qrcode.php' ? 'active' : '' ?>">Gerar QR Code</a>
    <a href="gerar_pix.php" class="<?= basename($_SERVER['PHP_SELF']) == 'gerar_pix.php' ? 'active' : '' ?>">Gerar Pix</a>
    <a href="gerenciarapi.php" class="<?= basename($_SERVER['PHP_SELF']) == 'gerar_pix.php' ? 'active' : '' ?>">Gerenciar APIs</a>
</nav>
