<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="author" content="Kodinger">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>My Login Page &mdash; Bootstrap 4 Login Page Snippet</title>
	<link rel="stylesheet" type="text/css" href="View/admin/styleadmin/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="View/admin/styleadmin/css/my-login.css">
    <link rel="shortcut icon" href="View/home/style/favicon.png">

</head>
<body class="my-login-page">
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-md-center h-100">
				<div class="card-wrapper">
					<div class="brand">
						<img src="View/home/style/favicon.png">
					</div>
					<div class="card fat">
						<div class="card-body">
							<h4 class="card-title">Login</h4>
							<form action="?active=postLoginAdmin" method="POST">
								<input type="hidden" name="_token" value="<?php echo _token; ?>" />
								<div class="form-group">
									<label for="email">E-Mail Address</label>

									<input id="email" type="email" class="form-control" name="email" value="" required autofocus>
								</div>

								<div class="form-group">
									<label for="password">Password
									</label>
									<input id="password" type="password" class="form-control" name="password" required data-eye>
								</div>
								<?php if ($this->compact('error')) {?>
								<div class="form-group">
									<div class="alert alert-danger" role="alert">
									  <?php echo $this->compact('error') ?>
									</div>
								</div>
									<?php }?>


								<div class="form-group no-margin">
									<button type="submit" class="btn btn-primary btn-block">
										Login
									</button>
								</div>
							</form>
						</div>
					</div>
					<div class="footer">
						Copyright &copy; Alivin Framework 2018
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="View/admin/styleadmin/js/jquery.min.js"></script>
	<script src="View/admin/styleadmin/js/bootstrap.min.js"></script>
	<script src="View/admin/styleadmin/js/my-login.js"></script>
</body>
</html>
