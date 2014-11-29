<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<?php
	/**
	* 
	*/
	class ListNode
	{
		private $val;
		private $next=null;
		
		function __construct($val)
		{
			$this->val=$val;
		}

		public function __get($propertyName){
			return $this->$propertyName;
		}

		public function __set($name,$value){
			$this->$name=$value;
		}
	}

	function printList($list){
		// var_dump($list);
		echo "L->";
		while ($list->next!=null) {
			
			$list=$list->next;
			echo $list->val."->";
		}
		echo "null<br/>";
	}
?>
<h1>链表分区</h1>
<h2>给定一个链表和一个值x，把链表一分为二，将小于x的所有节点放在大于或等于x的节点前，并保存节点的原有相对顺序</h2>
<?php
	function partitionLinkedList($head,$x){
		// var_dump($head);
		$dummy=new ListNode(0);
		$pivot=new ListNode($x);
		$first=$dummy;
		$second=$pivot;
		$curr=$head->next;

		while ($curr!=null) {
			// var_dump($curr);
			$next=$curr->next;
			echo $curr->val;
			if($curr->val<$x){
				$first->next=clone $curr;
				$first=$curr;
				$first->next=null;
			}else{
				$second->next=clone $curr;
				$second=$curr;
				$new2=new ListNode(100);
				$second->next=null;
				// $second->next=$new2;
			}
			// echo "dummy";
			// var_dump($dummy);
			// echo "pivot";
			// var_dump($pivot);
			$curr=$next;
		}
		$first->next=$pivot->next;
		return $dummy;
	}

	$arr=array(4,3,2,1,2,5);
	$L=new ListNode(0);
	$L1=$L;
	foreach ($arr as $nodeval) {
		// echo $nodeval." ";
		$new = new ListNode($nodeval);
		// echo $new->val.' ';
		$L1->next=$new;
		$L1=$new;
		// echo $L1->val;
		// echo "<br/>";
	}
	// var_dump($L);

	printList($L);
	printList(partitionLinkedList($L,3));

?>
<h1>链表去重</h1>
<h2>输入一个有序链表，删除重复值，确保每个值只出现一次</h2>
<?php
	function deleteDuplicates($head)
	{
		if($head==null){
			return $head;
		}
		$prev=$head;
		$curr=$head->next;
		while ($curr!=null) {
			if($curr->val!=$prev->val){
				$prev=$prev->next;
			}
			$curr=$curr->next;
			$prev->next=$curr;
		}
		return $head;
	}

	$arr=array(1,1,1,2,2,3);
	$L=new ListNode(0);
	$L1=$L;
	foreach ($arr as $nodeval) {
		// echo $nodeval." ";
		$new = new ListNode($nodeval);
		// echo $new->val.' ';
		$L1->next=$new;
		$L1=$new;
		// echo $L1->val;
		// echo "<br/>";
	}
	printList($L);
	printList(deleteDuplicates($L));
?>