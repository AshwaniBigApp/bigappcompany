<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Users</h2>
        <ol class="breadcrumb">
            <li>
                <a>Home</a>
            </li>
            <li>
                <a>Users</a>
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
                        <h5>Users List</h5>
                        <div class="ibox-tools">
                            <a href="<?php echo base_url('admin/users/add');?>"><button type="button" class="btn btn-outline btn-primary dim ">New User</button></a>
                        </div>
                    </div>
                    <div class="ibox-content">

                        <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr>
                        <th>Sr. No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Contact Number</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $srno = 1; foreach($users as $user):?>
                    <tr class="gradeX" id="<?php echo $user->admin_id;?>">
                        <td><?php echo $srno;?></td>
                        <td><?php echo $user->name;?></td>
                        <td><?php echo $user->admin_email;?></td>
                        <td><?php echo ucfirst($user->admin_mobile_no);?></td>
                        <td>
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                            <p>
                                <a href="<?php echo base_url('admin/users/edit').'/'.$user->admin_id;?>"><button type="button" class="btn btn-outline btn-info dim">Edit</button></a>
                                <?php if($user->admin_user_status == 1){?>
                                <button type="button" class="btn btn-outline btn-warning dim inactivate_admin_user">Inactivate</button>
                                <?php } else{?>
                                <button type="button" class="btn btn-outline btn-warning dim activate_admin_user">Activate</button>
                                <?php }?>
                                <button type="button" class="btn btn-outline btn-danger dim delete_admin_user">Delete</button>
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
