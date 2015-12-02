<?php
$this->load->view('template/cabecalho');  
$this->load->view('template/menuser');  
//<a href="home/logout">Logout</a>
?>


<td>
	<table> <tr>
<h2>Welcome <?php echo $cpfl  ; ?>!</h2>
   <h2>Welcome <?php echo  $codserv;  ?>!</h2>
    <h2>Welcome <?php echo   $nomeserv; ?>!</h2>
	</tr></table>
 <?php
$this->load->view('template/rodape');
?>  
