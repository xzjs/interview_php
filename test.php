<?php
	class Person{
		private $name;
		private $sex;

		function __construct($name,$sex)
		{
			$this->name=$name;
			$this->sex=$sex;
		}

		public function __get($name){
			return $this->$name;
		}
	}

	$p=new Person('hello','haha');
	echo $p->name;
	echo $p->sex;