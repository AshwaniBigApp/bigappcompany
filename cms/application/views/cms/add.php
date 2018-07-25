<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>CMS</h2>
        <ol class="breadcrumb">
            <li>
                <a>Home</a>
            </li>
            <li class="active">
                <a>CMS</a>
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
                            <h5>Create Page Content</h5>
                        </div>
                        <div class="ibox-content">
                            <form class="form-horizontal" method="post" enctype="multipart/form-data" action="<?php echo base_url('admin/cms/add');?>">
                                <div class="form-group"><label class="col-lg-2 control-label">Page</label>
                                    <?php if(form_error('pageName')){?>
                                    <div class="form-group has-error">
                                    <?php }?>

                                        <div class="col-lg-4">
                                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                                            <select name="pageName" class="form-control" id="pageName">
                                                <option value="">Please Select</option>
                                                <option value="terms">Terms</option>
                                                <option value="privacy">Privacy</option>
                                                <option value="contact">Contact</option>
                                            </select>
                                        </div> 
                                    <?php if(form_error('pageName')){?>
                                    </div>
                                    <div class="form-group"><label class="col-lg-2 control-label"></label>
                                    <div class="col-lg-4">
                                    <span class="help-block m-b-none" style="color:red;"><?php echo form_error('pageName');?></span>
                                    </div>
                                    <?php }?>
                                </div>
                                <div class="form-group" id="pageContent" style="display: none;"><label class="col-lg-2 control-label">Content </label>
                                    <?php if(form_error('pageContent')){?>
                                    <div class="form-group has-error">
                                    <?php }?>

                                        <div class="col-lg-12">
                                            <textarea name="pageContent" class="summernote"></textarea>
                                        </div> 
                                    <?php if(form_error('pageContent')){?>
                                    </div>
                                    <div class="form-group"><label class="col-lg-2 control-label"></label>
                                    <div class="col-lg-4">
                                    <span class="help-block m-b-none" style="color:red;"><?php echo form_error('pageContent');?></span>
                                    </div>
                                    <?php }?>
                                </div>
                                <div class="form-group" id="contactEmail" style="display: none;"><label class="col-lg-2 control-label">Contact Email </label>
                                        <div class="col-lg-4">
                                            <input type="text" name="contactEmail" class="form-control" >
                                        </div> 
                                </div>
                                <div class="form-group" id="contactPhone" style="display: none;"><label class="col-lg-2 control-label">Phone </label>
                                        <div class="col-lg-4">
                                            <input type="text" name="contactPhone" class="form-control" >
                                        </div> 
                                </div>
                                <div class="form-group" id="addressLine1" style="display: none;"><label class="col-lg-2 control-label">Address Line 1 </label>
                                        <div class="col-lg-4">
                                            <textarea name="addressLine1" class="form-control" ></textarea>
                                        </div> 
                                </div>
                                <div class="form-group" id="addressLine2" style="display: none;"><label class="col-lg-2 control-label">Address Line 2 </label>
                                        <div class="col-lg-4">
                                            <textarea name="addressLine2" class="form-control" ></textarea>
                                        </div> 
                                </div>
                                <div class="form-group" id="pinCode" style="display: none;"><label class="col-lg-2 control-label">Pincode </label>
                                        <div class="col-lg-4">
                                            <input type="text" name="pinCode" class="form-control" >
                                        </div> 
                                </div>
                                <!-- <div class="form-group"><label class="col-lg-2 control-label">Content</label>
                                    
                                </div> -->
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <a href="<?php echo base_url('admin/cms');?>"><button class="btn btn-white" type="button">Cancel</button></a>
                                        <input type="submit" name="Save" value="Save" class="btn btn-primary">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>