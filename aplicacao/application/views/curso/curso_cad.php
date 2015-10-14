<?php
$this->load->view('template/cabecalho');  
$this->load->view('template/menucurso'); 
//echo validation_errors();
echo form_open('curso/cadastrar');
if($this->session->flashdata('cadastrook')):
echo'<p>'.$this->session->flashdata('cadastrook').'</p>';
endif
//echo form_close();
?>
            <td width="553" align="left" valign="top" bgcolor="#FFFFFF">
			
            
            <h1 align="center" >Cadastrar novo curso   </h1>

<table width="472" border="0" id="logon">
  <tr>
	  
    <td width="101">Nome:</td>
    <td width="361">
		<?php echo form_error('nome'); ?>
        <input name="nome" type="text" value="<?php echo set_value('nome'); ?>" class="input_text" id="nome" />
        
    </td>
  </tr>
  <tr>
    <td>M&oacute;dulo:</td>
    <td>
		<?php echo form_error('modulo'); ?>
      <input name="modulo" type="text" value="<?php echo set_value('modulo'); ?>" class="input_text" id="modulo" />
     </td>
  </tr>
  <tr>
    <td>Descri&ccedil;&atilde;o:</td>
    <td>
		<?php echo form_error('descricao'); ?>
      <textarea name="descricao" value="<?php echo set_value('descricao'); ?>" cols="45" rows="5" id="descricao"></textarea>
      <br />
      
  </tr>
  <tr>
    <td>Carga hor&aacute;ria:</td>
    <td>
		<?php echo form_error('cargahr'); ?>
    <input type="text" name="cargahr" value="<?php echo set_value('cargahr'); ?>" id="cargahr" size="5"/>
    <br />
   <span>*Digite somente n&uacute;meros.</span></td>
  </tr>
  <tr>
    <td>&Aacute;rea tem&aacute;tica:</td>
    <td>
		<?php echo form_error('areatema'); ?>
      <input name="areatema" type="text" value="<?php echo set_value('areatema'); ?>" class="input_text" id="areatema" />
      </td>
  </tr>
  <tr>
    <td>Compet&ecirc;ncia:</td>
    <td>
		<?php echo form_error('competencia'); ?>
      <textarea name="competencia" value="<?php echo set_value('competencia'); ?>" id="competencia" cols="45" rows="5"></textarea><br />
     </td>
  </tr>
  <tr>
    <td>Estado:</td>
    <td>
		<?php echo form_error('estado'); ?>
      <select name="estado" id="estado" >
        <option >--selecione--</option>
        <option value="ativo" <?php echo set_select('estado','ativo'); ?>>ativo</option>
        <option value="inativo" <?php echo set_select('estado','inativo'); ?>>inativo</option>
      </select><br />
      </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>
      
    </td>
    <td align="right"><input name="proximo" type="submit" class="input_bt" id="proximo" value="Cadastrar" /></td>
  </tr>
</table>

				
				</td>

           
          <?php
         echo form_close();
$this->load->view('template/rodape');
?>
