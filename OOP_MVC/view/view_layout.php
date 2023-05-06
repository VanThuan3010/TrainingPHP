<!DOCTYPE html>
<html>

<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<style>
	.row {
		margin-top: 10px;
	}

	.btn {
		margin-left: 2px;
	}

	th,
	td {
		text-align: center;
	}
</style>

<body>
	<div class="container">
		<div class="col-md-9 col-md-offset-3 d-flex gap-3 justify-content-center">
			<ul class="pagination">
				<li><a href="index.php?controller=worker"><button type="button" class="btn btn-primary">Nhân viên</button></a></li>
				<li><a href="index.php?controller=choose_statis"><button type="button" class="btn btn-primary">Thống kê</button></a></li>
			</ul>
		</div>
		<div class="col-md-12">
			<?php
			if (file_exists($controller)) {
				include_once $controller;
			}
			?>
		</div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>