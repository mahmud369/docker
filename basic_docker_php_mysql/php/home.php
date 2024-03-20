<!-- ./php/home.php -->
<?php
// Create connection
$conn = new mysqli('db', 'devuser', 'devpass', 'test_db');
// Check connection
if ($conn->connect_errno > 0) {
   die("<b>Connection failed:</b> " . $conn->connect_error);
}
echo "DB Connected successfully<br/><br/>";

$sql = "SELECT * FROM articles";
$result = $conn->query($sql);
?>
<html>
    <head>
        <title>Hello World</title>
    </head>

    <body>
	<?php
	if ($result->num_rows > 0) {
	    while($row = $result->fetch_assoc()) {
		echo "<p>" . $row["id"] . " - Title: " . $row["title"] . "</p>";
	    }
	} else {
	    echo "0 results";
	}
	$conn->close();
	?>
    </body>
</html>
