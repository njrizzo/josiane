<?php
$this->load->view('template/cabecalho');  
$this->load->view('template/menuser'); 
//$id = $this->uri->segment(3);
if ($codserv==NULL) redirect('home/index'); 
$query = $this ->serv_m->atualizar($codserv)->row();

//echo validation_errors();
echo form_open("home/alterar_senha/$codserv");


?>
            <td width="553" align="left" valign="top" bgcolor="#FFFFFF">
			
            <?php	
            if($this->session->flashdata('editarok')):
echo'<p>'.$this->session->flashdata('editarok').'</p>';
endif
?>
            <h1 align="center" ><font color="#00009C">Alterar Senha do Servidor<br> <?php echo $query->nomeserv ?></font>   </h1>

<table width="472" border="0" id="logon">
 <tr>
    <td>Senha atual:</td>
    <td>
		
       <input type="password" name="oldsenha"  value="<?php echo set_value('oldsenha'); ?>"  id="oldsenha" size="10"/>
				<br><?php echo form_error('oldsenha'); ?><br>
      
      
  </tr>
   <tr>
	 <td width="101" >Nova Senha:</td>
    <td width="361" >
		
        <input name="senha" type="password" value="<?php echo set_value('senha'); ?>"  id="senha" size="10" />
        <br><?php echo form_error('senha'); ?><br>
    </td>
    
  </tr>
   <td>Repita a senha:</td>
    <td>
		
       <input type="password" name="senha2"  value="<?php echo set_value('senha2'); ?>"  id="senha2" size="10"/>
				<br><?php echo form_error('senha2'); ?><br>
      
      
  </tr>
  <tr>
    <td>Lembrete de senha</td>
    <td>
		
      <input name="lembrasenha" type="text" value="<?php echo set_value('lembrasenha'); ?>"  id="lembrasenha" />
     <br> <?php echo form_error('lembrasenha'); ?><br>
      </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;  </td>
  </tr>
  <tr>
    <td>
      
    </td>
    <td align="right"><input name="alterar" type="submit" class="input_bt" id="alterar" value="Alterar" /></td>
  </tr>
</table>

				
				</td>


           
          <?php
          echo form_hidden('$idserv',$query->codserv);
         echo form_close();
$this->load->view('template/rodape');
?>
