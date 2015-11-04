<?php
$this->load->view('template/cabecalho');  
$this->load->view('template/menuturma'); 
//echo validation_errors();
echo form_open('turma/cadastrar');
;
?>
            <td width="553" align="left" valign="top" bgcolor="#FFFFFF">
		<?php	
            if($this->session->flashdata('cadastrook')):
echo'<p>'.$this->session->flashdata('cadastrook').'</p>';
endif
?>
            <h1 align="center" ><font color="#00009C">Cadastrar nova turma </font>   </h1>

<table width="472" border="0" id="logon">
  
  
  <tr>
    <td>Curso:</td>
    <td>
		    <select name="codcurso" id="codcurso">
				 <option value=''>----selecione----</option>
<?php
foreach ($cursos as $i => $nome)
   echo '<option value="',$i,'" >',$nome,'</option>';
?>
</select><?php echo form_error('codcurso');  ?>
	
  <?php //echo form_error('codcurso'); echo form_dropdown('codcurso', $cursos);?>
  
   
    
      </td>
  </tr>
  <tr>
	  
    <td width="101">Nome:</td>
    <td width="361">
		<?php echo form_error('nometurma'); ?>
        <input name="nometurma" type="text" value="<?php echo set_value('nometurma'); ?>" class="input_text" id="nometurma" />
        
    </td>
  </tr>
  
  <tr>
    <td>Dias da semana:</td>
    <td>
		
	
<input type="checkbox" name="diasemana[]" value="segunda"   />Segunda
<input type="checkbox" name="diasemana[]" value="ser&ccedil;a"/>Ter&ccedil;a
<input type="checkbox" name="diasemana[]" value="quarta"  />Quarta
<input type="checkbox" name="diasemana[]" value="quinta"  />Quinta
<input type="checkbox" name="diasemana[]" value="sexta"  />Sexta<br>
<input type="checkbox" name="diasemana[]" value="s&aacute;bado" />S&aacute;bado
<?php echo form_error('diasemana[]'); ?>
     </td>
  </tr>
  <tr>
    <td>Data de in&iacute;cio:</td>
    <td>
		
      <input name="datainicio" type="date" value="<?php echo set_value('datainicio'); ?>" />
    <?php echo form_error('datainicio'); ?>
      
  </tr>
  <tr>
    <td>Data do fim:</td>
    <td>
		
      <input name="datafim" type="date" value="<?php echo set_value('datafim'); ?>" />
     <?php echo form_error('datafim'); ?>
  </tr>
  <tr>
    <td>*Hora de in&iacute;cio :</td>
    <td>
		
		<?php echo form_error('horainicio'); ?>
      <input name="horainicio" type="text" value="<?php echo set_value('horainicio'); ?>"  id="horainicio" />
      
      </td>
  </tr>
  <tr>
    <td>*Hora do fim :</td>
    <td>
		<?php echo form_error('horafim'); ?>
      <input name="horafim" type="text" value="<?php echo set_value('horafim'); ?>"  id="horafim" />
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
    <td align="right"><input name="cadastrar" type="submit" class="input_bt" id="cadastrar" value="Cadastrar" /></td>
  </tr>
</table>

				
				</td>

           
          <?php
         echo form_close();
$this->load->view('template/rodape');
?>
