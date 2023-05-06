<div class="panel panel-primary col-md-6 col-md-offset-3">
	<div class="panel-heading"></div>
	<div class="panel-body">
		
			<form method="post" action="<?php echo $form_action ?>">
				<div class="row">
					<div class="col-md-3">Tháng</div>
					<div class="col-md-9"><input class="form-control" min="1" max="12" type="number" name="month"></div>
				</div>
				<div class="row">
					<div class="col-md-3">Năm</div>
					<div class="col-md-9"><input class="form-control" type="number" name="year"></div>
				</div>	
				<div class="row">
					<div class="col-md-3">Sắp xếp theo</div>
					<div class="col-md-4">
						<select name="sort" class="form-control">
							<option value="1">Tên</option>
							<option value="2">Ngày sinh</option>
						</select>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3"></div>
					<div class="col-md-9"><input type="submit" class="btn btn-primary" value="thống kê"></div>
				</div>
			</form>
		
	</div>
</div>