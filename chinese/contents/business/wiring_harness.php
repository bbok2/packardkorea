<?php
$mmenu = 2;
$smenu = 1;
include '../inc/header.php';
?>

<div id="content_wrap" class="harness">
	<div class="tmenu">
		<ul class="wd2">
			<li><a href="">Wiring Harness</a></li>
			<li><a href="">生产工序</a></li>
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
							Packard Korea的线束<br>
							是针对日趋复杂多样的汽车趋势而生产开发的。
						</p>
						<div class="txt">
							<p>
								Wiring Harness就像人体血管组织一样，是向汽车零配件传输电源和信号的部件，一辆汽车上平均 装配 1200多个回路，280多个连接器、2400m电缆等约20余种部件，可以说是一辆汽车的中枢神经系统。
							</p>
							<p>
								如今，随着电气/电子设备的增加，为适应汽车技术趋势，Wiring Harness开始呈现多样化。Packard Korea拥有W/Harness System、EDS(Electrical Distribution Systems)的 自身设计能力，同时，公司正在构建一个可以从最初设计阶段到最终组装阶段积极反应顾客需求的系统。
							</p>
						</div>
					</div>
				</div>
				<div class="list stg_w">
					<ul class="">
						<li class="motion_stg">
							<img src="/img/@img_wiring_harness02_1.jpg" alt="">
							<div class="">车用线束<span>Automotive Wiring Harness</span></div>
						</li>
						<li class="motion_stg">
							<img src="/img/@img_wiring_harness02_2.jpg" alt="">
							<div class="">高压电缆组件 <span>HV Cable Assembly</span></div>
						</li>
						<li class="motion_stg">
							<img src="/img/@img_wiring_harness02_3.jpg" alt="">
							<div class="">电池电缆组件 <span>Battery Cable Assembly</span></div>
						</li>
						<li class="motion_stg">
							<img src="/img/@img_wiring_harness02_4.jpg" alt="">
							<div class="">线束零部件 <span>Component for Wiring Harness</span></div>
						</li>
						<li class="motion_stg">
							<img src="/img/@img_wiring_harness02_5.jpg" alt="">
							<div class="">建筑设备用线束 <span>Construction Equipment Wiring Harness</span></div>
						</li>
					</ul>
				</div>
			</div>
		</div>

		<?if($s==1){?>
		<div class="sub_section sec02">
			<div class="inner">
				<h3>生产工序</h3>
				<img src="/img/@img_produce01.jpg" alt="">
			</div>
		</div>
		<?}else{?>
		<div class="sub_section sec02">
			<div class="inner">
				<h3>生产工序</h3>
				<!-- <p class="point_txt">패커드코리아는 최초 설계에서부터 조립까지, 생산의 모든 단계를 전담하고 있습니다. </p> -->

				<div class="detail01 stg_w">
					<div class="step motion_stg">
						<ul class="">
							<li><div class="on"><em></em><span>第一步</span></div></li>
							<li><div><em></em><span>第二步</span></div></li>
							<li><div><em></em><span>第三步</span></div></li>
							<li><div><em></em><span>第四步</span></div></li>
						</ul>
						<div class="progress">
							<div class="bar"></div>
						</div>
					</div>
					<div class="swiper-container pic motion_stg">
						<ul class="swiper-wrapper">
							<li class="swiper-slide">
								<dl>
									<dt>第一步</dt>
									<dd>
										<strong>自动切线压接</strong>
										<p>将许多电线和端子按照样式 切线/压缩 压接的工序
										</p>
									</dd>
								</dl>
								<img src="/img/@img_produce01_01.jpg" alt="">
							</li>
							<li class="swiper-slide">
								<dl>
									<dt>第二步</dt>
									<dd>
										<strong>组装准备</strong>
										<p>将切线压接后的Lead单独作业并且提前预装的工序
										</p>
									</dd>
								</dl>
								<img src="/img/@img_produce01_02.jpg" alt="">
							</li>
							<li class="swiper-slide">
								<dl>
									<dt>第三步</dt>
									<dd>
										<strong>最终组装</strong>
										<p>将准备好的lead，sub利用组装板，组装/完成线束工序</p>
									</dd>
								</dl>
								<img src="/img/@img_produce01_03.jpg" alt="">
							</li>
							<li class="swiper-slide">
								<dl>
									<dt>第四步</dt>
									<dd>
										<strong>回路检查</strong>
										<p>
											对最终组装好的成品进行电力回路检查的工序
										</p>
									</dd>
								</dl>
								<img src="/img/@img_produce01_04.jpg" alt="">
							</li>
							<!-- <li class="swiper-slide">
								<dl>
									<dt>Step 05</dt>
									<dd>
										<strong>검사공정 단계</strong>
										<p>
											최종 조립된 완제품을 100% 전기회로 검사를 한 후에 외관 검사에 대한 전수검사를 합니다.
										</p>
									</dd>
								</dl>
								<img src="/img/@img_produce01_5.jpg" alt="">
							</li>
							<li class="swiper-slide">
								<dl>
									<dt>Step 06</dt>
									<dd>
										<strong>출하단계</strong>
										<p>자동조립 공정에서 매일매일 필요한 차종과 사양에 맞게 시간대 별로 납품합니다.
										</p>
									</dd>
								</dl>
								<img src="/img/@img_produce01_6.jpg" alt="">
							</li> -->
						</ul>
					</div>

				</div>
			</div>
		</div>
		<?}?>
	</div>
</div>


<?php include '../inc/footer.php';?>

