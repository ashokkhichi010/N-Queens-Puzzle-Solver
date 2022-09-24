<?php 
	session_start();
	error_reporting(0);
	include "QueenFinder.php";
	for ($row = 0; $row < 5; $row++) { 
		for ($col = 0; $col < 5; $col++) { 
			$board[0][$row][$col] = '';
		}
	}
	if ($_POST['submit']) {
		$n = $_POST['queen']; 		// n = number of Queens; minmun 4 queens are required;
		for ($row = 0; $row < $n; $row++) { 
			for ($col = 0; $col < $n; $col++) { 
				$board[$row][$col] = '';
			}
		}
		$board = permutation($board);
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>N Queen Problem</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<center>
		<form method="POST">
			<input type="num" name="queen" placeholder="Minimum 4 Queens are required" />
			<input type="submit" name="submit" />
		</form><?php echo '<h1>'.$n.' X '.$n.'</h1>';?>
		<div class="container">
			<?php 
			$size = (100/$n);
			for ($countParmutation = 0; $countParmutation < count($board); $countParmutation++) { 
				echo '<div class="board">';
				for($row = 0; $row < $n; $row++){
					echo '<div class="row" style=" height:'.$size.'%;">';
					for ($col = 0; $col < $n; $col++) {
						if (($row + $col) % 2 == 0) {
							$bgcolor = 'grey';
						}else{
							$bgcolor = '';
						}
						echo '<div class="col" style=" width:'.$size.'%; background-color:'.$bgcolor.'; font-size: '.($size*20).'%;">'.$board[$countParmutation][$row][$col].'</div>';
					}
					echo '</div>';
				}
				echo '</div>';
			}
			?>
		</div>
	</center>
</body>
</html>