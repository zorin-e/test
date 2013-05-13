<?php 
header('Content-type: text/html; charset=utf-8');
echo <<<HTML
<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js'></script>
<script>
$(document).ready(function(){
var question = 0;

	$("input[name='add']").click(function(){
		$(this).before("<input type='text' data-g='"+question+"' name='Interviews[name][question]["+question+"][question]'><div style='width:300px;'><input type='button' value='Добавить ответ'' name='add_answer'><br></div><br>");
		question++;
	});

	$("input[name='add_answer']").live("click",function(){
		answer = $(this).parent().prev().data("g");
		$(this).after("<br><input type='text' name='Interviews[name][question]["+answer+"][answer][]'>");
	});
});
</script>
<form action='/test2.php' name='a' method='post'>
<input type='text' name="Interviews[name][0]" value="Opros"><br>
<input type="button" value="Добавить вопрос" name="add">
<br>
<input type="submit">
</form>
HTML;

class MyClass {

	public $prop = "Свойство класса<br>";

	public function __construct()
	{
		echo 'Cоздан объект класса "'.__CLASS__.'"<br>';
	}

	public function __destruct()
	{
		echo 'Удален объект класса "'.__CLASS__.'"<br>';
	}

	public function __toString()
	{
		return $this->GetProperty();
	}

	public function SetProperty($value) 
	{
		$this->prop = $value;
	}
	
	protected function GetProperty()
	{
		return $this->prop;
	}
}


class MyOtherClass extends MyClass
{
	public function __construct()
	{
		parent::__construct();
		echo "Новый конструктор в классе ".__CLASS__."<br>";
	}

	public function newMethod()
	{
		echo "Новый метод класса ".__CLASS__.".<br>";
	}

	public function GetProtected()
	{
		//return $this->GetProperty();
		parent::GetProperty();
		echo ":: ggg<br>";
	}
}

// $object = new MyClass;

// echo $object->GetProperty()." &mdash; получили свойство<br>";

// $object->SetProperty("Новое".$object->prop);

// echo $object." &mdash; получили новое свойство, выводим объект строку, юзается метод __toString<br>";

$newobject = new MyOtherClass;

echo $newobject->GetProtected();

?>