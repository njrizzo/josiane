
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//session_start(); //we need to call PHP's session object to access it through CI
class Testemail extends CI_Controller {
 
 function __construct()
 {
   parent::__construct();
  
   $this->load->model('inscricao_m');


   
}

function index()
	{
		$datav['cursos'] =  $this->inscricao_m->retorna_curso();
							$essa = (!$this->uri->segment("3")) ? 0 : $this->uri->segment("3");
							$datav['turmas'] = $this->inscricao_m->retorna_turma($essa);
                        	$datav['servs'] = $this->inscricao_m->retorna_serv();
	$this->load->view('teste_mail', $datav);	
}

	
	public function cadastrar()
	
	{
	$this->form_validation->set_error_delimiters('<span style="color:red">', '</span>');
	$this -> form_validation ->set_rules('datains','DATA','required');
	$this -> form_validation ->set_rules('situacao','Estado','required');
	$this -> form_validation ->set_rules('codserv','Servidor','required');
	$this -> form_validation ->set_rules('codturma','Turma','required');
	$this -> form_validation ->set_rules('situacao','Estado','required');
	    if ($this->form_validation->run() == FALSE)
                { 			
					
							$datav['cursos'] =  $this->inscricao_m->retorna_curso();
							$essa = (!$this->uri->segment("3")) ? 0 : $this->uri->segment("3");
							$datav['turmas'] = $this->inscricao_m->retorna_turma($essa);
                        	$datav['servs'] = $this->inscricao_m->retorna_serv();
                        	
                        	$this->load->view('teste_mail', $datav);
                        	

                       
                }
                else
                {
					
                     $dados=elements(array('datains','codserv','situacao','codturma','motivo'), $this ->input->post());
                  
                
                    $this->inscricao_m->inserir($dados);
             
                
		  $this->load->view('teste_mail', $datav);
		  //$this->testemail->send_mail();

}
	
	
	}
	
	
	public function send_mail() {
		//$para = $this->input->post('txt_para', TRUE);
		$data = $this->inscricao_m->retorna_last_inscricao();
		foreach ($data as $linha){
			$nomeserv = $linha->nomeserv;
			$nomecurso=$linha->nome;
			$mmodulo=$linha->modulo;
			$nturma=$linha->nometurma;
			$tdias=$linha->diasemana;
			$hrin=$linha->horainicio;
			$hrfim=$linha->horafim;
			$datain=$linha->datainicio;
			$dataf=$linha->datafim;
			$emailserv=$linha->email;
			$chefemail=$linha->emailchefe;
		
			
		
		
		$this->load->library("My_PHPMailer");
    $mail = new PHPMailer();
    $mail->IsSMTP(); //Definimos que usaremos o protocolo SMTP para envio.
    $mail->SMTPAuth = true; //Habilitamos a autentica��o do SMTP. (true ou false)
    $mail->SMTPSecure = "ssl"; //Estabelecemos qual protocolo de seguran�a ser� usado.
    $mail->Host = "smtp.gmail.com"; //Podemos usar o servidor do gMail para enviar.
    $mail->Port = 465; //Estabelecemos a porta utilizada pelo servidor do gMail.
    $mail->Username = "josidim@gmail.com"; //Usu�rio do gMail
    $mail->Password = "hillsong01"; //Senha do gMail
    $mail->SetFrom('josidim@gmail.com', 'Codep'); //Quem est� enviando o e-mail.
    //$mail->AddReplyTo("response@email.com","Nome Completo"); //Para que a resposta ser� enviada.
    $mail->Subject = "CODEP - Confirma��o da Inscri��o"; //Assunto do e-mail.
    //$mail->Body = "Corpo do e-mail em HTML.<br />";
    $mail->Body = '<p><h4>CODEP-DP/DAA - Inscri��es </h4></p>
           <p>&nbsp;</p>
		   <p>&nbsp;</p>
      <p>Ol�, '.$nomeserv.', sua inscri��o no curso '.$nomecurso.': m�dulo '.$mmodulo.', foi realizada com sucesso!!</p>
      <p>Certifique-se que seu chefe recebeu o e-mail de pedido de autoriza��o da sua inscri��o, pois a mesma se faz necess�rio para que possa concorrer a vaga do curso que selecionou.</p>
      <p>&nbsp;</p>
      <p>Voc� criou a sua senha de acompanhamento que servir� para verificar o estado da sua inscri��o, e tamb�m possui as seguintes funcionalidades:</p>
<p>&nbsp;</p>
    <p>- Verificar se o seu chefe autorizou a sua inscri��o;</p>

    <p>- Verificar a justificativa do chefe caso ele n�o autorize a sua inscri��o e</p>

    <p>- Verificar se voc� foi selecionado para o curso que se inscreveu</p>

    <p>&nbsp;</p>

   
    <p>Acesse o link para acompanhar o estado da sua inscri��o: <a href="http://www.ufrrj.br/codep/acompanhamentologin.php">http://www.ufrrj.br/codep/acompanhamentologin.php</a></p>

    <p>&nbsp;</p>

    <p>OBS: A confirma��o da inscri��o n�o garante a vaga para o curso selecionado por voc�, a sele��o dos inscritos � determinada a partir dos crit�rios regulamentados pela CODEP.</p>
    <p>&nbsp;</p>
    <p>Maiores informa��es pelo tel. 2681-4739 / 2681-4740 ou email codep@ufrrj.br</p>';

    $mail->AltBody = "Corpo em texto puro.";
    //$destino = "josidim12342005@yahoo.com.br";
    $mail->AddAddress($emailserv, $nomeserv);
     
    /*Tamb�m � poss�vel adicionar anexos.*/
    //$mail->AddAttachment("images/phpmailer.gif");
   // $mail->AddAttachment("images/phpmailer_mini.gif");
 
    if(!$mail->Send()) {
       echo  "ocorreu um erro durante o envio: " . $mail->ErrorInfo;
    } else {
        echo  "Mensagem enviada com sucesso!";
    }
    //$this->load->view('teste_mail',$data);
}
}
	
	
	
 }//fimcontroler

