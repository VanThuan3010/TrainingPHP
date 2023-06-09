<head>
	<link rel="stylesheet" href="../public/css/style.css">
</head>
<div class="panel panel-primary col-md-6 col-md-offset-3">
	<div class="panel-heading"></div>
	<div class="panel-body">

		<form method="post" action="<?php echo $form_action ?>">
			<div class="row">
				<div class="col-md-4">Tháng</div>
				<div class="col-md-8"><input class="form-control" min="1" max="12" type="number" name="month"></div>
			</div>
			<div class="row">
				<div class="col-md-4">Năm</div>
				<div class="col-md-8"><input class="form-control" type="number" name="year"></div>
			</div>
			<div class="row">
				<div class="col-md-4">Sắp xếp theo</div>
				<div class="col-md-4">
					<select name="sort" class="form-control">
						<option value="1">Tên</option>
						<option value="2">Ngày sinh</option>
					</select>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">Lọc theo hệ số lương</div>
				<div class="col-md-8">
					<div class="wrapper">
						<div class="values">
							<span id="range1">
								0
							</span>
							<span> &dash; </span>
							<span id="range2">
								500000
							</span>
						</div>
						<div class="slider-track"></div>
						<input type="range" name="min" min="0" max="1000000" value="0" id="slider-1" oninput="slideOne()">
						<input type="range" name="max" min="1" max="1000000" value="500000" id="slider-2" oninput="slideTwo()">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4"></div>
				<div class="col-md-8"><input name="statis" type="submit" class="btn btn-primary" value="thống kê"></div>
			</div>
		</form>

	</div>
</div>
<script>
	window.onload = function() {
		slideOne();
		slideTwo();
	};

	let sliderOne = document.getElementById("slider-1");
	let sliderTwo = document.getElementById("slider-2");
	let displayValOne = document.getElementById("range1");
	let displayValTwo = document.getElementById("range2");
	let minGap = 1;
	let sliderTrack = document.querySelector(".slider-track");
	let sliderMaxValue = document.getElementById("slider-1").max;

	function slideOne() {
		if (parseInt(sliderTwo.value) - parseInt(sliderOne.value) <= minGap) {
			sliderOne.value = parseInt(sliderTwo.value) - minGap;
		}
		displayValOne.textContent = sliderOne.value;
		fillColor();
	}

	function slideTwo() {
		if (parseInt(sliderTwo.value) - parseInt(sliderOne.value) <= minGap) {
			sliderTwo.value = parseInt(sliderOne.value) + minGap;
		}
		displayValTwo.textContent = sliderTwo.value;
		fillColor();
	}

	function fillColor() {
		percent1 = (sliderOne.value / sliderMaxValue) * 100;
		percent2 = (sliderTwo.value / sliderMaxValue) * 100;
		sliderTrack.style.background = `linear-gradient(to right, #dadae5 ${percent1}% , #3264fe ${percent1}% , #3264fe ${percent2}%, #dadae5 ${percent2}%)`;
	}
</script>