<table class="table table-striped table-bordered table-hover">
	<tr>
		<th>STT</th>
		<th>Tên Nhân Viên</th>
		<th>Giờ làm việc</th>
		<th>Lương</th>
		<th>Hệ số</th>
	</tr>
	<?php
	$stt = 0;
	foreach ($arr_worker as $worker) {
		$stt++;
	?>
		<tr>
			<td><?php echo $stt; ?></td>
			<td><?php echo $worker->getName(); ?></td>
			<td><?php echo $worker->getHourDo(); ?></td>
			<td><?php echo $worker->calculateSalary(); ?></td>
			<td><?php echo $worker->getNoun(); ?></td>
		</tr>
	<?php
	}
	?>
</table>