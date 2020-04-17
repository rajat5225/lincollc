<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('common/style') ?>
</head>

<body>

    <div class="contains-everything">

        <div class="overlay"></div>

       <?php $this->load->view('common/header') ?>

        <div class="careers py-5">
            <div class="container">
				<div class="app-portal" style="min-height: auto">
				<div class="text-right">
				 <div class="d-flex">
                     <a href="<?= base_url('employee-portal/project-tracker') ?>" class="btn create mr-2">Back</a>
				</div>
				</div>
				</div>
                <h1 class="title pt-5 mb-5">Project Tracker </h1>
                    <div class="col-md-12">
                        <div class="wrap">
                            <form id="project" onSubmit="add_project();return false;">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="name">Project Name:</label>
										<input name="id" type="hidden" value="<?=isset($data['id'])?$data['id']:""?>"/>
                                        <input type="text" value="<?=isset($data['name'])?$data['name']:""?>" required class="form-control" id="name" name="name" placeholder="i.e John Doe">
                                    </div>
									<div class="form-group col-md-6">
                                        <label for="name">Address:</label>
                                        <input type="text" required class="form-control" id="address"
											    name="address" value="<?php $key = "address"; ?><?=isset($data[$key])?$data[$key]:""?>" placeholder="i.e Address">
                                    </div>
									<div class="form-group col-md-6">
                                        <label for="name">Hotel Address:</label>
                                        <input type="text" value="<?php $key = "hoteladdress"; ?><?=isset($data[$key])?$data[$key]:""?>" required class="form-control" id="hoteladdress" name="hoteladdress" placeholder="i.e Hotel Address">
                                    </div>
									<div class="form-group col-md-6">
                                        <label for="name">Hospital Address:</label>
                                        <input type="text" value="<?php $key = "hospitaladdress"; ?><?=isset($data[$key])?$data[$key]:""?>" required class="form-control" id="hospitaladdress" name="hospitaladdress" placeholder="i.e Hospital Address">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <div class="date text-left">
                                            <div class="wrapper">
                                                <label for="datepicker" class="p-0">
                                                    <span class="d-block">Project Start Date:</span>
                                                    <input value="<?php $key = "projectstart"; ?><?=isset($data[$key])?$data[$key]:""?>" required type="text" name="projectstart" class="datepicker d-block form-control"                                                         autocomplete="off" id="projectstart" placeholder="i.e 10/17/1994">
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <div class="date text-left">
                                            <div class="wrapper">
                                                <label for="datepicker" class="p-0">
                                                    <span class="d-block">Project End Date:</span>
                                                    <input value="<?php $key = "projectend"; ?><?=isset($data[$key])?$data[$key]:""?>" required type="text" name="projectend" class=" datepicker d-block form-control"
                                                        autocomplete="off" id="projectend" placeholder="i.e 10/17/1994">
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								  <div class="text-center">
                                    <h3 class="my-5">Service Providers</h3>
                                </div>
								<div class="d-none add_task_div">
								 <div class="form-row">
									 <hr class="w-100">
                                    <div class="form-group col-md-6">
                                        <label for="name">Service Provider:</label>
                                        <input type="text" name="serviceprovide[]" class="form-control"  placeholder="i.e John Doe">
                                    </div>
									 <div class="form-group col-md-6">
                                        <label for="name">Number:</label>
                                        <input type="text" name="serviceNumber[]" class="form-control txtnumber2"  placeholder="i.e 999.9999.99999">
                                    </div>
									 <div class="form-group col-md-6">
                                        <label for="name">Contact Person:</label>
                                        <input type="text" name="contactperson[]" class="form-control"  placeholder="i.e John Doe">
                                    </div>
									 <div class="form-group col-md-6">
                                        <label for="name">Address:</label>
                                        <input type="text" name="address[]" class="form-control"  placeholder="i.e John Doe">
                                    </div>
									<div class="w-100 text-right"><span style="cursor: pointer" onClick="$(this).parent('div').parent('div').remove()" >- Remove</span></div> 
                                </div>   
								</div>
								<div class="all-tasks">
								<?php $id = isset($data['id'])?$data['id']:""; if(!empty($id)){ $res = $this->db->where('project',$id)->get('vendor')->result_array();
								if(!empty($res[0])){ $flag= true;	foreach($res as $task){ ?>
									<div class="form-row">
                                     <div class="form-group col-md-6">
                                        <label for="name">Service Provider:</label>
                                        <input type="text" name="serviceprovide[]" value="<?=$task['serviceprovide']?>" class="form-control"  placeholder="i.e John Doe">
                                    </div>
									 <div class="form-group col-md-6">
                                        <label for="name">Number:</label>
                                        <input type="text" name="serviceNumber[]" value="<?=$task['serviceNumber']?>" class="form-control txtnumber2"  placeholder="i.e 999.9999.99999">
                                    </div>
									 <div class="form-group col-md-6">
                                        <label for="name">Contact Person:</label>
                                        <input type="text" name="contactperson[]" value="<?=$task['contactperson']?>" class="form-control"  placeholder="i.e John Doe">
                                    </div>
									 <div class="form-group col-md-6">
                                        <label for="name">Address:</label>
                                        <input type="text" name="address[]" value="<?=$task['address']?>" class="form-control"  placeholder="i.e John Doe">
                                    </div>
									<?php if(!$flag){	?>
									<div class="w-100 text-right"><span style="cursor: pointer" onClick="$(this).parent('div').parent('div').remove()" >- Remove</span></div> 
									<?php } $flag = false;?>
									 </div>	
									<?php  }}else{ ?>
									<div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="name">Service Provider:</label>
                                        <input type="text" name="serviceprovide[]" class="form-control"  placeholder="i.e John Doe">
                                    </div>
									 <div class="form-group col-md-6">
                                        <label for="name">Number:</label>
                                        <input type="text" name="serviceNumber[]" class="form-control txtnumber2"  placeholder="i.e 999.9999.99999">
                                    </div>
									 <div class="form-group col-md-6">
                                        <label for="name">Contact Person:</label>
                                        <input type="text" name="contactperson[]" class="form-control"  placeholder="i.e John Doe">
                                    </div>
									 <div class="form-group col-md-6">
                                        <label for="name">Address:</label>
                                        <input type="text" name="address[]" class="form-control"  placeholder="i.e John Doe">
                                    </div>
                                </div>
									<?php } }else{ ?>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="name">Service Provider:</label>
                                        <input type="text" name="serviceprovide[]" class="form-control"  placeholder="i.e John Doe">
                                    </div>
									 <div class="form-group col-md-6">
                                        <label for="name">Number:</label>
                                        <input type="text" name="serviceNumber[]" class="form-control txtnumber2"  placeholder="i.e 999.9999.99999">
                                    </div>
									 <div class="form-group col-md-6">
                                        <label for="name">Contact Person:</label>
                                        <input type="text" name="contactperson[]" class="form-control"  placeholder="i.e John Doe">
                                    </div>
									 <div class="form-group col-md-6">
                                        <label for="name">Address:</label>
                                        <input type="text" name="address[]" class="form-control"  placeholder="i.e John Doe">
                                    </div>
                                </div>   
									<?php } ?>
									
								</div>	   
								<div class="w-100"> <a href="javascript:$('.all-tasks').append($('.add_task_div').html());make_required()">+ add task</a></div>
                                <div class="text-right w-100 form-group mt-2">
                                    <button type="submit" class="btn px-4 submit">Update Project</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

       <?php $this->load->view('common/footer'); ?>

    </div>
<?php $this->load->view('common/end'); ?>
<script>
	// Datepicker 
	$( 'select' ).selectpicker();
	$( document ).on( 'focus', ".datepicker_recurring_start", function () {
		$( this ).datepicker( {
			dateFormat: "mm/dd/yy",
			duration: "fast",
			changeYear: true,
			changeMonth: true,
			yearRange: "2019:2020"
		} );
	} );
    init_date();
	 make_required();
	function make_required(){
		$('.all-tasks .form-row:last-child input').attr('required',true);
	}
	function init_date() {
		$( ".datepicker" ).datepicker( {
			dateFormat: "mm/dd/yy",
			duration: "fast",
			changeYear: true,
			yearRange: "2019:2020"
		} );
	}
	function add_project(){
			var btn = $('#project button');
			var html = btn.html();
			var data = $('#project').serialize();
			btn.html("Processing");
			$.ajax({
				type: 'POST',
				url: '<?=base_url('site/create_project_process')?>',
				data: data,
				dataType: "json",
				success: function (data) {
					btn.html(html);
					if (data.error == 1) {
						alertit("Operation done", 'success')
						setTimeout(function(){
							window.location.href=window.base_url+"employee-portal/project-tracker"
						},2000);
					} else {
						alertit(data.msg, 'danger')
					}
				}
			});
		}
	$(document).on('keydown','.txtnumber2',function (e) {
            var key = e.charCode || e.keyCode || 0;
            $text = $(this); 
			 if(typeof $(this).attr('maxlength')=="undefined"){
			$(this).attr('maxlength',12);
			}	
            if (key !== 8 && key !== 9) {
                if ($text.val().length === 3) {
                    $text.val($text.val() + '.');
                }
                if ($text.val().length === 7) {
                    $text.val($text.val() + '.');
                }
				if($text.val().length > 7&&$text.val().indexOf('.')==-1){
					var str = $text.val();
					var final_str = "";
					for(var i =0;i<str.length;i++){
						final_str+= str[i];
						if(i==3||i==7){
						final_str+=".";
						}
					}
				}
            }
            return (key == 8 || key == 9 || key == 46 || (key >= 48 && key <= 57) || (key >= 96 && key <= 105));
        })  
	$('.employee_portal_link').addClass('active')
</script>

</body>

</html>