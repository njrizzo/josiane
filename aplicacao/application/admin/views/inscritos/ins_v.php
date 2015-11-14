<?php
$this->load->view('template/cabecalho');  
$this->load->view('template/menuins');  




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

          
    

<?=form_open('inscricao/listar');?>
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
<h2 align="center" ><font color="#00009C">Lista de inscri&ccedil;&otilde;es </font>  </h2>

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
            E-mail
            </th>
             <th>
            E-mail do chefe
            </th>
            <th>
                Turma
            </th>
            <th>
               Situação
            </th>
         
             
            
            <th  colspan="2" >
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
                <?php echo  date('d/m/Y', strtotime($linha->datains)) ?> 
            </td>
            <td>
                <?=$linha->nomeserv ?>
            </td>
            <td>
                <?=$linha->email ?>
            </td>
            <td>
                <?=$linha->emailchefe ?>
            </td>
             <td>
                <?=$linha->nometurma?>
            </td>
           
             <td>
                <?=$linha->situacao ?>
            </td>
         
            
          
             <td background="figuras/editar.jpeg" > 
				 <?= anchor("inscricao/editar/$linha->codinscricao",'<img src="figuras/editar.jpg" alt="editar" alt="Smiley face" />')?>
               <td>    
                <?php echo anchor("inscricao/deletar/$linha->codinscricao",'<img src="figuras/ex2.jpg" alt="editar" name="cadastro" />')?>
                  
           
          
            
            
            
            
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
