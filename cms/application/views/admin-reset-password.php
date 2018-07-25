<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Forgot Password| DigVerve</title>

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
            <h3>Lets reset your password</h3>
            <?php if($this->session->flashdata('msg')){?>
                    <div class="alert alert-warning alert-dismissable">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        <?php echo $this->session->flashdata('msg');?>
                    </div>
                <?php }?>
            <form method="post" action="<?php echo base_url('admin/reset-password/'.base64_encode($adminEmail).'/'.base64_encode($token));?>">
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                    	<div class="form-group"></div>
                        <div class="form-group margin-align">
                            <span>Password</span>
                            <input type='hidden' name="email" value="<?php echo $adminEmail;?>">
                        	<input type='hidden' name="token" value="<?php echo $token;?>">
                            <input type="password" id="password" name="password">
                            <?php if(form_error('password')){?>
	                        <small class="fp-error" id="city-error"> <?php echo form_error('password');?></small>
	                        <?php }?>
                        </div>
                        <div class="form-group margin-align">
                            <span>Re-Enter Password</span>
                            <input type="password" id="confirm_password" name="confPassword">
                            <?php if(form_error('confPassword')){?>
	                        <small class="fp-error" id="city-error"> <?php echo form_error('confPassword');?></small>
	                        <?php }?>
                        </div>
                        <div class="form-group margin-align">
                            <div class="form-submit reset-btn">
                                <button type="submit">Reset</button>
                            </div>
                        </div>
                    </form>
            <a class="text-center" href="<?php echo base_url('admin/login');?>">Login</a>
            <p class="m-t"> <small>BigApp &copy; <?php echo date("Y");?></small> </p>
        </div>
    </div>
</body>

</html>