<?php
$this->load->view('template/cabecalho');  
$this->load->view('template/menucurso');  



/*
echo '<td width="553" align="left" valign="top" bgcolor="#FFFFFF">';
$template = array(
          'table_open'            => '<table border="1" cellpadding="4" cellspacing="0" class="table"  cols="45" rows="5" maxlength = "100" size = "50" >'

       
);

$this->table->set_template($template);

echo '<h2>Lista de cursos   </h2>';
foreach($cadastros as $linha):
$this->table->add_row($linha->codcurso,$linha->nome,$linha->modulo,$linha->descricao,$linha->cargahr,$linha->areatema,$linha->competencia,$linha->estado);
echo $this->table->generate();
endforeach;

*/


?>

<head>
<style type="text/css">
	<!--
tbody > tr:nth-of-type(odd) {
  background-color: gray;
}
table, th, td {
  border: 1px solid black;
  
}
-->
</style>


</head>
<td width="553" align="left" valign="top" bgcolor="#FFFFFF">


<h2 align="center" ><font color="#00009C">Lista de cursos </font>  </h2>
<table border="1" >
    <thead>
        <tr >
        <th>
                ld
            </th>
            
            <th>
                Nome
            </th>
            
            <th>
            M&oacute;dulo
            </th>
            <th>
                Descri&ccedil;&atilde;o
            </th>
            <th>
                Carga hor&aacute;ria
            </th>
            <th>
                &Aacute;rea tem&aacute;tica
            </th>
            <th>
               Compet&ecirc;ncia
            </th>
            <th>
              Estado
            </th>
             
            
            <th>
                Ações
            </th>
        </tr>
    </thead>
    <tbody>
        <?php if ($cursos != false): ?>
        <?php foreach ($cursos as $linha): ?>
            <tr>
            <td>
                <?=$linha->codcurso ?>
            </td>
            <td>
                <?=$linha->nome ?>
            </td>
            <td>
                <?=$linha->modulo ?>
            </td>
             <td>
                <?=$linha->descricao?>
            </td>
             <td>
                <?=$linha->cargahr ?>
            </td>
             <td>
                <?=$linha->areatema ?>
            </td>
             <td>
                <?=$linha->competencia ?>
            </td>
             <td>
                <?=$linha->estado?>
            </td>
              
            
            
             <th  >
               <?= anchor("curso/editar/$linha->codcurso",'editar')?>
                <?= anchor("curso/deletar/$linha->codcurso",'__X__')?>
            </th>
            
            
            
            
            
        </tr>
        <?php endforeach; ?>
        <?php else: ?>
        <p>Não há registros cadastrados!</p>
        <?php endif ?>
    </tbody>
</table>







<?php

$this->load->view('template/rodape');
?>
