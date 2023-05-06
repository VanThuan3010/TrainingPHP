<?php 
	class Person{
		protected $id;
		protected $name;
		protected $age;
		protected $address;
		protected $birthDay;
		protected $yearExp;
		protected $basicPay;
		protected $hourDo;
		protected $detailHourDo;
		public function setId($id){
			$this->id=$id;
		}
		public function getId(){
			return $this->id;
		}
		public function setName($name){
			$this->name=$name;
		}
		public function getName(){
			return $this->name;
		}
		public function setAge($age){
			$this->age=$age;
		}
		public function getAge(){
			return $this->age;
		}
		public function setAddress($address){
			$this->address=$address;
		}
		public function getAddress(){
			return $this->address;
		}
		public function setBirthDay($birthDay){
			$this->birthDay=$birthDay;
		}
		public function getBirthDay(){
			return $this->birthDay;
		}
		public function setYearExp($yearExp){
			$this->yearExp=$yearExp;
		}
		public function getYearExp(){
			return $this->yearExp;
		}
		public function setBasicPay($basicPay){
			$this->basicPay=$basicPay;
		}
		public function getBasicPay(){
			return $this->basicPay;
		}
		public function setHourDo($hourDo){
			$this->hourDo=$hourDo;
		}
		public function getHourDo(){
			return $this->hourDo;
		}
		public function setDetailHourDo($detailHourDo){
			$this->detailHourDo=$detailHourDo;
		}
		public function getDetailHourDo(){
			return $this->detailHourDo;
		}
	}
 ?>