<?php
$this->load->view('template/cabecalho');  

$id = $this->uri->segment(3);
if ($id==NULL) redirect('cadastro/index');
$hash=  $this->uri->segment(4);
if ($hash==NULL) redirect('cadastro/index');
$teste = $this ->serv_m->verificarChave($hash);

$query = $this ->serv_m->atualizar($id)->row();

//echo validation_errors();
echo form_open("cadastro/modificar/$id/$hash");


?>
            <td width="553" align="left" valign="top" bgcolor="#FFFFFF">
			
            <?php	
            if ($teste==false) { 
echo '<h1 align="center"> Operação não autorizada.</h1>';
//$this->load->view('servidor/modificar_senha');
//die();
}
            if($this->session->flashdata('editarok')):
echo'<p>'.$this->session->flashdata('editarok').'</p>';

endif
?>
            <h1 align="center" ><font color="#00009C">Modificar Senha<br> </font>   </h1>

<table width="472" border="0" id="logon">
 
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
       <td align="left">  <?php echo anchor('login','<input name="inicio" type="button" class="input_bt" id="inicio" value="&nbsp;In&iacute;cio&nbsp;" />');?> </td>
    </td>
    <td align="right"><input name="alterar" type="submit" class="input_bt" id="alterar" value="Alterar" /></td>
  </tr>


				
				</td>


           
          <?php
          echo form_hidden('$idserv',$query->codserv);
         echo form_close();
         
$this->load->view('template/rodape');
?>
</table>
