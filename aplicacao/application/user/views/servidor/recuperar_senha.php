<?php
$this->load->view('template/cabecalho');  


echo validation_errors();
echo form_open("cadastro/recuperar");


?>
            <td width="553" align="left" valign="top" bgcolor="#FFFFFF">
			
            <?php	
            if($this->session->flashdata('editarok')):
echo'<p>'.$this->session->flashdata('editarok').'</p>';
endif
?>
            <h1 align="center" ><font color="#00009C">Recuperar Senha<br> </font>   </h1>

<table width="472" border="0" id="logon">
 
   <tr>
	 <td width="101" >Digite seu email:</td>
    <td width="361" >
		
        <input name="email" type="text" value="<?php echo set_value('email'); ?>"  id="email" />
        <br><?php echo form_error('email'); ?><br>
    </td>
    
  </tr>
   <td>Repita o email:</td>
    <td>
		        <input name="email2" type="text" value="<?php echo set_value('email2'); ?>"  id="email2" />
        <br><?php echo form_error('email2'); ?><br>
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
    <td align="right"><input name="Enviar" type="submit" class="input_bt" id="Enviar" value="Enviar" /></td>
  </tr>


				
				</td>


           
          <?php
         echo form_close();
$this->load->view('template/rodape');
?>
</table>
