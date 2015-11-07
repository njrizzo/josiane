<?php
$this->load->view('template/cabecalho');  
$this->load->view('template/menumatri'); 
$id = $this->uri->segment(3);
if ($id==NULL) redirect('matricula/index'); 
$query = $this ->matricula_m->atualizar($id)->row();


echo form_open("matricula/editar/$id");
echo validation_errors();
//echo form_close();
?>
            <td width="553" align="left" valign="top" bgcolor="#FFFFFF">
			
            <?php	
            if($this->session->flashdata('editarok')):
echo'<p>'.$this->session->flashdata('editarok').'</p>';
endif
?>
            <h1 align="center" ><font color="#00009C">Alterar  matr&iacute;cula</font>   </h1>


<table width="472" border="0" id="logon">
  <tr>
	  
    <td width="101">Data</td>
    <td width="361">
		<?php echo form_error('datamat');  ?>
		
       <input name="datamat" type="text"  value=" <?php echo set_value('datamat',date('d/m/Y', strtotime($query->datamat)));?>"  readonly="readonly" />
        
    </td>
  </tr>
  <tr>
    <td>Servidor:</td>
    <td>
		
		<?php echo form_error('codserv'); ?>
       <?php // echo form_dropdown('codserv', $servs, set_value('codserv',$query->codserv)); ?>
        <select name="codserv">
		 <option value="<?=$query->codserv?>" <?php echo set_select('codserv','$query->codserv'); ?>><?=$query->nomeserv?></option>

</select>
     </td>
  </tr>
  <tr>
    <td>Turma:</td>
    <td>
		<?php echo form_error('codturma'); ?>
       <?php // echo form_dropdown('codturma', $turmas, set_value('codturma',$query->codturma));?>
   
       <select name="codturma">
		 <option value="<?=$query->codturma?>" <?php echo set_select('codturma','$query->codturma'); ?>><?=$query->nometurma?></option>

</select>
  </tr>

  <tr>
    <td>Estado:</td>
    <td>
		<?php echo form_error('situacao'); ?>
      <select name="situacao" id="situacao" >
			
			<option value="cursando" <?= $query->situacao=='cursando'? 'selected':'';?> <?php echo set_select('situacao','cursando'); ?>>Cursando</option>
			<option value="aprovado" <?= $query->situacao=='aprovado'? 'selected':'';?><?php echo set_select('situacao','aprovado'); ?>>Aprovado</option>
			<option value="insuficiente" <?= $query->situacao=='insuficiente'? 'selected':'';?><?php echo set_select('situacao','insuficiente'); ?>>Insuficiente</option>
			<option value="desistente" <?= $query->situacao=='desistente'? 'selected':'';?><?php echo set_select('situacao','desistente'); ?>>Desistente</option>
      </select><br />
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
    <td align="right"><input name="alterar" type="submit" class="input_bt" id="alterar" value="Alterar" /></td>
  </tr>
</table>

				
				</td>


           
          <?php
          echo form_hidden('$idmatri',$query->codmatricula);
         echo form_close();
$this->load->view('template/rodape');
?>
