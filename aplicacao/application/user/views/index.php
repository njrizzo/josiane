	<?php
//Carregando a biblioteca mPDF
$this->load->library('mpdf/mpdf');
//Inicia o buffer, qualquer HTML que for sair agora sera capturado para o buffer

ob_start();
?>


<html>
<head>
    <title>Sistema de Login</title>
    
</head>
<body>
    <?php

//Fazendo o include de um HTML em outro arquivo, ficara retido no buffer

$this->load->view('conteudo.html');

//Limpa o buffer jogando todo o HTML em uma variavel.

$html = ob_get_clean();

$mpdf=new mPDF();

$mpdf->WriteHTML($html);

//Colocando o rodape

$mpdf->SetFooter('{DATE j/m/Y H:i}|Página {PAGENO} de {nb}|www.gqferreira.com.br');

$mpdf->Output();
$mpdf->charset_in='windows-1252';
exit;
?>


</body>
</html>
