
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<?php
	
	require_once '../controllers/SearchController.php';
	$key = $_REQUEST["key"];
	
	$books = SearchBook($key);

	echo "<div style='border: 1px solid black; border-radius: 3px; width:100%;'>";
	
	foreach($books as $book){
		echo $book["bookname"]."<br>";
	}

	echo "</div>";

?>