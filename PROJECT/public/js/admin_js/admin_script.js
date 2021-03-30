$(document).ready(function(){
    // check admin pass correct or nor
    $('#current_pwd').keyup(function(){
        var current_pwd = $('#current_pwd').val();
        // alert(current_pwd);
        $.ajax({
            type: 'post',
            url: '/admin/check-current-pwd',
            data: {current_pwd:current_pwd},
            success:function(resp){
                if(resp == "false"){
                    $('#checkCurrentPwd').html('<font color=red> Current password incorrect </font>');
                } else if(resp == "true") {
                    $('#checkCurrentPwd').html('<font color=green> Current password correct </font>');
                }
            },error:function(){
                alert('Error');
            }
        });
    });

    // update section status
    $(".updateSectionStatus").click(function(){
        var status = $(this).text();
        var section_id = $(this).attr("section_id");
        $.ajax({
            type: 'post',
            url: '/admin/update-section-status',
            data:{status:status,section_id:section_id},
            success:function(resp){
                if(resp['status'] == 0 )
                {
                    $('#section-'+section_id).html("<a class='updateSectionStatus' href='javascript:void(0)'>Inactive</a>");
                }else if(resp['status'] == 1 )
                {
                    $('#section-'+section_id).html("<a class='updateSectionStatus' href='javascript:void(0)'>Active</a>");
                }
            }, error:function(){
                alert('error');
            }
        });
    });

    // update category status
    $(".updateCategoryStatus").click(function(){
        var status = $(this).text();
        var category_id = $(this).attr("category_id");
        $.ajax({
            type: 'post',
            url: '/admin/update-category-status',
            data:{status:status,category_id:category_id},
            success:function(resp){
                if(resp['status'] == 0 )
                {
                    $('#category-'+category_id).html("<a class='updateCategoryStatus' href='javascript:void(0)'>Inactive</a>");
                }else if(resp['status'] == 1 )
                {
                    $('#category-'+category_id).html("<a class='updateCategoryStatus' href='javascript:void(0)'>Active</a>");
                }
            }, error:function(){
                alert('error');
            }
        });
    });

    // append categories level
    $('#section_id').change(function(){
        var section_id = $(this).val();
        $.ajax({
            type:'post',
            url:'/admin/append-categories-level',
            data:{section_id:section_id},
            success:function(resp){
                $("#appendCategoriesLevel").html(resp);
            },error:function(){
                alert('error');
            }
        });
    });

    // $(".confirmDelete").click(function(){
    //     var name = $(this).attr("name");
    //     if(confirm("are you sure to delete this " +name+ " ?"))
    //     {
    //         return true; 
    //     }
    //     return false;
    // });

    // confirm delete with javascript
    $(".confirmDelete").click(function(){
        var record = $(this).attr("record");
        var recordid = $(this).attr("recordid");
        Swal.fire({
            title: 'Are you sure?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'delete'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "/admin/delete-"+record+"/"+recordid;
            }
        })
    });

});