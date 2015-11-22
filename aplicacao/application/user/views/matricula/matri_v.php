<style type="text/css">
	<!--
tbody > tr:nth-of-type(odd) {
  background-color: lightgray;
}
table {
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

<?php
$this->load->view('template/cabecalho');  
$this->load->view('template/menuser');  
?>


<td width="553" align="left" valign="top" bgcolor="#FFFFFF">




            
    


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
                Turma
            </th>
            <th>
               Situação
            </th>
         
             
            
            <th  colspan="3" >
				Cancelar
				
				
               
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
                <?=$linha->nometurma?>
            </td>
             <td>
                <?=$linha->situacao ?>
            </td>
         
            
          
            
               <td align="center">    
                <?php echo anchor("matricula/deletar/$linha->codmatricula",'<img src="figuras/ex2.jpg" alt="editar" name="cadastro" />')?>
                  
            
          
            
            
            
            
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
