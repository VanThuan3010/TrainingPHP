<?php 
	class NhanVien{
        protected $id;
        protected $name;
        protected $age;
        protected $job;
        public function setID($id)
        {
            $this->id = $id;
        }
        public function getID()
        {
            return $this->id;
        }
		public function setName($name){
			$this->name=$name;
		}
		public function getName(){
			return $this->name;
		}
        public function setAge($age)
        {
            $this->age = $age;
        }
        public function getAge()
        {
            return $this->age;
        }
        public function setJob($job)
        {
            $this->job = $job;
        }
        public function getJob()
        {
            return $this->job;
        }
	}
