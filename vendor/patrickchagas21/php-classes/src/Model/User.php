<?php

namespace Pcode\Model;

use \Pcode\DB\Sql;
use \Pcode\Model;
use \Pcode\Mailer;

class User extends Model {

	const SESSION = "User"; 

	const SECRET = "Pcode_Secret";

	const ERROR = "UserError";
	const ERROR_REGISTER = "UserErrorRegister";
	const SUCCESS = 'UserSuccess';

	//Pegar a sessão do usuário
	public static function getFromSession()
	{
		$user = new User();
		if (isset($_SESSION[User::SESSION]) && (int)$_SESSION[User::SESSION]['iduser'] > 0) {
			$user->setData($_SESSION[User::SESSION]);
		}
		return $user;
	}


	public static function checkLogin($inadmin = true)
	{
		if(	
			//Se não estiver definida
			!isset($_SESSION[User::SESSION]) 
			|| 
			!$_SESSION[User::SESSION] // esta definida mas está vazia 
			|| 
			//Verificar o Id do usuário
			!(int)$_SESSION[User::SESSION]["iduser"] > 0 // está definido mas o id não é maior que zero			
		) {

			//Não está logado
			return false;

		} else {

			//Esse If aqui só vai acontecer se o usuário tentar acessar uma rota de administrador
			if ($inadmin === true && (bool)$_SESSION[User::SESSION]['inadmin'] === true) {

				return true;

			 //ele está logado e não necessariamente precisa ser um administrador		
			} else if ($inadmin === false ) {

				return true;

			} else {
				// se algo saiu desse padrão, ele não está logado
				return false;
			}
		}
	}

	//Pegar a hora que o usuário fez o LOGIN
	public function loginTimeConnect()
	{

		$sql = new Sql();

		$user = new User();

		$user->setData($_POST);

		$login = $_POST['login']; // pegar o login que o usuário digitou no campo

		$disconnect = 0; // Quando o USUÁRIO FIZER LOGIN, A HORA QUE ELE SAIU(timelogindisconnect) DO SISTEMA TEM QUE SER VAZIA, PQ ELE NÃO DESLOGOU NOVAMENTE
		//PQ SE ELE LOGOU NO SISTEMA, NÃO FAZ SENTIDO JÁ TER A HORA QUE DESLOGOU
		
		//Inserindo a data que o usuário logou

		date_default_timezone_set('America/Sao_Paulo'); // definindo o fuso horário

		$dataAtual = date("d/m/Y H:i:s"); // pegando a hora atual

		//QUANDO ELE LOGAR, VAI REGISTRAR O HORA DA ENTRADA E O STATUS MUDARÁ PARA ONLINE

		$update = $sql->select("UPDATE tb_users SET  timeloginconnect = '$dataAtual', timelogindisconnect = '$disconnect', status = 'Online'  WHERE login = '$login' ");

	}

	//Pegar a hora que o usuário DESLOGOU DO SISTEMA
	public function loginTimeDisconnect()
	{

		$sql = new Sql();

		$user = new User();

		$login = $_SESSION['User']['iduser']; // Pegar o ID da SESSION do usuário

		//Inserindo a data que o usuário logou

		date_default_timezone_set('America/Sao_Paulo'); // definindo o fuso horário

		$dataAtual = date("d/m/Y H:i:s"); // pegando a hora atual

		//QUANDO ELE DESLOGAR, VAI REGISTRAR O HORA DA SAÍDA E O STATUS MUDARÁ PARA OFFLINE

		$update = $sql->select("UPDATE tb_users SET status = 'Offline', timelogindisconnect = '$dataAtual' WHERE iduser = '$login' ");
	}

	//Ver se existe o login
	public static function login($login, $password) 
	{	

		$sql = new Sql();

		$user = new User();

		$user->loginTimeConnect();

		$results = $sql->select("SELECT * FROM tb_users a INNER JOIN tb_persons b ON a.idperson = b.idperson WHERE a.login = :LOGIN", array(
			":LOGIN"=>$login
		));

		//Verificar se encontrou algum login
		if (count($results) === 0) // se for 0, ele não encontrou nada
		{

			throw new \Exception("Usuário inexistente ou senha inválida.");
		}

		$data = $results[0];//primeiro registro que ele encontrou

		//Verificar a senha do usuário
		if (password_verify($password, $data["despassword"]) === true)
		{
			$user = new User();

			$data['person'] = utf8_encode($data['person']);

			//chamar todos os SETTERS
			$user->setData($data);

			$_SESSION[User::SESSION] = $user->getValues();

			return $user;

		} else {

			throw new \Exception("Usuário inexistente ou senha inválida.");

		}
	}

	//Validar login
	public static function verifyLogin($inadmin = true)
	{	

		//Se a SESSSION não foi definida
		if(!User::checkLogin($inadmin)) {

			if($inadmin){

				header("Location: /admin/login");

			} else {

				header("Location: /login");				
			}
			exit;
		}

	}

	//deslogar do sistema
	public static function logout()
	{	

		$user = new User();

		$user->loginTimeDisconnect();

		$_SESSION[User::SESSION] = NULL;

	}

	//Listar todos os usuários

	public static function listAll() 
	{

		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_users a INNER JOIN tb_persons b USING(idperson) ORDER BY b.person");

	}

	//Admin - Tela Principal - Widgets - Mostrar os Administradores
	public static function listUsersAdmin()
	{

		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_users a INNER JOIN tb_persons b USING(idperson)  WHERE a.inadmin = '1' ORDER BY b.person");

	}


	public static function checkList($list)
	{
		foreach ($list as &$row) {
			
			$u = new User();
			$u->setData($row);
			$row = $u->getValues();

		}

		return $list;

	}

	//Salvar no banco os dados que o usuário cadastrou
	public function save()
	{

		$sql = new Sql();

		$results = $sql->select("CALL sp_users_save(:person, :login, :despassword, :desurl,  :email, :phone, :inadmin)", array(
			":person"=>utf8_decode($this->getperson()),
			":login"=>$this->getlogin(),
			":despassword"=>User::getPasswordHash($this->getdespassword()),
			":desurl"=>$this->getdesurl(),
			":email"=>$this->getemail(),
			":phone"=>$this->getphone(),
			":inadmin"=>$this->getinadmin()
		));

		$this->setData($results[0]);

	}

	//Pegar o id de um usuário
	public function get($iduser)
	{

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_users a INNER JOIN tb_persons b USING(idperson) WHERE a.iduser = :iduser", array(
			":iduser"=>$iduser
		));

		$data = $results[0];

		$data['person'] = utf8_encode($data['person']);

		$this->setData($results[0]);
	}

	//Atualizar um usuário
	public function update()
	{

		$sql = new Sql();
		$results = $sql->select("CALL sp_usersupdate_save(:iduser, :person, :login, :despassword, :desurl, :email, :phone, :inadmin)", array(
			":iduser"=>$this->getiduser(),
			":person"=>$this->getperson(),
			":login"=>$this->getlogin(),
			":despassword"=>$this->getdespassword(),
			":desurl"=>$this->getdesurl(),
			":email"=>$this->getemail(),
			":phone"=>$this->getphone(),
			":inadmin"=>$this->getinadmin()
		));

		$this->setData($results[0]);

	}


	//Deletar um usuário
	public function delete()
	{

		$sql = new Sql();

		$sql->query("CALL sp_users_delete(:iduser)", array(
			"iduser"=>$this->getiduser()
		));

	}

	public function checkPhoto()
	{

		//o nome do arquivo da imagem vai ser o ID do post
		if(file_exists($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 
		   "res". DIRECTORY_SEPARATOR .
		   "admin" . DIRECTORY_SEPARATOR .
		   "dist" . DIRECTORY_SEPARATOR .
		   "img" . DIRECTORY_SEPARATOR .
		   $this->getiduser() . ".jpg"
		)) {

			$url = "/res/admin/dist/img/" . $this->getiduser() . ".jpg";

		} else {

			$url = "/res/admin/dist/img/padrao.jpeg";

		}

		return $this->setdesphoto($url);

	}

	public function getValues()
	{

		//Verificar se o usuário administrativo tem uma imagem ou não
		$this->checkPhoto();

		$values = parent::getValues();

		return $values;
	}

	public function setPhoto($file)
	{

		$extension = explode('.', $file['name']);
		$extension = end($extension);

		switch ($extension) {

			case "jpg":
			case "jpeg":
			$image = imagecreatefromjpeg($file["tmp_name"]);	
 			break;
			
			case 'gif':
			$image = imagecreatefromgif($file["tmp_name"]);	
			break;

 			case "png":
			$image = imagecreatefrompng($file["tmp_name"]);	
			break;
		}

		$dist = $_SERVER['DOCUMENT_ROOT']. DIRECTORY_SEPARATOR . 
			"res" . DIRECTORY_SEPARATOR . 
			"admin" . DIRECTORY_SEPARATOR .
			"dist" . DIRECTORY_SEPARATOR . 
			"img" . DIRECTORY_SEPARATOR . 
			$this->getiduser().".jpg";

 		imagejpeg($image, $dist);

 		imagedestroy($image);

 		$this->checkPhoto();

	}
	
	public static function getForgot($email, $inadmin = true)
	{

		$sql = new Sql();

		//Verificar se o email está cadastrado no banco
		$results = $sql->select("
			SELECT *
			FROM tb_persons a
			INNER JOIN tb_users b USING(idperson)
			WHERE a.email = :email;
		", array(
			":email"=>$email
		));

		//Se ele não encontrar um email
		if (count($results) === 0) 
		{
			throw new \Exception("Não foi possível recuperar a senha.");
			
		} 
	
		else

		{ // se ele encontrar um email

			//Vamos criar um novo registro na tabela de recuperação de senhas
			$data = $results[0];
	
			$results2 = $sql->select("CALL sp_userspasswordsrecoveries_create(:iduser, :ip)", array(
	             ":iduser"=>$data['iduser'],
	             ":ip"=>$_SERVER['REMOTE_ADDR']
	        ));

			if (count($results2) === 0)
			{

				throw new \Exception("Não possível recuperar a senha.");
			}

			else
			{ 
				//Criptografar
	             $dataRecovery = $results2[0];
	             $iv = random_bytes(openssl_cipher_iv_length('aes-256-cbc'));
	             $code = openssl_encrypt($dataRecovery['idrecovery'], 'aes-256-cbc', User::SECRET, 0, $iv);
	             $result = base64_encode($iv.$code);
	             if ($inadmin === true) {
	                 $link = "http://www.blog.com.br/admin/forgot/reset?code=$result";
	             } else {
	                 $link = "http://www.blog.com.br/forgot/reset?code=$result";
	             } 
	             $mailer = new Mailer($data['email'], $data['person'], "Redefinir senha do Blog", "forgot", array(
	                 "name"=>$data['person'],
	                 "link"=>$link
	             )); 
	             $mailer->send();
	             return $link;

			}

		}
	}

	//Decriptar
	 public static function validForgotDecrypt($result)
	 {
	     $result = base64_decode($result);
	     $code = mb_substr($result, openssl_cipher_iv_length('aes-256-cbc'), null, '8bit');
	     $iv = mb_substr($result, 0, openssl_cipher_iv_length('aes-256-cbc'), '8bit');;
	     $idrecovery = openssl_decrypt($code, 'aes-256-cbc', User::SECRET, 0, $iv);

	     $sql = new Sql();

	     $results = $sql->select("
	         SELECT *
	         FROM tb_userspasswordsrecoveries a
	         INNER JOIN tb_users b USING(iduser)
	         INNER JOIN tb_persons c USING(idperson)
	         WHERE
	         a.idrecovery = :idrecovery
	         AND
	         a.dtrecovery IS NULL
	         AND
	         DATE_ADD(a.dtregister, INTERVAL 1 HOUR) >= NOW();
	     ", array(
	         ":idrecovery"=>$idrecovery
	     ));

	    if (count($results) === 0)
	     {

	         throw new \Exception("Não foi possível recuperar a senha.");
	     }

	     else

	     {
	         return $results[0];
	     }

	     
 	}

 	public static function setForgotUsed($idrecovery)
 	{
 		$sql = new Sql();
 		$sql->query("UPDATE tb_userspasswordsrecoveries SET dtrecovery = NOW() WHERE
 			idrecovery = :idrecovery", array(
 				":idrecovery"=>$idrecovery
 			));
 	}

 	public function setPassword($password)
 	{
 		$sql = new Sql();
 		$sql->query("UPDATE tb_users SET despassword = :despassword WHERE iduser = :iduser", array(
 			"despassword"=>$password,
 			"iduser"=>$this->getiduser()
 		));
 	}



 	
	//Vai receber a mensagem de error
	public static function setError($msg)
	{	

		$_SESSION[USER::ERROR] = $msg;	

	}

	//Pegar o erro da sessão
	public static function getError()
	{

		$msg = (isset($_SESSION[User::ERROR]) && $_SESSION[User::ERROR]) ? $_SESSION[User::ERROR] : '';

		User::clearError();

		return $msg;

	}
	//Limpar o erro
	public static function clearError()
	{

		$_SESSION[User::ERROR] = NULL;	
	}


	//Vai receber a mensagem de error
	public static function setErrorRegister($msg)
	{	

		$_SESSION[USER::ERROR_REGISTER] = $msg;	

	}

	//Pegar o erro da sessão
	public static function getErrorRegister()
	{

		$msg = (isset($_SESSION[User::ERROR_REGISTER]) && $_SESSION[User::ERROR_REGISTER]) ? $_SESSION[User::ERROR_REGISTER] : '';

		User::clearErrorRegister();

		return $msg;

	}

	//Limpar o erro
	public static function clearErrorRegister()
	{

		$_SESSION[User::ERROR_REGISTER] = NULL;	
	}

	//Verificar se o login já existe no banco
	public static function checkLoginExist($login)
	{

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_users WHERE login = :login", array(
			'login'=>$login
		));

		return (count($results) > 0); // se retornou alguma coisa, pq o login já existe


	}

	//Vai receber a mensagem de error
	public static function setSuccess($msg)
	{	

		$_SESSION[USER::SUCCESS] = $msg;	

	}

	//Pegar o erro da sessão
	public static function getSuccess()
	{

		$msg = (isset($_SESSION[User::SUCCESS]) && $_SESSION[User::SUCCESS]) ? $_SESSION[User::SUCCESS] : '';

		User::clearSuccess();

		return $msg;

	}
	//Limpar o erro
	public static function clearSuccess()
	{

		$_SESSION[User::SUCCESS] = NULL;	
	}

	public static function getPasswordHash($password)
	{

		return password_hash($password, PASSWORD_DEFAULT, [
			'cost'=>12
		]);
	}

	//Paginação 
	public static function getPage($page = 1, $itemsPerPage = 10)
	{

		$start = ($page-1) * $itemsPerPage;

		$sql = new Sql();

		$results = $sql->select("

			SELECT SQL_CALC_FOUND_ROWS * 
			FROM tb_users a 
			INNER JOIN tb_persons b USING(idperson) 
			ORDER BY b.person
			LIMIT $start, $itemsPerPage;			
		");

		$resultsTotal = $sql->select("SELECT FOUND_ROWS() as nrtotal;");

		return array(
			'data'=>User::checkList($results),
			'total'=>(int)$resultsTotal[0]["nrtotal"],
			'pages'=>ceil($resultsTotal[0]["nrtotal"] / $itemsPerPage)
		);

	}

	//Busca
	public static function getPageSearch($search, $page = 1, $itemsPerPage = 10)
	{

		$start = ($page - 1) * $itemsPerPage;

		$sql = new Sql();

		$results = $sql->select("
				SELECT SQL_CALC_FOUND_ROWS* 
				FROM tb_users a 
				INNER JOIN tb_persons b USING(idperson) 
				WHERE b.person LIKE :search OR b.email = :search OR a.login LIKE :search
				ORDER BY b.person
				LIMIT $start, $itemsPerPage;
			", array(
				':search'=>'%'.$search.'%'
			));

		$resultsTotal = $sql->select("SELECT FOUND_ROWS() as nrtotal;");

		return array(
			'data'=>$results,
			'total'=>(int)$resultsTotal[0]["nrtotal"],
			'pages'=>ceil($resultsTotal[0]["nrtotal"] / $itemsPerPage)
		);

	}

	// Mostrar a quantidade de usuários administrativos e exibe no widget
	public function getUsersTotals()
	{

		$sql = new Sql();

		$results = $sql->select("SELECT SUM(login) as login, COUNT(*) AS nrqtd FROM tb_users WHERE inadmin = '1' ");

		if(count($results) > 0 ) {

			return $results[0];
			
		} else {

			return [];
		}

	}




}

?>