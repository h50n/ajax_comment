<!DOCTYPE html>
<?php 

include 'comment.php';
?>

<html>
	<script type="text/javascript">
			//put alll javascript and ajax here
	function my_alert(){

		prompt("Please enter your name", "Name");
	}

	</script>

<head>
	<title>MyPage!</title>
</head>
<body>

	<h1>MyPage!</h1>
	<p>Welcome to MyPage!<p>
	</br>
	<p>Please add a comment...<p>

	<form name="comment_form" action="index.php" method="post">
		Name: 			<input type="text" id="name_details" name="name_details"></br></br>
		Comment Details: <input type="text" id="name_details" name="comment_details"></br></br> 
		 <input type="submit" value="Submit">

	</form>
	
	<!--<button type="button" form="comment_form">Submit</button>  when we click the button it is gonna trigger off the ajeax into the database-->

	<span id="comment">
		
	<!-- put the comment php/javascript in here -->

	<!-- on submit comment will post to somewhere??? check and set this variale and inserrt that as a create comment variable -->

	</span>

	<?php 



	




	if ($_POST["name_details"] && $_POST["comment_details"]){

		$name_details 		= 	$_POST["name_details"];
		$comment_details 	= 	$_POST["comment_details"];

		$comment = new Comment;
		$comment->create_comment($name_details,$comment_details);

		echo "Thank You for submitting a comment. Bawse!!";

	} else {

		echo "Post Variable is not set, please enter a comment to set it or change some shit rudebwoi!!!";
	}
	
		$comment->read_comment();

		$sql_query = "SELECT * FROM `comments` LIMIT 0,1000";
			$pdo = Database::connect();

			foreach ($pdo->query($sql_query) as $row) {
			                        echo '<tr>';
			                        echo '<td>'. $row['name'] . '</td>';
			                        //clicking add new lesson will trigger javascript dialog field->enter new amount->triger of javascript->php to update the amount of classes in DB
			                        // find out how I actually add that in
			                        echo '<td>'. $row['comment'] . '</td>';
			                       	// later make it so the link/buttons link to the javascript to run the AJAX -- this will run the php to increase lessons by 1
			                        echo '</tr>';
			               }


		
	    //$pdo->query($sql_query);
	    Database::disconnect();



	?>





</body>
</html>