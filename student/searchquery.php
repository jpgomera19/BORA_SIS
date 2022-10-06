<?php 


	require 'connection.php';
	require 'function.php';

	$s = clean($_GET['s']);

	$query = "SELECT student_number, firstname, lastname, course, yearlevel, CONCAT(firstname,' ' , middlename,  ' ', lastname) as fullname 
	FROM student_tbl WHERE CONCAT(firstname, ' ', lastname) LIKE '".$s."%' OR lastname LIKE '".$s."%' ORDER BY date DESC LIMIT 5";

	if($result = mysqli_query($con, $query)) {

		if(mysqli_num_rows($result) == 0) {
			echo "<ul><li class='none'>No results to display</li></ul>";
		} else {

			echo "<ul>";

			while($row = mysqli_fetch_assoc($result)) {
				echo "<li>";
				echo "<span class='name'>".$row['fullname']."</span>";

				echo "<div class='details'>";

				echo "<span><strong>#: </strong>".$row['student_number']."</span>";
				echo "<span><strong>course: </strong>".$row['course']."</span>";
				echo "<span><strong>yr level: </strong>".$row['yearlevel']."</span>";

				echo "</div></li>";

			}

			echo "</ul>";

		}

	} else {
		die("Error with the query");
	}

	mysqli_close($con);

?>

