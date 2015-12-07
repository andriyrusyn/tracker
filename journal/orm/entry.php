<?php
class Entry
{
	private $id;
	private $author_id;
	private $body;

	public static function create($author_id, $body) {
		$mysqli = new mysqli("localhost", "root","password","426project");
		$query = "INSERT INTO entries(author_id, body) VALUES ('". $author_id ."', '" . $body . "')";
		echo($query);
		$result = $mysqli->query($query);
		if ($result) {
			echo("result created!");
			$new_id = $mysqli->insert_id;
			return new Entry($new_id, $author_id, $body);
		}
		return null;
	}

	public static function findByID($id) {
		$mysqli = new mysqli("localhost", "root","password","426project");
		$result = $mysqli->query("select * from entries where id = " . $id);
		if ($result) {
			if ($result->num_rows == 0){
				return null;
			}
			$entry_info = $result->fetch_array();
			return new Entry($entry_info['id'],
					       $entry_info['author_id'],
					       $entry_info['body']);
		}
		return null;
	}

	// public static function getRange($start, $end) {
	// 	if ($start < 0) {
	// 		if ($end > $start) {
	// 			return null;
	// 		}
	// 		$direction = "DESC";
	// 		$start *= -1;
	// 		$end *= -1;
	// 	} else {
	// 		if ($end < $start) {
	// 			return null;
	// 		}
	// 		$direction = "ASC";
	// 	}
	// 	$mysqli = new mysqli("localhost", "root", "password", "comp426fall14db");
	// 	$result = $mysqli->query("select id from Transaction order by id " . $direction);
	// 	$transactions = array();

	// 	if ($result) {
	// 		for ($i=1; $i<$start; $i++) {
	// 			$result->fetch_row();
	// 		}
	// 		for ($i=$start; $i<=$end; $i++) {
	// 			$next_row = $result->fetch_row();
	// 			if ($next_row) {
	// 				$transactions[] = Transaction::findByID($next_row[0]);
	// 			}
	// 		}
	// 	}
	// 	return $transactions;
	// }

	private function __construct($id, $author_id, $body) {
		$this->id = $id;
		$this->author_id = $author_id;
		$this->body = $body;
	}

	public function getID() {
		return $this->id;
	}

	public function getAuthor() {
		// We'll just return the author's id here, but what we should do is 
		// use the author's id to retrieve the appropriate owner object from the
		// Owner ORM class and return that.
		return $this->author_id;
	}

	public function getBody() {
		// Same caveat as above with owner.
		return $this->body;
	}

	public function setBody($new_body) {
		// Should do validation here
		// If body is wrong in some way, return false.
		
		$this->body = $new_body;
		// Implicit style updating
		return $this->update();
	}

	private function update() {
		$mysqli = new mysqli("localhost", "root","password","426project");
		$result = $mysqli->query("update entries set body = " . $this->body . " where id = " . $this->id);
		return $result;
	}

}
?>