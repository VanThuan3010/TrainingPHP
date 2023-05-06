<a type="button" class="btn btn-info" href="index.php?controller=add_hour_do&act=add&id_worker=<?php echo $id_worker ?>">Thêm</a>
<table class="table table-striped table-bordered table-hover">
	<tr>
		<th>STT</th>
		<th>Số giờ</th>
		<th>Tháng</th>
		<th>Năm</th>
		<th></th>
	</tr>
	<?php
	$stt = 0;
	foreach ($arr_work as $work) {
		$stt++;
	?>
		<tr>
			<td><?php echo $stt; ?></td>
			<td><?php echo $work->hour ?></td>
			<td><?php echo $work->month ?></td>
			<td><?php echo $work->year ?></td>
			<td>
				<a type="button" class="btn btn-success" href="index.php?controller=add_hour_do&act=edit&id_worker=<?php echo $id_worker ?>&month=<?php echo $work->month ?>&year=<?php echo $work->year ?>&hour=<?php echo $work->hour ?>">Sửa</a>
				<a type="button" class="btn btn-danger" href="index.php?controller=add_hour_do&act=delete&id_worker=<?php echo $id_worker ?>&month=<?php echo $work->month ?>&year=<?php echo $work->year ?>">Xóa</a>
			</td>
		</tr>
	<?php
	}
	?>
</table>