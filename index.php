<?
abstract class Person {
	const JUSTUSER = 1;
	const SHOPPER = 2;

	protected $logged = false;
	protected $username = "";
	protected $level;

	public function __construct($username, $level) {
		$this->username = $username;
		$this->level = $level;
	}

	public function getlevel() {
		switch ($this->level) {
			case self::JUSTUSER:
				return "Обычный пользователь";
				break;
			
			default:
				return "Вы не авторизованы";
				break;
			case self::SHOPPER:
				return "Покупатель";
		}
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

	protected function isLogged() {
		return $this->logged;
	}

	public function getUsername() {
		return $this->username;
	}

	abstract public function showMessage();
}

class User extends Person implements Persistable {
	public function save() {
		echo $this->getUsername()." was saved to database";
	}

	public function load() {
		echo $this->getUsername()." is load from database";
	}

	public function delete() {
		echo $this->getUsername()." is delete from database";
	}

	public function showMessage() {
		echo "Welcome, ".$this->getUsername();
	}
}

class Topic implements Persistable {
	private $subject = "";
	private $username = "";
	private $authorname = "";
	private static $numobject = 0;

	public function __construct($subject, $username) {
		$this->subject = $subject;
		$this->username = $username;
		$this->authorname = $this->username->getUsername();
		self::$numobject++;
	}

	public static function getNumObject() {
		return self::$numobject;
	}

	public function save() {		
		echo $this->authorname." add new topic";
	}

	public function load() {
		echo $this->authorname." load $this->subject topic";
	}

	public function delete() {
		echo $this->authorname." delete $this->subject database";
	}	
}
class Shopper extends Person implements Persistable {

	public function save() {
		echo "<br>Your order was saved to database<br>";
	}

	public function load() {
		echo "<br>Your order is load from database<br>";
	}

	public function delete() {
		echo "<br>Your order is delete from database<br>";
	}

	public function showMessage() {
		echo "Welcome to online shop, ".$this->getUsername();
	}

	public function addToCart($item) {
		echo "$item adding in your cart";
	}
}

interface Persistable {
	public function save();
	public function load();
	public function delete();
}

$objUser = new User("Web", 1);
echo $objUser->getlevel();
echo "<br>";
$objUser->showMessage();
echo "<br>";
$objUser->delete();
echo "<br>";
$Topic = new Topic("New theme", $objUser);
$Topic->load();

echo "<br>";
$Topic2 = new Topic("New theme2", $objUser);
echo "Создано ".Topic::getNumObject()."  топика<br>";
$Topic2->load();
echo "<br>------<br>";
$objShopper = new Shopper("Webdude", 2);
echo $objShopper->getlevel();
echo "<br>";
$objShopper->showMessage();
echo "<br>";
$objShopper->addToCart(" Ployer Momo 7");
$objShopper->save();
?>