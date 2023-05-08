<?php

/**
 * 
 */
class controller_add_edit_worker extends controller
{

	public function __construct()
	{
		# code...
		parent::__construct();
		$act = isset($_GET["act"]) ? $_GET["act"] : "";
		switch ($act) {
			case 'add': {
					$form_action = "index.php?controller=add_edit_worker&act=do_add";
					include_once "view/view_add_edit_worker.php";
					break;
				}
			case 'do_add': {
					if ($_SERVER["REQUEST_METHOD"] == "POST") {
						$name_worker = $_POST["name_worker"];
						$birthday = $_POST["birthday"];
						$number_year_exp = $_POST["number_year_exp"];
						$address = $_POST["address"];
						$age_worker = $_POST["age_worker"];
						$type_worker = $_POST["type_worker"];
						$base_salary = $_POST["base_salary"];
						if ($type_worker == 1) {
							if ($number_year_exp <= 2) {
								$level = 1;
							} else if ($number_year_exp < 5) {
								$level = 2;
							} else {
								$level = 3;
							}
						} else {
							if ($number_year_exp <= 5) {
								$level = 4;
							} else {
								$level = 5;
							}
						}
						$this->model->execute("insert into worker(id_type_worker,id_level,name_worker,age_worker,address,date_of_birth,number_year_exp,base_salary) values ($type_worker,$level,'$name_worker',$age_worker,'$address','$birthday',$number_year_exp,$base_salary)");
						header("location:index.php?controller=worker");
					}
					break;
				}
			case 'edit': {
					$id_worker = isset($_GET["id_worker"]) ? $_GET["id_worker"] : 0;
					$workers = $this->model->fetch_one("select * from worker where id_worker = $id_worker");
					if ($workers->id_type_worker == 1) {
						$worker = new Developer();
						$type_worker = $this->model->fetch_one("select * from type_worker where id_type_worker = $workers->id_type_worker");
						$worker->setTypeWorker($type_worker->name_type_worker);
						$worker->setId($workers->id_worker);
						$worker->setName($workers->name_worker);
						$worker->setAge($workers->age_worker);
						$worker->setAddress($workers->address);
						$worker->setBirthDay($workers->date_of_birth);
						$worker->setYearExp($workers->number_year_exp);
						$worker->setBasicPay($workers->base_salary);
						$level = $this->model->fetch_one("select * from level where id_level=$workers->id_level");
						$noun = $this->model->fetch_one("select * from coefficient where id_level=$level->id_level");
						$worker->setNoun($noun->coefficient);
						$worker->setLevel($level->name_level);
						$list_lang = $this->model->fetch("select * from language_worker inner join language on language.id_language = language_worker.id_language inner join worker on worker.id_worker = language_worker.id_worker where worker.id_worker = $workers->id_worker");
						$arr_lang = array();
						foreach ($list_lang as $languages) {
							$language = new LanguageCode();
							$language->setName($languages->name);
							array_push($arr_lang, $language);
						}
						$worker->setLanguageCode($arr_lang);
					}
					if ($workers->id_type_worker == 2) {
						$worker = new ManagerProduct();
						$level = $this->model->fetch_one("select * from level where id_level=$workers->id_level");
						$worker->setLevel($level->name_level);
						$worker->setId($workers->id_worker);
						$noun = $this->model->fetch_one("select * from coefficient where id_level=$level->id_level");
						$worker->setNoun($noun->coefficient);
						$type_worker = $this->model->fetch_one("select * from type_worker where id_type_worker = $workers->id_type_worker");
						$worker->setTypeWorker($type_worker->name_type_worker);
						$worker->setName($workers->name_worker);
						$worker->setAge($workers->age_worker);
						$worker->setAddress($workers->address);
						$worker->setBirthDay($workers->date_of_birth);
						$worker->setYearExp($workers->number_year_exp);
						$worker->setBasicPay($workers->base_salary);
					}

					$form_action = "index.php?controller=add_edit_worker&act=do_edit&id_worker=$id_worker";
					include_once "view/view_add_edit_worker.php";
					break;
				}
			case 'do_edit': {
					if ($_SERVER["REQUEST_METHOD"] == "POST") {
						$id_worker = isset($_GET["id_worker"]) ? $_GET["id_worker"] : 0;
						$workers = $this->model->fetch_one("select * from worker where id_worker = $id_worker");
						$name_worker = $_POST["name_worker"];
						$birthday = $_POST["birthday"];
						$address = $_POST["address"];
						$age_worker = $_POST["age_worker"];
						$number_year_exp = $_POST["number_year_exp"];
						$type_worker = $_POST["type_worker"];
						$base_salary = $_POST["base_salary"];

						if ($type_worker == 1) {
							if ($number_year_exp <= 2) {
								$level = 1;
							} else if ($number_year_exp < 5) {
								$level = 2;
							} else {
								$level = 3;
							}
						} else {
							if ($number_year_exp <= 5) {
								$level = 4;
							} else {
								$level = 5;
							}
						}
						$this->model->execute("update worker set id_type_worker = $type_worker, name_worker = '$name_worker', age_worker = $age_worker, address='$address',number_year_exp=$number_year_exp,base_salary=$base_salary,id_level=$level, date_of_birth = '$birthday' where id_worker = $id_worker");
						header("location:index.php?controller=worker");
					}
					break;
				}
		}
	}
}
new controller_add_edit_worker();
