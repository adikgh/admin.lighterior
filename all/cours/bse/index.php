<?php include "../../config/core.php";

	// 
	$cours_id = 2;
	$cours = db::query("select * from cours where id = '$cours_id'");
	$cours = mysqli_fetch_assoc($cours);
	$category = fun::category($cours['category_id']);
	$autor = fun::autor($cours['autor_id']);
	$pack = db::query("select * from c_pack where cours_id = '$cours_id'");
	$pl = db::query("select * from c_pack where cours_id = '$cours_id' and number = 1");


	// site setting
	$menu_name = 'item';
	$site_set = ['menu' => 2];
	$css = [$menu_name];
	$js = [];

	$san = rand(0, 1);
	$whatsapp = ['77776779777', '77476267492'];
	$whatsapp2 = ['77776779777', '77476267492'];
	
?>
<?php include "../../block/header.php"; ?>


	<div class="item">

		<!--  -->
		<div class="itemc_info">
			<div class="bl_c">

				<div class="itemc_info_c">
					<div class="itemci_l">
						<div class="itemci_ln">
							<div class="itemci_lnc"><i class="fas fa-bell"></i></div>
							<p>Курстан орыныңызды <br>алып үлгеріңіз</p>
						</div>
						<h1 class="itemci_h"><?=$cours['name_'.$lang]?></h1>
						<div class="itemci_p"><?=$cours['offer_t']?></div>
						<div class="itemci_b">
							<a href="#price" class="btn">Оқығым келеді</a>
							<a href="#program" class="btn btn_cl">Курс бағдарламасы</a>
						</div>
					</div>
					<div class="itemci_r">
						<div class="lazy_img" data-src="/assets/img/cours/<?=$cours['img']?>"></div>
					</div>
				</div>

				<div class="itemc_dn">
					<div class="itemcd_i">
						<div class="itemcd_ic"><i class="fal fa-book-reader"></i></div>
						<div class="itemcd_in"><div>Қурсақа 2-ай</div><p>доступ беріледі</p></div>
					</div>
					<div class="itemcd_i">
						<div class="itemcd_ic"><i class="fal fa-play-circle"></i></div>
						<div class="itemcd_in"><div>Бұл курс</div><p>5 сабақтан тұрады</p></div>
					</div>
					<div class="itemcd_i">
						<div class="itemcd_ic"><i class="fal fa-globe"></i></div>
						<div class="itemcd_in"><div>Онлайн</div><p>Cізге ыңғайлы уақытта</p></div>
					</div>
					<div class="itemcd_i">
						<div class="itemcd_ic"><i class="fal fa-users-class"></i></div>
						<div class="itemcd_in"><div>Бұл курстан</div><p>2,000 ана өткен</p></div>
					</div>
				</div>

			</div>
		</div>


		<!--  -->
		<?php $word = db::query("select * from cours_word where cours_id = '$cours_id' and type = 'one' order by number asc"); ?>
		<?php if (mysqli_num_rows($word)): ?>
			<div class="cr1">
				<div class="bl_c">
					<div class="cr1c">
						<div class="head_c head_c1">
							<h3>Егерде сіз:</h3>
						</div>
						<div class="cr1_c">
							<?php while ($word_date = mysqli_fetch_assoc($word)): ?>								
								<div class="cr1c_i">
									<div class="cr1ci_img">
										<div class="lazy_img" data-src="/assets/img/icons/<?=$word_date['img']?>"></div>
									</div>
									<div class="cr1ci_t">
										<div><?=$word_date['txt']?></div>
									</div>
								</div>
							<?php endwhile ?>
						</div>
						<div class="head_c head_c1">
							<p>Егер осының біреуіне болсын ия деп жауап берсеңіз демек 👇</p>
						</div>
						<?php $word = db::query("select * from cours_word where cours_id = '$cours_id' and type = 'ones' order by number asc"); ?>
						<div class="cr1_c">
							<?php while ($word_date = mysqli_fetch_assoc($word)): ?>								
								<div class="cr1c_i">
									<div class="cr1ci_img">
										<div class="lazy_img" data-src="/assets/img/icons/<?=$word_date['img']?>"></div>
									</div>
									<div class="cr1ci_t">
										<div><?=$word_date['txt']?></div>
									</div>
								</div>
							<?php endwhile ?>
						</div>
						<div class="head_c head_c1 txt_c cr1_head2">
							<p>Осы айтылғандардың барлығын бір ғана нәрсемен шешуге болады.</p>
							<h3 style="margin-top:20px">Ол қорықпау!!!</h3> 
							<p>Жыныстық тәрбиені қолға алу.</p>
						</div>
					</div>
				</div>
			</div>
		<?php endif ?>


		<!--  -->
		<?php $word = db::query("select * from cours_word where cours_id = '$cours_id' and type = 'tuu' and number BETWEEN 1 and 7"); ?>
		<?php if (mysqli_num_rows($word)): ?>
			<div class="cr2">
				<div class="bl_c">
					<div class="head_c head_c1">
						<h3>Курстың 5-ші аптасынан соң сіз:</h3>
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


		<?php $word = db::query("select * from cours_word where cours_id = '$cours_id' and type = 'tuu' and number BETWEEN 8 and 15"); ?>
		<?php if (mysqli_num_rows($word)): ?>
			<div class="cr2">
				<div class="bl_c">
					<div class="head_c head_c1">
						<h3>5 аптадан соң балаңыз:</h3>
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

		<?php include "../block/to_pass.php"; ?>

		<?php $word = db::query("select * from cours_word where cours_id = '$cours_id' and type = 'iprog'"); ?>
		<?php if (mysqli_num_rows($word) != 0): ?>
			<div id="program" class="iprog">
				<div class="bl_c">
					<div class="cours_ls">
						<div class="head_c">
							<h3>Курс бағдарламасы</h3>
						</div>
						<div class="coursls_c">
							<div class="coursls_cn">
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
		<?php endif ?>

		<?php include "../block/autor.php"; ?>
		<?php include "../block/price.php"; ?>


		<br><br><br>

		<div class="bl_c">
			<div class="swiper mySwiper5">
				<div class="swiper-wrapper">
					<div class="swiper-slide lazy_rev"><img class="lazy_rev" data-src="/assets/img/review/bse1.jpeg" /></div>
					<div class="swiper-slide lazy_rev"><img class="lazy_rev" data-src="/assets/img/review/bse2.jpeg" /></div>
					<div class="swiper-slide lazy_rev"><img class="lazy_rev" data-src="/assets/img/review/bse3.jpeg" /></div>
					<div class="swiper-slide lazy_rev"><img class="lazy_rev" data-src="/assets/img/review/bse4.jpeg" /></div>
					<div class="swiper-slide lazy_rev"><img class="lazy_rev" data-src="/assets/img/review/bse5.jpeg" /></div>
					<div class="swiper-slide lazy_rev"><img class="lazy_rev" data-src="/assets/img/review/bse6.jpeg" /></div>
					<div class="swiper-slide lazy_rev"><img class="lazy_rev" data-src="/assets/img/review/bse7.jpeg" /></div>
				</div>
				<div class="swiper-button-next swiper-button-next5"></div>
				<div class="swiper-button-prev swiper-button-prev5"></div>
			</div>
		</div>

	</div>
	

<?php include "../../block/footer.php"; ?>
<?php include "../block/oko.php"; ?>