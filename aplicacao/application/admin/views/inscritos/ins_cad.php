<?php
$this->load->view('template/cabecalho');  
$this->load->view('template/menuins'); 
echo validation_errors();
echo form_open('inscricao/cadastrar');

?>
    <head>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script > 
	
	function busca_turma(codigo){
     
   var base_url = '<?php echo base_url() ?>';
		

			
			$.post(base_url+"administrador.php/Inscricao/busca_cursos_turmas", {
				codigo : codigo
			}, function(data){
				$('#codturma').html(data);
			});
		
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
	  
    <td width="101" height="25">Data</td>
    <td width="361">
		<?php echo form_error('datains');  ?>
		<?php $dataHora = date("d/m/Y "); ?>
       <input name="datains" type="text"  value=" <?php echo "$dataHora" ;?>"  readonly="readonly" class="input_text"/>
        
    </td>
  </tr>
   
  <tr>
    <td height="25">Curso:</td>
    <td>
  <select name="codcurso" id="codcurso" onchange='busca_turma($(this).val())' class="input_text">
	  <?= $options_cursos; ?>
</select>
  </td>
  </tr>
  <tr>
    <td height="25">Turma:</td>
    <td>
		
		     <select name="codturma" id="codturma" class="input_text" >
				

</select>
<?php echo form_error('codturma');  ?>
       <?php //echo form_error('codturma'); echo form_dropdown('codturma',$turmas);?>
      
      <br />

  </tr>
  <tr>
    <td height="25">Servidor:</td>
    <td>
		
		<select name="codserv" id="codserv" class="input_text" 0000'">
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
    <td height="25">Motiva&ccedil;&atilde;o:</td>
    <td>
		<?php echo form_error('motivo'); ?>
      <textarea name="motivo" value="<?php echo set_value('motivo'); ?>" cols="45" rows="5" id="motivo" class="input_text"></textarea>
      <span>Descreva o que o motivou a inscrever-se no curso de capacita&ccedil;&atilde;o</span>
      
  </tr>
  <tr>
    <td height="25">Estado:</td>
    <td>
		
      <select name="situacao" id="situacao" class="input_text">
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
$this->load->view('template/rodape');
?>
