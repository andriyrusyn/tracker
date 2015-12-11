<?php
class Entry
{
	private $id;
	private $author_id;
	private $entry;

	public static function create($author_id, $entry) {
		$mysqli = new mysqli("localhost", "root","password","426project");
		$query = "INSERT INTO entries(author_id, entry) VALUES ('". $author_id ."', '" . $entry . "')";
		echo($query);
		$result = $mysqli->query($query);
		if ($result) {
			echo("result created!");
			$new_id = $mysqli->insert_id;
			return new Entry($new_id, $author_id, $entry);
		}
		return null;
	}

	public static function findByID($id) {
		$mysqli = new mysqli("localhost", "root","password","426project");
		$result = $mysqli->query("SELECT * FROM entries WHERE id = " . $id);
		if ($result) {
			if ($result->num_rows == 0){
				return null;
			}
			$entry_info = $result->fetch_array();
			return new Entry($entry_info['id'],
					       $entry_info['author_id'],
					       $entry_info['entry']);
		}
		return null;
	}

	public static function getAllIDs() {
		$mysqli = new mysqli("localhost", "root","password","426project");
	    $result = $mysqli->query("SELECT id FROM entries");
	    $id_array = array();
	    if ($result) {
	      while ($next_row = $result->fetch_array()) {
		  	  $id_array[] = intval($next_row['id']);
	      }
	    }
	    return $id_array;

  	}

	public static function getN($n) {
		$mysqli = new mysqli("localhost", "root","password","426project");
		$result = $mysqli->query("SELECT id FROM entries LIMIT '$n'");
		$entries = array();
		if ($result) {
			for ($i=1; $i<$start; $i++) {
				$result->fetch_row();
			}
			for ($i=$start; $i<=$end; $i++) {
				$next_row = $result->fetch_row();
				if ($next_row) {
					$entries[] = Entry::findByID($next_row[0]);
				}
			}
		}
		return $entries;
	}


	public static function getRange($start_date, $end_date) {
		$mysqli = new mysqli("localhost", "root","password","426project");
		$query = "SELECT id FROM entries WHERE created_at >= '$start_date' AND created_at <= '$end_date' ORDER BY created_at";
		console_log($query);
		$result = $mysqli->query($query);
		$entries = array();
		if ($result) {
			for ($i=1; $i<$start; $i++) {
				$result->fetch_row();
			}
			for ($i=$start; $i<=$end; $i++) {
				$next_row = $result->fetch_row();
				if ($next_row) {
					$entries[] = Entry::findByID($next_row[0]);
				}
			}
		}
		return $entries;
	}

	private function __construct($id, $author_id, $entry) {
		$this->id = $id;
		$this->author_id = $author_id;
		$this->entry = $entry;
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

	public function getEntry() {
		// Same caveat as above with owner.
		return $this->entry;
	}

	public function getJSON() {
		$json_obj = array('id' => $this->id,
			      'author_id' => $this->author_id,
			      'entry' => $this->entry);
		return json_encode($json_obj);
	}
	
	public function setEntry($new_entry) {
		// Should do validation here
		// If entry is wrong in some way, return false.
		
		$this->entry = $new_entry;
		// Implicit style updating
		return $this->update();
	}

	public function setAuthorId($new_author_id) {
		// Should do validation here
		// If entry is wrong in some way, return false.
		
		$this->author_id = $new_author_id;
		// Implicit style updating
		return $this->update();
	}

	private function update() {
		$mysqli = new mysqli("localhost", "root","password","426project");
		$result = $mysqli->query("UPDATE entries SET author_id = "+ $this->$author_id + " entry = " . $this->entry . " WHERE id = " . $this->id);
		return $result;
	}

	public function delete() {
		$mysqli = new mysqli("localhost", "root","password","426project");
		$mysqli->query("DELETE FROM entries WHERE id = " . $this->id);
	}
	
	function console_log( $data ){
	  echo '<script>';
	  echo 'console.log('. json_encode( $data ) .')';
	  echo '</script>';
	}
}
?>