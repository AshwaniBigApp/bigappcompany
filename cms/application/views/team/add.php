<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Gallery</h2>
        <ol class="breadcrumb">
            <li>
                <a>Home</a>
            </li>
            <li class="active">
                <a>Team</a>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Create Team Member</h5>
                        </div>
                        <div class="ibox-content">
                            <form class="form-horizontal" method="post" enctype="multipart/form-data" action="<?php echo base_url('admin/team/add');?>">
                               
                               <div class="form-group"><label class="col-lg-2 control-label">Name</label>
                                    <?php if(form_error('memberName')){?>
                                    <div class="form-group has-error">
                                    <?php }?>

                                        <div class="col-lg-4">
                                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                                             <input type="text" name="memberName" class="form-control" />
                                        </div> 
                                    <?php if(form_error('memberName')){?>
                                    </div>
                                    <div class="form-group"><label class="col-lg-2 control-label"></label>
                                    <div class="col-lg-4">
                                    <span class="help-block m-b-none" style="color:red;"><?php echo form_error('memberName');?></span>
                                    </div>
                                    <?php }?>
                                </div>
                                
                                <div class="form-group"><label class="col-lg-2 control-label">Designation</label>
                                    <?php if(form_error('memberDesignation')){?>
                                    <div class="form-group has-error">
                                    <?php }?>

                                        <div class="col-lg-4">
                                             <input type="text" name="memberDesignation" class="form-control" />
                                        </div> 
                                    <?php if(form_error('memberDesignation')){?>
                                    </div>
                                    <div class="form-group"><label class="col-lg-2 control-label"></label>
                                    <div class="col-lg-4">
                                    <span class="help-block m-b-none" style="color:red;"><?php echo form_error('memberDesignation');?></span>
                                    </div>
                                    <?php }?>
                                </div>
                               
                                <div class="form-group"><label class="col-lg-2 control-label">Image</label>
                                        <div class="col-lg-4">
                                            <input type="file" name="memberImage" class="form-control" />
                                        </div> 
                                </div>
                                
                                
                                <div class="form-group"><label class="col-lg-2 control-label">Description</label>
                                    <?php if(form_error('memberDescription')){?>
                                    <div class="form-group has-error">
                                    <?php }?>

                                        <div class="col-lg-4">
                                             <textarea name="memberDescription" class="form-control" id="summernote" ><?php echo set_value('memberDescription');?></textarea>
                                        </div> 
                                    <?php if(form_error('memberDescription')){?>
                                    </div>
                                    <div class="form-group"><label class="col-lg-2 control-label"></label>
                                    <div class="col-lg-4">
                                    <span class="help-block m-b-none" style="color:red;"><?php echo form_error('memberDescription');?></span>
                                    </div>
                                    <?php }?>
                                </div>
                                
                                
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <a href="<?php echo base_url('admin/team');?>"><button class="btn btn-white" type="button">Cancel</button></a>
                                        <input type="submit" name="Save" value="Save" class="btn btn-primary">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>