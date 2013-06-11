<?
header('Content-type: text/html; charset=utf-8');

class Member {
	public $username = "";
	protected $loggedIn = false;

	public function login() {
		$this->loggedIn = true;
	}

	public function logout() {
		$this->loggedIn = false;
		echo "$this->username вышел<br>";
	}

	public function isLoggedIn() {
		return $this->loggedIn;
	}
}

class Administrator extends Member {
	public function createForum($forumName) {
		echo "$this->username, создал форум: $forumName.<br>";
	}

	public function banMember($member) {
		echo "$this->username забанил пользователя: $member->username.<br>";
	}

	public function login() {
		parent::login();
		echo "$this->username залогинился).<br>";
	}
}

$member = new Member();
$member->username = "Фред";
$member->login();
echo $member->username." ".($member->isLoggedIn() ? "залогинился":"вышел")."<br>";
$member->logout();


$admin = new Administrator();
$admin->username = "Поуль";
$admin->login();
//echo $admin->isLoggedIn();
$admin->createForum("Мишки Тедди");
$admin->banMember($member);
$admin->logout();
?>