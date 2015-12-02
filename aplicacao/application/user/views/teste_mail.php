<html lang="en">
<head>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script > 
	
	function busca_turma(codigo){
     
      document.location=('cadastrar/'+codigo ); 
 
//alert(codigo);
}
	
	
	</script>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
	
</head>
<body>
 
<div id="container">
	<h1>Enviar e-mail com CodeIgniter</h1>
 
	<div id="body"> 
 
		<?php

echo form_open('testemail/cadastrar');

?>
   
           
		<?php	
            if($this->session->flashdata('cadastrook')):
echo'<p>'.$this->session->flashdata('cadastrook').'</p>';
endif
?>
            <h1 align="center" ><font color="#00009C">Cadastrar nova Inscri&ccedil;&atilde;o</font>   </h1>

<table width="472" border="0" id="logon">
  <tr>
	  
    <td width="101">Data</td>
    <td width="361">
		<?php echo form_error('datains');  ?>
		<?php $dataHora = date("d/m/Y "); ?>
       <input name="datains" type="text"  value=" <?php echo "$dataHora" ;?>"  readonly="readonly" />
        
    </td>
  </tr>
   
  <tr>
    <td>Curso:</td>
    <td>
  <select name="codcurso" id="codcurso" onchange='busca_turma($(this).val())' onfocus="this.style.backgroundColor='#FFFFCC'; this.style.border='2px solid #FF9933'" onblur="this.style.backgroundColor='#CCCCCC'; this.style.border='2px solid #000000'">
	   <option value=''  >----selecione----</option>
<?php
 
foreach ($cursos as $i => $nome)
   echo '<option value="',$i,'"  >',$nome,'</option>';
   
?>
</select>
  </td>
  </tr>
  <tr>
    <td>Turma:</td>
    <td>
		
		     <select name="codturma" id="codturma" >
				 <option value=''>----selecione----</option>
<?php
foreach ($turmas as $i => $nome)
   echo '<option value="',$i,'" >',$nome,'</option>';
?>
</select><?php echo form_error('codturma');  ?>
       <?php //echo form_error('codturma'); echo form_dropdown('codturma',$turmas);?>
      
      <br />

  </tr>
  <tr>
    <td>Servidor:</td>
    <td>
		
		<select name="codserv" id="codserv" onfocus="this.style.backgroundColor='#FFFFCC'; this.style.border='2px solid #FF9933'" onblur="this.style.backgroundColor='#CCCCCC'; this.style.border='2px solid #000000'">
				 <option value='' >----selecione----</option>
<?php
foreach ($servs as $i => $nome)
   echo '<option value="',$i,'" >',$nome,'</option>';
?>
</select><?php echo form_error('codserv');  ?>
       <?php //echo form_error('codserv'); echo form_dropdown('codserv', $servs);?>
     </td>
  </tr>
  
 <tr>
    <td>Motiva&ccedil;&atilde;o:</td>
    <td>
		<?php echo form_error('motivo'); ?>
      <textarea name="motivo" value="<?php echo set_value('motivo'); ?>" cols="45" rows="5" id="motivo" onfocus="this.style.backgroundColor='#FFFFCC'; this.style.border='2px solid #FF9933'" onblur="this.style.backgroundColor='#CCCCCC'; this.style.border='2px solid #000000'"></textarea>
      <span>Descreva o que motivou voc&ecirc; a inscrever-se no curso de capacita&ccedil;&atilde;o</span>
      
  </tr>
  <tr>
    <td>Estado:</td>
    <td>
		
      <select name="situacao" id="situacao" onfocus="this.style.backgroundColor='#FFFFCC'; this.style.border='2px solid #FF9933'" onblur="this.style.backgroundColor='#CCCCCC'; this.style.border='2px solid #000000'">
		  <option value=''>---selecione---</option>
           <option value="pendente" <?php echo set_select('situacao','pendente'); ?>>Pendente</option>
        <option value="autorizado" <?php echo set_select('situacao','autorizado'); ?>>Autorizado</option>
        <option value="negado" <?php echo set_select('situacao','negado'); ?>>Negado</option>
      </select><?php echo form_error('situacao'); ?><br />
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

?>

 
	</div>
 
</div>
 
</body>
</html>
