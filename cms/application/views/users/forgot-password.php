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
            <form class="m-t" role="form" action="<?php echo base_url('admin/forgotPassword');?>" method="post">
                <div class="form-group">

                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                   
                    <input type="email" class="form-control" name="email" placeholder="Email" required>
                </div>
                <input type="submit" name="btn_login" value="Reset" class="btn btn-primary block full-width m-b">
            </form>
            <a class="text-center" href="<?php echo base_url('admin/login');?>">Login</a>
            <p class="m-t"> <small>BigApp &copy; <?php echo date("Y");?></small> </p>
        </div>
    </div>
</body>

</html>
