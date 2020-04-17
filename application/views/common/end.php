    <div class="sidebar p-5">
        <div class="close-btn">
            <img src="<?=base_url()?>/assets/images/icons/cancel.png" alt="close">
        </div>
        <ul class="menu-list">
            <li>
                <a href="<?=base_url()?>about"><i class="fas fa-arrow-alt-circle-right pr-3"></i>about</a>
            </li>
            <li>
                <a href="<?=base_url()?>guiding-principles"><i class="fas fa-arrow-alt-circle-right pr-3"></i>guiding principles</a>
            </li>
            <li>
                <a href="<?=base_url()?>safety"><i class="fas fa-arrow-alt-circle-right pr-3"></i>safety</a>
            </li>
            <li>
                <a href="<?=base_url()?>projects"><i class="fas fa-arrow-alt-circle-right pr-3"></i>projects</a>
            </li>
            <li>
                <a href="<?=base_url()?>careers"><i class="fas fa-arrow-alt-circle-right pr-3"></i>careers</a>
            </li>
            <li>
                <a href="<?=base_url()?>contact"><i class="fas fa-arrow-alt-circle-right pr-3"></i>contact</a>
            </li>
			<li>
                 <a class="employee_portal_link" href="<?=base_url()?>employee-portal"><i class="fas fa-arrow-alt-circle-right pr-3"></i>Employee Portal</a>
            </li>
			<?php if ( $this->input->cookie( 'Login' ) != "true" ) { ?>
                                        <li>
                                            <a href="<?=base_url()?>login">Login</a>
                                        </li>
										<?php  }else{ ?>
										 <li>
                                            <a href="<?=base_url()?>logout">Logout</a>
                                        </li>
										<?php } ?>
<!--
            <li>
                <a href="<?=base_url()?>employee-portal"><i class="fas fa-arrow-alt-circle-right pr-3"></i>employee portal</a>
            </li>
-->
        </ul>
    </div>
    
    <div class="fixed-header">
        <div class="header-bottom">
            <div class="container">
                <div class="d-flex align-items-center justify-content-between py-2">
                    <div class="logo"><a href="<?=base_url()?>"><img src="<?=base_url()?>assets/images/logo.png" alt="Linco"></a></div>
                    <div class="open-sidebar d-block d-lg-none">
                        <img src="<?=base_url()?>/assets/images/icons/menu.png" alt="Menu">                       
                    </div>
                    <div class="header-body d-none d-lg-block">                            
                        <div class="header-body-content py-3">
                            <ul>
                                        <li>
                                            <a class="about_link" href="<?=base_url()?>about">about</a>
                                        </li>
                                        <li>
                                            <a class="guiding_principles_link" href="<?=base_url()?>guiding-principles">guiding principles</a>
                                        </li>
                                        <li>
                                            <a class="safety_link" href="<?=base_url()?>safety">safety</a>
                                        </li>
                                        <li>
                                            <a class="projects_link" href="<?=base_url()?>projects">projects</a>
                                        </li>
                                        <li>
                                            <a class="careers_link" href="<?=base_url()?>careers">careers</a>
                                        </li>
                                        <li>
                                            <a class="contact_link" href="<?=base_url()?>contact">contact</a>
                                        </li>
								        <li>
											
                                            <a class="employee_portal_link" href="<?=base_url()?>employee-portal">Employee Portal</a>
                                        </li>
								<?php if ( $this->input->cookie( 'Login' ) != "true" ) { ?>
                                        <li>
                                            <a href="<?=base_url()?>login">Login</a>
                                        </li>
										<?php  }else{ ?>
										 <li>
                                            <a href="<?=base_url()?>logout">Logout</a>
                                        </li>
										<?php } ?>
                                    </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script src="<?=base_url()?>assets/js/plugins.js"></script>
<script src="<?=base_url()?>assets/js/bootstrap-select.min.js"></script>
<!--<script src="<?=base_url()?>assets/js/bootstrap-tagsinput.min.js"></script>-->
<script src="<?=base_url()?>assets/js/masonry.pkgd.min.js"></script>
<script src="<?=base_url()?>assets/js/imagesloaded.pkgd.js"></script>
<script src="<?=base_url()?>assets/js/functions.js"></script>
<script src="<?=base_url()?>assets/js/common_function.js"></script>
<script src="<?=base_url()?>assets/js/notify.js"></script>
<script>
	$('header .active,.fixed-header .active').removeClass('active');
	$('header .<?=$this->session->page?>_link,.fixed-header .<?=$this->session->page?>_link').addClass('active');
</script>