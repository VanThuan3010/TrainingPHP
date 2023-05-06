<div class="col-md-12">
	<a href="index.php?controller=add_edit_worker&act=add" style="color: #FFF "><button type="button" class="btn btn-primary">Thêm nhân viên</button></a>
	<table class="table table-bordered table-striped table-hover">
		<tr>
			<th>STT</th>
			<th>Họ tên</th>
			<th>Địa Chỉ</th>
			<th>Ngày sinh</th>
			<th>Kinh nghiệm</th>
			<th>Cấp bậc</th>
			<th></th>
		</tr>
		<?php
		$stt = 0;
		foreach ($arr_worker as $worker) {
			$stt++;
		?>
			<tr>
				<td><?php echo $stt; ?></td>
				<td><?php echo $worker->getName(); ?></td>
				<td><?php echo $worker->getAddress(); ?></td>
				<td><?php echo $worker->getBirthDay(); ?></td>
				<td><?php echo $worker->getYearExp(); ?></td>
				<td><?php echo $worker->getLevel(); ?></td>
				<td>
					<!-- <a type="button" class="btn btn-info" href="index.php?controller=add_hour_do&act=add&id_worker=<?php echo $worker->getId(); ?>">Thời gian làm</a> -->
					<a type="button" class="btn btn-info" href="index.php?controller=detail_statis&id_worker=<?php echo $worker->getId(); ?>">Thời gian làm</a>
					<a type="button" class="btn btn-success" href="index.php?controller=detail_worker&id_worker=<?php echo $worker->getId(); ?>">Chi tiết</a>
					<a type="button" class="btn btn-danger" href="index.php?controller=worker&act=delete&id_worker=<?php echo $worker->getId(); ?>">Xóa</a>
				</td>
			</tr>
		<?php
		}
		?>
	</table>
	<ul class="pagination">
		<li class="page-item">
			<a class="page-link" href="index.php?controller=worker" aria-label="Previous">
				<span aria-hidden="true">&laquo;</span>
			</a>
		</li>
		<?php
		for ($i = 1; $i <= $number_page; $i++) {
		?>
			<li>
			<li class="page-item"><a class="page-link" href="index.php?controller=worker&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
		<?php
		}
		?>
		<li class="page-item">
			<a class="page-link" href="index.php?controller=worker&page=<?php echo $number_page; ?>" aria-label="Next">
				<span aria-hidden="true">&raquo;</span>
			</a>
		</li>
	</ul>
</div>