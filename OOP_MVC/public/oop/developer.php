<?php 
	class Developer extends Person implements calculateSalary{
		protected $typeWorker;
		protected $languageCode;
		protected $level;
		protected $noun;
		public function setTypeWorker($typeWorker){
			$this->typeWorker=$typeWorker;
		}
		public function getTypeWorker(){
			return $this->typeWorker;
		}
		public function setLanguageCode($languageCode){
			$this->languageCode=$languageCode;
		}
		public function getLanguageCode(){
			return $this->languageCode;
		}
		public function setLevel($level){
			$this->level=$level;
		}
		public function getLevel(){
			return $this->level;
		}
		public function setNoun($noun){
			$this->noun=$noun;
		}
		public function getNoun(){
			return $this->noun;
		}
		public function calculateSalary(){
			return $Pay = $this->getBasicPay()+($this->getHourDo()*50000*$this->getNoun());
		}
	}
