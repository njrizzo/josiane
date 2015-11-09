<?php
$this->load->view('template/cabecalho');  
$this->load->view('template/menuadm'); 
$id = $this->uri->segment(3);
if ($id==NULL) redirect('administrador'); 
$query = $this ->user->atualizar($id)->row();
echo form_open("administrador/deletar/$id");
  echo form_hidden('$idadm',$query->id);
//echo form_close();
?>
            <td width="553" align="left" valign="top" bgcolor="#FFFFFF">
			
            
            <h1 align="center" ><font color="#00009C">Deletar Administrador </font>  </h1>

<table width="472" border="0" id="logon">
  <tr>
	  
    <td >Nome: </td>
    
    <td >
		
        <input type="text" name="nome"  value="<?php echo set_value('nome',$query->nome); ?>"  id="nome" disabled/>
      <br>  <?php echo form_error('nome'); ?><br>
     
    </td>
  </tr>
  <tr>
    <td>Login:</td>
    <td>
		
      <input type="text" name="username"  value="<?php echo set_value('username',$query->username); ?>"  id="username" disabled/>
      <br><?php echo form_error('username'); ?><br>
     </td>
  </tr>
  <tr>
    <td>Senha:</td>
    <td>
		
       <input type="password" name="password"  value="<?php echo set_value('password',$query->password); ?>"  id="password" disabled/>
				<br><?php echo form_error('password'); ?><br>
      
      
  </tr>
   <td>Repita a senha:</td>
    <td>
		
       <input type="password" name="senha2"  value="<?php echo set_value('senha2',$query->password); ?>"  id="senha2" disabled/>
				<br><?php echo form_error('senha2'); ?><br>
      
      
  </tr>
  <tr>
    <td>Lembrete de senha</td>
    <td>
		
      <input name="lembrasenha" type="text" value="<?php echo set_value('lembrasenha',$query->lembrasenha); ?>"  id="lembrasenha" disabled/>
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
    <td align="right"><input name="Deletar" type="submit" class="input_bt" id="Deletar" value="Deletar" /></td>
  </tr>
</table>

				
				</td>

           
          <?php
         echo form_hidden('$idadm',$query->id);
         echo form_close();
$this->load->view('template/rodape');
?>
