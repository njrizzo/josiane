<?php
$this->load->view('template/cabecalho');  
$this->load->view('template/menuser'); 
$id = $this->uri->segment(3);
if ($id==NULL) redirect('inscricao/index'); 
$query = $this ->inscricao_m->atualizar($id)->row();
echo form_open("inscricao/deletar/$id");
  echo form_hidden('$idins',$query->codinscricao);
//echo form_close();
?>
            <td width="553" align="left" valign="top" bgcolor="#FFFFFF">
			
            
            <h1 align="center" ><font color="#00009C">Cancelar inscri&ccedil;&atilde;o?</font>  </h1>


<table width="472" border="0" id="logon">
  <tr>
	  
    <td width="101">Data</td>
    <td width="361">
		
		<?php $dataHora = date("d/m/Y "); ?>
       <input name="datains" type="text"  value=" <?php echo set_value('datains',date('d/m/Y', strtotime($query->datains)));?>"  disabled />
        
    </td>
  </tr>
  <tr>
    <td height="30">Nome:</td>
    <td>
		
		 <input name="codserv" type="text"  value=" <?php echo $query->nomeserv;?>"  disabled />
      

 
     </td>
  </tr>
  <tr>
    <td height="30">Turma:</td>
    <td>
		
		 <input name="codturma" type="text"  value=" <?php echo $query->nometurma;?>" disabled />
    </td>  
      
  </tr>
<tr>
    <td height="30">Motiva&ccedil;&atilde;o:</td>
    <td>
		
		
       <input type="text" name="motivo" value="<?php echo set_value('motivo',$query->motivo); ?>" cols="45" rows="5" id="motivo" disabled />
     
      
  </tr>
  <tr>
    <td  height="30">Estado:</td>
    <td>
		
		 <input name="situacao" type="text"  value=" <?php echo $query->situacao;?>"  disabled />
     
      </td>
  </tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>
      
    </td>
    <td align="right"><input name="Confirmar" type="submit" class="input_bt" id="Confirmar" value="Confirmar" /></td>
  </tr>
</table>

				
				</td>

           
          <?php
         echo form_hidden('$idins',$query->codinscricao);
         echo form_close();
$this->load->view('template/rodape');
?>
