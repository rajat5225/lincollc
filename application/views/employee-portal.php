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
                    <div class="wrapper">
                        <div class="wrap">
                            <a href="<?=base_url('employee-portal/training-tracker')?>">
                                <i class="fas fa-running"></i>
                                <p class="pt-4">Training Tracker</p>                          
                            </a>  
                        </div>
                        <div class="wrap">
                            <a href="<?=base_url('employee-portal/dropbox')?>">
                                <i class="far fa-file-alt"></i>
                                <p class="pt-4">Linco Files</p>
                            </a>
                        </div>
                        <div class="wrap">
                            <a href="<?=base_url('employee-portal/project-tracker')?>">
                                <i class="far fa-file-alt"></i>
                                <p class="pt-4">Project Timelines</p>
                            </a>
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