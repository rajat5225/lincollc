<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('common/style') ?>
</head>
<body>

    <div class="contains-everything">

        <div class="overlay"></div>

        <?php $this->load->view('common/header') ?>

               <div class="media-container">
            <div class="video-holder">
                <video playsinline autoplay muted loop id="bgVideo">
                    <source src="<?=base_url()?>assets/images/showcase.webm" type="video/webm">
                    <source src="<?=base_url()?>assets/images/showcase.mp4" type="video/mp4">
                </video>
            </div>
            <div class="overlay"></div>
            <div class="content">
                <div class="wrapper">
                    <h1>Linco<br>Construction</h1>
                </div>
            </div>
        </div>        

        <div class="text-block var py-5 bg">
            <div class="container">
                <h1 class="title pt-5">History</h1>
                <h3 class="py-3 w-100" style="max-width: unset;">Linco, LLC began as a small engineering and construction company in 2008. Born from the willpower and hard work of a group of employees who shared our vision. Linco bootstrapped from humble beginnings and survived a down-turn in the economy. Starting anew, in a bad economy, was challenging to say the least. However, perseverance is what built Linco and continues to define us today. Since then, the company has seen year-over-year growth to become a major contributor of the installation and development of wood products mills in the U.S.</h3>
            </div>
        </div>

        <div class="text-block var">
            <div class="box-title py-5">
                <div class="container">
                    <h1 class="py-5">Guiding Principles</h1>
                </div>
            </div>
            <div class="box-darker">
                <div class="container">
                    <div class="d-flex align-items-center">
                        <div>
                            <h1 class="mt-3"><span class="font">H</span>onor God First, Let Him Lead</h1>
                        </div>
                        <div>
                            <h1 class="mt-3"><span class="font">F</span>ace Adversity with Honesty</h1>
                        </div>
                        <div>
                            <h1 class="mt-3"><span class="font">R</span>espect Every Individual</h1>
                        </div>
                    </div>
                    <div class="text-center pb-5">
                        <a href="<?=base_url()?>guiding-principles" class="btn mb-4">Learn More</a>
                    </div>
                </div>
            </div>
        </div>

        <?php $this->load->view('common/footer'); ?>

    </div>
<?php $this->load->view('common/end'); ?>
<script>
        $('#bgVideo').get(0).play();
        $('#bgVideo').trigger('click');
        $('#bgVideo').trigger('play');
    </script>

</body>
</html>