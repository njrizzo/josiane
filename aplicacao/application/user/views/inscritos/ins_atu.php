<?php
$this->load->view('template/cabecalho');  
$this->load->view('template/menuser'); 
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
    <td height="30">Nome:</td>
    <td>
		<?php echo form_error('codserv'); ?>
		 <input name="codserv" type="text"  value=" <?php echo $query->nomeserv;?>"  readonly="readonly" />
      
 
     </td>
  </tr>
  <tr>
    <td  height="30" >Turma:</td>
    <td>
		<?php echo form_error('codturma'); ?>
		 <input name="codturma" type="text"  value=" <?php echo $query->nometurma;?>"  readonly="readonly" />
		 </td>
  </tr>
<tr>
    <td  height="30">Motiva&ccedil;&atilde;o:</td>
    <td>
		
		<?php echo form_error('motivo'); ?>
       <input type="text" name="motivo" value="<?php echo set_value('motivo',$query->motivo); ?>" cols="45" rows="5" id="motivo" />
     </td>
      
  </tr>
  <tr>
    <td  height="30">Estado:</td>
    <td>
		<?php echo form_error('situacao'); ?>
		 <input name="situacao" type="text"  value=" <?php echo $query->situacao;?>"  readonly="readonly" />
     
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
