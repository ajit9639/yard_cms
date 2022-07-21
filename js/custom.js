$(".permission_chk").change(function () {
   var id=$(this).data('id');
if(id == '1')
{
    if($(this).prop('checked') == true)
    {
        $(".permission_chk").prop('checked',true);
    }
    else {

    }
}
else {
    if($(this).prop('checked') == false)
    {
        $("#checkbox_1").prop('checked',false);
    }
}

});


$("#contact_group_id").change(function(){
    var val=$("#contact_group_id option:selected").val();
    if(val == 'AddNew')
    {
        $(".new_group_area").show();
    }
    else {
        $(".new_group_area").hide();
    }
});


$('#user_form').validate({
    rules: {
        'checkbox': {
            required: true
        },
        'gender': {
            required: true
        }
    },
    highlight: function (input) {
        $(input).parents('.form-line').addClass('error');
    },
    unhighlight: function (input) {
        $(input).parents('.form-line').removeClass('error');
    },
    errorPlacement: function (error, element) {
        $(element).parents('.form-group').append(error);
    }
});

$('#template_form').validate({
    rules: {
        'checkbox': {
            required: true
        },
        'gender': {
            required: true
        }
    },
    highlight: function (input) {
        $(input).parents('.form-line').addClass('error');
    },
    unhighlight: function (input) {
        $(input).parents('.form-line').removeClass('error');
    },
    errorPlacement: function (error, element) {
        $(element).parents('.form-group').append(error);
    }
});

$('#group_form').validate({
    rules: {
        'checkbox': {
            required: true
        },
        'gender': {
            required: true
        }
    },
    highlight: function (input) {
        $(input).parents('.form-line').addClass('error');
    },
    unhighlight: function (input) {
        $(input).parents('.form-line').removeClass('error');
    },
    errorPlacement: function (error, element) {
        $(element).parents('.form-group').append(error);
    }
});

$('#contact_form_TEST').validate({
    rules: {
        'checkbox': {
            required: true
        },
        'gender': {
            required: true
        }
    },
    highlight: function (input) {
        $(input).parents('.form-line').addClass('error');
    },
    unhighlight: function (input) {
        $(input).parents('.form-line').removeClass('error');
    },
    errorPlacement: function (error, element) {
        $(element).parents('.form-group').append(error);
    }
});
$('#sender_form').validate({
    rules: {
        field: {
            required: true,
            maxlength: 4
        }
    },
    highlight: function (input) {
        $(input).parents('.form-line').addClass('error');
    },
    unhighlight: function (input) {
        $(input).parents('.form-line').removeClass('error');
    },
    errorPlacement: function (error, element) {
        $(element).parents('.form-group').append(error);
    }
});




$(".delete_user_button").click(function () {
var id=$(this).data('id');
var c=confirm("Are you sure you want to delete");
if(c)
{
    $.ajax({
       url:'delete.php',
        async:false,
        type:'post',
        cache:false,
        data:{did:id,table:'user:id,role:user_id',page:'user_list.php'},
        success:function (data) {
            if(data ==1)
            {
                alert("Deleted Successfully");
                window.location="user_list.php";
            }
        }
    });
}
});

$(".delete_account_button").click(function () {
    var id=$(this).data('id');
    var c=confirm("Are you sure you want to delete");
    if(c)
    {
        $.ajax({
            url:'delete.php',
            async:false,
            type:'post',
            cache:false,
            data:{did:id,table:'account_master:id',page:'account_master.php'},
            success:function (data) {
                if(data ==1)
                {
                    alert("Deleted Successfully");
                    window.location="account_master.php";
                }
            }
        });
    }
});
$(".delete_party_button").click(function () {
    var id=$(this).data('id');
    var c=confirm("Are you sure you want to delete");
    if(c)
    {
        $.ajax({
            url:'delete.php',
            async:false,
            type:'post',
            cache:false,
            data:{did:id,table:'party_master:id',page:'party_master.php'},
            success:function (data) {
                if(data ==1)
                {
                    alert("Deleted Successfully");
                    window.location="party_master.php";
                }
            }
        });
    }
});
$(".delete_team_button").click(function () {
var id=$(this).data('id');
var c=confirm("Are you sure you want to delete");
if(c)
{
    $.ajax({
       url:'delete.php',
        async:false,
        type:'post',
        cache:false,
        data:{did:id,table:'team:id',page:'team_list.php'},
        success:function (data) {
            if(data ==1)
            {
                alert("Deleted Successfully");
                window.location="team_list.php";
            }
        }
    });
}
});

$(".delete_material_button").click(function () {
    var id=$(this).data('id');
    var c=confirm("Are you sure you want to delete");
    if(c)
    {
        $.ajax({
            url:'delete.php',
            async:false,
            type:'post',
            cache:false,
            data:{did:id,table:'material_master:id',page:'material_list.php'},
            success:function (data) {
                if(data ==1)
                {
                    alert("Deleted Successfully");
                    window.location="material_list.php";
                }
            }
        });
    }
});

$(".delete_permit_button").click(function () {
    var id=$(this).data('id');
    var c=confirm("Are you sure you want to delete");
    if(c)
    {
        $.ajax({
            url:'delete.php',
            async:false,
            type:'post',
            cache:false,
            data:{did:id,table:'mines_challan:id',page:'permit_list.php'},
            success:function (data) {
                if(data ==1)
                {
                    alert("Deleted Successfully");
                    window.location="permit_list.php";
                }
            }
        });
    }
});

$(".delete_vehicle_button").click(function () {
    var id=$(this).data('id');
    var c=confirm("Are you sure you want to delete");
    if(c)
    {
        $.ajax({
            url:'delete.php',
            async:false,
            type:'post',
            cache:false,
            data:{did:id,table:'vehicle_master:id',page:'vehicle_list.php'},
            success:function (data) {
                if(data ==1)
                {
                    alert("Deleted Successfully");
                    window.location="vehicle_list.php";
                }
            }
        });
    }
});

$(".delete_destination_button").click(function () {
    var id=$(this).data('id');
    var c=confirm("Are you sure you want to delete");
    if(c)
    {
        $.ajax({
            url:'delete.php',
            async:false,
            type:'post',
            cache:false,
            data:{did:id,table:'buyer_master:id',page:'destination_point.php'},
            success:function (data) {
                if(data ==1)
                {
                    alert("Deleted Successfully");
                    window.location="destination_point.php";
                }
            }
        });
    }
});
$(".delete_mines_button").click(function () {
    var id=$(this).data('id');
    var c=confirm("Are you sure you want to delete");
    if(c)
    {
        $.ajax({
            url:'delete.php',
            async:false,
            type:'post',
            cache:false,
            data:{did:id,table:'mines_master:id',page:'loading_point.php'},
            success:function (data) {
                if(data ==1)
                {
                    alert("Deleted Successfully");
                    window.location="loading_point.php";
                }
            }
        });
    }
});


$(".delete_service_button").click(function () {
var id=$(this).data('id');
var c=confirm("Are you sure you want to delete");
if(c)
{
    $.ajax({
       url:'delete.php',
        async:false,
        type:'post',
        cache:false,
        data:{did:id,table:'service:id',page:'service_list.php'},
        success:function (data) {
            if(data ==1)
            {
                alert("Deleted Successfully");
                window.location="service_list.php";
            }
        }
    });
}
});



$(".delete_image_button").click(function () {
    var id=$(this).data('id');
    var c=confirm("Are you sure you want to delete");
    if(c)
    {
        $.ajax({
            url:'delete.php',
            async:false,
            type:'post',
            cache:false,
            data:{did:id,table:'image:id',page:'gallery_list.php'},
            success:function (data) {
                if(data ==1)
                {
                    alert("Deleted Successfully");
                    window.location="gallery_list.php";
                }
            }
        });
    }
});



$(".delete_banner_button").click(function () {
    var id=$(this).data('id');
    var c=confirm("Are you sure you want to delete");
    if(c)
    {
        $.ajax({
            url:'delete.php',
            async:false,
            type:'post',
            cache:false,
            data:{did:id,table:'banner:id',page:'banner_list.php'},
            success:function (data) {
                if(data ==1)
                {
                    alert("Deleted Successfully");
                    window.location="banner_list.php";
                }
            }
        });
    }
});


$(".delete_group_button").click(function () {
var id=$(this).data('id');
var c=confirm("Are you sure you want to delete");
if(c)
{
    $.ajax({
       url:'delete.php',
        async:false,
        type:'post',
        cache:false,
        data:{did:id,table:'group:id,contact:group_id',page:'group_list.php'},
        success:function (data) {
            if(data ==1)
            {
                alert("Deleted Successfully");
                window.location="group_list.php";
            }
        }
    });
}
});

$(".delete_template_button").click(function () {
var id=$(this).data('id');
var c=confirm("Are you sure you want to delete");
if(c)
{
    $.ajax({
       url:'delete.php',
        async:false,
        type:'post',
        cache:false,
        data:{did:id,table:'templates:id',page:'template_list.php'},
        success:function (data) {
            if(data ==1)
            {
                alert("Deleted Successfully");
                window.location="template_list.php";
            }
        }
    });
}
});
$(".delete_contact_button").click(function () {
var id=$(this).data('id');
var c=confirm("Are you sure you want to delete");
if(c)
{
    $.ajax({
       url:'delete.php',
        async:false,
        type:'post',
        cache:false,
        data:{did:id,table:'contact:id',page:'contact_list.php'},
        success:function (data) {
            if(data ==1)
            {
                alert("Deleted Successfully");
                window.location="contact_list.php";
            }
        }
    });
}
});
$(".delete_dealership_button").click(function () {
var id=$(this).data('id');
var c=confirm("Are you sure you want to delete");
if(c)
{
    $.ajax({
       url:'delete.php',
        async:false,
        type:'post',
        cache:false,
        data:{did:id,table:'dealership:id',page:'dealership_list.php'},
        success:function (data) {
            if(data ==1)
            {
                alert("Deleted Successfully");
                window.location="dealership_list.php";
            }
        }
    });
}
});

$(".delete_member_button").click(function () {
var id=$(this).data('id');
var c=confirm("Are you sure you want to delete");
if(c)
{
    $.ajax({
       url:'delete.php',
        async:false,
        type:'post',
        cache:false,
        data:{did:id,table:'member:id,dealer_member:member_id',page:'member_list.php'},
        success:function (data) {
            if(data ==1)
            {
                alert("Deleted Successfully");
                window.location="member_list.php";
            }
        }
    });
}
});


$("#template_type").change(function () {
   var template_type=$("#template_type option:selected").val();
  // $.ajax({
  //     url:'fetch_template_option.php',
  //     type:'post',
  //     async:false,
  //     cache:false,
  //     data:{template_type:template_type},
  //     success:function (data) {
  //         $("#template_id").html('');
  //         $("#template_id").html(data);
  //     }
  // })
});

$('input[type=radio][name=type]').change(function() {
    var ctr=$('input[type=radio][name=type]:checked').val();

    if (ctr == 'Text') {
        $(".text_msg").show();
        $(".file_msg").hide();
    }
    else {
        $(".text_msg").hide();
        $(".file_msg").show();
    }
    var msg_type=$('input[type="radio"][name="type"]:checked').val();
    if(msg_type == 'S') {
        $("#template_text").find('.Voice').hide();
        $("#template_text").find('.Image').hide();
        $("#template_text").find('.Text').show();
        $("#template_text").find('.custom_mess').show();
        $("#template_type").parent().children().eq(1).children().children().eq(1).show();
        $("#template_type").parent().children().eq(1).children().children().eq(2).hide();
        $("#template_type").parent().children().eq(1).children().children().eq(3).hide();

        $(".text_custom").show();
        $(".voice_custom").hide();
        $(".whatsapp_custom").hide();

    }
    else if(msg_type =='W')
    {
        $("#template_text").find('.Voice').hide();
        $("#template_text").find('.Text').show();
        $("#template_text").find('.Image').show();
        $("#template_text").find('.custom_mess').show();
        $("#template_type").parent().children().eq(1).children().children().eq(1).show();
        $("#template_type").parent().children().eq(1).children().children().eq(2).hide();
        $("#template_type").parent().children().eq(1).children().children().eq(3).show();
        $(".text_custom").hide();
        $(".voice_custom").hide();
        $(".whatsapp_custom").show();
    }
    else
    {
        $("#template_text").find('.Voice').show();
        $("#template_text").find('.Text').hide();
        $("#template_text").find('.Image').hide();
        $("#template_text").find('.custom_mess').hide();
        $("#template_type").parent().children().eq(1).children().children().eq(1).hide();
        $("#template_type").parent().children().eq(1).children().children().eq(2).show();
        $("#template_type").parent().children().eq(1).children().children().eq(3).hide();
        $(".text_custom").hide();
        $(".voice_custom").show();
        $(".whatsapp_custom").hide();
    }
    $("#template_type").val('');
    $("#template_type").trigger('change');

});

$("#template_type").change(function () {
    if($(this).val() == 'Text')
    {
        $(".template_text").show();
        $(".template_voice").hide();
        $(".template_image").hide();
    }
    else if($(this).val() == 'Image'){
        $(".template_text").hide();
        $(".template_voice").hide();
        $(".template_image").show();
        $(".template_image").show();
    }
    else if($(this).val() == 'Voice')
    {
        $(".template_text").hide();
        $(".template_voice").show();
        $(".template_image").hide();
    }
    else {
        $(".template_text").hide();
        $(".template_voice").hide();
        $(".template_image").hide();
    }
});

    $("#template_text").change(function () {
        if($(this).val() == 'N')
        {
            // $(".template_area").hide();
            $(".custom_message").show();
        }
        else {
            // $(".template_area").show();
            $(".custom_message").hide();
        }
    });

    $("#contact_type").change(function () {
        if($(this).val() == 'Group')
        {
            $(".group_area").show();
            $(".excel_area").hide();
            $(".custom_number").hide();
						$(".dma_area").hide();

        }
        else if($(this).val() == 'Excel')
        {
            $(".group_area").hide();
            $(".excel_area").show();
            $(".custom_number").hide();
						$(".dma_area").hide();

        }
        else if($(this).val() == 'Custom')
        {
            $(".group_area").hide();
            $(".excel_area").hide();
            $(".custom_number").show();
						$(".dma_area").hide();

        }
		else if($(this).val() == 'DMA')
        {
            $(".group_area").hide();
            $(".excel_area").hide();
            $(".custom_number").hide();
            $(".dma_area").show();
        }
        else {
            $(".group_area").hide();
            $(".excel_area").hide();
            $(".custom_number").hide();
			$(".dma_area").hide();

        }
    });

    $("#whatsapp_type").change(function(){
       if($(this).val() =='')
       {
           $(".voice_custom").hide();
           $(".text_custom").hide();
       }
       else if($(this).val() == 'Text'){
           $(".voice_custom").hide();
           $(".text_custom").show();
       }
       else {
           $(".voice_custom").show();
           $(".text_custom").hide();
       }
    });

    $("#schedule_sms").change(function () {
        if ($(this).prop('checked') == true)
        {
            $(".date_time").show();
        }
        else {
            $(".date_time").hide();
            var dt=$("#old_date").val();
            $("#date").val(dt);

            var tt=$("#old_time").val();
            $("#time").val(tt);

        }
    });
  $("#data").change(function(){
	  $.ajax({
            url:"fetch_number.php",
            type:"POST",
			data:{sb:$("#searchby").val(),area:$("#area").val(),emp_type:$("#emp_type").val(),data:$("#data").val(),utility:$("#utility").val()},
			success:function(data){
					
$("#custom_dma").html('');
$("#custom_dma").html(data);
				}
			
			});
       
       
    });
  