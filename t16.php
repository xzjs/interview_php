<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<h1>旋转数组最小值</h1>
<h2>输入一个递增排序数组的一个旋转，输出旋转数组的最小值</h2>
<?php
	function getMinOfRotation(&$arrA){
		$left=0;
		$right=count($arrA)-1;
		$mid=0;
		$min=$arrA[$left];
		while ($left<$right) {
			$mid=$left+($right-$left)/2;
			$min=min($arrA[$left],$min);
			if($arrA[$mid]==$arrA[$left]&&$arrA[$mid]==$arrA[$right]){
				$left++;
			}elseif ($arrA[$mid]>=$arrA[$left]) {
				$left=$mid+1;
				$min=min($arrA[$left],$min);
			}else{
				$min=min($arrA[$mid],$min);
				$right=$mid-1;
			}
		}
		return $min;
	}

	$a=array(3,4,5,6,1,2);
	echo getMinOfRotation($a);

