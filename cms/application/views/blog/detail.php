<?php //echo"<pre>";print_r($blog_details);exit;
?>
<div class="wrapper wrapper-content animated fadeInRight">

            <div class="row">
            <?php if($this->session->flashdata('access_msg')){?>
                    <div class="alert alert-warning alert-dismissable">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        <?php echo $this->session->flashdata('access_msg');?>
                    </div>
                <?php }?>
                <div class="col-lg-12">

                    <div class="ibox product-detail">
                        <div class="ibox-content">

                            <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <h2 class="font-bold m-b-xs pull-right">
                                <a href="javascript:history.back()"><button type="button" class="btn btn-outline btn-primary dim">BACK</button></a>
                            </h2>
                            </div>
                                <div class="col-md-12">


                                    <div class="product-images">

                                        <div>
                                            <div class="image-imitation">
                                                <img src="<?php echo base_url('assets/blogs/thumb/'.$blog_details->blog_image);?>"/>
                                            </div>
                                        </div>
                                        
                                    </div>

                                </div>
                                <div class="clearfix">&nbsp;</div>
                                <div class="clearfix"></div>
                                <div class="col-md-12">
                                	
                                    <h2 class="font-bold m-b-xs">
                                        <?php echo ucwords($blog_details->blog_title);?>
                                    </h2>
                                    
                                    <hr>

                                    <h4>Description</h4>

                                    <div class="text-muted">
                                        <?php echo $blog_details->blog_description;?>
                                    </div>
                                    <hr>

                                    <div>
                                        <!-- <div class="btn-group">
                                            <button class="btn btn-primary btn-sm"><i class="fa fa-cart-plus"></i> Add to cart</button>
                                            <button class="btn btn-white btn-sm"><i class="fa fa-star"></i> Add to wishlist </button>
                                            <button class="btn btn-white btn-sm"><i class="fa fa-envelope"></i> Contact with author </button>
                                        </div> -->
                                    </div>



                                </div>
                            </div>

                        </div>
                        <!-- <div class="ibox-footer">
                            <span class="pull-right">
                                Full stock - <i class="fa fa-clock-o"></i> 14.04.2016 10:04 pm
                            </span>
                            The generated Lorem Ipsum is therefore always free
                        </div> -->
                    </div>

                </div>
            </div>
        </div>