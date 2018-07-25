<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Gallery</h2>
        <ol class="breadcrumb">
            <li>
                <a>Home</a>
            </li>
            <li class="active">
                <a>Gallery</a>
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
                            <h5>Create Gallery Image</h5>
                        </div>
                        <div class="ibox-content">
                            <form class="form-horizontal" method="post" enctype="multipart/form-data" action="<?php echo base_url('admin/gallery/add');?>">
                               
                                <div class="form-group"><label class="col-lg-2 control-label">Image</label>
                                        <div class="col-lg-4">
                                        	<input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                                            <input type="file" name="galleryPic" class="form-control" />
                                        </div> 
                                </div>
                                
                                
                                <div class="form-group"><label class="col-lg-2 control-label">Description</label>
                                    <?php if(form_error('galleryDescription')){?>
                                    <div class="form-group has-error">
                                    <?php }?>

                                        <div class="col-lg-9">
                                             <textarea name="galleryDescription" class="form-control" id="summernote" ><?php echo set_value('galleryDescription');?></textarea>
                                        </div> 
                                    <?php if(form_error('galleryDescription')){?>
                                    </div>
                                    <div class="form-group"><label class="col-lg-2 control-label"></label>
                                    <div class="col-lg-4">
                                    <span class="help-block m-b-none" style="color:red;"><?php echo form_error('galleryDescription');?></span>
                                    </div>
                                    <?php }?>
                                </div>
                                
                                
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <a href="<?php echo base_url('admin/gallery');?>"><button class="btn btn-white" type="button">Cancel</button></a>
                                        <input type="submit" name="Save" value="Save" class="btn btn-primary">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>