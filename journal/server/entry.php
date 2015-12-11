<?php

require_once('orm/Entry.php');

$path_components = explode('/', $_SERVER['PATH_INFO']);
// Note that since extra path info starts with '/'
// First element of path_components is always defined and always empty.

if ($_SERVER['REQUEST_METHOD'] == "GET") {
  // GET means either instance look up, index generation, or deletion

  // Following matches instance URL in form
  // /entry.php/<id>

  if ((count($path_components) >= 2) &&
      ($path_components[1] != "")) {

    // Interpret <id> as integer
    $entry_id = intval($path_components[1]);

    // Look up object via ORM
    $entry = Entry::findByID($entry_id);

    if ($entry == null) {
      // Todo not found.
      header("HTTP/1.0 404 Not Found");
      print("Entry id: " . $entry_id . " not found.");
      exit();
    }

    // Check to see if deleting
    if (isset($_REQUEST['delete'])) {
      $entry->delete();
      entry("Content-type: application/json");
      print(json_encode(true));
      exit();
    } 

    // $new_start_date = false;
    // $new_start_date_obj = null;
    

    // if ($new_date) {
    //   // $new_start_date = true;
    //   // $date_str = trim($_REQUEST['start_date']);
    //   if ($new_date != "") {
    //     $new_start_date_obj = new DateTime($date_str);
    //   }
    // }

    // $new_end_date = false;
    // $new_end_date_obj = null; 
    // if (isset($_REQUEST['end_date'])) {
    //   $new_end_date = true;
    //   $date_str = trim($_REQUEST['end_date']);
    //   if ($date_str != "") {
    //     $new_end_date_obj = new DateTime($date_str);
    //   }
    // }

    // if ($new_date) {
    //   // $new_start_date = true;
    //   // $date_str = trim($_REQUEST['start_date']);
    //   if ($new_date != "") {
    //     $new_start_date_obj = new DateTime($date_str);
    //   }
    // }



    // Normal lookup.
    // Generate JSON encoding as response
    header("Content-type: application/json");
    print($entry->getJSON());
    exit();
  }
  $new_start_date = new DateTime($_GET['start_date']);
  $new_end_date = new DateTime($_GET['end_date']);
  // console_log($new_start_date->format('Y-m-d'));
  // console_log($new_end_date->format('Y-m-d'));

  if($new_end_date && $new_start_date){
    header("Content-type: application/json");
    // console_log(Entry::getRange($new_start_date->format('Y-m-d'), $new_end_date->format('Y-m-d')));
    print(json_encode(Entry::getRange($new_start_date->format('Y-m-d'), $new_end_date->format('Y-m-d'))));
    exit();
  }

  // ID not specified, then must be asking for index
  header("Content-type: application/json");
  print(json_encode(Entry::getAllIDs()));
  exit();

} else if ($_SERVER['REQUEST_METHOD'] == "POST") {

  // Either creating or updating

  // Following matches /entry.php/<id> form
  if ((count($path_components) >= 2) &&
      ($path_components[1] != "")) {

    //Interpret <id> as integer and look up via ORM
    $entry_id = intval($path_components[1]);
    $entry = Entry::findByID($entry_idy);

    if ($entry == null) {
      // Entry not found.
      header("HTTP/1.0 404 Not Found");
      print("Entry id: " . $entry_id . " not found while attempting update.");
      exit();
    }

    // Validate values
    $new_author_id = false;
    if (isset($_REQUEST['author_id'])) {
      $new_author_id = trim($_REQUEST['author_id']);
      if ($new_author_id == 0) {
      	header("HTTP/1.0 400 Bad Request");
      	print("Can't save an entry without an author! (Please log in or register)");
      	exit();
      }
    }

    $new_entry = false;
    if (isset($_REQUEST['entry'])) {
      $new_entry = trim($_REQUEST['entry']);
    }

    // Update via ORM
    if ($new_author_id) {
      $entry->setAuthorId($new_author_id);
    }
    if ($new_entry != false) {
      $entry->setEntry($new_entry);
    }

    // Return JSON encoding of updated entry
    header("Content-type: application/json");
    print($entry->getJSON());
    exit();
    } else {

    // Creating a new Entry

    // Validate values
    if (!isset($_REQUEST['author_id'])) {
      header("HTTP/1.0 400 Bad Request");
      print("Missing Author ID");
      exit();
    }
    
    $title = trim($_REQUEST['entry']);
    if ($title == "") {
      header("HTTP/1.0 400 Bad Request");
      print("Empty Entry");
      exit();
    }


    // Create new Entry via ORM
    $new_entry = Entry::create($author_id, $entry);

    // Report if failed
    if ($new_entry == null) {
      header("HTTP/1.0 500 Server Error");
      print("Server couldn't create new entry.");
      exit();
    }
    
    //Generate JSON encoding of new Entrys
    header("Content-type: application/json");
    print($new_entry->getJSON());
    exit();
  }
}

// If here, none of the above applied and URL could
// not be interpreted with respect to RESTful conventions.

header("HTTP/1.0 400 Bad Request");
print("Did not understand URL");

function console_log( $data ){
  echo '<script>';
  echo 'console.log('. json_encode( $data ) .')';
  echo '</script>';
}

?>