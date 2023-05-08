<?php
class controller_add_hour_do extends controller
{
	public function __construct()
	{
		parent::__construct();
		$act = isset($_GET["act"]) ? $_GET["act"] : "";
		switch ($act) {
			case 'add': {
					$id_worker = isset($_GET["id_worker"]) ? $_GET["id_worker"] : 0;
					$worker = $this->model->fetch_one("select * from worker where id_worker=$id_worker");
					$form_action = "index.php?controller=add_hour_do&id_worker=$id_worker&act=do_add";
					include_once "view/view_add_hour_do.php";
					break;
				}
			case 'do_add': {
					$id_worker = isset($_GET["id_worker"]) ? $_GET["id_worker"] : 0;
					if ($_SERVER["REQUEST_METHOD"] == "POST") {
						$hour = $_POST["hour"];
						$month = $_POST["month"];
						$year = $_POST["year"];
						$total_record = $this->model->count("select hour from work where month=$month and year=$year");
						if ($total_record == 0) {
							$this->model->execute("insert into work(id_worker,hour,month, year) values($id_worker,$hour,$month,$year)");
						} else $this->model->execute("update work set hour= $hour where id_worker = $id_worker and month = $month and year = $year");
					}
					header("location:index.php?controller=worker");
					break;
				}
			case 'edit': {
					$id_worker = isset($_GET["id_worker"]) ? $_GET["id_worker"] : 0;
					$worker = $this->model->fetch_one("select * from worker where id_worker=$id_worker");
					$month = $_GET["month"];
					$year = $_GET["year"];
					$hour = $_GET["hour"];
					$form_action = "index.php?controller=add_hour_do&act=do_edit&id_worker=$id_worker&month=$month&year=$year&hour=$hour";
					include_once "view/view_add_hour_do.php";
					break;
				}
			case 'do_edit': {
					$id_worker = isset($_GET["id_worker"]) ? $_GET["id_worker"] : 0;
					if ($_SERVER["REQUEST_METHOD"] == "POST") {
						$hour = $_POST["hour"];
						$month = $_POST["month"];
						$year = $_POST["year"];
						$this->model->execute("update work set hour= $hour where id_worker = $id_worker and month = $month and year = $year");
					}
					header("location:index.php?controller=detail_statis&id_worker=$id_worker");
					break;
				}
			case 'delete': {
					$id_worker = $_GET["id_worker"];
					$month = $_GET["month"];
					$year = $_GET["year"];
					$this->model->execute("delete from work where id_worker = $id_worker && month = $month && year = $year");
					header("location:index.php?controller=detail_statis&id_worker=$id_worker");
					// header("location:index.php?controller=worker");
					break;
				}
		}
	}
}
new controller_add_hour_do();
