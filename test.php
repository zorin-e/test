<?
header('Content-type: text/html; charset=utf-8');

class Member {
	private $username;

	public function __construct($username)
	{
		$this->username = $username;
	}

	public function GetUsername2()
	{
		return $this->username;
	}
}

class Topic {
	private $subject;
	private $member2;

	public function __construct(Member $member, $subject)
	{
		$this->subject = $subject;
		$this->member2 = $member;
	}

	public function GetUsername()
	{
		return $this->member2->GetUsername2();
	}
}

$aMember = new Member( "fred" );

$aTopic = new Topic( $aMember, "Hello everybody!" );

echo $aTopic->GetUsername(); // отобразит "fred"



class Widget {

 private $colour;

 public function __construct( $colour ) {
   $this->colour = $colour;
 }

 public function getColour() {
   return $this->colour;
 }
}


$aWidget = new Widget( "blue" );
$anotherTopic = new Topic( $aWidget, "Oops!" );

// отобразит "Fatal error: Call to undefined method Widget::getUsername()"
echo $anotherTopic->GetUsername(); 


// class Member {
// 	const MEMBER = 1;
// 	const MODERATOR = 2;
// 	const ADMINISTRATOR = 3;

// 	private $username;
// 	private $level;
// 	static private $numMembers = 0;

// 	public function __construct($username, $level)
// 	{
// 		$this->username = $username;
// 		++self::$numMembers;
// 		$this->level = $level;
// 	}

// 	static public function GetNumMembers()
// 	{
// 		return self::$numMembers;
// 	}

// 	public function Username()
// 	{
// 		return $this->username;
// 	}

// 	public function GetLevel()
// 	{
// 		if (self::MEMBER == $this->level) return self::MEMBER;
// 		if (self::MODERATOR == $this->level) return self::MODERATOR;
// 		if (self::ADMINISTRATOR == $this->level) return self::ADMINISTRATOR;
// 	}
// }

// //echo Member::GetNumMembers();
// $m = new Member("Фред", Member::MEMBER);
// echo $m->Username()." — права: ".$m->GetLevel()."<br>";
// //echo Member::GetNumMembers();
// $m2 = new Member("Поуль", Member::MODERATOR);
// echo $m2->Username()." — права: ".$m2->GetLevel()."<br>";
//echo Member::GetNumMembers();
// echo <<<HTML
// <script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js'></script>
// <script>
// $(document).ready(function(){
// var question = 0;

// 	$("input[name='add']").click(function(){
// 		$(this).before("<input type='text' data-g='"+question+"' name='Interviews[name][question]["+question+"][question]'><div style='width:300px;'><input type='button' value='Добавить ответ'' name='add_answer'><br></div><br>");
// 		question++;
// 	});

// 	$("input[name='add_answer']").live("click",function(){
// 		answer = $(this).parent().prev().data("g");
// 		$(this).after("<br><input type='text' name='Interviews[name][question]["+answer+"][answer][]'>");
// 	});
// });
// </script>
// <form action='/test2.php' name='a' method='post'>
// <input type='text' name="Interviews[name][0]" value="Opros"><br>
// <input type="button" value="Добавить вопрос" name="add">
// <br>
// <input type="submit">
// </form>
// HTML;

// class MyClass {

// 	public $prop = "Свойство класса<br>";

// 	public static $count = 0;

// 	public function __construct()
// 	{
// 		echo 'Cоздан объект класса "'.__CLASS__.'"<br>';
// 	}

// 	public function __destruct()
// 	{
// 		echo 'Удален объект класса "'.__CLASS__.'"<br>';
// 	}

// 	public function __toString()
// 	{
// 		return $this->GetProperty();
// 	}

// 	public function SetProperty($value) 
// 	{
// 		$this->prop = $value;
// 	}
	
// 	protected function GetProperty()
// 	{
// 		return $this->prop;
// 	}

// 	public static function plusOne() {
// 		return "count = ".++self::$count."<br>";
// 	}


// }


// class MyOtherClass extends MyClass
// {
// 	public function __construct()
// 	{
// 		parent::__construct();
// 		echo "Новый конструктор в классе ".__CLASS__."<br>";
// 	}
// 	public function __destruct()
// 	{
// 		parent::__destruct();
// 		echo 'Удален объект класса "'.__CLASS__.'"<br>';
// 	}

// 	public function newMethod()
// 	{
// 		echo "Новый метод класса ".__CLASS__.".<br>";
// 	}

// 	public function GetProtected()
// 	{
// 		//return $this->GetProperty();
// 		parent::GetProperty();
// 		echo ":: ggg<br>";
// 	}
// }

// do {
// 	echo MyClass::plusOne();
// } while ( MyClass::$count < 10);

 //$object = new MyOtherClass;
 //$object->newMethod();

// echo $object->GetProperty()." &mdash; получили свойство<br>";

// $object->SetProperty("Новое".$object->prop);

// echo $object." &mdash; получили новое свойство, выводим объект строку, юзается метод __toString<br>";

// $newobject = new MyOtherClass;

// echo $newobject->GetProtected();

?>