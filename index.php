<!doctype html>
<html>
<head>
    <title>PHP Color Pattern Randomizer</title>

    <meta charset="utf-8" />
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <style type="text/css">
    body {
        background-color: #f0f0f2;
        font-family: "Open Sans", "Helvetica Neue", Helvetica, Arial, sans-serif;

        
    }

    div {

    width: 50px;
	height: 50px;
	float: left;
    }
	
	.clearBoth { clear:both; }
    </style>    
</head>

<body>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<label>Rows:<input type="text" name="rows" value="<?php echo isset($_POST['rows']) ? $_POST['rows'] : '' ?>"></label>
		<label>Columns:<input type="text" name="cols"value="<?php echo isset($_POST['rows']) ? $_POST['cols'] : '' ?>"></label>
		<input type="submit" value="SUBMIT" />
		
		<br>
		<br>
		

<?php
	$x = $y = 0;
	$rows= $cols = "";
	$Err ="";
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		#taking the data from the post request
	$rows = test_input($_POST["rows"]);
	$cols = test_input($_POST["cols"]);
	}

	#function which clears the data for php use
	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
		}

		#function which create random colors
	function random_color_part() {
		return str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT);
	}

	function random_color() {
		return random_color_part() . random_color_part() . random_color_part();
	}

	#echo random_color();
	#<h1 style="color:blue;">This is a Blue Heading</h1>

		#validation
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if (($_POST["rows"]) > 50 || ($_POST["rows"]) < 1 || ($_POST["cols"]) > 50 || ($_POST["cols"]) < 1) {
			$Err = "Rows need to be in the range of 1 to 50";
				$x = $y = 0;
			echo $Err;
		}
	
	else {
	#two for loops which output our colored div elements 
	for($x = 0; $x < $rows; $x++){	
			#echo "<div style= \"background-color:#".random_color(). "\" ;></div>";
			for($y = 0; $y < $cols; $y++){
				echo "<div style= \"background-color:#".random_color(). "\" ;></div>";
			}
			echo "<br class = \"clearBoth\">";
	}
	}
	}
	


?>


	</form>
</body>
</html>