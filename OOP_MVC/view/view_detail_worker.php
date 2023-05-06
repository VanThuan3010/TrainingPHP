<div class="col-md-5 col-md-offset-3 panel panel-primary">
	<div class="panel-heading">Bảng thông tin chi tiết nhân viên</div>
	<div class="panel-body">
		<form method="post">
			<div class="row">
				<div class="col-md-3">Nhân viên</div>
				<div class="col-md-9"><input type="text" value="<?php echo isset($worker) ? $worker->getName() : ""; ?>" <?php echo isset($worker) ? "readonly" : ""; ?> name="name_worker" class="form-control"></div>
			</div>
			<div class="row">
				<div class="col-md-3">Ngày sinh</div>
				<div class="col-md-9"><input type="text" value="<?php echo isset($worker) ? $worker->getBirthDay() : ""; ?>" <?php echo isset($worker) ? "readonly" : ""; ?> name="birthday" class="form-control"></div>
			</div>
			<div class="row">
				<div class="col-md-3">Ngành</div>

				<div class="col-md-9"><input type="text" value="<?php echo isset($worker) ? $worker->getTypeWorker() : ""; ?>" <?php echo isset($worker) ? "readonly" : ""; ?> name="type_worker" class="form-control"></div>
			</div>
			<div class="row">
				<div class="col-md-3">Địa chỉ</div>
				<div class="col-md-9"><input type="text" value="<?php echo isset($worker) ? $worker->getAddress() : ""; ?>" <?php echo isset($worker) ? "readonly" : ""; ?> name="address" class="form-control"></div>
			</div>
			<div class="row">
				<div class="col-md-3">Kinh nghiệm</div>
				<div class="col-md-4"><input type="number" value="<?php echo isset($worker) ? $worker->getYearExp() : ""; ?>" <?php echo isset($worker) ? "readonly" : ""; ?> name="number_year_exp" class="form-control"></div>
			</div>
			<div class="row">
				<div class="col-md-3">Cấp độ</div>
				<div class="col-md-9"><input type="text" value="<?php echo isset($worker) ? $worker->getLevel() : ""; ?>" <?php echo isset($worker) ? "readonly" : ""; ?> name="address" class="form-control"></div>
			</div>
			<div class="row">
				<div class="col-md-3">Lương cơ bản</div>
				<div class="col-md-4"><input type="text" value="<?php echo isset($worker) ? $worker->getBasicPay() : ""; ?>" <?php echo isset($worker) ? "readonly" : ""; ?> name="basic_pay" class="form-control"></div>
			</div>
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-9"><a class="btn btn-primary" href="index.php?controller=add_edit_worker&act=edit&id_worker=<?php echo $worker->getId(); ?>">Chỉnh sửa</a></div>
			</div>
		</form>
	</div>
</div>