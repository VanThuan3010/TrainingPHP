<?php 
	/**
	* 
	*/
	class controller_choose_statis extends controller
	{
		
		public function __construct()
		{
			parent::__construct();
			$form_action="index.php?controller=statis";
			include_once "view/view_choose_statis.php";
		}
		
	}
	new controller_choose_statis();
 ?>