<?php
$this->load->view('template/cabecalho');  
$this->load->view('template/menuins'); 
$id = $this->uri->segment(3);
if ($id==NULL) redirect('inscricao/index'); 
$query = $this ->inscricao_m->atualizar($id)->row();


echo form_open("inscricao/editar/$id");

//echo form_close();
?>
            <td width="553" align="left" valign="top" bgcolor="#FFFFFF">
			
            <?php	
            if($this->session->flashdata('editarok')):
echo'<p>'.$this->session->flashdata('editarok').'</p>';
endif
?>
            <h1 align="center" ><font color="#00009C">Alterar inscri&ccedil;&atilde;o</font>   </h1>


<table width="472" border="0" id="logon">
  <tr>
	  
    <td width="101">Data</td>
    <td width="361">
		<?php echo form_error('datains');  ?>
		<?php $dataHora = date("d/m/Y "); ?>
       <input name="datains" type="text"  value=" <?php echo set_value('datamat',date('d/m/Y', strtotime($query->datains)));?>"  readonly="readonly" />
        
    </td>
  </tr>
  <tr>
    <td>Servidor:</td>
    <td>
		<?php echo form_error('codserv'); ?>
       <?php //echo form_error('codserv'); echo form_dropdown('codserv', $servs, set_value('codserv',$query->codserv));?>
       <select name="codserv">
		 <option value="<?=$query->codserv?>" <?php echo set_select('codserv','$query->codserv'); ?>><?=$query->nomeserv?></option>

</select>
 
     </td>
  </tr>
  <tr>
    <td>Turma:</td>
    <td>
		<?php echo form_error('codturma'); ?>
       <?php //echo form_error('codturma'); echo form_dropdown('codturma', $turmas, set_value('codturma',$query->codturma));?>
       <select name="codturma">
		 <option value="<?=$query->codturma?>" <?php echo set_select('codturma','$query->codturma'); ?>><?=$query->nometurma?></option>

</select>
      <br />
      
  </tr>
<tr>
    <td>Motiva&ccedil;&atilde;o:</td>
    <td>
		<?php echo form_error('motivo'); ?>
       <input type="text" name="motivo" value="<?php echo set_value('motivo',$query->motivo); ?>" cols="45" rows="5" id="motivo" />
      <span>Descreva o que motivou voc&ecirc; a inscrever-se no curso de capacita&ccedil;&atilde;o</span>
      
  </tr>
  <tr>
    <td>Estado:</td>
    <td>
		<?php echo form_error('situacao'); ?>
      <select name="situacao" id="situacao" >
		  
           <option value="pendente"  <?= $query->situacao=='pendente'? 'selected':'';?><?php echo set_select('situacao','pendente'); ?>>Pendente</option>
        <option value="autorizado" <?= $query->situacao=='autorizado'? 'selected':'';?>  <?php echo set_select('situacao','autorizado'); ?>>Autorizado</option>
        <option value="negado" <?= $query->situacao=='negado'? 'selected':'';?><?php echo set_select('situacao','negado'); ?>>Negado</option>
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
          echo form_hidden('$idins',$query->codinscricao);
         echo form_close();
$this->load->view('template/rodape');
?>
