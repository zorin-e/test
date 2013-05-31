<?
header('Content-type: text/html; charset=utf-8');

class Member {

 private $username;

 private $location;

 public function __construct( $username, $location ) {
   $this->username = $username;
   $this->location = $location;
 }

 public function getUsername() {
   return $this->username;
 }


 public function getLocation() {
   return $this->location;
 }

}

class Topic {

 private $member;
 private $subject;

 public function __construct( $member, $subject ) {
   $this->member = $member;
   $this->subject = $subject;
 }

 public function getSubject() {
   return $this->subject;
 }


// public function getUsername() {
// 	return $this->member->getUsername();
// }


public function __call($member, $arguments) {
	return $this->member->$member($arguments);
}


}

$aMember = new Member( "fred", "Ямайка" );
$aTopic = new Topic( $aMember, "Hello everybody!" );
echo $aTopic->getSubject() . "<br>"; // отобразит "Hello everybody!"
echo $aTopic->getUsername() . "<br>"; // отобразит "fred"

echo $aTopic->getLocation() . "<br>"; 
?>