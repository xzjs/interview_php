<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<h1>旋转数组搜索</h1>
<h2>给定一个有序数组的旋转和一个目标值，返回目标值在该数组的下标，如果不存在，那么返回-1，假设该数组没有重复的值</h2>
<?php
	function searchRotatedArry(&$arrA,$target){
		$left=0;
		$right=count($arrA)-1;
		while ($left<$right) {
			$mid=$left+intval(($right-$left)/2);
			if($arrA[$mid]==$target){
				return $mid;
			}
			if($arrA[$left]<=$arrA[$mid]){
				if($arrA[$left]<=$target && $target <$arrA[$mid]){
					$right=$mid-1;
				}else{
					$left=$mid+1;
				}
			}else{
				if($arrA[$mid]<$target&&$target<=$arrA[$right]){
					$left=$mid+1;
				}else{
					$right=$mid-1;
				}
			}
		}
		return -1;
	}

	$a=array(3,4,5,6,1,2);
	echo searchRotatedArry($a,5).'<br>';
	echo searchRotatedArry($a,7);
