<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('common/style') ?>
</head>
<body>

    <div class="contains-everything">

        <div class="overlay"></div>

        <?php $this->load->view('common/header') ?>

        <div class="bg-img"><img src="<?=base_url()?>assets/images/contact-2.jpg" alt="Contact"></div>
        
        <div class="contact py-5">
            <div class="container">
                <div class="wrap py-5 text-center">
                    <h1 class="pb-4">Contact Us</h1>
                    <h4>(251)-621-8289</h4>
                    <p class="pt-3 pb-5">PO Box 7559, Spanish Fort, AL 36577</p>
                    <a href="tel:+1 251-621-8289" class="btn mb-3"><img src="<?=base_url()?>assets/images/icons/call.png" alt="call now"> Call Now</a>
                </div>
                <div class="contact-form py-5">
                    <h2 class="text-center pt-3">or fill out this form, we'll quickly get back to you.</h2>
                    <form id="contact_us" onSubmit="submit_form();return false;">
                        
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="name">Full Name: *</label>
                                <input required name="name" type="text" class="form-control" id="name" placeholder="i.e John Doe">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="organization">Organization:</label>
                                <input type="text"  required name="organization" class="form-control" id="name" placeholder="Organization Name">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="phone">Telephone: *</label>
                                <input type="text" maxlenght="12"  required name="phone" class="form-control txtnumber" id="phone" placeholder="i.e 251.621.5555">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="Email">Email: *</label>
                                <input type="text" required name="email" class="form-control" id="name" placeholder="Email Address">
                            </div>
                        </div>
						<div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="contact_reason">How can we help? *</label>
                               <textarea  required name="message" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12 text-center py-2">
                                <button type="submit" id="contactformsubmit" class="btn submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <?php $this->load->view('common/footer'); ?>

    </div>
<?php $this->load->view('common/end'); ?>
        <script>
        // Datepicker 
        $('select').selectpicker();
        $( function() {
            $( ".datepicker" ).datepicker({
                dateFormat: "mm/dd/yy",
                duration: "fast",
                changeYear: true,
                yearRange: "1940:2020"
            });
        });
    </script>
	<script>
	function submit_form(){
	var obj = $('#contactformsubmit');	
	var btn = obj.html();	
	$.ajax({
			url: "<?=base_url()?>site/contact_us",
			method: "POST",
			data: $('#contact_us').serialize(),
			dataType: 'json',
			beforeSend: function () {
				obj.html('Sending...');
				obj.attr('disabled', 'disabled');
			},
			success: function (data) {
				obj.html(btn);
				obj.removeAttr('disabled');
				if (data.error == 1) {
					$('#contact_us')[0].reset();
					alertit(data.msg, 'success');
				} else {
					alertit(data.msg, 'danger');
				}
			}
		});		
		}
	</script>
</body>
</html>