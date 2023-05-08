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
<ul class="pagination">
	<!-- <li class="page-item">
		<a class="page-link" href="index.php?controller=statis&month=<?php echo $month; ?>&year=<?php echo $year; ?>&sort=<?php echo $sort; ?>" aria-label="Previous">
			<span aria-hidden="true">&laquo;</span>
		</a>
	</li> -->
	<?php
	for ($i = 1; $i <= $number_page; $i++) {
	?>
		<li class="page-item"><a class="page-link" href="index.php?controller=statis&month=<?php echo $month; ?>&year=<?php echo $year; ?>&sort=<?php echo $sort; ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
	<?php
	}
	?>
	<!-- <li class="page-item">
		<a class="page-link" href="index.php?controller=statis&month=<?php echo $month; ?>&year=<?php echo $year; ?>&sort=<?php echo $sort; ?>&page=<?php echo $number_page; ?>" aria-label="Next">
			<span aria-hidden="true">&raquo;</span>
		</a>
	</li> -->
</ul>