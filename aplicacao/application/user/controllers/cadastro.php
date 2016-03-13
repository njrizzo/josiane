
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cadastro extends CI_Controller {
 
 function __construct()
 {
   parent::__construct();
  
   $this->load->model('Serv_m','serv_m');
 $this->load->model('Matricula_m','matricula_m');

   
}

 
 function index()
 {
$this->load->view('servidor/serv_cad');       



}
public function cadastrar()
		
		{
		$this->form_validation->set_error_delimiters('<span style="color:red">', '</span>');
		$this -> form_validation ->set_rules('nomeserv','NOME','required|max_length[100]|trim');
		$this -> form_validation ->set_rules('sexo','sexo','required|max_length[100]|trim');
		$this -> form_validation ->set_rules('dltnasc','Data de nascimento','required|trim');
		$this -> form_validation ->set_rules('rgl','Identidade','required|numeric|exact_length[9]|trim');
		$this -> form_validation ->set_rules('cpfl','CPF','required|numeric|exact_length[11]|trim|is_unique[servidor.cpfl]');
		$this -> form_validation ->set_rules('siape','SIAPE','required|numeric|trim');
		$this -> form_validation ->set_rules('nacilonalidade','Nacilonalidade ','required|trim');
		$this -> form_validation ->set_rules('naturalidade','Naturalidade ','required|trim');
		$this -> form_validation ->set_rules('estcivil','Estado Civil ','required|trim');
		$this -> form_validation ->set_rules('endereco','Rua ','required|trim');
		$this -> form_validation ->set_rules('numcasa','Número da casa ','required|trim');
		$this -> form_validation ->set_rules('bairro','Bairro','required|trim');
		$this -> form_validation ->set_rules('cidade','Cidade','required|trim');
		$this -> form_validation ->set_rules('complemento','Complemento','trim|max_length[50]');
		$this -> form_validation ->set_rules('redesocial','Rede social','trim|max_length[50]');
		$this -> form_validation ->set_rules('estado','Estado','required|trim');
		$this -> form_validation ->set_rules('cep','CEP','required|trim');
		$this -> form_validation ->set_rules('email','Email','required|valid_email|trim');
		$this -> form_validation ->set_rules('telcontato','Telefone','required|trim');
		$this -> form_validation ->set_rules('telcontato2','Telefone para recado','required|trim');
		$this -> form_validation ->set_rules('unidade','Unidade ','required|trim');
		$this -> form_validation ->set_rules('setor','Setor','required|trim');
		$this -> form_validation ->set_rules('funcao','Função','required|trim');
		$this -> form_validation ->set_rules('cargo','Cargo ','required|trim');
		$this -> form_validation ->set_rules('nomechefe','Nome do chefe','required|trim');
		$this -> form_validation ->set_rules('emailchefe','Email do chefe','required|valid_email|trim');
		$this -> form_validation ->set_rules('telchefe','Telefone do chefe','required|trim');
		$this -> form_validation ->set_rules('ensino','Forma&ccedil;&atilde;o','required|trim');
		$this -> form_validation ->set_rules('senha','Senha','required|max_length[10]|trim|min_length[6]');
		$this -> form_validation ->set_rules('siapechefe','Siape do chefe','required|max_length[10]|trim');
		$this -> form_validation ->set_rules('repetesenha','Repita a Senha','required|max_length[10]|matches[senha]|trim');
		$this -> form_validation ->set_rules('lembrasenha','Lembrete de Senha','required|max_length[100]|trim');
		if ($this->form_validation->run() == FALSE)
	                {
	                        $this->load->view('servidor/serv_cad');
	                }
	                else
	                {
	                  
	                  $dadoserv=elements(array('nomeserv','sexo','dltnasc','rgl','cpfl','siape','nacilonalidade','naturalidade','estcivil','endereco','numcasa','bairro','cidade','complemento','estado','cep','email','telcontato','telcontato2','redesocial','unidade','setor','funcao','cargo','nomechefe','emailchefe','telchefe','ensino','senha','siapechefe','lembrasenha'),$this->input->post());
	                 $dadoserv['senha'] = MD5($dadoserv['senha']);//coloca a senha em md5 no banco
	                
	                   $this->serv_m->inserir_user($dadoserv);
	                  
	                
			$this->load->view('servidor/serv_cad');
	
	}
		
		}
		
		

	
	
	
	
	
	
	//verifica se o siape do chefe confere com o cadastro do servidor
	public function conferir(){
		
 
   $this->form_validation->set_rules('chefesiape', 'SIAPE', 'trim|required|callback_check_database');
   
 
   if($this->form_validation->run() == FALSE)
   {
     //validação falhou redicionado para a página de login
     $this->load->view('autorizar/autoz_login');
   }
   else
   {
     //Validação ok!
   
      $chefesiape = $this->input->post('chefesiape');
      $siape=$this->uri->segment("3");

	  //$siape = $this->input->post('siape');
	  $this->serv_m->confereSiape($siape, $chefesiape);
      
      
   }
	
	
	
	}
	
	//auxilia a conferir o siape do chefe
	function check_database($siape)
 {
   //verificação no banco de dados
   $siape=$this->uri->segment("3");
   $id = $this->uri->segment(4);   

 $chefesiape = $this->input->post('chefesiape');
   //consulta
   $result = $this->serv_m->confereSiape($siape, $chefesiape);
 
   if($result)
   {
	   foreach($result as $row)
     {
       $sess_array = array(
         
         'siapechefe' => $row->siapechefe,
         'nomechefe' => $row->nomechefe
         
       );
       $this->session->set_userdata('loggedd', $sess_array);
	   
       Redirect("autorizar/confirmar/$siape/$id", 'Refresh');
    	 //$this->load->view("autorizar/autorizar_view");
    }
    
     return TRUE;
   }
   else
   {
     $this->form_validation->set_message('check_database', 'Siape não confere com o Servidor cadastrado.');
     
     return false;
   }
 }
	
	
	
	
	
//recuperacao de senha	
public function recuperar(){
		$this->form_validation->set_error_delimiters('<span style="color:red">', '</span>');
		$this -> form_validation ->set_rules('email','Email','required|trim|valid_email');
		$this -> form_validation ->set_rules('email2','Repita o email','required|matches[email]|trim|valid_email|callback_check_email');
		
		if ($this->form_validation->run() == FALSE)
	                {
	                        $this->load->view('servidor/recuperar_senha');
	                }
	                

	
	
	
	
	
	}
	
	//verifica se o email informado para recuperar senha esta cadastrado no banco de dados
	function check_email($verificarEmail)
 {  

 $verificarEmail = $this->input->post('email2');
   //consulta
   $result = $this->serv_m->confereEmail($verificarEmail);
 
   if($result)
   {
	 
	  $dados=array(
	  'utilizador'=>$this->input->post('email2'),
	  'confirmacao'=>$chave = sha1(uniqid( mt_rand(), true))
	  );
	       $dados['data'] = date('Y-m-d',strtotime('+1 day'));//define  um  dia para o codigo expirar         
	                
	                   $this->serv_m->recuperar_inserir($dados);
	                  
	                
			$this->load->view('servidor/recuperar_senha'); 
    // Redirect(cadastro);
     return TRUE;
   }
   else
   {
     $this->form_validation->set_message('check_email', 'Email não cadastrado.');
     
     return false;
   }
 }




//cadastra nova senha
		function modificar()
 { 
		$this->form_validation->set_error_delimiters('<span style="color:red">', '</span>');
		$this -> form_validation ->set_rules('senha','Senha','required|max_length[10]|trim|min_length[6]');
		$this -> form_validation ->set_rules('senha2','Repita a Senha','required|max_length[10]|matches[senha]|trim');
		$this -> form_validation ->set_rules('lembrasenha','Lembrete de Senha','required|max_length[100]|trim');
	 if ($this->form_validation->run() == FALSE)
	                {
	                        $this->load->view('servidor/modificar_senha');
	                }
	                else
	                {
	                  
	                  $dados=elements(array('senha','lembrasenha'),$this->input->post());
	                     $dados['senha'] = MD5($dados['senha']);//coloca a senha em md5 no banco
	                
	                $this->serv_m->modificar_do($dados,array('codserv' => $this->input->post('$idserv')),$this->uri->segment(4));
		
	                
	             
	                
			//$this->load->view('servidor/modificar_senha');
	//$this->serv_m->apagarChave($this->uri->segment(4));
	}

	 }//fimif
	




//verifica a validade dos certificados

public function autenticar()
	{

	$this->form_validation->set_error_delimiters('<span style="color:red">', '</span>');
		$this -> form_validation ->set_rules('chave','Chave','required|trim');
		$this -> form_validation ->set_rules('data','Data da emissãao','trim');
		
		if ($this->form_validation->run() == FALSE)
	                {
	                        $this->load->view('autenticar_chave');
	                }
	                else
	                {
						$chave=$this->input->post('chave');
	                  $query=$this->matricula_m->verificarChave($chave);
	                  if ($query){


$this->session->set_flashdata('editarok','Certificado válido: '.$chave.'');
Redirect(current_url());
}else{
 $this->session->set_flashdata('editarok','Certificado inválido!!');
Redirect(current_url());
}
			
	
	}






}//fimfucao







//email de recuperacao de senha
	function enviarEmail()
 {  
	 
	 
		$this->load->library("My_PHPMailer");
		$data = $this->serv_m->retorna_last_recuperacao();
		foreach ($data as $linha){
			$email = $linha->utilizador;
			$chave = $linha->confirmacao;
			$lembrete = $linha->lembrasenha;
			$nome=$linha->nomeserv;
			$id=$linha->codserv;
			$baseurl =  base_url();
			

		
    $mail = new PHPMailer();
    $mail->IsSMTP(); //Definimos que usaremos o protocolo SMTP para envio.
    $mail->SMTPAuth = true; //Habilitamos a autenticação do SMTP. (true ou false)
    $mail->SMTPSecure = "ssl"; //Estabelecemos qual protocolo de segurança será usado.
    $mail->Host = "smtp.gmail.com"; //Podemos usar o servidor do gMail para enviar.
    $mail->Port = 465; //Estabelecemos a porta utilizada pelo servidor do gMail.
    $mail->Username = "josidim@gmail.com"; //Usuário do gMail
    $mail->Password = "hillsong01"; //Senha do gMail
    $mail->SetFrom('josidim@gmail.com', 'CODEP'); //Quem está enviando o e-mail.
    //$mail->AddReplyTo("response@email.com","Nome Completo"); //Para que a resposta será enviada.
    $mail->Subject =  utf8_decode("CODEP - Recuperação de senha"); //Assunto do e-mail.
    //$mail->Body = "Corpo do e-mail em HTML.<br />";
    $mail->Body =  utf8_decode( "<p><h4>CODEP-DP/DAA  </h4></p>
           <p>&nbsp;</p>
		   <p>&nbsp;</p>
      <p>Olá, $nome, Ocorreu uma tentativa de recuperação de senha para este email.</p>
      
      
      
      
       
      <p>Logo abaixo está a dica para ajudá-lo a lembrar sua senha.</p>
     
      <p>&nbsp;</p>
      <p>Lembrete de senha: <strng><u> $lembrete </u> </strng>.</p>
<p>&nbsp;</p>
 <p> Caso o lembrete não tenha sido suficiente, clique no link abaixo para cadastrar uma nova senha.</p>
   

   
    <p> <a href=' ".$baseurl."usuario.php/cadastro/modificar/$id/$chave'>Clique aqui</a></p>

    
<p>Este link será válido por 24 horas.</p>
<p>&nbsp;</p>
    <p>Caso não tenha feito essa solicitação desconsidere este email.</p>
    <p>&nbsp;</p>
    <p>Maiores informações pelo tel. 2681-4739 / 2681-4740 ou email codep@ufrrj.br</p>");

    $mail->AltBody = "Corpo em texto puro.";
    //$destino = "josidim12342005@yahoo.com.br";
    $mail->AddAddress($email, $nome);

    if(!$mail->Send()) {
       $datav["message"] = "ocorreu um erro durante o envio: " . $mail->ErrorInfo;
    } else {
       $datav["message"] =  "Mensagem enviada com sucesso!";
    }
    //$this->load->view('servidor/recuperar_senha',$datav);
$this->session->set_flashdata('editarok','Foi enviado um e-mail, com instruções sobre a recuperação da senha.');
	  Redirect('cadastro/recuperar');
}//endif	
	
}//endfuncao
	
 }//endcontroler

