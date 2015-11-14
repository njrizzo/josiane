<?php
$this->load->view('template/cabecalho');  
$this->load->view('template/menuserv');  




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
img {
border:1px solid black;
}
input{

color:#0000;
}
thead{
background-color:#00009C;
color:#FFFFFF
}
-->
</style>


</head>
<td width="553" align="left" valign="top" bgcolor="#FFFFFF">

    

<?=form_open('servidor/listar');?>
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
<h2 align="center" ><font color="#00009C">Lista de Servidores Cadastrados </font>  </h2>

<table border="1" >
    <thead>
        <tr >
       
            
            <th width="1668">
                Nome
            </th>
            
            <th>
           Setor
            </th>
            <th>
              SIAPE
            </th>
            <th>
                Email
            </th>
            <th>
                Telefone
            </th>
            <th>
              Nome chefe
            </th>
            <th>
            Email chefe
            </th>
             
            
            <th width="668" >
				 Ações
				
				
               
            </th>
        </tr>
    </thead>
    <tbody>
        <?php if ($query2 != false): ?>
        <?php foreach ($query2 as $linha): ?>
            <tr>
           
            <td width="1668">
                <?=$linha->nomeserv ?>
            </td>
            <td>
                <?=$linha->setor ?>
            </td>
             <td>
                <?=$linha->siape?>
            </td>
             <td>
                <?=$linha->email ?>
            </td>
             <td>
                <?=$linha->telcontato ?>
            </td>
             <td>
                <?=$linha->nomechefe ?>
            </td>
             <td>
                <?=$linha->emailchefe?>
            </td>
              
            
          
             <td align="center" > 
				 <?= anchor("servidor/editar/$linha->codserv",'<img src="figuras/editar.jpg" />')?>
				 <?php echo anchor("servidor/deletar/$linha->codserv",'<img src="figuras/ex2.jpg"  />')?>
              
          
            
            
            
            
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
