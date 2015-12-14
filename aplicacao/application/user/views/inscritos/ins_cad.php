<?php
$this->load->view('template/cabecalho');  
$this->load->view('template/menuser'); 
//echo validation_errors();
echo form_open('inscricao/cadastrar');

?>
   
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script > 
		function busca_turma(codigo){
     
   var base_url = '<?php echo base_url() ?>';
		

			
			$.post(base_url+"usuario.php/inscricao/busca_cursos_turmas", {
				codigo : codigo
			}, function(data){
				$('#codturma').html(data);
			});
		
	//	alert(codigo);
}
	
	
	</script>


            <td width="553" align="left" valign="top" bgcolor="#FFFFFF">
		<?php	
            if($this->session->flashdata('cadastrook')):
echo'<p>'.$this->session->flashdata('cadastrook').'</p>';
endif
?>
            <h1 align="center" ><font color="#00009C">Realizar nova Inscri&ccedil;&atilde;o</font>   </h1>

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
    <td align="right"><input name="Confirmar" type="submit" class="input_bt" id="Confirmar" value="Confirmar" /></td>
  </tr>
</table>

				
				</td>

           
          <?php
         echo form_close();
$this->load->view('template/rodape');
?>
