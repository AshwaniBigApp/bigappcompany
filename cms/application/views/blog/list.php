<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Blog</h2>
        <ol class="breadcrumb">
            <li>
                <a>Home</a>
            </li>
            <li>
                <a>Blog</a>
            </li>
            <li class="active">
                <strong>List</strong>
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
                <?php if($this->session->flashdata('msg')){?>
                    <div class="alert alert-success alert-dismissable">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        <?php echo $this->session->flashdata('msg');?>
                    </div>
                <?php }?>
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Blog List</h5>
                        <div class="ibox-tools">
                            <a href="<?php echo base_url('admin/blog/add');?>" ><button type="button" class="btn btn-outline btn-primary dim ">New Blog</button></a>
                        </div>
                    </div>
                    <div class="ibox-content">

                        <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr>
                        <th>Sr. No</th>
                        <th>Author</th>
                        <th>Title</th>
                        <th>Created On</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $srno = 1; foreach($blogs as $blog):?>
                    <tr class="gradeX" id="<?php echo $blog->blog_id;?>">
                        <td><?php echo $srno;?></td>
                        <td><?php echo ucfirst($blog->blog_author);?></td>
                        <td><?php echo substr($blog->blog_title,0,100);?></td>
                        <td><?php echo date('d/m/Y, g:i A', strtotime($blog->blog_created_on));?></td>
                        <td colspan="2">
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                            <p>
                                <a href="<?php echo base_url('admin/blog').'/'.$blog->blog_slug.'/edit';?>"><button type="button" class="btn btn-outline btn-primary dim">Edit</button></a>
                                <a href="<?php echo base_url('admin/blog').'/'.$blog->blog_slug.'/view';?>"><button type="button" class="btn btn-outline btn-info dim">View</button></a>
                                <button type="button" class="btn btn-outline btn-danger dim delete_blog">Delete</button>
                            </p>
                        </td>
                    </tr>
                <?php $srno++;endforeach;?>
                    
                    </tbody>
                    </table>
                        </div>

                    </div>
                </div>
            </div>
            </div>
        </div>
<div class="progress-spinner hidden">
    <div class="center">
        <div class="sk-spinner sk-spinner-chasing-dots">
        <div class="sk-dot1"></div>
        <div class="sk-dot2"></div>
    </div>
    </div>
</div>