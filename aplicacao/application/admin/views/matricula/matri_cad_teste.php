<?php
$this->load->view('template/cabecalho');  

//echo validation_errors();
echo form_open('testematricula/cadastrar');

?>
    <head>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script > 
	
	
	
	function busca_produtos(id_departamento){
  alert(id_departamento);
}
	</script>

</head>


           
            <h1 align="center" ><font color="#00009C">Cadastrar nova matr&iacute;cula</font>   </h1>

<p>
Escolha o Departamento:<br />
<select name="departamentos" id="departamentos" onchange='busca_produtos($(this).val())'>
<? echo $options_departamentos; ?>
</select>
</p>
<p>
Escolha o Produto:<br />
<select name="produtos" id="produtos">
</select>
</p>

           
          <?php
                   

        
$this->load->view('template/rodape');
?>
