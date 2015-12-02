<?php
$this->load->view('template/cabecalho');  
$this->load->view('template/menuser');  




?>


<style type="text/css">
	<!--
tbody > tr:nth-of-type(odd) {
  background-color: lightgray;
}
table {
  border: 1px solid black;
  
}

img {
border:1px solid black;
}
thead{
background-color:#00009C;
color:#FFFFFF
}
-->
</style>



<td width="553" align="left" valign="top" bgcolor="#FFFFFF">

    

<h2 align="center" ><font color="#00009C">Lista de  Certificados </font>  </h2>

<table border="1" color = "black" align="center"  width="472"  >
    <thead>
        <tr >
			 <th>
            Nome
            </th>
			<th>
                Curso
            </th>
               <th>
                Módulo
            </th>
            <th>
              Período
            </th>
            
           
            <th>
               Carga horária
            </th>
            <th>
               Situação
            </th>
         
             
            
            <th   >
				 Gerar
				
				
               
            </th>
        </tr>
    </thead>
    <tbody>
        <?php if ($query2 != false): ?>
        <?php foreach ($query2 as $linha): ?>
       <?php if ($linha->situacao == 'aprovado'):?>
            <tr>
				 <td>
                <?=  $linha->nomeserv ?>
            </td>
            <td>
                <?=$linha->nome ?>
            </td>
             <td>
                <?=$linha->modulo?>
            </td>
            <td>
                <?php echo  date('d/m/Y', strtotime($linha->datainicio)) ?> a <?php echo  date('d/m/Y', strtotime($linha->datafim)) ?>
            </td>
           
             <td>
                <?=$linha->cargahr?>
            </td>
             <td>
                <?=$linha->situacao ?>
            </td>
         
            
          
               <td align="center">    
                <?php  echo anchor_popup("certificado/gerar/$linha->codmatricula",'<img src="figuras/cert.png" alt="editar" name="cadastro" />'); ?>
                  
          
            
            
            
            
        </tr>
        <?php endif; ?>
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
