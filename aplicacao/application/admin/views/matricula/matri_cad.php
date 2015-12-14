<?php
$this->load->view('template/cabecalho');  
$this->load->view('template/menumatri'); 
//echo validation_errors();
echo form_open('matricula/cadastrar');

?>

<head>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script > 
	function busca_turma(codigo){
		var base_url = '<?php echo base_url() ?>';
		

			
			$.post(base_url+"administrador.php/matricula/busca_servidores_inscritos", {
				codigo : codigo
			}, function(data){
				$('#codserv').html(data);
			});
		
		//alert(id_departamento);
		}
		
	
	
	</script>

</head>


            <td width="553" align="left" valign="top" bgcolor="#FFFFFF">
	
		<?php	
            if($this->session->flashdata('cadastrook')):
echo'<p>'.$this->session->flashdata('cadastrook').'</p>';
endif
?>
            <h1 align="center" ><font color="#00009C">Cadastrar nova matr&iacute;cula</font>   </h1>

<table width="472" border="0" id="logon">
  <tr>
	  
    <td width="101" height="25">Data</td>
    <td width="361">
		<?php echo form_error('datamat');  ?>
		<?php $dataHora = date("d/m/Y "); ?>
       <input name="datamat"  type="text"  value=" <?php echo "$dataHora" ;?>" class="input_text" readonly="readonly" /> 
       
    </td>
  </tr>
  
   <tr>
    <td height="25">Turma:</td>
    <td>
		<select name="codturma" id="codturma" onchange='busca_turma($(this).val())' class="input_text" >
							<?= $options_turmas; ?>
							<?php echo set_value('codturma', $options_turmas );   ?>
				
	 


</select>


<?php echo form_error('codturma');  ?>
      
      <br />
      
  </tr>
  
  <tr>
    <td height="25">Servidores:</td>
    <td>

<select name="codserv" id="codserv" class="input_text">
				
</select>


<?php echo form_error('codserv');  ?>
       <?php  //echo form_dropdown('codserv', $servs, set_value('codserv'));?>
     </td>
  </tr>
 

  <tr>
    <td height="25">Estado:</td>
    <td>
		
        <select name="situacao" id="situacao" class="input_text">
		<option value=''>----selecione----</option>
        <option value="cursando" <?php echo set_select('situacao','cursando'); ?>>Cursando</option>
        <option value="aprovado" <?php echo set_select('situacao','aprovado'); ?>>Aprovado</option>
        <option value="insuficiente" <?php echo set_select('situacao','insuficiente'); ?>>Insuficiente</option>
        <option value="desistente" <?php echo set_select('situacao','desistente'); ?>>Desistente</option>
      </select><?php echo form_error('situacao'); ?><br />
      </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>
      
    </td>
    <td align="right"><input name="cadastrar" type="submit" class="input_bt" id="cadastrar" value="Cadastrar" /></td>
  </tr>
</table>

				
				</td>

           
          <?php
           
         echo form_close();
$this->load->view('template/rodape');
?>
