<?php
	//两数组第k个值
	//两个有序数组A和B，分别拥有m和n的长度，求其合并后的第k个值
	
	$a=array(1,3,5,7,9);
	$b=array(2,4,6,8);
	echo findKthSortedArrays($a,$b,5);
	 
	
	function findKthSortedArrays(&$arrA,&$arrB,$k){
		$m=count($arrA);
		$n=count($arrB);
		if($m>$n){
			return findKthSortedArrays($arrB,$arrA,$k);
		}
		$left=0;
		$right=$m;
		while ($left<$right) {
			$mid=$left+intval(($right-$left)/2);
			$j=$k-1-$mid;
			if($j>=$n||$arrA[$mid]<$arrB[$j]){
				$left=$mid+1;
			}else{
				$right=$mid;
			}
		}
		$Aiminusl=$left-1>=0?$arrA[$left-1]:-100;
		$Bj=$k-1-$left>=0?$arrB[$k-1-$left]:-100;
		return max($Aiminusl,$Bj);
	}

