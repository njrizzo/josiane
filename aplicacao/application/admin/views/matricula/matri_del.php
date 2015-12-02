<?php
$this->load->view('template/cabecalho');  
$this->load->view('template/menumatri'); 
$id = $this->uri->segment(3);
if ($id==NULL) redirect('matricula/index'); 
$query = $this ->matricula_m->atualizar($id)->row();
echo form_open("matricula/deletar/$id");
  echo form_hidden('$idmatri',$query->codmatricula);
//echo form_close();
?>
            <td width="553" align="left" valign="top" bgcolor="#FFFFFF">
			
            
            <h1 align="center" ><font color="#00009C">Deletar  matr&iacute;cula</font>  </h1>


<table width="472" border="0" id="logon">
  <tr>
	  
    <td width="101" height="30">Data</td>
    <td width="361">
		
		
		
       <input name="datains" type="text"  value=" <?php echo date('d/m/Y', strtotime($query->datamat));?>"  disabled  />
        
    </td>
  </tr>
  <tr>
    <td height="30">Servidor:</td>
    <td>
		
    <input name="codserv" type="text"  value=" <?php echo $query->nomeserv;?>"  disabled />
     </td>
  </tr>
  <tr>
    <td height="30">Turma:</td>
    <td>

      <input name="codturma" type="text"  value=" <?php echo $query->nometurma;?>" disabled />
       
      
  </tr>

  <tr>
    <td height="30">Estado:</td>
    <td>
		
       <input name="situacao" type="text"  value=" <?php echo $query->situacao;?>"  disabled />
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
         echo form_hidden('$idmatri',$query->codmatricula);
         echo form_close();
$this->load->view('template/rodape');
?>
