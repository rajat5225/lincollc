<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('common/style') ?>
</head>
<body>

    <div class="contains-everything">

        <div class="overlay"></div>

        <?php $this->load->view('common/header') ?>

        <div class="bg-img"><img src="<?=base_url()?>assets/images/safety.jpg" alt="Safety" style="object-fit: contain;     background: #d8dadd;"></div>
        <div class="text-block py-5 bg">
            <div class="container">
                <h1 class="title pt-5">Safety</h1>
                <h4 class="pt-3">We wholeheartedly believe that working safely is a condition of employment. This message is delivered from the first day on the job to the last. We designed a safety management system that has a foundation in continuous improvement, accountability, and responsibility.</h4>
                
            </div>
        </div>

        <div class="safety-box py-5 mb-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <a class="nav-link active" id="v-pills-safety-one-tab" data-toggle="pill" href="#v-pills-safety-one" role="tab" aria-controls="v-pills-safety-one" aria-selected="true">Core Safety</a>
                            <a class="nav-link" id="v-pills-safety-two-tab" data-toggle="pill" href="#v-pills-safety-two" role="tab" aria-controls="v-pills-safety-two" aria-selected="false">Safety, Production, and Quality</a>
                            <a class="nav-link" id="v-pills-safety-three-tab" data-toggle="pill" href="#v-pills-safety-three" role="tab" aria-controls="v-pills-safety-three" aria-selected="false">Incident Investigation</a>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="tab-content" id="v-pills-tabContent">
                            <div class="tab-pane fade show active" id="v-pills-safety-one" role="tabpanel" aria-labelledby="v-pills-safety-one-tab">
                                <p class="text">Core safety is the pulse of our safety management system. It was developed to integrate safety, training, inspection and continual improvement into a tangible system. To maintain any program, it must first be manageable.</p>
                            </div>
                            <div class="tab-pane fade" id="v-pills-safety-two" role="tabpanel" aria-labelledby="v-pills-safety-two-tab">
                                <p class="text">To guarantee the success of every project, Safety, Production and Quality carry equal importance. We utilize multiple systems to ensure that each area is quantified.</p>
                            </div>
                            <div class="tab-pane fade" id="v-pills-safety-three" role="tabpanel" aria-labelledby="v-pills-safety-three-tab">
                                <p class="text">It is our belief that all incidents are derived from a systematic failure. Thus all incidents and significant near misses must be adequately evaluated, discussed, and shared throughout the organization to prevent recurrence. We are proficient with a number of investigation techniques, including but not limited to TapRoot, Cause & Effect, Fishbone, 5 why’s, and Cause mapping.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

       <?php $this->load->view('common/footer'); ?>

    </div>
<?php $this->load->view('common/end'); ?>

</body>
</html>