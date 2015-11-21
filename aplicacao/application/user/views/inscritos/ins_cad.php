<?php
$this->load->view('template/cabecalho');  
$this->load->view('template/menuser'); 
//echo validation_errors();
echo form_open('inscricao/cadastrar');

?>
    <head>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script > 
	
	function busca_turma(codigo){
     
      document.location=('usuario.php/inscricao/cadastrar/'+codigo ); 
 
//alert(codigo);
}
	
	
	</script>

</head>
            <td width="553" align="left" valign="top" bgcolor="#FFFFFF">
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
    <td>Nome:</td>
    <td>
		
		 <input name="codserv" type="text"  value=" <?php echo $nomeserv;?>"  readonly="readonly" />
     </td>
  </tr>
  <tr>
    <td>Curso:</td>
    <td>
		
  <select name="codcurso" id="codcurso" onchange='busca_turma($(this).val())'  >
	   <option value='' selected="selected" >----selecione----</option>
<?php
 
foreach ($cursos as $i => $nome)
   echo '<option value="',$i,'" >',$nome,'</option>';
   echo 'selected';
   
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
    <td>Motiva&ccedil;&atilde;o:</td>
    <td>
		<?php echo form_error('motivo'); ?>
      <textarea name="motivo" value="<?php echo set_value('motivo'); ?>" cols="45" rows="5" id="motivo"  placeholder="Descreva o que motivou voc&ecirc; a inscrever-se no curso de capacita&ccedil;&atilde;o"></textarea>
     
      
  </tr>
  <tr>
    <td>Estado:</td>
    <td>
		<input name="situacao" type="text"  value="pendente"  readonly="readonly" />
		
      <?php echo form_error('situacao'); ?><br />
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
