<?php
$this->load->view('template/cabecalho');  
$this->load->view('template/menucurso'); 
//echo validation_errors();
echo form_open('curso/cadastrar');


?>
            <td width="553" align="left" valign="top" bgcolor="#FFFFFF">
		<?php	
            if($this->session->flashdata('cadastrook')):
echo'<p>'.$this->session->flashdata('cadastrook').'</p>';
endif
?>
          

  <h1 align="center" ><font color="#00009C">Cadastrar novo curso </font>   </h1>

<table width="472" border="0" id="logon">
  <tr>
	  
    <td height="25">Nome: </td>
    
    <td >
		
        <input type="text" name="nome"  value="<?php echo set_value('nome'); ?>"  id="nome" />
        <?php echo form_error('nome'); ?>
     
    </td>
  </tr>
  <tr>
    <td height="25">M&oacute;dulo:</td>
    <td>
		
      <input type="text" name="modulo"  value="<?php echo set_value('modulo'); ?>"  id="modulo" />
      <?php echo form_error('modulo'); ?>
     </td>
  </tr>
  <tr>
    <td>Descri&ccedil;&atilde;o:</td>
    <td>
		
      <textarea name="descricao" value="<?php echo set_value('descricao'); ?>" cols="45" rows="5" id="descricao"></textarea>
				<br><?php echo form_error('descricao'); ?>
      
      
  </tr>
  <tr>
    <td>Carga hor&aacute;ria:</td>
    <td>
		
    <input type="text" name="cargahr" value="<?php echo set_value('cargahr'); ?>" id="cargahr" size="5"/>
    <?php echo form_error('cargahr'); ?>
    <br />
   <span>*Digite somente n&uacute;meros.</span></td>
  </tr>
  <tr>
    <td height="25"> &Aacute;rea tem&aacute;tica:</td>
    <td>
		
      <input name="areatema" type="text" value="<?php echo set_value('areatema'); ?>"  id="areatema" />
      <?php echo form_error('areatema'); ?>
      </td>
  </tr>
  <tr>
    <td>Compet&ecirc;ncia:</td>
    <td>
		
      <textarea name="competencia" value="<?php echo set_value('competencia'); ?>" id="competencia" cols="45" rows="5"></textarea>
      <br><?php echo form_error('competencia'); ?>
     </td>
  </tr>
  <tr>
    <td>Estado:</td>
    <td>
		
      <select name="estado" id="estado" >
        <option value=''>----selecione----</option>
        <option value="ativo" <?php echo set_select('estado','ativo'); ?>>ativo</option>
        <option value="inativo" <?php echo set_select('estado','inativo'); ?>>inativo</option>
      </select><?php echo form_error('estado'); ?><br />
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
