<?php
$this->load->view('template/cabecalho');  
$siape=$this->uri->segment("3");

$id = $this->uri->segment(4);
?>
 <?php echo validation_errors('<h4 align="center">','</h4>'); ?>

   
   
   <?php echo form_open("cadastro/conferir/$siape/$id"); ?>
     <table width="302" height="160" border="0" align="center" cellpadding="0" cellspacing="0" id="logon">
		 
      <tr>
        
          <th scope="col" colspan="3"><h3> Inscri&ccedil;&otilde;es CODEP  </h3></th>
        </tr>
         <tr>
          <th scope="col" colspan="3">&nbsp;</th>
        </tr>
         
        
        <tr>
          <td height="40" colspan="2" align="center" bordercolor="#FFFFFF" bgcolor="#999999"><strong style="color:#FFF; font-weight:bold">Autorização</strong></td>
        </tr>
		 <tr>
          <td height="19" colspan="2" bordercolor="#CCCCCC" bgcolor="#CCCCCC">&nbsp;</td>
        </tr>
		<tr>
          <td width="132" height="32" align="left" bordercolor="#CCCCCC" bgcolor="#CCCCCC"><strong> Digite  seu SIAPE:  </strong></td>
          <td width="163" align="left" border="#CCCCCC" bgcolor="#CCCCCC"><label>
            <input name="chefesiape" type="text" id="chefesiape" maxlength="11"/>
          </label></td>
        </tr>
        
       
        
        <tr>
          <td height="19" colspan="2" bordercolor="#CCCCCC" bgcolor="#CCCCCC">&nbsp;</td>
        </tr>
        <tr>
          <td height="39" colspan="2" bordercolor="#FFFFFF" background="figuras/login2.jpg" style="background-repeat:no-repeat;" bgcolor="#CCCCCC"><center>
            <input type="submit" id="envia" name="envia" value="     OK      " />
          </center></td>
        </tr>
       <?php
       
         echo form_close();
$this->load->view('template/rodape');
?>  
      
