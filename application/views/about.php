<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('common/style') ?>
</head>
<body>

    <div class="contains-everything">

        <div class="overlay"></div>

        <?php $this->load->view('common/header') ?>
        <div class="bg-img"><img src="<?=base_url()?>assets/images/linco-about-bg.jpg" alt="About" style="object-fit: contain;     background: #d8dadd;"></div>

        <div class="text-block var py-5 bg">
            <div class="container">
                <h1 class="title pt-5">About</h1>
                <h3 class="py-3">Linco, LLC is a heavy industrial engineering /construction company specializing in wood product plants throughout the Southeastern United States. Established in 2008, Linco has built a strong reputation for tackling challenging upgrades and turn-arounds in mills, and also greenfield installations of new facilities. We pride ourselves in providing quality service; on time and on budget. Our goal is to build lasting relationships, not one-time customers.</h3>
            </div>
        </div>        

        <div class="parallax-window" data-parallax="scroll" data-image-src="<?=base_url()?>assets/images/linco-01.jpg">
        </div>        

        <div class="text-block py-5">
            <div class="container">
                <h1 class="title pt-5">History</h1>
                <h3 class="pt-3 pb-5 var">Linco, LLC began as a small engineering and construction company in 2008. Born from the willpower and hard work of a group of employees who shared our vision. Linco bootstrapped from humble beginnings and survived a down-turn in the economy. Starting anew, in a bad economy, was challenging to say the least. However, perseverance is what built Linco and continues to define us today.  Since then, the company has seen year-over-year growth to become a major contributor of the installation and development of wood products mills in the U.S. 
                </h3>
            </div>
        </div>        

        <div class="leadership-block py-5 bg">
            <div class="container"> 
                <h1 class="title pt-5">Meet the owner</h1>
                <div class="py-5">
                    <div class="row row-eq-height no-gutter">
                        <div class="col-lg-6">
                            <div class="wrap py-5 d-flex justify-content-center">
                                <img src="<?=base_url()?>assets/images/bryan-lindsey.jpg" alt="Bryan Lindsey">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="wrap py-5 h-100">
                                <h3 class="my-2">Bryan Lindsey</h3>
                                <span>president</span>
                                <p class="text-justify pt-4">Bryan Lindsey is the founder of Linco Construction, one of Spanish Fort’s hardest working industrial construction companies. In his work, he is dedicated to two things: first, the wellbeing of his employees and his community, and second, ensuring that Linco's construction projects remain of the highest integrity and quality.</p>
                                <p class="text-justify pt-1">Bryan is a Civil Engineering graduate of Auburn University and has always had a passion for building. Over the years he has helped design and build industrial facilities for several of the major wood products manufacturers in the U.S. In 2005, he received his professional engineering license (P.E.) in Alabama.  With his time spent working in engineering and construction management, Bryan was able to build a strong foundation and understanding of structural design, process flow, safety, construction methods, and cost analysis.  This experience led him to found Linco Construction in 2008. Today, after more than a decade under Bryan's leadership, Linco has grown into a trusted construction company staffed with hard-working and loyal employees.</p>
                                <p class="text-justify pt-1">Outside of work, Bryan enjoys spending time with his family and prides himself on serving others. He currently lives in Spanish Fort, AL and is married to his wife, Jena, and has two children, Walker and Madelyn.  He is an active church member and a volunteer pilot with Pilots for Christ, a nonprofit organization that flies cancer patients to and from treatment facilities around the United States. </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="quote py-5">
            <div class="container">
                <h1 class="py-5"><i class="fas fa-quote-left"></i>True leadership is illustrated in the portrait of the Shepherd, wherein the one who is so entrusted to lead is also a servant of the One who is truly worthy to be trusted.<i class="fas fa-quote-right"></i></h1>
                <div class="text-right">
                    <p class="pb-1">-Bryan Lindsey, President, Linco, LLC</p>
                    <!-- <span>President - Linco, LLC</span> -->
                </div>
            </div>
        </div>

        <div class="text-block py-5 bg">
            <div class="container">
                <h1 class="title pt-5">Affiliations</h1>
                <ul class="mb-5">
                    <li><a href="https://www.bcsp.org/">BCSP – Board of Certified Safety Professionals</a></li>
                    <li><a href="https://www.nrep.org/">NREP – National Registry of Environmental Professionals</a></li>
                    <li><a href="https://www.ihmm.org/">IHMM – Institute of Hazardous Materials Management</a></li>
                    <li><a href="https://www.assp.org/">ASSP – American Society of Safety Professionals</a></li>
                    <li><a href="https://www.slma.org/">SLMA – Southeastern Lumber Manufacturers Association</a></li>
                    <li><a href="https://www.alagc.org/">AL AGC – Alabama Association of General Contractors</a></li>
                    <li><a href="https://www.asce.org/">ASCE – American Society of Civil Engineers</a></li>
                    <li><a href="https://www.alaforestry.org/">AFA – Alabama Forestry Association</a></li>
                </ul>
            </div>
        </div>

        <?php $this->load->view('common/footer'); ?>

    </div>
<?php $this->load->view('common/end'); ?>
</body>
</html>