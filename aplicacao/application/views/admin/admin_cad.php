<?php
$this->load->view('template/cabecalho');  
$this->load->view('template/menuadm'); 
//echo validation_errors();
echo form_open('administrador/cadastrar');


?>
            <td width="553" align="left" valign="top" bgcolor="#FFFFFF">
		<?php	
            if($this->session->flashdata('cadastrook')):
echo'<p>'.$this->session->flashdata('cadastrook').'</p>';
endif
?>
          

  <h1 align="center" ><font color="#00009C">Cadastrar novo Administrador</font>   </h1>

<table width="472" border="0" id="logon">
  <tr>
	  
    <td >Nome: </td>
    
    <td >
		
        <input type="text" name="nome"  value="<?php echo set_value('nome'); ?>"  id="nome" />
      <br>  <?php echo form_error('nome'); ?><br>
     
    </td>
  </tr>
  <tr>
    <td>Login:</td>
    <td>
		
      <input type="text" name="username"  value="<?php echo set_value('username'); ?>"  id="username" />
      <br><?php echo form_error('username'); ?><br>
     </td>
  </tr>
  <tr>
    <td>Senha:</td>
    <td>
		
       <input type="password" name="password"  value="<?php echo set_value('password'); ?>"  id="password" />
				<br><?php echo form_error('password'); ?><br>
      
      
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
    <td align="right"><input name="cadastrar" type="submit" class="input_bt" id="cadastrar" value="Cadastrar" /></td>
  </tr>
</table>
		
				</td>

           
          <?php
         echo form_close();
$this->load->view('template/rodape');
?>
