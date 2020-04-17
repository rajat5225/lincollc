<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('common/style') ?>
</head>
<body>

    <div class="contains-everything">

        <div class="overlay"></div>

        <?php $this->load->view('common/header') ?>

        <div class="app-portal">
            <div class="portal-body p-3 p-md-5 my-5">
                <div class="container-fluid">
			  <div class="text-right">
				 <div class="d-flex">
                     <a href="<?= base_url('employee-portal') ?>" class="btn create mr-2">Back</a>
				</div>
				</div>
					<?php if ( $this->input->cookie( 'Login' ) == "true" ) { ?>
					<div class="wrapper mb-5">
                        <div class="wrap">
                            <a href="<?=base_url('employee-portal/manage-employee')?>">
                                <i class="fas fa-users"></i>
                                <p class="pt-4">Add Employees</p>                          
                            </a>  
                        </div>
                        <div class="wrap">
                            <a href="<?=base_url('employee-portal/manage-course')?>">
                                <i class="fas fa-book"></i>
                                <p class="pt-4">Add Courses</p>
                            </a>
                        </div>
                    </div>
					<?php } ?>
                    <div class="training-box">
                        <div class="wrapped">
                            <div class="wrapped-header d-flex py-3 px-5 justify-content-between align-items-center">
                                <h4>Training</h4>
                            </div>
                            <div class="wrapped-body">
                                <div class="wrap">         
                                    <div class="table-responsive">
                                        <table class="table text-center filterable equipment">
                                            <thead>
                                                <tr>
													<?php if ( $this->input->cookie( 'Login' ) == "true" ) { ?>
													<th scope="col">Edit</th>
													<th scope="col">Delete</th>
													<?php } ?>
                                                    <th scope="col">Employee name</th>
                                                    <th scope="col">Hire date</th>
                                                    <th scope="col">orientation</th>
                                                    <?php  $this->db->where('year',(isset($year)&&!empty($year)?$year:date('Y')));$res_course = $this->db->where('status','a')->get('course')->result_array(); if(!empty($res_course)){
	                                                 foreach($res_course as $course){ ?>
                                                    <th scope="col"><?=$course['name']?></th>
                                                    <?php } } ?>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php  $res = $this->db->where('status','a')->order_by('name')->get('employee')->result_array(); if(!empty($res)){foreach($res as $team){ ?>
                                                <tr>
												<?php if ( $this->input->cookie( 'Login' ) == "true" ) { ?>	
                                                <td><a href="<?=base_url('employee-portal/manage-employee/'.$team['id'])?>" class="btn"><i class="fas fa-pen-square"></i></a></td>
													<td><button onClick="remove_employee('<?=$team['id']?>',$(this))" class="btn"><i class="fas fa-trash"></i></button></td>
												<?php } ?>	
                                                    <td><?=$team['name']?></td>
                                                    <td class="dont-break"><?=$team['date']?></td>
                                                    <td class="dont-break"><?=$team['orientation']?></td>
													
                                                    <?php if(!empty($res_course)){foreach($res_course as $course){  
	                                                $year = (isset($year)&&!empty($year)?$year:date('Y'));
	                                                $this->db->where('year',$year);
												    $cert = $this->db->where('course_id',$course['id'])->where('team_id',$team['id'])->get('certificates')->row_array();
													?>
													<?php if ( $this->input->cookie( 'Login' ) != "true" ) { ?>
                                                    <td scope="col"><?=isset($cert['image'])&&file_exists($cert['image'])?"<a href='".base_url($cert['image'])."'>View Certificate</a>":(isset($cert['status'])?$cert['status']:"NA")?></td>
                                                    <?php }else{ ?>
													<td scope="col">
													<select data-status="<?=$cert['status']?>" id="t<?=$team['id']?>c<?=$course['id']?>" data-image="<?=$cert['image']?>" data-teamid="<?=$team['id']?>"
																			data-courseid="<?=$course['id']?>" onChange="change_cert($(this))">
														<option <?=isset($cert['status'])&&$cert['status']=="Completed"?"selected":""?> value="Completed">Completed</option>
														<?php if(isset($cert['image'])&&!empty($cert['image'])){ ?>
														<option value="Change">Change Certifcate</option>
														<option value="View">View</option>
														<?php } ?>
														<option <?=isset($cert['status'])&&$cert['status']=="Not Required"?"selected":""?> value="Not Required">Not Required</option>
														<option <?=isset($cert['status'])&&$cert['status']=="Terminate/Quite"?"selected":""?> value="Terminate/Quite">Terminate/Quite</option>
														<option <?=isset($cert['status'])&&$cert['status']=="Re-training Due"?"selected":""?> value="Re-training Due">Re-training Due</option>
														<option <?=(isset($cert['status'])&&$cert['status']=="NA"||empty($cert['status']))?"selected":""?> value="NA">NA</option>
														</select></td>
													<?php } } } ?>
                                                </tr>
                                            <?php } }?>
                                            </tbody>
                                        </table>
                                    </div>                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<input type="file" class="d-none" onChange="upload_certificate($(this))" id="file"/>
        <?php $this->load->view('common/footer'); ?>

    </div>
<?php $this->load->view('common/end'); ?>
<script>
	$('select').selectpicker();
	function sendfile(data,obj) {
	return new Promise((resolve,reject)=>{
	$.ajax({
		type: 'POST',
		url: '<?=base_url('site/upload_certificate')?>',
		data: data,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function (data) {
			if (data.error == "1") {
				resolve(true);
			} else {
				reject(false);
			}
		}
	});
	})	
}
 function remove_employee(id,obj){
	 if(confirm('Are you sure you want to delete this employee ?')){
		 $.ajax({
			url: "<?=base_url()?>site/delete_employee",
			method: "POST",
			data:{id:id},
			dataType: 'json',
			success: function (data) {
				if (data.error == 1) {
					window.location.reload();
				} else {
					alertit(data.msg, 'danger');
				}
			}
        });	
		}
	}	
   async function upload_certificate(obj){
		var fi = document.getElementById('file');
		if (fi.files.length > 0) {
		for (var i = 0; i <= (fi.files.length - 1); i++) {
			var fsize = fi.files.item(i).size;
			var file = Math.round((fsize / 1024));
			if (file > (1024 * 50)) {
				alertit("File size should be smaller than 50MB", 'danger');
			} else {
				var data = new FormData();
				data.append('file', fi.files[i]);
				data.append('user_id', obj.attr('data-teamid'));
				data.append('course', obj.attr('data-courseid'));
				data.append('status', 'Completed');
				window.error=await sendfile(data,obj);
				$('#file').val('');
				$('#file').attr('data-teamid','');			
		        $('#file').attr('data-courseid','');
			}
		}
		if(window.error){
		alertit((fi.files.length==1?"File":"Files")+' uploaded successfully','success');
		setTimeout(function(){
			window.location.reload();
		},2000);	
		}else{
		alertit('Some files cannot be uploaded','danger');
		}
	} else {
		$("#t"+$('#file').attr('data-teamid')+"c"+$('#file').attr('data-courseid')).val($("#t"+$('#file').attr('data-teamid')+"c"+$('#file').attr('data-courseid')).attr('data-status'));
		$('#file').attr('data-teamid','');		
		$('#file').val('');
		$('#file').attr('data-courseid','');
		alertit('Seems the file you are trying to upload is not valid', 'danger')
	}
	}
	async function change_cert(obj){
		if(obj.val()=="Change"||obj.val()=="Completed"){
			$('#file').trigger('click');
			$('#file').attr('data-teamid',obj.attr('data-teamid'));			
			$('#file').attr('data-courseid',obj.attr('data-courseid'));			
		}
		else if(obj.val()=="View"&&obj.attr('data-image')!=""){
			window.open(window.base_url+obj.attr('data-image'));
		}else{
			    var data = new FormData();
				data.append('user_id', obj.attr('data-teamid'));
				data.append('course', obj.attr('data-courseid'));
				data.append('status', obj.val());
				window.error=await sendfile(data,obj);
			    if(window.error){
					alertit('Status Updated','success');
				}else{
					alertit('Status Cannot be Updated, Please try after some time');
				}
		}
	}
	$('.employee_portal_link').addClass('active')
</script>
</body>
</html>