<?
class User {
	protected $logged = false;
	protected $username = "";

	public function __construct($username) {
		$this->username = $username;
	}

	public function __toString() {
		return $this->getUsername();
	}

	public function login() {
		$this->logged = true;
	}

	public function logout() {
		$this->logged = false;
	}

	private function isLogged() {
		return $this->logged;
	}

	public function getUsername() {
		return $this->username."<br>";
	}

	public function showMessage() {
		echo ($this->isLogged() ? $this->username." залогинился<br>":
		$this->username." разалогинился<br>");
	}

}

class Admin extends User{
	
	public function getUsername() {
		parent::getUsername();
		return $this->username." администратор";
	}

}

$objUser = new User("Web");
echo $objUser->getUsername();
$objUser->login();
$objUser->showMessage();
$objUser->logout();
$objUser->showMessage();
echo $objUser;
echo "<br>---------------<br>";

$objAdmin = new Admin("Webdude");
echo $objAdmin->getUsername();
?>