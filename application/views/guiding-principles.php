<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('common/style') ?>
</head>
<body>

    <div class="contains-everything">

        <div class="overlay"></div>

        <?php $this->load->view('common/header') ?>

          <div class="bg-img"><img src="<?=base_url()?>assets/images/guiding-principles.jpg" alt="Guiding Principles"></div>

        <div class="text-block var pt-5 bg">
            <div class="container">
                <h1 class="title pt-5">Guiding Principles <span class="d-block">A key set of principles that convey our value system</span></h1>
                <h4 class="pt-3">Without a set of guiding principles we are all like ships led astray, waiting to run aground. They are the foundation on which true, sustainable growth is formed. At Linco, our guiding principles were established to insure we build our house on the rock, not on sinking sand.</h4>
                <ul class="var pt-3 d-none">
                    <li><strong><span class="font">H</span>onor God First; Let Him Lead</strong> – Eternal return on investment.</li>
                    <li><strong><span class="font">F</span>ace Adversity with Honesty</strong> – Don’t let stress change how we respond.</li>
                    <li><strong><span class="font">R</span>espect Every Individual</strong> – Always respect every level of employee.</li>
                    <li><strong><span class="font">H</span>umility in the Face of Adversity</strong> – Stay humble enough to remove selfish pride from the decision-making process.</li>
                    <li><strong><span class="font">H</span>umility in the Face of Prosperity</strong> – Give others credit instead of taking it yourself.</li>
                    <li><strong><span class="font">C</span>onsistency in Accountability</strong> - Set expectations, make them known, and be disciplined enough to not let them fall by the wayside.</li>
                    <li><strong><span class="font">F</span>orgive Error but Expect Correction</strong> – When working hard, mistakes will be made. Repeating the same mistakes without learning is to go nowhere.</li>
                    <li><strong><span class="font">S</span>hared Perseverance</strong> - Our work requires cooperation and reliance on others...no one can do it alone.</li>
                    <li><strong><span class="font">B</span>uild a New Nest</strong> - Wisdom comes from knowing that "the way we have always done it" is not always the best way; sometimes, we must abandon the old comfortable nest to build a better one.</li>
                    <li><strong><span class="font">L</span>ook Inside First</strong> - Breaking bad habits requires self-examination before trying to find faults in others.</li>
                    <li><strong><span class="font">P</span>rovide a Reliable Service</strong> - A balance of innovation and change without compromising our core business model, and always quality before quantity.</li>
                </ul>                
            </div>
            <div class="squares pt-5">
                <div class="d-flex flex-wrap mt-5 bg">
                    <div class="square">
                        <h1 class="mt-3"><span class="font">H</span>onor God First, Let Him Lead</h1>
                        <p>Eternal return on investment</p>
                    </div>
                    <div class="square var">
                        <h1 class="mt-3"><span class="font">F</span>ace Adversity with Honesty</h1>
                        <p>Don’t let stress change how we respond.</p>
                    </div>
                    <div class="square var-on">
                        <h1 class="mt-3"><span class="font">R</span>espect Every Individual</h1>
                        <p>Always respect every level of employee.</p>
                    </div>
                    <div class="square var var-off">
                        <h1 class="mt-3"><span class="font">H</span>umility in the Face of Adversity</h1>
                        <p>Stay humble enough to remove selfish pride from the decision-making process.</p>
                    </div>
                    <div class="square">
                        <h1 class="mt-3"><span class="font">H</span>umility in the Face of Prosperity</h1>
                        <p>Give others credit instead of taking it yourself.</p>
                    </div>
                    <div class="square var">
                        <h1 class="mt-3"><span class="font">C</span>onsistency in Accountability</h1>
                        <p>Set expectations, make them known, and be disciplined enough to not let them fall by the wayside.</p>
                    </div>
                    <div class="square">
                        <h1 class="mt-3"><span class="font">F</span>orgive Error but Expect Correction</h1>
                        <p>When working hard, mistakes will be made. Repeating the same mistakes without learning is to go nowhere.</p>
                    </div>
                    <div class="square var">
                        <h1 class="mt-3"><span class="font">S</span>hared Perseverance</h1>
                        <p>Our work requires cooperation and reliance on others...no one can do it alone.</p>
                    </div>
                    <div class="square var-on">
                        <h1 class="mt-3"><span class="font">B</span>uild a New Nest</h1>
                        <p>Wisdom comes from knowing that "the way we have always done it" is not always the best way; sometimes, we must abandon the old comfortable nest to build a better one.</p>
                    </div>
                    <div class="square var var-off">
                        <h1 class="mt-3"><span class="font">L</span>ook Inside First</h1>
                        <p>Breaking bad habits requires self-examination before trying to find faults in others.</p>
                    </div>
                    <div class="square">
                        <h1 class="mt-3"><span class="font">P</span>rovide a Reliable Service</h1>
                        <p>A balance of innovation and change without compromising our core business model, and always quality before quantity.</p>
                    </div>
                    <div class="square var">
                        <h1 class="mt-3">Since<br>2008</h1>
                    </div>
                </div>
            </div>
        </div>


              <?php $this->load->view('common/footer'); ?>

    </div>
<?php $this->load->view('common/end'); ?>

</body>
</html>