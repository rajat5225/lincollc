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
            <div class="portal-body extra-pad">
                <div class="container">
					<div class="text-right">
				 <div class="d-flex">
                     <a href="<?= base_url('employee-portal/training-tracker') ?>" class="btn create mr-2">Back</a>
				</div>
				</div>
                    <form id="employee_form" onsubmit="add_employee();return false;">
                        <div class="text-center">
                            <h3 class="mb-5">Back</small></a>Manage Employee Information</h3>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <input type="hidden" name="id" value="<?=isset($data['id'])?$data['id']:""?>"/>
                                <label for="employee-name">Employee Name</label>
                                <input type="text" required class="form-control" id="employee-name" name="name" value="<?=isset($data['name'])?$data['name']:""?>" placeholder="i.e John Doe">
                            </div>
                            <div class="form-group col-md-4">
                                <div class="date text-left">
                                    <div class="wrapper">
                                        <label for="datepicker" class="p-0 w-100 text-left">
                                            <span class="d-block">Hire Date:</span>
                                            <input required type="text" class="datepicker d-block form-control" name="date"
                                                autocomplete="off" id="dob" value="<?=isset($data['date'])?$data['date']:""?>" placeholder="i.e 17.10.1994">
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="orientation">Orientation</label>
                                <input type="text" required class="form-control" name="orientation" value="<?=isset($data['orientation'])?$data['orientation']:""?>" id="orientation" placeholder="i.e 123- 456–7890">
                            </div>
                        </div>
                        <div class="text-right w-100 form-group mt-2">
                            <button type="submit" class="btn">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <?php $this->load->view('common/footer'); ?>

    </div>
<?php $this->load->view('common/end'); ?>
<script>
 init_date();
         function init_date() {
            $( ".datepicker" ).datepicker({ dateFormat: 'dd.mm.yy' });
        };
        function add_employee(){
        var obj =  $('#employee_form button');
        var btn = obj.html();
        $.ajax({
			url: "<?=base_url()?>site/add_employee",
			method: "POST",
			data: $('#employee_form').serialize(),
			dataType: 'json',
			beforeSend: function () {
				obj.html('Sending...');
				obj.attr('disabled', 'disabled');
			},
			success: function (data) {
				obj.html(btn);
				obj.removeAttr('disabled');
				if (data.error == 1) {
					$('#employee_form')[0].reset();
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
	$('.employee_portal_link').addClass('active')
</script>
</body>
</html>