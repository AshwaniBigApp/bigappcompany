<div class="footer">
                    <div>
                        <strong>Copyright</strong> BigappCompany &copy; <?php echo date("Y");?>
                    </div>
                </div>
            </div>
        </div>

        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="<?php echo base_url('assets/js/jquery-2.1.1.js');?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/plugins/slimscroll/jquery.slimscroll.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/plugins/chosen/chosen.jquery.js');?>"></script>
    <script src="<?php echo base_url('assets/js/plugins/jeditable/jquery.jeditable.js');?>"></script>
    <script src="<?php echo base_url('assets/js/plugins/dataTables/datatables.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/plugins/metisMenu/jquery.metisMenu.js');?>"></script>
    <script src="<?php echo base_url('assets/js/plugins/colorpicker/bootstrap-colorpicker.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/plugins/sweetalert/sweetalert.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/plugins/dropzone/dropzone.js');?>"></script>
   
    <!-- Flot -->
    <script src="<?php echo base_url('assets/js/plugins/flot/jquery.flot.js');?>"></script>
    <script src="<?php echo base_url('assets/js/plugins/flot/jquery.flot.tooltip.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/plugins/flot/jquery.flot.spline.js');?>"></script>
    <script src="<?php echo base_url('assets/js/plugins/flot/jquery.flot.resize.js');?>"></script>
    <script src="<?php echo base_url('assets/js/plugins/flot/jquery.flot.pie.js');?>"></script>

    <!-- Peity -->
    <script src="<?php echo base_url('assets/js/plugins/peity/jquery.peity.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/demo/peity-demo.js');?>"></script>

    <!-- Custom and plugin javascript -->
    <script src="<?php echo base_url('assets/js/inspinia.js');?>"></script>
    <script src="<?php echo base_url('assets/js/plugins/pace/pace.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/plugins/summernote/summernote.min.js');?>"></script>

    <!-- jQuery UI -->
    <script src="<?php echo base_url('assets/js/plugins/jquery-ui/jquery-ui.min.js');?>"></script>

    <!-- GITTER -->
    <script src="<?php echo base_url('assets/js/plugins/gritter/jquery.gritter.min.js');?>"></script>

    <!-- Sparkline -->
    <script src="<?php echo base_url('assets/js/plugins/sparkline/jquery.sparkline.min.js');?>"></script>

    <!-- Sparkline demo data  -->
    <script src="<?php echo base_url('assets/js/demo/sparkline-demo.js');?>"></script>

    <!-- ChartJS-->
    <script src="<?php echo base_url('assets/js/plugins/chartJs/Chart.min.js');?>"></script>

    <!-- Toastr -->
    <script src="<?php echo base_url('assets/js/plugins/toastr/toastr.min.js');?>"></script>

    <script src="<?php echo base_url('assets/js/plugins/iCheck/icheck.min.js');?>"></script>

     <script src="<?php echo base_url('assets/js/plugins/datapicker/bootstrap-datepicker.js');?>"></script>
    <script src="<?php echo base_url('assets/js/plugins/daterangepicker/daterangepicker.js');?>"></script>
     <script src="<?php echo base_url('assets/js/jquery.table2excel.js');?>"></script>

    <script>
        $(document).ready(function() {
        	$('.summernote').summernote();
            var page_name = $('#pageName').val();
            if(page_name == 'contact' ){
                    $('#pageContent').hide();
                    $('#contactEmail').show();
                    $('#contactEmail .col-lg-4 input').attr("required", "required");
                    $('#contactPhone').show();
                    $('#contactPhone .col-lg-4 input').attr("required", "required");
                    $('#addressLine1').show();
                    $('#addressLine1 .col-lg-4 textarea').attr("required", "required");
                    $('#addressLine2').show();
                    $('#addressLine2 .col-lg-4 textarea').attr("required", "required");
                    $('#pinCode').show();
                    $('#pinCode .col-lg-4 input').attr("required", "required");
                }else{
                    $('#pageContent').show();
                    $('#contactEmail').hide();
                    $('#contactEmail .col-lg-4 input').removeAttr("required");
                    $('#contactPhone').hide();
                    $('#contactPhone .col-lg-4 input').removeAttr("required");
                    $('#addressLine1').hide();
                    $('#addressLine1 .col-lg-4 textarea').removeAttr("required");
                    $('#addressLine2').hide();
                    $('#addressLine2 .col-lg-4 textarea').removeAttr("required");
                    $('#pinCode').hide();
                    $('#pinCode .col-lg-4 input').removeAttr("required");
                }

            $('#pageName').change(function(){
                var page_name = $('#pageName').val();
                if(page_name == 'contact'){
                    $('#pageContent').hide();
                    $('#contactEmail').show();
                    $('#contactEmail .col-lg-4 input').attr("required", "required");
                    $('#contactPhone').show();
                    $('#contactPhone .col-lg-4 input').attr("required", "required");
                    $('#addressLine1').show();
                    $('#addressLine1 .col-lg-4 textarea').attr("required", "required");
                    $('#addressLine2').show();
                    $('#addressLine2 .col-lg-4 textarea').attr("required", "required");
                    $('#pinCode').show();
                    $('#pinCode .col-lg-4 input').attr("required", "required");
                }else{
                    $('#pageContent').show();
                    $('#contactEmail').hide();
                    $('#contactEmail .col-lg-4 input').removeAttr("required");
                    $('#contactPhone').hide();
                    $('#contactPhone .col-lg-4 input').removeAttr("required");
                    $('#addressLine1').hide();
                    $('#addressLine1 .col-lg-4 textarea').removeAttr("required");
                    $('#addressLine2').hide();
                    $('#addressLine2 .col-lg-4 textarea').removeAttr("required");
                    $('#pinCode').hide();
                    $('#pinCode .col-lg-4 input').removeAttr("required");
                }
            });

          //Start of Delete Cms Content
            $('.delete_cmscontent').click(function () {
                var cms_id = $(this).parent().parent().parent().attr('id');
                var csrf_test_name = $("input[name=csrf_test_name]").val();
                swal({
                    title: "Are you sure?",
                    text: "This will permanantly delete the cms content!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes, Delete!",
                    closeOnConfirm: false
                }, function () {
                    $('.progress-spinner').removeClass('hidden');
                    $.ajax({
                        type: "POST",
                        data: { cms_id: cms_id, 'csrf_test_name' : csrf_test_name },
                        url: "<?php echo base_url('admin/cms/delete');?>",
                        success: function(res) {
                         swal("Cms content deleted!", "", "success");
                         location.reload();
                        }
                      });
                });
            });
            //End of delete CMS content
            
            //Start of delete faq
            $('.delete_faq').click(function () {
                var faq_id = $(this).parent().parent().parent().attr('id');
                var csrf_test_name = $("input[name=csrf_test_name]").val();
                swal({
                    title: "Are you sure?",
                    text: "This will permanently delete the FAQ!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes, Delete!",
                    closeOnConfirm: false
                }, function () {
                    $('.progress-spinner').removeClass('hidden');
                    $.ajax({
                        type: "POST",
                        data: { faq_id: faq_id, 'csrf_test_name' : csrf_test_name },
                        url: "<?php echo base_url('admin/faq/delete');?>",
                        success: function(res) {
                         swal("FAQ has been Deleted!", "", "success");
                         location.reload();
                        }
                      });
                });
            });
            //End of delete faq
            
            //Start of delete gallery image
            $('.delete_gallery_img').click(function () {
                var gallery_id = $(this).parent().parent().parent().attr('id');
                var csrf_test_name = $("input[name=csrf_test_name]").val();
                swal({
                    title: "Are you sure?",
                    text: "This will permanently delete the Image!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes, Delete!",
                    closeOnConfirm: false
                }, function () {
                    $('.progress-spinner').removeClass('hidden');
                    $.ajax({
                        type: "POST",
                        data: { gallery_id: gallery_id, 'csrf_test_name' : csrf_test_name },
                        url: "<?php echo base_url('admin/gallery/delete');?>",
                        success: function(res) {
                         swal("Image has been Deleted!", "", "success");
                         location.reload();
                        }
                      });
                });
            });
            //End of delete gallery image
            
            $("#edit_password").click(function(){
                $("#oldPassword").hide();
                $("#newPassword").show();
                $("#confpassword").show();
                $("#edit_password").hide();
                $("#cancel_edit").show();
                $("#new_pass").removeAttr('disabled');
            });

            $("#cancel_edit").click(function(){
                $("#oldPassword").show();
                $("#newPassword").hide();
                $("#confpassword").hide();
                $("#edit_password").show();
                $("#cancel_edit").hide();
            });

          //Start of Inactivate user for super admin
            $('.inactivate_admin_user').click(function () {
                var admin_user_id = $(this).parent().parent().parent().attr('id');
                var csrf_test_name = $("input[name=csrf_test_name]").val();
                swal({
                    title: "Are you sure?",
                    text: "This will deactivate the user!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes, Deactivate!",
                    closeOnConfirm: false
                }, function () {
                    $('.progress-spinner').removeClass('hidden');
                    $.ajax({
                        type: "POST",
                        data: { admin_user_id: admin_user_id, 'csrf_test_name' : csrf_test_name },
                        url: "<?php echo base_url('admin/users/inactivate');?>",
                        success: function(res) {
                         swal("User has been Deactivated!", "", "success");
                         location.reload();
                        }
                      });
                });
            });
            //End of Inactivate user for super admin

            //Start of Activate user for super admin
            $('.activate_admin_user').click(function () {
                var admin_user_id = $(this).parent().parent().parent().attr('id');
                var csrf_test_name = $("input[name=csrf_test_name]").val();
                swal({
                    title: "Are you sure?",
                    text: "This will activate the user!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes, Activate!",
                    closeOnConfirm: false
                }, function () {
                    $('.progress-spinner').removeClass('hidden');
                    $.ajax({
                        type: "POST",
                        data: { admin_user_id: admin_user_id, 'csrf_test_name' : csrf_test_name },
                        url: "<?php echo base_url('admin/users/activate');?>",
                        success: function(res) {
                         swal("User has been Activated!", "", "success");
                         location.reload();
                        }
                      });
                });
            });
            //End of Activate user for super admin

            //Start of Delete User for super admin
            $('.delete_admin_user').click(function () {
                var admin_user_id = $(this).parent().parent().parent().attr('id');
                var csrf_test_name = $("input[name=csrf_test_name]").val();
                swal({
                    title: "Are you sure?",
                    text: "This will permanently delete the user!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes, Delete!",
                    closeOnConfirm: false
                }, function () {
                    $('.progress-spinner').removeClass('hidden');
                    $.ajax({
                        type: "POST",
                        data: { admin_user_id: admin_user_id, 'csrf_test_name' : csrf_test_name },
                        url: "<?php echo base_url('admin/users/delete');?>",
                        success: function(res) {
                         swal("User has been Deleted!", "", "success");
                         location.reload();
                        }
                      });
                });
            });
            //End of Delete user for super admin
            
            //Start of Delete Team member
            $('.delete_team_member').click(function () {
                var member_id = $(this).parent().parent().parent().attr('id');
                var csrf_test_name = $("input[name=csrf_test_name]").val();
                swal({
                    title: "Are you sure?",
                    text: "This will permanently delete the member!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes, Delete!",
                    closeOnConfirm: false
                }, function () {
                    $('.progress-spinner').removeClass('hidden');
                    $.ajax({
                        type: "POST",
                        data: { member_id: member_id, 'csrf_test_name' : csrf_test_name },
                        url: "<?php echo base_url('admin/team/delete');?>",
                        success: function(res) {
                         swal("Team member has been Deleted!", "", "success");
                         location.reload();
                        }
                      });
                });
            });
            //End of Delete Team member
            
            //Start of deleting Blog
            $(".delete_blog").click(function(){
            	var blog_id = $(this).parent().parent().parent().attr('id');
            	var csrf_test_name = $("input[name=csrf_test_name]").val();
                swal({
                    title: "Are you sure?",
                    text: "This will permanently delete the blog!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes, Delete!",
                    closeOnConfirm: false
                }, function () {
                    $('.progress-spinner').removeClass('hidden');
                    $.ajax({
                        type: "POST",
                        data: { blog_id: blog_id, 'csrf_test_name' : csrf_test_name },
                        url: "<?php echo base_url('admin/blog/delete');?>",
                        success: function(res) {
                         swal("Blog has been Deleted!", "", "success");
                         location.reload();
                        }
                      });                    
                });
            });
            //End of deleting Blog
            
            /* Init DataTables */
            var oTable = $('#editable').DataTable();

            /* Apply the jEditable handlers to the table */
            oTable.$('td').editable( '../example_ajax.php', {
                "callback": function( sValue, y ) {
                    var aPos = oTable.fnGetPosition( this );
                    oTable.fnUpdate( sValue, aPos[0], aPos[1] );
                },
                "submitdata": function ( value, settings ) {
                    return {
                        "row_id": this.parentNode.getAttribute('id'),
                        "column": oTable.fnGetPosition( this )[2]
                    };
                },

                "width": "90%",
                "height": "100%"
            } ); 

            $('.dataTables-example').DataTable({
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    {extend: 'csv', title: 'report'},
                    {extend: 'excel', title: 'report'},
                ]

            });

            var config = {
                '.chosen-select'           : {},
                '.chosen-select-deselect'  : {allow_single_deselect:true},
                '.chosen-select-no-single' : {disable_search_threshold:10},
                '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
                '.chosen-select-width'     : {width:"95%"}
                }
            for (var selector in config) {
                $(selector).chosen(config[selector]);
            }

        });
    </script>
  
</body>
</html>