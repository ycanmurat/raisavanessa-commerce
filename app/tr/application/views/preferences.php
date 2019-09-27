<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;600;700&display=swap" rel="stylesheet">
	<title>Raisa Vanessa</title>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<img src="<?=site_url('assets/Front/')?>images/rv-logo.svg" alt="Raisa Vanessa">
				<form action="<?=current_url()?>" method="POST">
					<select name="lang">
						<option value="1">English</option>
						<option value="2">Türkçe</option>
					</select>
					<input type="hidden" name="redirect" value="<?=$redirect?>">
					<select name="cur">
						<?php foreach ($kur as $key => $val) { ?>
							<option value="<?=$val->code?>"><?=$val->name?></option>
						<?php } ?>
						<option value="TL">Turkish Lira</option>
					</select>
					<button type="submit">Submit</button>
				</form>
			</div>
		</div>
	</div>

	<style>
		img {
			max-width: 400px;
			margin-bottom: 50px;
		}

		body {
			background-image: url('<?=site_url('assets/Front/')?>images/loginbg.jpg');
				padding: 50px;
				font-family: 'Montserrat', sans-serif;
				max-width: 1920px;
				background-size: cover;
				min-height: 100vh;
			}	
			select {

				font-family: 'Montserrat';
				padding: 10px;
				border: 0;
				display: block;
				margin-bottom: 10px;
				width: 250px;
				font-weight: 600;
				font-size: 12px;
				-moz-appearance:none;
				-webkit-appearance:none;
				appearance:none;
				background-image: url(data:image/svg+xml;base64,PHN2ZyBmaWxsPSdibGFjaycgaGVpZ2h0PScyNCcgdmlld0JveD0nMCAwIDI0IDI0JyB3aWR0aD0nMjQnIHhtbG5zPSdodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2Zyc+PHBhdGggZD0nTTcgMTBsNSA1IDUtNXonLz48cGF0aCBkPSdNMCAwaDI0djI0SDB6JyBmaWxsPSdub25lJy8+PC9zdmc+);
				background-repeat: no-repeat;
				background-position-x: 100%;
				background-position-y: 5px;
				outline: none;
			}
			button {
				width: 100%;
				border: none;
				padding: 8px;
				background: white;
				font-weight: 500;
				font-family: 'Montserrat';
				font-size: 14px;
				border: 1px solid gainsboro;
			}

			select {
				width: 100%;
			}

			form {
				max-width: 250px;
			}
			@media screen and (max-width: 666px){
				body{background-image: url('<?=site_url('assets/Front/')?>images/rvmobile.png');}
			}

		</style>
	</body>
	</html>