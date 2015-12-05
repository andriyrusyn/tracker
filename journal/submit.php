 <html>
<body>
<?php
    $input = $_GET['entry'];

    $input = mysql_escape_string($input);
    echo($input);

    $conn = new mysqli("localhost","root","password","426project"); 

    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    } else {
      echo "Connection successful.\n";
    }

    $query = "INSERT INTO entries (author_id, body) VALUES ('1', '$input')";
    $result = mysqli_query($conn,$query);

    echo($query);
    if ($result) {
	    echo "New record created successfully";
	} else {
	    echo "Error!";
	}
?>		
</body>
</html>

