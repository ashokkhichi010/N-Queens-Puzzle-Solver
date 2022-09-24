<?php 
	// session_start();
	function permutation($board){
		$n = count($board);		// $n = number of queens in the chassBoard
		$countParmutation = 0;
		$Permutation[0] = $board ;
		for ($row = 0; $row < $n; $row++) { 
			findQueens($board, $row, 0);
			if ($Permutation[$countParmutation-1] != $_SESSION['arr']) {
				$Permutation[$countParmutation] = $_SESSION['arr'];
				$countParmutation++;
			}
		}
		return $Permutation;
	}
	function findQueens($board, $row, $col){
		$n = count($board);		// $n = number of queens in the chassBoard
		if ($col == $n) {
			$_SESSION['arr'] = $board;
			return true;
		}
		if ($row >= $n) {
			return false;
		}
		$board[$row][$col] = 'Q';
		if (isSef($board, $row, $col)) {
			if(findQueens($board, 0, $col + 1)){
				return true;
			}else{
				$board[$row][$col] = '';
				if (findQueens($board, $row + 1, $col)) {
					return true;
				}
			}
		}else{
			$board[$row][$col] = '';
			if (findQueens($board, $row + 1, $col)) {
				return true;
			}
		}
		return false;
	}
	function isSef($board, $row, $col){
		$n = count($board);		// $n = number of queens in the chassBoard
		for ($i=0; $i < $n; $i++) { 
			if ($i != $col) {
				if ($board[$row][$i] == $board[$row][$col]) {
					return false;
				}
			}
			if ($i != $row) {
				if ($board[$i][$col] == $board[$row][$col]) {
					return false;
				}
			}
		}
		$add = $row + $col;
		$j = $add;
		if ($add < $n) {
			for ($i = 0; $i <= $add; $i++) { 
				if ($i != $row || $j != $col) {
					if ($board[$i][$j] == $board[$row][$col]) {
						return false;
					}
				}
				$j--;
			}
		}else{
			$j = ($n-1);
			for ($i = $add - ($n-1); $i <= ($n-1); $i++) { 
				if ($i != $row || $j != $col) {
					if ($board[$i][$j] == $board[$row][$col]) {
						return false;
					}
				}
				$j--;
			}
		}
		$diff = $row - $col;
		if ($diff >= 0) {
			$j = 0;
			for ($i = $diff; $i <= ($n-1); $i++) { 
				if ($i != $row || $j != $col) {
					if ($board[$i][$j] == $board[$row][$col]) {
						return false;
					}
				}
				$j++;
			}
		}else{
			$i = 0;
			for ($j = -$diff; $j <= ($n-1); $j++) { 
				if ($i != $row || $j != $col) {
					if ($board[$i][$j] == $board[$row][$col]) {
						return false;
					}
				}
				$i++;
			}
		}
		return true;
	}
?>