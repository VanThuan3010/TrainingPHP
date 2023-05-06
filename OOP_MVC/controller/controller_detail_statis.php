<?php
class controller_detail_statis extends controller
{
	public function __construct()
	{
		parent::__construct();
		$id_worker = isset($_GET["id_worker"]);
		$arr_work = $this->model->fetch("select * from work where id_worker=$id_worker");
		include_once "view/view_detail_statis.php";
	}
}
new controller_detail_statis();
