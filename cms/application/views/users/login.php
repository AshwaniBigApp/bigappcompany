<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="<?php echo base_url('assets/digverve_favicon.png');?>" />
    <title>Login | BigApp CMS</title>

    <link href="<?php echo base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/font-awesome/css/font-awesome.css');?>" rel="stylesheet">

    <link href="<?php echo base_url('assets/css/animate.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/style.css');?>" rel="stylesheet">

</head>

<body class="gray-bg">
    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name">CMS</h1>

            </div>
            <h3>Welcome to CMS</h3>
            <h3><strong>Sign In</strong></h3>
            <form class="m-t" role="form" action="<?php echo base_url('admin/login');?>" method="post">
                <div class="form-group">
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                    <input type="text" class="form-control" name="username" placeholder="Email" required="">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Password" required="">
                </div>
                <input type="submit" name="btn_login" value="Login" class="btn btn-primary block full-width m-b">
            </form>
            <a class="text-center" href="<?php echo base_url('admin/forgotPassword');?>">Forgot Password ?</a>
            <p class="m-t"> <small>BigApp &copy; <?php echo date("Y");?></small> </p>
        </div>
    </div>

</body>

</html>
