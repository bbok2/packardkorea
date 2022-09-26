<?php
$mmenu = 2;
$smenu = 1;
include '../inc/header.php';
?>

<div id="content_wrap" class="harness">
	<div class="tmenu">
		<ul class="wd2">
			<li><a href="">Wiring Harness</a></li>
			<li><a href="">Manufacturing Process</a></li>
		</ul>
		<p></p>
	</div>
	<div class="sub_content">
		<div class="sub_section sec01">
			<div class="inner">
				<!-- <h3>Wiring Harness</h3> -->
				<div class="clear stg_w">
					<div class="fl motion_stg"><img src="/img/@img_wiring_harness01_1.jpg" alt=""></div>
					<div class="fr motion_stg">
						<p class="point_txt">
							PACKARD KOREA develops and produces wiring harnesses that <br>
							meet the requirements of the ever more complex automotive industry.
						</p>
						<div class="txt">
							<p>
								Wiring harnesses deliver power and signals to automobile components, just like how blood vessels act in human bodies
								The harness can also be considered as the nerve system of an automobile, which consists of an average of 1,200 circuits, 280 connectors, 2400m of cables, as well as around 20 other components.

							</p>
							<p>
								Wiring harnesses are becoming more diverse, along with an increase in electric and electronic devices in automobiles. PACKARD KOREA is holding ability to design wiring harness systems and EDS (Electrical Distribution Systems). and demonstrate demands of our customers from designing to assembly.
							</p>
						</div>
					</div>
				</div>
				<div class="list stg_w">
					<ul class="">
						<li class="motion_stg">
							<img src="/img/@img_wiring_harness02_1.jpg" alt="">
							<div class=""><span>Automotive Wiring Harness</span></div>
						</li>
						<li class="motion_stg">
							<img src="/img/@img_wiring_harness02_2.jpg" alt="">
							<div class=""><span>HV Cable Assembly</span></div>
						</li>
						<li class="motion_stg">
							<img src="/img/@img_wiring_harness02_3.jpg" alt="">
							<div class=""><span>Battery Cable Assembly</span></div>
						</li>
						<li class="motion_stg">
							<img src="/img/@img_wiring_harness02_4.jpg" alt="">
							<div class=""><span>Component for Wiring Harness</span></div>
						</li>
						<li class="motion_stg">
							<img src="/img/@img_wiring_harness02_5.jpg" alt="">
							<div class=""><span>Construction Equipment Wiring Harness</span></div>
						</li>
					</ul>
				</div>
			</div>
		</div>

		<?if($s==1){?>
		<div class="sub_section sec02">
			<div class="inner">
				<h3>Manufacturing Process</h3>
				<img src="/img/@img_produce01.jpg" alt="">
			</div>
		</div>
		<?}else{?>
		<div class="sub_section sec02">
			<div class="inner">
				<h3>Manufacturing Process</h3>
				<div class="detail01 stg_w">
					<div class="step motion_stg">
						<ul class="">
							<li><div class="on"><em></em><span>Step 01</span></div></li>
							<li><div><em></em><span>Step 02</span></div></li>
							<li><div><em></em><span>Step 03</span></div></li>
							<li><div><em></em><span>Step 04</span></div></li>
						</ul>
						<div class="progress">
							<div class="bar"></div>
						</div>
					</div>
					<div class="swiper-container pic motion_stg">
						<ul class="swiper-wrapper">
							<li class="swiper-slide">
								<dl>
									<dt>Step 01</dt>
									<dd>
										<strong>Automatic Cutting &amp; Compression</strong>
										<p>Cutting and compressing lines and terminals to fit specifications.</p>
									</dd>
								</dl>
								<img src="/img/@img_produce01_01.jpg" alt="">
							</li>
							<li class="swiper-slide">
								<dl>
									<dt>Step 02</dt>
									<dd>
										<strong>Assembly Preparation</strong>
										<p>Sub-assembling cut and compressed leads.</p>
									</dd>
								</dl>
								<img src="/img/@img_produce01_02.jpg" alt="">
							</li>
							<li class="swiper-slide">
								<dl>
									<dt>Step 03</dt>
									<dd>
										<strong>Final Assembly</strong>
										<p>Assembling and completing harnesses using prepared leads and sub-materials.</p>
									</dd>
								</dl>
								<img src="/img/@img_produce01_03.jpg" alt="">
							</li>
							<li class="swiper-slide">
								<dl>
									<dt>Step 04</dt>
									<dd>
										<strong>Circuit Inspection</strong>
										<p>Circuit inspection of finished goods.</p>
									</dd>
								</dl>
								<img src="/img/@img_produce01_04.jpg" alt="">
							</li>
						</ul>
					</div>

				</div>
			</div>
		</div>
		<?}?>
	</div>
</div>


<?php include '../inc/footer.php';?>

