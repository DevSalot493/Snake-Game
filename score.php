<html class="grad3">
    <link rel="stylesheet" href="ser.css">
    <?php
    	$conn = new mysqli("localhost", "root", "", "data_xenzia");

    	if($conn->connect_error) 
	{
        	die("Connection failed: " . $conn->connect_error);
    	}

    	$name = $_POST['name2'];
    	$score = $_POST['score1'];
	$insertSql = "INSERT INTO scores_xenzia (Name, Score) VALUES ('$name', '$score')";
    
	if($conn->query($insertSql) === TRUE) 
	{
        	echo "<p class='ech'>Record inserted successfully</p>";
    	} 
	else 
	{
        	echo "Error: " . $insertSql . "<br>" . $conn->error;
    	}

    	$selectSql = "SELECT * FROM scores_xenzia ORDER BY Score DESC";
    	$result = $conn->query($selectSql);

    	if($result->num_rows > 0) 
	{
        	echo "<table align=center class=tab border=1>";
        	echo "<tr><th>Name</th><th>Score</th></tr>";

        	while($row = $result->fetch_assoc()) 
		{
            		echo "<tr><td>" . $row["Name"] . "</td><td>" . $row["Score"] . "</td></tr>";
        	}

        	echo "</table>";
    	}

    	$conn->close();
    ?>
</html>
