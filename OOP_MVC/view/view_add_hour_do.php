<div class="panel panel-primary col-md-4 col-md-offset-4">
	<div class="panel-heading"><?php echo $worker->name_worker ?></div>
	<div class="panel-body">
		<form method="post" action="<?php echo $form_action; ?>">
			<div class="row">
				<div class="col-md-3">Tháng</div>
				<div class="col-md-9"><input type="number" require name="month" class="form-control" value="<?php echo $_GET['act'] == 'edit' ? $month : ""; ?>"></div>
			</div>
			<div class="row">
				<div class="col-md-3">Năm</div>
				<div class="col-md-9"><input type="number" require name="year" class="form-control" value="<?php echo $_GET['act'] == 'edit' ? $year : ""; ?>"></div>
			</div>
			<div class="row">
				<div class="col-md-3">Số giờ làm việc</div>
				<div class="col-md-9"><input type="number" require name="hour" class="form-control" value="<?php echo $_GET['act'] == 'edit' ? $hour : ""; ?>"></div>
			</div>
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-9"><input type="submit" value="update" class="btn btn-primary" name=""></div>
			</div>
		</form>
	</div>
</div>