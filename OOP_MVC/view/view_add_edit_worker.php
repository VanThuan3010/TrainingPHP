<div class="panel panel-primary">
	<div class="panel-heading">Bảng thêm sửa nhân viên</div>
	<div class="panel-body">
		<form method="post" action="<?php echo $form_action ?>">
			<div class="row">
				<div class="col-md-3">Tên nhân viên</div>
				<div class="col-md-9"><input type="text" class="form-control" value="<?php echo isset($worker) ? $worker->getName() : ""; ?>" name="name_worker"></div>
			</div>
			<div class="row">
				<div class="col-md-3">Ngày sinh</div>
				<div class="col-md-9"><input type="date" placeholder="YYYY-MM-DD" value="<?php echo isset($worker) ? $worker->getBirthDay() : ""; ?>" class="form-control" name="birthday"></div>
			</div>
			<div class="row">
				<div class="col-md-3">Kinh nghiệm</div>
				<div class="col-md-9"><input type="text" class="form-control" value="<?php echo isset($worker) ? $worker->getYearExp() : ""; ?>" name="number_year_exp"></div>
			</div>
			<div class="row">
				<div class="col-md-3">Địa chỉ</div>
				<div class="col-md-9"><input type="text" class="form-control" value="<?php echo isset($worker) ? $worker->getAddress() : ""; ?>" name="address"></div>
			</div>
			<div class="row">
				<div class="col-md-3">Tuổi</div>
				<div class="col-md-9"><input type="number" class="form-control" value="<?php echo isset($worker) ? $worker->getAge() : ""; ?>" name="age_worker"></div>
			</div>
			<div class="row">
				<div class="col-md-3">Loại nhân viên</div>
				<div class="col-md-4">
					<select name="type_worker" class="form-control">
						<?php $arr_type = $this->model->fetch("select * from type_worker");
						foreach ($arr_type as $type) {

						?>
							<option value="<?php echo $type->id_type_worker; ?>"><?php echo $type->name_type_worker ?></option>
						<?php } ?>
					</select>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3">Lương cơ bản</div>
				<div class="col-md-9"><input type="text" class="form-control" value="<?php echo isset($worker) ? $worker->getBasicPay() : ""; ?>" name="base_salary"></div>
			</div>
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-9"><input type="submit" class="btn btn-primary" value="<?php echo $act; ?>"></div>
			</div>

		</form>
	</div>
</div>