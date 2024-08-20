<?php
// 404.php
http_response_code(404);
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>404 | MRPMATRICSCHOOL</title>
	<?php require ('inc/links.php'); ?>
	<style>
		/*======================
	404 page
=======================*/
.text-center {
  text-align: center;
}

		.page_404 {
			padding: 40px 0;
			background: #fff;
			font-family: 'Arvo', serif;
		}

		.page_404 img {
			width: 100%;
		}

		.four_zero_four_bg {
			background-image: url(http://mrpmatricschool.in/admin/404.gif);
			height: 400px;
			background-position: center;
		}

		.four_zero_four_bg h1 {
			font-size: 100px;
			color: #db161b;
		}

		.four_zero_four_bg h3 {
			font-size: 80px;
		}

		.link_404 {
			color: #fff !important;
			padding: 10px 20px;
			background: #39ac31;
			margin: 20px 0;
			display: inline-block;
		}

		.contant_box_404 {
			margin-top: -50px;
		}
	</style>
</head>

<body>

	<section class="page_404">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 ">
					<div class="col-sm-12 col-sm-offset-1  text-center">
						<div class="four_zero_four_bg">
							<h1 class="text-center ">404</h1>


						</div>

						<div class="contant_box_404">
							<h3 class="h2">
								Look like you're lost
							</h3>

							<p>the page you are looking for not avaible!</p>

							<a href="http://mrpmatricschool.in/" class="link_404">Go to Home</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

</body>

</html>