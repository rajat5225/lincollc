<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view('common/style') ?>
</head>
<body>

    <div class="contains-everything">

        <div class="overlay"></div>

        <?php $this->load->view('common/header') ?>

        <div class="bg-img"><img src="<?=base_url()?>assets/images/projects.jpg" alt="Projects" style="object-fit: contain;     background: #d8dadd;"></div>

        <div class="projects">
            <div class="box-darker pt-5">
                <div class="container">
                    <h1 class="title pt-5 mb-5" style="color: #fff;">What we do</h1>
                </div>
                <div class="what-we-do py-5">
                    <div class="container">                    
                        <ul class="d-flex flex-wrap">
                            <li>Structural Steel Fabrication and Installation</li>
                            <li>Saw Mill Installations</li>
                            <li>Shutdowns/Turnarounds</li>
                            <li>Plywood Mill Installations</li>
                            <li>Heavy Equipment Setting</li>
                            <li>Chip Mill Installations</li>
                            <li>Mill Maintenance</li>
                            <li>Pellet Mill Installations</li>
                            <li>Tandem Heavy Lifts</li>
                            <li>Radial and Linear Crane Installations</li>
                            <li>Walkways and Stairways Fabrication and Installation</li>
                            <li>Heavy Chain Deck Installations</li>
                            <li>Engineering</li>
                            <li>Chain, Belt, and Vibrating Conveyor Installations</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="container py-5">
                <h1 class="title pt-5 mb-5">Projects</h1>
                <div class="projects-flex pb-5">
                    <div class="grid">
                        <div class="grid-sizer"></div>
                        <div class="grid-item">
                            <a href="#">
                                <div class="project-img">
                                    <img src="<?=base_url()?>assets/images/projects/projects-01.jpg" alt="">
                                    <div class="overlay-project"></div>
                                    <div class="content pt-3 pb-5 px-5">
                                        <h3 class="title pb-2">Debarking Drum</h3>                                    
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="grid-item">
                            <a href="#">
                                <div class="project-img">
                                    <img src="<?=base_url()?>assets/images/projects/projects-02.jpg" alt="">
                                    <div class="overlay-project"></div>
                                    <div class="content pt-3 pb-5 px-5">
                                        <h3 class="title pb-2">Structural Fabrication</h3>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="grid-item">
                            <a href="#">
                                <div class="project-img">
                                    <img src="<?=base_url()?>assets/images/projects/project-05.jpg" alt="">
                                    <div class="overlay-project"></div>
                                    <div class="content pt-3 pb-5 px-5">
                                        <h3 class="title pb-2">Radial Log Crane</h3>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="grid-item">
                            <a href="#">
                                <div class="project-img">
                                    <img src="<?=base_url()?>assets/images/projects/project-03.jpg" alt="">
                                    <div class="overlay-project"></div>
                                    <div class="content pt-3 pb-5 px-5">
                                        <h3 class="title pb-2">Pellet Mill</h3>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="grid-item">
                            <a href="#">
                                <div class="project-img">
                                    <img src="<?=base_url()?>assets/images/projects/project-04.jpg" alt="">
                                    <div class="overlay-project"></div>
                                    <div class="content pt-3 pb-5 px-5">
                                        <h3 class="title pb-2">Plywood Mill</h3>
                                    </div>
                                </div>
                            </a>
                        </div>                        
                    </div>
                </div>
            </div>
        </div>

         <?php $this->load->view('common/footer'); ?>

    </div>
<?php $this->load->view('common/end'); ?>

    <div class="custom-pop">
        <div class="wrap">
            <p>I hereby authorize and request each former employer and person, firm, or corporation given as reference to answer any and all questions that may be asked in reference to information legally available towards my potential employment with Linco, LLC. I also agree to submit myself to drug and/or alcohol examination by a Linco, LLC representative or physician as often as needed. I understand that Linco, LLC conducts pre-employment, random, and post-accident drug testing of all employees and potential job applicants. I also understand that a positive result drug testing will result in my immediate termination from the company and/or any offer to work for and with Linco, LLC. If employed by Linco, LLC I agree to furnish requested and required documentation as proof of legal age and work status as per the current U.S. law.</p>
            <div class="custom-pop-close">
                <i class="fas fa-times"></i>
            </div>
        </div>
    </div>

    <script>
        $(".drug-check").on('click', function(){
            if($(this).is(":checked")){
                $(".application-btn").removeClass('off');
            }
            else if($(this).is(":not(:checked)")){
                $(".application-btn").addClass('off');
            }
        })
    </script>   
    <script>
        var $grid = $('.grid').masonry({
            itemSelector: '.grid-item',
            percentPosition: true,
            columnWidth: '.grid-sizer'
        });
        
        $grid.imagesLoaded().progress( function() {
            $grid.masonry();
        });  
    </script>

</body>

</html>