<?php

class AutoProduceName{

		#男生的名字
		public  $man_names = array("James","John","Robert","Michael","William","David","Richard","Charles","Joseph","Thomas","Christopher","Daniel","Paul","Mark","Donald","George","Kenneth","Steven","Edward");

		#女生的名字
		public  $woman_names = array("Mary","Patricia","Linda","Barbara","Elizabeth","Jennifer","Maria","Susan","Margaret","Dorothy","Lisa","Nancy","Karen","Betty","Helen","Sandra","Donna","Carol","Ruth");

		#姓氏
		public  $surnames = array("Smith","Jones","Taylor","Williams","Brown","Davies","Evans","Wilson","Thomas","Roberts","Johnson","Lewis","Walker","Robinson","Wood","Thompson","White","Watson","Jackson");

		private $sex;

		public function __construct($sex)
		{
			$this->sex = $sex;
		}

		public function getNames(){
			$index = mt_rand(0,18);
			if($this->sex == 'man'){
				$name =  $this->man_names[$index];
			}
			else{
				$name = $this->woman_names[$index];
			}
			$surnames = $this->surnames[$index];
			$names = $surnames.' '.$name;
			return (object)['names'=>$names,'surnames'=>$surnames,'name'=>$name];
		}

}