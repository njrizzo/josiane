<?php
$this->load->view('template/cabecalho');  
$this->load->view('template/menurel');  




?>
<head>
<style type="text/css">
	<!--
tbody > tr:nth-of-type(odd) {
  background-color: lightgray;
}
table, th, td {
  border: 1px solid black;
  
}

-->
</style>


</head>

<td width="553" align="left" valign="top" bgcolor="#FFFFFF">
<h1  align="center" > <font color="#00009C">Lista dos Relat&oacute;rios do Sistema </font></h1>
 <ul>
<li><?php echo anchor("relatorio/aprovados_curso",'Relat&oacute;rio Geral dos Aprovados')?>
<li> <?php echo anchor("relatorio/matricula_curso",'Relat&oacute;rio Geral dos Matriculados')?>
<li > <?php echo anchor("relatorio/inscritos_curso",'Relat&oacute;rio Geral dos Inscritos ')?>
<li><?php echo anchor("relatorio/servidores_total",'Relat&oacute;rio Geral dos Servidores')?>
</ul>




<?php

$this->load->view('template/rodape');
?>
