<?php
$this->load->view('template/cabecalho');  
$this->load->view('template/menumatri');  




?>

<head>
<style type="text/css">
	<!--
tbody > tr:nth-of-type(odd) {
  background-color: lightgray;
}
table{
  border: 1px solid black;
  
}
input{

color:#00009C;
}
thead{
background-color:#00009C;
color:#FFFFFF
}
-->
</style>


</head>
<td width="553" align="left" valign="top" bgcolor="#FFFFFF">

            
    

<?=form_open('matricula/listar');?>
<?php $pesquisar = array('name'=>'pesquisar','id'=>'pesquisar','value'=>'' );?>
<table align="right">

<tr>
	<td colspan="2" align="center"><font color="#00009C">Pesquisar </font> </td>
<td><?=form_input($pesquisar);?></td>
<td><input type=submit  value='Ir' /></td>
</tr></table>

<?=form_close();?>

<?php	
            if($this->session->flashdata('excluirok')):
echo'<p>'.$this->session->flashdata('excluirok').'</p>';

endif;

?>
<br>
<h2 align="center" ><font color="#00009C">Lista de  matr&iacute;culas </font>  </h2>

<table border="1" align="center" >
    <thead>
        <tr >
        <th>
                Curso
            </th>
            <th>
                Módulo
            </th>
            <th>
               Data
            </th>
            
            <th>
            Servidor
            </th>
            <th>
                Turma
            </th>
            <th>
               Situação
            </th>
         
             
            
            <th  colspan="3" >
				 Ações
				
				
               
            </th>
        </tr>
    </thead>
    <tbody>
        <?php if ($query2 != false): ?>
        <?php foreach ($query2 as $linha): ?>
            <tr>
            <td>
                <?=$linha->nome ?>
            </td>
             <td>
                <?=$linha->modulo ?>
            </td>
            <td>
                <?php echo  date('d/m/Y', strtotime($linha->datamat)) ?> 
            </td>
            <td>
                <?=  $linha->nomeserv ?>
            </td>
             <td>
                <?=$linha->nometurma?>
            </td>
             <td>
                <?=$linha->situacao ?>
            </td>
         
            
          
             <td background="figuras/editar.jpeg" > 
				 <?= anchor("matricula/editar/$linha->codmatricula",'<img src="figuras/editar.jpg" alt="editar" alt="Smiley face" />')?>
               <td>    
                <?php echo anchor("matricula/deletar/$linha->codmatricula",'<img src="figuras/ex2.jpg" alt="editar" name="cadastro" />')?>
                  
           <td>    
                <?php if ($linha->situacao == 'aprovado'): echo anchor_popup("matricula/gerar_cert/$linha->codmatricula",'<img src="figuras/cert.png" alt="editar" name="cadastro" />'); endif ?>
                  
          
            
            
            
            
        </tr>
        <?php endforeach; ?>
        <?php else: ?>
        <p>Não há registros cadastrados!</p>
        <?php endif ?>
    </tbody>
</table>







<?php
echo $page;
$this->load->view('template/rodape');
?>
