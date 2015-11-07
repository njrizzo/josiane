<?php
$this->load->view('template/cabecalho');  
$this->load->view('template/menuturma');  




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


    

<?=form_open('turma/listar');?>
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
endif
?>
<br>
<h2 align="center" ><font color="#00009C">Lista de turmas</font>  </h2>

<table border="1" >
    <thead>
        <tr >
       
             <th>
             Curso
            </th>
            <th>
             Módulo
            </th>
            <th>
                Nome
            </th>
            
            <th>
            Dias da semana
            </th>
            <th>
             Data de início
            </th>
            <th>
                Data do fim
            </th>
            <th>
                Hora de início
            </th>
            <th>
               Hora de fim
            </th>
           
             
            
            <th colspan="2" >
				 Ações
				
				
               
            </th>
        </tr>
    </thead>
    <tbody>
        <?php if ($query2 != false): ?>
        <?php foreach ($query2 as $linha): ?>
            <tr>
             <td>
                <?=$linha->nome?>
            </td>
              <td>
                <?=$linha->modulo?>
            </td>
            <td>
                <?=$linha->nometurma ?>
            </td>
            <td>
                <?=$linha->diasemana ?>
            </td>
             <td>
                <?php echo  date('d/m/Y', strtotime($linha->datainicio)) ?>
            </td>
             <td>
                <?php echo  date('d/m/Y', strtotime($linha->datafim )) ?>
            </td>
             <td>
                <?=$linha->horainicio ?>
            </td>
             <td>
                <?=$linha->horafim ?>
            </td>
           
            
          
             <td background="figuras/editar.jpeg" > 
				 <?= anchor("turma/editar/$linha->codturma",'<img src="figuras/editar.jpg" alt="editar" alt="Smiley face" />')?>
               <td>    
                <?php echo anchor("turma/deletar/$linha->codturma",'<img src="figuras/ex2.jpg" alt="editar" name="cadastro" />')?>
                  
           
          
            
            
            
            
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
