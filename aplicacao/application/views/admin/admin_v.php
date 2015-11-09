<?php
$this->load->view('template/cabecalho');  
$this->load->view('template/menuadm');  




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

          
    

<?=form_open('administrador/listar');?>

  <?php	
            if($this->session->flashdata('excluirok')):
echo'<p>'.$this->session->flashdata('excluirok').'</p>';

endif;

?>
<br>
<h2 align="center" ><font color="#00009C">Lista de Administradores </font>  </h2>

<table border="1" align="center">
    <thead>
        <tr >
        
            
            <th>
                Nome
            </th>
            
            <th>
            Login
            </th>
            <th>
                Lembrete de senha
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
                <?=$linha->username ?>
            </td>
             <td>
                <?=$linha->lembrasenha?>
            </td>
             
              
            
          
             <td background="figuras/editar.jpeg" > 
				 <?= anchor("administrador/editar/$linha->id",'<img src="figuras/editar.jpg" alt="editar" alt="Smiley face" />')?>
               <td>    
                <?php echo anchor("administrador/deletar/$linha->id",'<img src="figuras/ex2.jpg" alt="editar" name="cadastro" />')?>
                  
           
          
            
            
            
            
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
