<?php
/**
 * The page handlers basic request of the framework : login, account editing, etc.
 * 
 * @author Jean-Philippe Collette
 * @package Controllers
 */
class Request extends RequestPage
{
	public static $name = "";
	
	public function __construct($arg)
	{
		parent::__construct($arg);
		
	}
	
	public static function init()
	{
		self::registerRequest(STRUCTURE_NAME, get_class());
	}
	
	
	public function handler($arg)
	{
		$r = $arg[0];
		unset($arg[0]);
		$back = "";
		switch($r)
		{
			/**
			 * Account management
			 */
			case "retreiveaccount":
				
				$method = Post::value("method");
				
				if($method == "email" || $method == "login")
				{
					$data = ($method == "email") ? Post::value("email") : Post::value("login");
				
					$count = $this->request->count(TABLE_USER, $method."='".$data."'");
					
					if($count == 1)
					{
						$code = generateId(50);
						$pass = Post::value("pass1");
						$pass2 = Post::value("pass2");
						
						if($pass != "" && $pass == $pass2)
						{
							$info = $this->request->firstQuery("SELECT login, email FROM " . TABLE_USER . " WHERE ".$method."='" . $data . "'");
							
							$email = $data;
							$login = $data;
							if($method == "login")
								$email = $info['email'];
							else if($method == "email")
								$login = $info['login'];
							
							$link = "?Request/cmp/retreiveaccountconfirm/".$code;
							
							$mail = new Mail($email, "SmS - New Password", "Your login is '".$login."'. <a href=\"http://www.itstudents.be/~jipe/sms/".$link."\">Please clic on this link to confirm your new password</a>."); 
							$mail->addHeader("From", "no-reply@sellmestuff.be");
							$mail->send();
							$this->request->update(TABLE_USER, $method."='".$data."'", array('confirmation_code' => $code, 'confirmation_new_password' => md5($pass)));
							Messages::add("An e-mail has been sent to confirm your new password.", Message::SUCCESS);
						}
						else
							Messages::add("Passwords are different.", Message::ERROR);
					}
					else
						Messages::add("Email or login does not exist in database.", Message::ERROR);
				
				}
				else
					Messages::add("Malformed form.", Message::ERROR);
				
				$back = "Login";
				
				break;
				
			case "retreiveaccountconfirm":
				if(!empty($arg[1]))
				{
					$code = mysql_real_escape_string($arg[1]);
					
					$info = $this->request->firstQuery("SELECT id, confirmation_new_password FROM " . TABLE_USER . " WHERE confirmation_code='".$code."'");
					
					if($this->request->getNbrResponse() == 1)
					{
						$this->request->update(TABLE_USER, "id='" . $info['id']."'", array('password' => $info['confirmation_new_password'], 'confirmation_new_password' => 'NULL', 'confirmation_code' => 'NULL'));
						Messages::add("Your password has been updated.", Message::SUCCESS);
					}
					else
						Messages::add("Unknown code.", Message::ERROR);
				}
				else 
					Messages::add("Code not specified.", Message::ERROR);
					
				$back = "Login";
				break;
			
			case "editaccount":
				$edit = Post::value("edit");
				$info = Post::value("info");
				$back = "Account";
				if($edit == "editorganisation")
				{
					$id_org = Post::int("id_organisation");
					$job = Post::string("job");
					$this->request->update(TABLE_USER_ORGANISATION, "id_organisation='" . $id_org . "' AND id_user='" . User::getId() . "'", array('job' => $job));
					out::message("Association edited.", Message::SUCCESS);
					break;
				}
				elseif($edit == "userinfo")
				{
					$firstname = Post::string("firstname");
					$lastname = Post::string("lastname");
					
					$title = Post::string("title");
					$street = Post::string("street");
					$number = Post::string("number");
					$postal = Post::string("postal");
					$city = Post::string("city");
					$phone = Post::string("phone");
					$mobile = Post::string("mobile");
					$fax = Post::string("fax");
					$website = Post::string("website");
					$country = Post::string("country");
					
					$array = array(	'firstname' => $firstname, 'lastname' => $lastname,
									'country' => $country, 'title' => $title, 'street' => $street, 'number' => $number,
									'postal' => $postal, 'city' => $city, 'mobile' => $mobile, 'phone' => $phone, 'fax' => $fax, 'website' => $website);

					$id_contact = User::getContactId();				
					if(empty($id_contact))
					{
						$this->request->insert(TABLE_CONTACT, $array);
						$array = array('firstname' => $firstname, 'lastname' => $lastname, 'email' => $email, 'id_contact' => $this->request->getLastId());
					}
					else
					{
						$this->request->update(TABLE_CONTACT, "id='".$id_contact . "'", $array);
						$array = array('firstname' => $firstname, 'lastname' => $lastname, 'email' => $email);
					}
					
				}
				else if($edit == "avatar")
				{
					$avatar = FileUpload::movefile("file", "user/avatar");
					$delete = Post::boolValue("delete", "on", false);
					
					if($delete)
					{
						// TODO: supprimer le fichier
						$array = array('avatar' => 'NULL');
					}
					else
						if(!FileUpload::isError($avatar))
						{
							$array = array('avatar' => $avatar);
							$path = PATH_UPLOAD."user/avatar/";
							ImageProcessing::redim($path.$avatar, $path."mini/".$avatar, 200, 200);
						}	
				}
				else if($edit == "password")
					$array = array($edit => md5($info));
				else
					$array = array($edit => $info);
				
				if($edit == "password" && $info != Post::value("pass2"))
					Messages::add("Incorrect password.", Message::ERROR);
				else
				{
					//if(!empty($array))
					$this->request->update(TABLE_USER, "id='" . User::getId() . "'", $array);
					User::reloadData();
					Messages::add("Your account has been edited.", Message::SUCCESS);
				}	
				
				break;
			
			case "login_cookie":
			case "login":
				$fromCookie = ($r == "login_cookie");
				if($fromCookie)
				{
					$login = $_COOKIE['cmp_login'];
					$pass = $_COOKIE['cmp_password'];
					$remember = "on";
					
					if(count($arg) == 0)
						$back = DEFAULT_PAGE;
					else
						$back = implode(Config::ARG_SEPARATOR, $arg);
					Log::add("Tentative de login (cookie) : '".$login."' => '".$pass."'", Log::INFO);
				}
				else
				{
					$login = Post::value("login_login");
					$pass = Post::value("login_password");
					$remember = Post::value("login_remember", "");
					$back = Post::value("back");
					
					Log::add("Tentative de login (form) : '".$login."' => '".$pass."'", Log::INFO);
					$pass = md5($pass);
				}
				
				$info = $this->request->firstQuery("SELECT * FROM " . TABLE_USER . " WHERE login='" . $login . "'");
				
				$l = "Login".Config::ARG_SEPARATOR."error";
				$fail = true;
				if($login != $pass && $pass != "")
				{
					if($this->request->getNbrResponse() == 1)
					{
						if($info['password'] == $pass)
						{
							$this->request->update(TABLE_USER, "id='" . $info['id'] . "'", array('token' => generateId(20)));
							User::loadId($info['id']);
							$fail = false;	
							if($remember == "on")
							{
								setcookie("cmp_login", $login, time() + 3600*24*365);
								setcookie("cmp_password", $pass, time() + 360*24*365);
							}
							
							Log::add("Login ok", Log::CONFIRM);
							
							if(!$fromCookie)
								Messages::add("You are now connected.", Message::SUCCESS);
						}
						else if(!$fromCookie)
							$back = $l.Login::$BAD_PASSWORD.Config::ARG_SEPARATOR.$back;
					}
					else if(!$fromCookie)
						$back = $l.Login::$BAD_LOGIN.Config::ARG_SEPARATOR.$back;
				}
				else if(!$fromCookie)
					$back = $l.Login::$BAD_FORM.Config::ARG_SEPARATOR.$back;
				
				if($fail)
					Log::add("Login failed.", Log::ERROR);
				
				if($fromCookie && $fail)
				{
					setcookie("cmp_login", "", 0);
					setcookie("cmp_password", "", 0);
				}
				break;
				
				
			case "logoff":
				
				$_SESSION = array();
				session_destroy();
				setcookie("cmp_login", 0, 0);
				setcookie("cmp_password", 0, 0);
				Messages::add("You have been disconnected.", Message::SUCCESS);
				$back = implode(Config::ARG_SEPARATOR, $arg);
				
				if($back == "")
					$back = DEFAULT_PAGE;
				break;
				
				
			case "register":
				$login = Post::value("login");
				$pass1 = Post::value("pass1");
				$pass2 = Post::value("pass2");
				$email = Post::value("email");
				$nickname = Post::value("nickname");
				$captcha_answer = Post::value("captcha_answer");
				
				$back = "Register";
				if($captcha_answer == $_SESSION['captcha_code'])
				{
					$cnt_login = $this->request->count(TABLE_USER, "login='" . $login . "'");
					
					if($cnt_login == 0)
					{
						if($pass1 == $pass2 && $pass1 != "")
						{
							$this->request->insert(TABLE_USER, array('login' => $login, 'password' => md5($pass1), 'nickname' => $nickname, 'email' => $email));
							Messages::add("You are correctly registered.", Message::SUCCESS);
							$back = "Login";
						}
						else
							Messages::add("Passwords are different.", Message::ERROR);
					}
					else
						Messages::add("Login already exists.", Message::ERROR);
				}
				else
					Messages::add("Wrong captcha.", Message::ERROR);
				break;
				
			default:
				Messages::add("Undefined operation: ".$r, Message::ERROR);
				$back = "";
		}
		$this->setLocation($back);
	}
}
?>
