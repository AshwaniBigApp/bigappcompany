<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="shortcut icon" href="<?php //echo base_url('assets/digverve_favicon.png');?>" />
    <title>Bigapp CMS </title>

    <link href="<?php echo base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/font-awesome/css/font-awesome.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/plugins/dataTables/datatables.min.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/plugins/chosen/chosen.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/plugins/colorpicker/bootstrap-colorpicker.min.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/plugins/datapicker/datepicker3.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/plugins/sweetalert/sweetalert.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/plugins/dropzone/basic.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/plugins/dropzone/dropzone.css');?>" rel="stylesheet">
    <!-- Toastr style -->
    <link href="<?php echo base_url('assets/css/plugins/toastr/toastr.min.css');?>" rel="stylesheet">

    <!-- Gritter -->
    <link href="<?php echo base_url('assets/js/plugins/gritter/jquery.gritter.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/plugins/iCheck/custom.css');?>" rel="stylesheet">

    <link href="<?php echo base_url('assets/css/plugins/steps/jquery.steps.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/animate.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/plugins/summernote/summernote.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/plugins/summernote/summernote-bs3.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/style.css');?>" rel="stylesheet">

</head>

<body>
<?php //echo"<pre>";print_r($this->session->userdata);exit;?>
    <div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element"> 
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?php echo ucfirst($this->session->userdata['name']);?></strong>
                             </span> <span class="text-muted text-xs block">Settings <b class="caret"></b></span> </span> </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a href="<?php echo base_url('admin/users/changepassword');?>">Change Password</a></li>
                                <li class="divider"></li>
                                <li><a href="<?php echo base_url('admin/users/logout');?>">Logout</a></li>
                            </ul>
                        </div>
                    </li>
                    
                        <li <?php if(uri_string() == 'admin/users' || uri_string() == 'admin/users/add'){?> class="active"<?php }?>>
                            <a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">Users</span> <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li <?php if(uri_string() == 'admin/users'){?> class="active" <?php }?>><a href="<?php echo base_url('admin/users');?>">List</a></li>
                                <li <?php if(uri_string() == 'admin/users/add'){?> class="active" <?php }?>><a href="<?php echo base_url('admin/users/add');?>">Add</a></li>
                            </ul>
                        </li>

                        <li <?php if(uri_string() == 'admin/cms' || uri_string() == 'admin/cms/add'){?> class="active"<?php }?>>
                            <a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">CMS</span> <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li <?php if(uri_string() == 'admin/cms'){?> class="active" <?php }?>><a href="<?php echo base_url('admin/cms');?>">List</a></li>
                                <li <?php if(uri_string() == 'admin/cms/add'){?> class="active" <?php }?>><a href="<?php echo base_url('admin/cms/add');?>">Add</a></li>
                            </ul>
                        </li>
                        
                        <li <?php if(uri_string() == 'admin/faq' || uri_string() == 'admin/faq/add'){?> class="active"<?php }?>>
                            <a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">FAQ's</span> <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li <?php if(uri_string() == 'admin/faq'){?> class="active" <?php }?>><a href="<?php echo base_url('admin/faq');?>">List</a></li>
                                <li <?php if(uri_string() == 'admin/faq/add'){?> class="active" <?php }?>><a href="<?php echo base_url('admin/faq/add');?>">Add</a></li>
                            </ul>
                        </li>
                        
                        <li <?php if(uri_string() == 'admin/gallery' || uri_string() == 'admin/gallery/add'){?> class="active"<?php }?>>
                            <a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">Gallery</span> <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li <?php if(uri_string() == 'admin/gallery'){?> class="active" <?php }?>><a href="<?php echo base_url('admin/gallery');?>">List</a></li>
                                <li <?php if(uri_string() == 'admin/gallery/add'){?> class="active" <?php }?>><a href="<?php echo base_url('admin/gallery/add');?>">Add</a></li>
                            </ul>
                        </li>
                        
                        <li <?php if(uri_string() == 'admin/team' || uri_string() == 'admin/team/add'){?> class="active"<?php }?>>
                            <a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">Team</span> <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li <?php if(uri_string() == 'admin/team'){?> class="active" <?php }?>><a href="<?php echo base_url('admin/team');?>">List</a></li>
                                <li <?php if(uri_string() == 'admin/team/add'){?> class="active" <?php }?>><a href="<?php echo base_url('admin/team/add');?>">Add</a></li>
                            </ul>
                        </li>
                        
                        <li <?php if(uri_string() == 'admin/blog' || uri_string() == 'admin/blog/add'){?> class="active"<?php }?>>
                            <a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">Blog</span> <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li <?php if(uri_string() == 'admin/blog'){?> class="active" <?php }?>><a href="<?php echo base_url('admin/blog');?>">List</a></li>
                                <li <?php if(uri_string() == 'admin/blog/add'){?> class="active" <?php }?>><a href="<?php echo base_url('admin/blog/add');?>">Add</a></li>
                            </ul>
                        </li>
                </ul>

            </div>
        </nav>

        <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            
        </div>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <span class="m-r-sm text-muted welcome-message">Welcome to DigVerve.</span>
                </li>
                <li>
                    <a href="<?php echo base_url('admin/users/logout');?>">
                        <i class="fa fa-sign-out"></i> Log out
                    </a>
                </li>
            </ul>

        </nav>
        </div>