<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Users</h2>
        <ol class="breadcrumb">
            <li>
                <a>Home</a>
            </li>
            <li class="active">
                <a>User</a>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <?php if($this->session->flashdata('access_msg')){?>
                    <div class="alert alert-warning alert-dismissable">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        <?php echo $this->session->flashdata('access_msg');?>
                    </div>
                <?php }?>
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Create User</h5>
                        </div>
                        <div class="ibox-content">
                            <form class="form-horizontal" method="post" enctype="multipart/form-data" action="<?php echo base_url('admin/users/add');?>">
                                <div class="form-group"><label class="col-lg-2 control-label">Name</label>
                                    <?php if(form_error('Name')){?>
                                    <div class="form-group has-error">
                                    <?php }?>

                                        <div class="col-lg-4">
                                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                                            <input type="text" name="Name" value="<?php echo set_value('Name');?>" class="form-control">
                                            
                                        </div> 
                                    <?php if(form_error('Name')){?>
                                    </div>
                                    <div class="form-group"><label class="col-lg-2 control-label"></label>
                                    <div class="col-lg-4">
                                    <span class="help-block m-b-none" style="color:red;"><?php echo form_error('Name');?></span>
                                    </div>
                                    <?php }?>
                                </div>

                                
                                <div class="form-group"><label class="col-lg-2 control-label">Email</label>
                                    <?php if(form_error('email')){?>
                                    <div class="form-group has-error">
                                    <?php }?>

                                        <div class="col-lg-4">
                                            <input type="email" name="email" value="<?php echo set_value('email');?>" class="form-control">
                                            
                                        </div> 
                                    <?php if(form_error('email')){?>
                                    </div>
                                    <div class="form-group"><label class="col-lg-2 control-label"></label>
                                    <div class="col-lg-4">
                                    <span class="help-block m-b-none" style="color:red;"><?php echo form_error('email');?></span>
                                    </div>
                                    <?php }?>
                                </div>

                                <div class="form-group"><label class="col-lg-2 control-label">Password</label>
                                    <?php if(form_error('password')){?>
                                    <div class="form-group has-error">
                                    <?php }?>

                                        <div class="col-lg-4">
                                            <input type="password" name="password" value="" class="form-control">
                                            
                                        </div> 
                                    <?php if(form_error('password')){?>
                                    </div>
                                    <div class="form-group"><label class="col-lg-2 control-label"></label>
                                    <div class="col-lg-4">
                                    <span class="help-block m-b-none" style="color:red;"><?php echo form_error('password');?></span>
                                    </div>
                                    <?php }?>
                                </div>

                                <div class="form-group"><label class="col-lg-2 control-label">Confirm Password</label>
                                    <?php if(form_error('passconf')){?>
                                    <div class="form-group has-error">
                                    <?php }?>

                                        <div class="col-lg-4">
                                            <input type="password" name="passconf" value="" class="form-control">
                                            
                                        </div> 
                                    <?php if(form_error('passconf')){?>
                                    </div>
                                    <div class="form-group"><label class="col-lg-2 control-label"></label>
                                    <div class="col-lg-4">
                                    <span class="help-block m-b-none" style="color:red;"><?php echo form_error('passconf');?></span>
                                    </div>
                                    <?php }?>
                                </div>

                                <div class="form-group"><label class="col-lg-2 control-label">Mobile No.</label>
                                    <?php if(form_error('mobile')){?>
                                    <div class="form-group has-error">
                                    <?php }?>

                                        <div class="col-lg-4">
                                            <input type="text" name="mobile" value="<?php echo set_value('mobile');?>" class="form-control">
                                            
                                        </div> 
                                    <?php if(form_error('mobile')){?>
                                    </div>
                                    <div class="form-group"><label class="col-lg-2 control-label"></label>
                                    <div class="col-lg-4">
                                    <span class="help-block m-b-none" style="color:red;"><?php echo form_error('mobile');?></span>
                                    </div>
                                    <?php }?>
                                </div>
                                
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <a href="<?php echo base_url('admin/users');?>"><button class="btn btn-white" type="button">Cancel</button></a>
                                        <input type="submit" name="Save" value="Save" class="btn btn-primary">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>