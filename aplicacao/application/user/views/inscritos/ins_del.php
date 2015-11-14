<?php
$this->load->view('template/cabecalho');  
$this->load->view('template/menuins'); 
$id = $this->uri->segment(3);
if ($id==NULL) redirect('inscricao/index'); 
$query = $this ->inscricao_m->atualizar($id)->row();
echo form_open("inscricao/deletar/$id");
  echo form_hidden('$idins',$query->codinscricao);
//echo form_close();
?>
            <td width="553" align="left" valign="top" bgcolor="#FFFFFF">
			
            
            <h1 align="center" ><font color="#00009C">Deletar inscri&ccedil;&atilde;o</font>  </h1>


<table width="472" border="0" id="logon">
  <tr>
	  
    <td width="101">Data</td>
    <td width="361">
		
		<?php $dataHora = date("d/m/Y "); ?>
       <input name="datains" type="text"  value=" <?php echo "$dataHora" ;?>"  readonly="readonly"  />
        
    </td>
  </tr>
  <tr>
    <td>Servidor:</td>
    <td>
		
       <?php  echo form_dropdown('codserv', $servs, set_value('codserv',$query->codserv), 'disabled="disabled"'); ?>
     </td>
  </tr>
  <tr>
    <td>Turma:</td>
    <td>

       <?php echo form_dropdown('codturma', $turmas, set_value('codturma',$query->codturma), 'disabled="disabled"');?>
      <br />
      
  </tr>
<tr>
    <td>Motiva&ccedil;&atilde;o:</td>
    <td>
		
     <input type="text" name="motivo" value="<?php echo set_value('motivo',$query->motivo); ?>" cols="45" rows="5" id="motivo" disabled />
      
      
  </tr>
  <tr>
    <td>Estado:</td>
    <td>
		
      <select name="situacao" id="situacao" disabled>
		   <option value="<?=$query->situacao?>" <?php echo set_select('situacao','$query->situacao'); ?>><?=$query->situacao?></option>
           <option value="pendente" <?php echo set_select('situacao','pendente'); ?>>Pendente</option>
        <option value="autorizado" <?php echo set_select('situacao','autorizado'); ?>>Autorizado</option>
        <option value="negado" <?php echo set_select('situacao','negado'); ?>>Negado</option>
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
    <td align="right"><input name="Deletar" type="submit" class="input_bt" id="Deletar" value="Deletar" /></td>
  </tr>
</table>

				
				</td>

           
          <?php
         echo form_hidden('$idins',$query->codinscricao);
         echo form_close();
$this->load->view('template/rodape');
?>
