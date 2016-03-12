<?php
$this->load->view('template/cabecalho');  
$this->load->view('template/menuadm'); 
$id = $this->uri->segment(3);
if ($id==NULL) redirect('administrador'); 
$query = $this ->admin_m->atualizar($id)->row();

//echo validation_errors();
echo form_open("administrador/alterar_senha/$id");

?>
            <td width="553" align="left" valign="top" bgcolor="#FFFFFF">
			
            <?php	
            if($this->session->flashdata('editarok')):
echo'<p>'.$this->session->flashdata('editarok').'</p>';
endif
?>
            <h1 align="center" ><font color="#00009C">Alterar Senha de Administrador<br> <?php echo $query->nome ?></font>   </h1>

<table width="472" border="0" id="logon">
  <tr>
    <td>Login:</td>
    <td>
		
      <input type="text" name="usuario"  value="<?php echo set_value('usuario',$query->usuario); ?>"  id="usuario" />
      <br><?php echo form_error('usuario'); ?><br>
     </td>
  </tr>
  <tr>
    <td>Senha atual:</td>
    <td>
		
       <input type="password" name="oldsenha"  value="<?php echo set_value('oldsenha'); ?>"  id="oldsenha" />
				<br><?php echo form_error('oldsenha'); ?><br>
      
      
  </tr>
  <tr>
    <td>Nova senha:</td>
    <td>
		
      <input name="senha" type="password" value="<?php echo set_value('senha'); ?>"  id="senha"/>
     <br> <?php echo form_error('senha'); ?><br>
      </td>
  </tr>
   <td>Repita a senha:</td>
    <td>
		
       <input type="password" name="senha2"  value="<?php echo set_value('senha2'); ?>"  id="senha2" />
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
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>
      
    </td>
    <td align="right"><input name="Alterar" type="submit" class="input_bt" id="Alterar" value="Confirmar" /></td>
  </tr>
</table>

				
				</td>

           
          <?php
          echo form_hidden('$idadm',$query->id);
         echo form_close();
$this->load->view('template/rodape');
?>
