<style>.box-darker .d-flex > div {     justify-content: flex-start; }</style>
<script>window.base_url = "<?=base_url()?>"</script>
<header>
            <div class="custom-nav">
                <div class="top">
                    <div class="container">
                        <div class="d-flex align-items-center justify-content-between">
                            <ul>
                                <li>
                                    <a href="tel:+12516218289"><i class="fas fa-phone mr-1"></i> 251.621.8289</a>
                                </li>
                                <li>
                                    <a href="mailto:support@lincollc.net"><i class="fas fa-envelope mr-1"></i> support@lincollc.net</a>
                                </li>
                                <li class="d-none d-md-block">
                                    <a href="https://www.facebook.com/pages/category/Contractor/Linco-LLC-152880601430355/" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                </li>
                            </ul>
                            <a href="<?=base_url('about')?>" class="btn">Learn More</a>
                        </div>
                    </div>
                </div>
                <div class="header-bottom">
                    <div class="container">
                        <div class="d-flex align-items-center justify-content-between py-2">
                            <div class="logo"><a href="<?=base_url()?>"><img src="<?=base_url()?>assets/images/logo.png" alt="Linco"></a></div>
                            <div class="open-sidebar d-block d-lg-none">
                                <img src="<?=base_url()?>assets/images/icons/menu.png" alt="Menu">                       
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
        </header>