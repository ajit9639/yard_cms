<div class="footer"></div>
<!-- Jquery Core Js -->
<script src="plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap Core Js -->
<script src="plugins/bootstrap/js/bootstrap.js"></script>

<!-- Select Plugin Js -->
<!--<script src="plugins/bootstrap-select/js/bootstrap-select.js"></script>-->

<!-- Slimscroll Plugin Js -->
<script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

<!-- Jquery Validation Plugin Css -->
<script src="plugins/jquery-validation/jquery.validate.js"></script>

<!-- JQuery Steps Plugin Js -->
<script src="plugins/jquery-steps/jquery.steps.js"></script>

<!-- Sweet Alert Plugin Js -->
<script src="plugins/sweetalert/sweetalert.min.js"></script>
<!-- Waves Effect Plugin Js -->
<script src="plugins/node-waves/waves.js"></script>

<!-- Autosize Plugin Js -->
<script src="plugins/autosize/autosize.js"></script>

<!-- Moment Plugin Js -->
<script src="plugins/momentjs/moment.js"></script>

<!-- Bootstrap Material Datetime Picker Plugin Js -->
<!--<script src="plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>-->

<!-- Bootstrap Datepicker Plugin Js -->
<script src="plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>

<!-- Jquery CountTo Plugin Js -->
<script src="plugins/jquery-countto/jquery.countTo.js"></script>

<!-- Morris Plugin Js -->
<script src="plugins/raphael/raphael.min.js"></script>
<script src="plugins/morrisjs/morris.js"></script>
<script src="plugins/multi-select/js/jquery.multi-select.js"></script>

<!-- ChartJs -->

<!-- Flot Charts Plugin Js -->
<!--<script src="plugins/flot-charts/jquery.flot.js"></script>-->
<!--<script src="plugins/flot-charts/jquery.flot.resize.js"></script>-->
<!--<script src="plugins/flot-charts/jquery.flot.pie.js"></script>-->
<!--<script src="plugins/flot-charts/jquery.flot.categories.js"></script>-->
<!--<script src="plugins/flot-charts/jquery.flot.time.js"></script>-->

<!-- Sparkline Chart Plugin Js -->
<script src="plugins/jquery-sparkline/jquery.sparkline.js"></script>
<script src="js/bootstrap-datetimepicker.min.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
<!-- Custom Js -->
<script src="js/admin.js"></script>


<!-- Demo Js -->
<script src="js/demo.js"></script>
<script src="js/custom.js"></script>
<script src="js/dropzone.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
        setTimeout(function(){
        $("#challan_number").focus();
        $("#vehicle").trigger('change');
        },100);
    });
</script>

<script type="text/javascript">
$(document).ready(function () {
    $(".datepicker").datepicker({
        format:'dd/mm/yyyy',
        autoclose:true
    });
    $(".pay_now").click(function () {
        var id=$(this).data('id');
        $.ajax({
            url:'get_data.php',
            type:'get',
            async:false,
            cache:false,
            data:{id:id},
            success:function (data) {
                var dt=JSON.parse(data);
                $("#id").val(dt['id']);
                $("#txn_type").val(dt['txn_type']);
                $("#party").val(dt['party_id']);
                $("#account").val(dt['account_id']);
                $("#amount").val(dt['amt']);
                $("#remarks").val(dt['remarks']);
                $("#amount").focus();
                $("#remarks").focus();
            }
        });
    });
   $("#party").change(function () {
      var mines=$(this).val();
      $.ajax({
         url:'get_permit.php',
         type:'get',
         async:false,
         cache:false,
         data:{mines_id:mines},
         success:function (data) {
             $("#permit option[value != '']").remove();
             $("#permit").append(data);
         }
      });
   });

    $("#challan").change(function () {
        var mines=$(this).val();
        $.ajax({
            url:'get_permit_data.php',
            type:'get',
            async:false,
            cache:false,
            data:{permit_id:mines},
            success:function (data) {
                dt=JSON.parse(data);
            $("#material_name").val(dt['material_name']);
            }
        });
    });

    $("#vehicle_no").change(function () {
        var vehicle_no=$(this).val();
        $.ajax({
            url:'get_vehicle_id.php',
            type:'get',
            async:false,
            cache:false,
            data:{vehicle:vehicle_no},
            success:function (data) {
               if(data == 'INVALID')
               {
                   alert("Vehicle Not in Database Please Add");
                   $("#vehicle").val('');
                   $("#vehicle").trigger('change');
               }
               else {
                   $("#vehicle").val(data);
                   $("#vehicle").trigger('change');
               }
            }
        });
    });



    $("#vehicle").change(function () {
        var vehicle=$(this).val();
        $(".form-line").addClass('focused');
        if(vehicle == '') {
            $("#owner_name").val('').attr('readonly', false);
            $("#mobile_number").val('').attr('readonly', false);
            $("#chassis_number").val('').attr('readonly', false);
            $("#matao_no").val('').attr('readonly', false);
            $("#company").val('').attr('readonly', false);
            $("#on_account").val('').attr('readonly', false);
            $("#vehicle_no").val('');
        }
        else {
            $.ajax({
                url: 'get_vehicle_details.php',
                type: 'get',
                async: false,
                cache: false,
                data: {vehicle_id: vehicle},
                success: function (data) {
                    if (data == 'INVALID') {
                        alert("Documents assigned to VEHICLE is expired Please check");
                        $("#vehicle").val('');
                    } else {
                        var dt = JSON.parse(data);
                        $("#owner_name").val(dt['owner_name']).attr('readonly', true);
                        $("#mobile_number").val(dt['owner_mobile']).attr('readonly', true);
                        $("#chassis_number").val(dt['chassis_no']).attr('readonly', true);
                        $("#matao_no").val(dt['matao_no']).attr('readonly', true);
                        $("#company").val(dt['company']).attr('readonly', true);
                        $("#on_account").val(dt['on_account']).attr('readonly', true);
                        $("#vehicle_no").val(dt['vehicle_no']);
                    }
                }
            });
        }
    });


 $("#material_name").change(function(){
    var grade=$("#material_name option:selected").data('value');
    $("#grade").val(grade);
 });

 $("#rate,#gross_wt,#tare_wt").keyup(function(){
    var rate=$("#rate").val();
    var gross_wt=$("#gross_wt").val();
    var tare=$("#tare_wt").val();
    var net_wt=parseFloat(gross_wt)-parseFloat(tare);
    if(isNaN(net_wt))
    {
        net_wt=0;
    }
    $("#net_wt").val(net_wt);
    if(isNaN(rate))
    {
        rate=0;
    }
    var freight=(parseFloat(rate)*parseFloat(net_wt));
     if(isNaN(freight))
     {
         freight=0;
     }
    $("#total_freight").val(freight);
 });

    $("#material_name").change(function () {
        if($(this).val()=='addNewMaterial')
        {
            $(".material_area").show();
        }

        else {
            $(".material_area").hide();
        }
    });
    $("#permit").change(function () {
        if($(this).val()=='addNewPermit')
        {
            $(".new_permit_area").show();
        }

        else {
            $(".new_permit_area").hide();
            var id=$("#permit option:selected").val();

            var rate=$("#permit option:selected").data('rate');
            $("#transportation_rate").val(rate);

            $.ajax({
                url:'get_permit_data.php',
                type:'get',
                async:false,
                cache:false,
                data:{permit_id:id},
                success:function (data) {
                    var dt=JSON.parse(data);
                        $("#party").val(dt['mines']);
                        $("#buyer").val(dt['buyer']);
                        $("#material_name").val(dt['material_name']);
                        $("#grade").val(dt['grade']);
                        $("#rate").val(dt['rate']);
                        // $("#rate").val(dt['rate']);

                    // $("#permit option[value != '']").remove();
                    // $("#permit").append(data);
                }
            });
        }
    });
    $("#buyer").change(function () {
        if($(this).val()=='addNewDestination')
        {
            $(".new_destination_area").show();
        }

        else {
            $(".new_destination_area").hide();
        }
    });
  $("#party").change(function () {
        if($(this).val()=='addNewParty')
        {
            $(".new_party_area").show();
        }

        else {
            $(".new_party_area").hide();
        }
    });

 $("#vehicle").change(function () {
    if($(this).val()=='addNewVehicle')
    {
        $(".new_vehicle_area").show();
    }

    else {
        $(".new_vehicle_area").hide();
    }
 });
});
</script>
<script src="js/pages/tables/jquery-datatable.js"></script>
<!--<script src="js/pages/index.js"></script>-->
<script src="js/pages/forms/basic-form-elements.js"></script>
<script src="js/pages/forms/advanced-form-elements.js"></script>

<script src="js/pages/forms/form-validation.js"></script>


<!-- Jquery DataTable Plugin Js -->
<script src="plugins/jquery-datatable/jquery.dataTables.js"></script>
<script src="plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
<script src="plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
<script src="plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
<script src="plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
<script src="plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
<script src="plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
<script src="plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
<script src="plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>
<script src="js/bootstrap-material-datetimepicker.js"></script>

