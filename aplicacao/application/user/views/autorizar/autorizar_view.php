<?php
$this->load->view('template/cabecalho'); 
$siape=$this->uri->segment("3");
 
$id = $this->uri->segment(4);
if ($id==NULL) redirect('cadastro/conferir'); 
$query = $this ->inscricao_m->atualizar($id)->row();
?>


	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script > 
	
	function manipulaDiv(checked, idDiv) {
    if (checked) {
        document.getElementById(idDiv).style.display = "";
    }  else {
        document.getElementById(idDiv).style.display = "none";
    }

}
	
	
	</script>
		<?php echo $this->session->flashdata('ok'); ?>

 <?php echo validation_errors(); ?>

   
   
   <?php echo form_open("autorizar/confirmar/$siape/$id"); ?>
   
   <h3> Autoriza o Servidor a participar do curso de Capacitação?  </h3>
   <label  for="negado">
   NÃO
    <input type="radio"  name="situacao" id="negado" value="negado" onclick="manipulaDiv(true, 'salvenc2')"></label>
<label  for="autorizado">
    SIM
    <input type="radio"  name="situacao" id="autorizado" value="autorizado" onclick="manipulaDiv(false, 'salvenc2')"></label>

<br>
<br>


<br>
<div   id="salvenc2" style="display:none;">
    <label  for="texto" >Justfiativa
         <textarea name="motivo" id="texto" ></textarea> </label>
</div>
<br>
<input align="left"  name="Confirmar" type="submit" class="input_bt" id="Confirmar" value="Confirmar" />
<table>
       <?php
echo anchor ('autorizar/logout','<input name="Sair" type="button" class="input_bt" id="Sair" value="Sair" />');
         echo form_close();
$this->load->view('template/rodape');
?>  
      
