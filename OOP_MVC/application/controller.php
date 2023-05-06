<?php 
	class controller
	{
		
		protected $model;
		public function __construct(){
			$this->model = new model();
		}
	}
 ?>