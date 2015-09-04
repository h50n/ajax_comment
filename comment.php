<?php

include 'database.php';



class Comment{

// create comment
	// will be triggered using AJAX
public static function create_comment($name,$comment) {


	//connect to database
	//SQL insert
	$sql_query = "INSERT INTO `comments` (`name`, `comment`, `date_updated`) VALUES ('{$name}', '{$comment}', NULL)";
		
		$pdo = Database::connect();
        $pdo->query($sql_query);
        Database::disconnect();
	}
//delete comment 
	// will be triggered using AJAX

//  make comment id pass through wiht a post request rathe rthna get. If struggling, use GET

public static function delete_comment($comment_id) {
	$sql_query = "DELETE FROM `comments` WHERE `id` IN ('{$comment_id}')";


		$pdo = Database::connect();
        $pdo->query($sql_query);
        Database::disconnect();

}



// read comment (loop that reads all the comments in the database)
public static function read_comment() {
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


}


//update (puts the current contect into the text field and allows you to edit it then submit it again)




public static function update_comment(){
	$sql_query = "UPDATE `comments` SET `comment` = 'This is a Test Mannnnn hehheeh' WHERE `id` = '2'";


		$pdo = Database::connect();
        $pdo->query($sql_query);
        Database::disconnect();

}

	}

?>