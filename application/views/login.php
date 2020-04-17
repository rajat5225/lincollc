<!DOCTYPE html>
<html lang="en">
<head>
<?php $this->load->view('common/style') ?>
</head>
<body>

    <div class="contains-everything">

        <div class="app-login">
            <div class="row h-100 no-gutters row-eq-height">
                <div class="col-lg-7 col-md-6 d-none d-md-block">
                    <div class="wrap">
                        <img src="<?=base_url()?>assets/images/linco-about-bg.jpg" alt="Login">
                    </div>
                </div>
                <div class="col-lg-5 col-md-6">
                    <div class="wrap d-flex align-items-center justify-content-center text-center p-5">
                        <div class="inner">
                            <img src="<?=base_url()?>assets/images/logo.png" alt="Linco">
                            <form id="login_form" onSubmit="login();return false;">
                                <div class="form-row">
                                    <div class="form-group text-left col-md-12 pb-0">
                                        <label for="username">Username</label>
                                        <input required type="text" class="form-control" name="email" id="username" placeholder="Email">
                                    </div>
                                    <div class="form-group text-left col-md-12 pb-0">
                                        <label for="password">Password:</label>
                                        <input type="password" required class="form-control" name="password" id="password" placeholder="password">
                                    </div>
                                    <div class="form-group pb-0 col-md-12">
                                        <div class="form-check text-left">
                                            <input class="form-check-input" type="checkbox" value="" id="remember">
                                            <label class="form-check-label" for="remember">
                                                remember me
                                            </label>
                                        </div>
                                    </div>
                                </div>                                
                                <div class="form-row">
                                    <div class="form-group col-md-12 text-center py-2 w-100">
                                        <button type="submit" class="btn submit w-100">Login</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="<?=base_url()?>assets/js/plugins.js"></script>
    <script src="<?=base_url()?>assets/js/functions.js"></script>
    <script src="<?=base_url()?>assets/js/bootstrap-notify.js"></script>
    <script src="<?=base_url()?>assets/js/common_function.js"></script>
	<script>
		function login(){
		var btn = $('#login_form button');
		var html = btn.html();
		btn.html("Processing");	
		$.ajax( {
			type: 'POST',
			url: '<?=base_url('site/login_process')?>',
			data: $('#login_form').serialize(),
			dataType: "json",
			success: function ( data ) {
				btn.html(html);
				if ( data.error == 1) {
					   btn.html('Logging in..')
						setTimeout(function(){
							window.location.href = "./dropbox";
						},2000);
					  
					alertit( data.msg, 'success' );
				}else{
					alertit( data.msg, 'danger' )
				}
			}
		} );
		}	
	</script>

</body>
</html>