<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('common/style') ?>
</head>
<body>
<style>
.button-margin{
    margin-top:2.5rem!important 
}
</style>
    <div class="contains-everything">

        <div class="overlay"></div>

        <?php $this->load->view('common/header') ?>

        <div class="app-portal">
            <div class="portal-body extra-pad">
                <div class="container">
				<div class="text-right">
				 <div class="d-flex">
                     <a href="<?= base_url('employee-portal/training-tracker') ?>" class="btn create mr-2">Back</a>
				</div>
				</div>	
                <div class="d-none" id="hidden-add-course">
                            <div class="form-row">
                            <div class="form-group col-md-4 col-10">
                                <input type="hidden" name="id[]" value=""/>
                                <label for="employee-name">Course name</label>
                                <input type="text" required class="form-control" id="employee-name" name="name[]"  placeholder="i.e John Doe">
                            </div>
                            <div class="form-group col-2">
                            <button type="button" onClick="$(this).parent('div').parent('div').remove()" class="btn btn-danger button-margin mt-md-4"><i class="fas fa-trash"></i></button></div>
                            </div>
                 </div>
                    <form id="course_form" onsubmit="add_course();return false;">
                        <div class="text-center">
                            <h3 class="mb-5">Manage Courses</h3>
                        </div>
                        <div class="parent-row">
                            <?php $flag = false; if(isset($data)&&!empty($data)){ foreach($data as $course){ $flag = true; ?>
                            <div class="form-row">
                            <div class="form-group col-md-4 col-10">
                                <input type="hidden" name="id[]" value="<?=isset($course['id'])?$course['id']:""?>"/>
                                <label for="employee-name">Course name</label>
                                <input type="text" required class="form-control" id="employee-name" name="name[]" value="<?=isset($course['name'])?$course['name']:""?>" placeholder="i.e John Doe">
                            </div>
                            <div class="form-group col-2">
                            <button type="button" onClick="remove_course('<?=$course['id']?>');$(this).parent('div').parent('div').remove()" class="btn btn-danger button-margin mt-md-4"><i class="fas fa-trash"></i></button></div>
                            </div>
                            <?php }} ?>
                          
                            <div class="form-row">
                            <div class="form-group col-md-4 col-12">
                                <input type="hidden" name="id[]" value=""/>
                                <label for="employee-name">Course name</label>
                                <input type="text" required class="form-control" id="employee-name" name="name[]"  placeholder="i.e John Doe">
                            </div>
                            <?php if($flag){ ?>
                            <div class="form-group col-2">
                            <button type="button" onClick="$(this).parent('div').parent('div').remove()" class="btn btn-danger button-margin mt-md-4"><i class="fas fa-trash"></i></button></div>
                            <?php } ?>
							 </div>	
                        </div>
                        <div class="form-row">
                        <div class="form-group">
                        <button type="button" class="btn submit application-btn " onclick="$('.parent-row').append($('#hidden-add-course').html())">Add Another Course</button>
                        </div>
                        </div>
                        <div class="text-right w-100 form-group mt-2">
                            <button type="submit" id="submit_add_course" class="btn">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <?php $this->load->view('common/footer'); ?>

    </div>
<?php $this->load->view('common/end'); ?>
<script>
	    function remove_course(id){
		 $.ajax({
			url: "<?=base_url()?>site/delete_course",
			method: "POST",
			data:{id:id},
			dataType: 'json',
			success: function (data) {
				if (data.error == 1) {
					
				} else {
					alertit(data.msg, 'danger');
				}
			}
        });	
		}
        function add_course(){
        var obj =  $('#submit_add_course');
        var btn = obj.html();
        $.ajax({
			url: "<?=base_url()?>site/add_course",
			method: "POST",
			data: $('#course_form').serialize(),
			dataType: 'json',
			beforeSend: function () {
				obj.html('Sending...');
				obj.attr('disabled', 'disabled');
			},
			success: function (data) {
				obj.html(btn);
				obj.removeAttr('disabled');
				if (data.error == 1) {
					$('#course_form')[0].reset();
                    alertit(data.msg, 'success');
                    setTimeout(() => {
                       window.location.href="<?=base_url("employee-portal/training-tracker")?>" 
                    }, 2000);
				} else {
					alertit(data.msg, 'danger');
				}
			}
        });
    }
</script>
</body>
</html>