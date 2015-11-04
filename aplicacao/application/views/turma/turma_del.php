<?php
$this->load->view('template/cabecalho');  
$this->load->view('template/menuturma'); 
$id = $this->uri->segment(3);
if ($id==NULL) redirect('turma/index'); 
$query = $this ->turma_m->atualizar($id)->row();
echo form_open("turma/deletar/$id");
  echo form_hidden('$idturma',$query->codturma);
//echo form_close();
?>
            <td width="553" align="left" valign="top" bgcolor="#FFFFFF">
			
            
            <h1 align="center" ><font color="#00009C">Deletar turma </font>  </h1>
<table width="472" border="0" id="logon">
  
  
  <tr>
    <td>Curso:</td>
    <td >  
<?php
/*
foreach ($cursos as $i => $linha)
   echo '<option values="',$i,'">',$linha,'</option>';
   */
   echo form_dropdown('codcurso', $cursos, set_value('codcurso',$query->codcurso), 'disabled="disabled"');
?>

 
      </td>
  </tr>
  <tr>
	  
    <td width="101">Nome:</td>
    <td width="361">
		
        <input name="nometurma" type="text" value="<?php echo set_value('nometurma',$query->nometurma); ?>" class="input_text" id="nometurma" disabled />
        
    </td>
  </tr>
  
  <tr>
    <td>Dias da semana:</td>
    <td>
		
<input name="diasemana[]" type="text" value="<?php echo set_value('diasemana[]',$query->diasemana); ?>" class="input_text" id="diasemana" disabled />

     </td>
  </tr>
  <tr>
    <td>Data de in&iacute;cio:</td>
    <td>

      <input name="datainicio" type="date" value="<?php echo set_value('datainicio',$query->datainicio); ?>" disabled />
      <br />
      
  </tr>
  <tr>
    <td>Data do fim:</td>
    <td>
		
      <input name="datafim" type="date" value="<?php echo set_value('datafim',$query->datafim); ?>" disabled />
      <br />
      
  </tr>
  <tr>
    <td>*Hora de in&iacute;cio :</td>
    <td>
		
		
      <input name="horainicio" type="text" value="<?php echo set_value('horainicio',$query->horainicio); ?>"  id="horainicio" disabled />
      
      </td>
  </tr>
  <tr>
    <td>*Hora do fim :</td>
    <td>
		
      <input name="horafim" type="text" value="<?php echo set_value('horafim',$query->horafim); ?>"  id="horafim" disabled />
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
    <td align="right"><input name="excluir" type="submit" class="input_bt" id="excluir" value="Excluir" /></td>
  </tr>
</table>

				
				</td>



           
          <?php
         echo form_hidden('$idturma',$query->codturma);
         echo form_close();
$this->load->view('template/rodape');
?>
