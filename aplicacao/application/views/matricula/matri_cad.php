<?php
$this->load->view('template/cabecalho');  
$this->load->view('template/menumatri'); 
//echo validation_errors();
echo form_open('matricula/cadastrar');

//echo form_close();
?>
            <td width="553" align="left" valign="top" bgcolor="#FFFFFF">
		<?php	
            if($this->session->flashdata('cadastrook')):
echo'<p>'.$this->session->flashdata('cadastrook').'</p>';
endif
?>
            <h1 align="center" ><font color="#00009C">Cadastrar nova matr&iacute;cula</font>   </h1>

<table width="472" border="0" id="logon">
  <tr>
	  
    <td width="101">Data</td>
    <td width="361">
		<?php echo form_error('datamat');  ?>
		<?php $dataHora = date("d/m/Y "); ?>
       <input name="datamat" type="text"  value=" <?php echo "$dataHora" ;?>"  readonly="readonly" />
        
    </td>
  </tr>
  <tr>
    <td>Servidor:</td>
    <td>
		<select name="codserv" id="codserv">
				 <option value='' >----selecione----</option>
<?php
foreach ($servs as $i => $nome)
   echo '<option value="',$i,'" >',$nome,'</option>';
?>
</select><?php echo form_error('codserv');  ?>
       <?php //echo form_error('codserv'); echo form_dropdown('codserv', $servs);?>
     </td>
  </tr>
  <tr>
    <td>Turma:</td>
    <td>
		<select name="codturma" id="codturma">
				 <option value=''>----selecione----</option>
<?php
foreach ($turmas as $i => $nome)
   echo '<option value="',$i,'" >',$nome,'</option>';
?>
</select><?php echo form_error('codturma');  ?>
       <?php //echo form_error('codturma'); echo form_dropdown('codturma', $turmas);?>
      <br />
      
  </tr>

  <tr>
    <td>Estado:</td>
    <td>
		
      <select name="situacao" id="situacao" >
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
