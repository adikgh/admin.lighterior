<?php include "../../config/core.php";

	// 
   $cours_id = 7;
   $cours = db::query("select * from cours where id = '$cours_id'");
   $cours = mysqli_fetch_assoc($cours);
	$cours = array_merge($cours, fun::cours_info($cours['id']));
   $category = fun::category($cours['category_id']);
   $autor = fun::autor($cours['autor_id']);
   $pack = db::query("select * from c_pack where cours_id = '$cours_id'");
   $pl = db::query("select * from c_pack where cours_id = '$cours_id' and number = 1");


	// site setting
	$menu_name = 'item';
	$site_set = ['menu' => 2];
	$css = ['ulesson', $menu_name];
	$js = [];

	$san = rand(0, 1);
	$whatsapp = ['77776779777', '77476267492'];
	$whatsapp2 = ['77776779777', '77476267492'];
	
?>
<?php include "../../block/header.php"; ?>


	<div class="item">
		<div class="item_c">

			<!--  -->
			<div class="itemc_info">
				<div class="bl_c">

					<div class="itemc_info_c">
						<div class="itemci_l">
							<div class="itemci_ln">
								<div class="itemci_lnc"><i class="fas fa-bell"></i></div>
								<p>Мастер-кластан орыныңызды <br>алып үлгеріңіз</p>
							</div>
							<h1 class="itemci_h"><?=$cours['name_'.$lang]?></h1>
							<div class="itemci_p"><?=$cours['offer_'.$lang]?></div>
							<div class="itemci_b">
								<a href="#price" class="btn">Қатысқым келеді</a>
							</div>
						</div>
						<div class="itemci_r">
							<div class="lazy_img" data-src="/assets/img/cours/<?=$cours['img']?>"></div>
						</div>
					</div>

					<div class="itemc_dn">
						<div class="itemcd_i">
							<div class="itemcd_ic"><i class="fal fa-book-reader"></i></div>
							<div class="itemcd_in">
								<div>Доступ</div>
								<p><?=$cours['time']?> беріледі</p>
							</div>
						</div>
						<div class="itemcd_i">
							<div class="itemcd_ic"><i class="fal fa-play-circle"></i></div>
							<div class="itemcd_in">
								<div>Мастер-класс</div>
								<p><?=$cours['item']?> сабақтан тұрады</p>
							</div>
						</div>
						<div class="itemcd_i">
							<div class="itemcd_ic"><i class="fal fa-globe"></i></div>
							<div class="itemcd_in">
								<div>Онлайн</div>
								<p>Cізге ыңғайлы уақытта</p>
							</div>
						</div>
						<div class="itemcd_i">
							<div class="itemcd_ic"><i class="fal fa-users-class"></i></div>
							<div class="itemcd_in">
								<div>Сізбен бірге</div>
								<p><?=$cours['view']?> бақытты ана бар</p>
							</div>
						</div>
					</div>

				</div>
			</div>

			<!--  -->
			<div class="lsb">
				<div class="bl_c"> 
					<div class="lsb_c">
						<div class="lsb_i">
							<div class="lsb_ic">
								<div class="lsb_it_name2">Балаңыздың ашушаңдығын анықтауға арналған диагностика</div>
								<?php $test_nm = 'bt'; ?>
								<?php $test = db::query("select * from test_data where type = '$test_nm'"); ?>
								<?php while ($test_d = mysqli_fetch_assoc($test)): ?>
									<div class="lsb_icm">
										<div class="lsb_it_name"><?=$test_d['number']?>. <?=$test_d['name']?></div>
										<div class="form_im">
											<div class="form_radio <?=($test_answer_d['v']==1?'form_radio_act':'')?> <?=($test_d['answer']==1?'form_radio_true':'')?> <?=(($test_answer_d['answer']==0 && $test_answer_d['v']==1)?'form_radio_false':'')?> "><?=$test_d['v1']?></div>
											<div class="form_radio <?=($test_answer_d['v']==2?'form_radio_act':'')?> <?=($test_d['answer']==2?'form_radio_true':'')?> <?=(($test_answer_d['answer']==0 && $test_answer_d['v']==2)?'form_radio_false':'')?> "><?=$test_d['v2']?></div>
										</div>
									</div>
								<?php endwhile ?>
							</div>
						</div>
					</div>
				</div>
			</div>

			
			<!--  -->
			<?php $word = db::query("select * from cours_word where cours_id = '$cours_id' and type = 'tuu'"); ?>
			<?php if (mysqli_num_rows($word)): ?>
				<div class="cr2">
					<div class="bl_c">
						<div class="head_c head_c1">
							<h3>Курстан соң, алатын нәтижеңіз:</h3>
						</div>
						<div class="cr2_c">
							<?php while ($word_date = mysqli_fetch_assoc($word)): ?>								
								<div class="cr2_ci">
									<div class="cr2_ci_img"><?=$word_date['img']?></div>
									<div class="cr2_ci_txt"><?=$word_date['txt']?></div>
								</div>
							<?php endwhile ?>
						</div>
					</div>
				</div>
			<?php endif ?>

			
			<div id="program" class="iprog">
				<div class="bl_c">
					<div class="cours_ls">
						<div class="head_c">
							<h3>Мастер-класстың жоспары</h3>
						</div>
						<div class="coursls_c">
							<div class="coursls_cn">
								<div class="coursls_i coursls_b">
                           <div class="coursls_ic">
                              <div class="coursls_in"><p>1-БЛОК</p></div>
                           </div>
                        </div>
								<?php $word = db::query("select * from cours_word where cours_id = '$cours_id' and type = 'iprog'"); ?>
								<?php while ($word_date = mysqli_fetch_assoc($word)): ?>
									<div class="coursls_i">
										<div class="coursls_ic">
											<div class="coursls_il"><?=$word_date['img']?></div>
											<div class="coursls_in"><p><?=$word_date['txt']?></p></div>
										</div>
									</div>
								<?php endwhile ?>

								<div class="coursls_i coursls_b">
                           <div class="coursls_ic">
                              <div class="coursls_in"><p>2-БЛОК</p></div>
                           </div>
                        </div>
								<?php $word = db::query("select * from cours_word where cours_id = '$cours_id' and type = 'iprog2'"); ?>
								<?php while ($word_date = mysqli_fetch_assoc($word)): ?>
									<div class="coursls_i">
										<div class="coursls_ic">
											<div class="coursls_il"><?=$word_date['img']?></div>
											<div class="coursls_in"><p><?=$word_date['txt']?></p></div>
										</div>
									</div>
								<?php endwhile ?>

								<div class="coursls_i coursls_b">
                           <div class="coursls_ic">
                              <div class="coursls_in"><p>3-БЛОК</p></div>
                           </div>
                        </div>
								<?php $word = db::query("select * from cours_word where cours_id = '$cours_id' and type = 'iprog3'"); ?>
								<?php while ($word_date = mysqli_fetch_assoc($word)): ?>
									<div class="coursls_i">
										<div class="coursls_ic">
											<div class="coursls_il"><?=$word_date['img']?></div>
											<div class="coursls_in"><p><?=$word_date['txt']?></p></div>
										</div>
									</div>
								<?php endwhile ?>
							</div>
						</div>
					</div>
				</div>
			</div>

			<?php include "../block/autor.php"; ?>


			<!--  -->
			<?php $word = db::query("select * from cours_word where cours_id = '$cours_id' and type = 'three' order by number asc"); ?>
			<?php if (mysqli_num_rows($word)): ?>
				<div class="cr4">
					<div class="bl_c">
						<div class="head_c head_c1">
							<h3>Сабақ қалай өтіледі</h3>
						</div>
						<div class="cr4_c">
							<?php while ($word_d = mysqli_fetch_assoc($word)): ?>								
								<div class="cr4_ci">
									<div class="cr4_cimg">
										<div class="lazy_img" data-src="/assets/img/icons/<?=$word_d['img']?>"></div>
									</div>
									<div class="cr4_cic">
										<?php if ($word_d['txt'] != null): ?>
											<div><?=$word_d['txt']?></div>
										<?php endif ?>
										<?php if ($word_d['txt2'] != null): ?>
											<p><?=$word_d['txt2']?></p>
										<?php endif ?>
									</div>
								</div>
							<?php endwhile ?>
						</div>
					</div>
				</div>
			<?php endif ?>



			<!--  -->
			<div id="price" class="iprice">
				<div class="bl_c">
					<div class="iprice_c <?=(mysqli_num_rows($pack)==2?"iprice_c2":"")?> <?=(mysqli_num_rows($pack)>=3?"iprice_c3":"")?>">
						<?php while($pack_date = mysqli_fetch_assoc($pack)): ?>
							<div class="iprice_ci">
								<?php if (mysqli_num_rows($pack) != 1): ?>
									<div class="iprice_cih"><p><?=$pack_date['name']?></p></div>
								<?php endif ?>
								<div class="iprice_cin">
									<?php if ($pack_date['offer']): ?>
										<div class="bq_cih2"><?=$pack_date['offer']?></div>
									<?php endif ?>

									<?php $pack_id = $pack_date['id'] ?>
									<?php $pack_info = db::query("select * from c_pack_word where pack_id = '$pack_id' and bonus is null"); ?>
									<div class="bq_cips">
										<?php while($pi_d = mysqli_fetch_assoc($pack_info)): ?>
											<div class="bq_cipsi <?=($pi_d['none']==1?'bq_cipsi_none':'')?>"><?=$pi_d['txt']?></div>
										<?php endwhile; ?>
									</div>
									
									<?php $pack_info = db::query("select * from c_pack_word where pack_id = '$pack_id' and bonus is not null"); ?>
									<?php if (mysqli_num_rows($pack_info)): ?>
										<div class="bq_cips bq_cips_bonus">
											<span>Бонусқа</span>
											<?php while($pi_d = mysqli_fetch_assoc($pack_info)): ?>
												<div class="bq_cipsi"><?=$pi_d['txt']?></div>
											<?php endwhile; ?>
										</div>
									<?php endif ?>

									<div class="bq_cip">
										<span>Бүгінгі баға:</span>
										<div class="bq_cipc">
											<?php if ($pack_date['price_sole']): ?>
												<p class="bq_cip_sole"><?=$pack_date['price_sole']?> тг</p>
											<?php endif ?>
											<p><?=$pack_date['price']?> тг</p>
										</div>
									</div>

									<div class="bq_cib">
										<div class="btn btn_ukl">Қатысамын</div>
									</div>

								</div>
							</div>
						<?php endwhile; ?>
					</div>
				</div>
			</div>

		</div>
	</div>
	

<?php include "../../block/footer.php"; ?>
<?php include "../block/oko.php"; ?>