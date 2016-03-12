<?php
$this->load->view('template/cabecalho');  
$this->load->view('template/menuturma'); 
$id = $this->uri->segment(3);
if ($id==NULL) redirect('turma/index'); 
$query = $this ->turma_m->atualizar($id)->row();
//echo validation_errors();

echo form_open("turma/editar/$id");

//echo form_close();
?>
            <td width="553" align="left" valign="top" bgcolor="#FFFFFF">
			
            <?php	
            if($this->session->flashdata('editarok')):
echo'<p>'.$this->session->flashdata('editarok').'</p>';
endif
?>
            <h1 align="center" ><font color="#00009C">Alterar turma</font>   </h1>
<table width="472" border="0" id="logon">
  
  
  <tr>
    <td>Curso:</td>
    <td>
	


   
<?php

   echo form_dropdown('codcurso', $cursos, set_value('codcurso',$query->codcurso));
?>

 
      </td>
  </tr>
  <tr>
	  
    <td width="101">Nome:</td>
    <td width="361">
		<?php echo form_error('nometurma'); ?>
        <input name="nometurma" type="text" value="<?php echo set_value('nometurma',$query->nometurma); ?>"  id="nometurma" />
        
    </td>
  </tr>
  
  <tr>
    <td>Dias da semana:</td>
    <td>
		
	<?php echo form_error('diasemana[]'); ?>
<input name="diasemana[]" type="text" value="<?php echo set_value('diasemana[]',$query->diasemana); ?>" class="input_text" id="diasemana" /><br>
<input type="checkbox" name="diasemana[]" value="segunda" <?php echo set_checkbox('diasemana[]', 'Segunda',$query->diasemana ); ?>  />Segunda
<input type="checkbox" name="diasemana[]" value="ter&ccedil;a" <?php echo set_checkbox('diasemana[]', 'Ter&ccedil;a',$query->diasemana ); ?>  />Ter&ccedil;a
<input type="checkbox" name="diasemana[]" value="quarta"  <?php echo set_checkbox('diasemana[]', 'Quarta',$query->diasemana ); ?>/>Quarta
<input type="checkbox" name="diasemana[]" value="quinta"  <?php echo set_checkbox('diasemana[]', 'Quinta',$query->diasemana ); ?>/>Quinta
<input type="checkbox" name="diasemana[]" value="sexta"  <?php echo set_checkbox('diasemana[]', 'Sexta',$query->diasemana ); ?>/>Sexta<br>
<input type="checkbox" name="diasemana[]" value="s&aacute;bado" <?php echo set_checkbox('diasemana[]', 'S&aacute;bado',$query->diasemana ); ?>/>S&aacute;bado  </td>
  </tr>
  <tr>
    <td>Data de in&iacute;cio:</td>
    <td>
		<?php echo form_error('datainicio'); ?>
      <input name="datainicio" type="date" value="<?php echo set_value('datainicio',$query->datainicio); ?>" />
      <br />
      
  </tr>
  <tr>
    <td>Data do fim:</td>
    <td>
		<?php echo form_error('datafim'); ?>
      <input name="datafim" type="date" value="<?php echo set_value('datafim',$query->datafim); ?>" />
      <br />
      
  </tr>
  <tr>
    <td>*Hora de in&iacute;cio :</td>
    <td>
		
		<?php echo form_error('horainicio'); ?>
      <input name="horainicio" type="text" value="<?php echo set_value('horainicio',$query->horainicio); ?>"  id="horainicio" />
      
      </td>
  </tr>
  <tr>
    <td>*Hora do fim :</td>
    <td>
		<?php echo form_error('horafim'); ?>
      <input name="horafim" type="text" value="<?php echo set_value('horafim',$query->horafim); ?>"  id="horafim" />
      <span>*(hh:mm)</span>
      </td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>
      
    </td>
    <td align="right"><input name="alterar" type="submit" class="input_bt" id="alterar" value="Alterar" /></td>
  </tr>
</table>

				
				</td>


           
          <?php
          echo form_hidden('$idturma',$query->codturma);
         echo form_close();
$this->load->view('template/rodape');
?>
