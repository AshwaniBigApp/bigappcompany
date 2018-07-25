<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Blog</h2>
        <ol class="breadcrumb">
            <li>
                <a href="">Home</a>
            </li>
            <li class="active">
                <a>Blog</a>
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
                            <h5>Create Blog</h5>
                        </div>
                        <div class="ibox-content">
                            <form class="form-horizontal" method="post" enctype="multipart/form-data" action="<?php echo base_url('admin/blog/add');?>">
                                <div class="form-group"><label class="col-lg-2 control-label">Title</label>
                                    <?php if(form_error('blogTitle')){?>
                                    <div class="form-group has-error">
                                    <?php }?>

                                        <div class="col-lg-4">
                                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                                            <input type="text" name="blogTitle" value="<?php echo set_value('blogTitle');?>" class="form-control">
                                            
                                        </div> 
                                    <?php if(form_error('blogTitle')){?>
                                    </div>
                                    <div class="form-group"><label class="col-lg-2 control-label"></label>
                                    <div class="col-lg-4">
                                    <span class="help-block m-b-none" style="color:red;"><?php echo form_error('blogTitle');?></span>
                                    </div>
                                    <?php }?>
                                </div>
                                
                                <div class="form-group"><label class="col-lg-2 control-label">Image</label>
                                        <div class="col-lg-4">
                                         <input type="file" name="blogImage" class="form-control"/>
                                        </div> 
                                </div>
                                
                                <div class="form-group"><label class="col-lg-2 control-label">Description </label>
                                    <?php if(form_error('blogDescription')){?>
                                    <div class="form-group has-error">
                                    <?php }?>

                                        <div class="col-lg-12">
                                            <textarea name="blogDescription" class="summernote"></textarea>
                                        </div> 
                                    <?php if(form_error('blogDescription')){?>
                                    </div>
                                    <div class="form-group"><label class="col-lg-2 control-label"></label>
                                    <div class="col-lg-4">
                                    <span class="help-block m-b-none" style="color:red;"><?php echo form_error('blogDescription');?></span>
                                    </div>
                                    <?php }?>
                                </div>
                                
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <a href="<?php echo base_url('admin/blog');?>"><button class="btn btn-white" type="button">Cancel</button></a>
                                        <input type="submit" name="Save" value="Save" class="btn btn-primary">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>