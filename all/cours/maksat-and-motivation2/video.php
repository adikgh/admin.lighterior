<?php include "../../config/core.php";

   header('location: /');

	//
	$cours_id = 13;
	$cours = db::query("select * from cours where id = '$cours_id'");
	$cours = mysqli_fetch_assoc($cours);
	$category = fun::category($cours['category_id']);
	$autor = fun::autor($cours['autor_id']);

	// site setting
	$menu_name = 'item';
   $pod_menu_name = 'maksat-and-motivation2';
	$site_set = [
      'menu' => 2,
      'header' => 'false'
   ];
	$css = ['item', 'project/'.$pod_menu_name];
	$js = [];

	$san = 0;
	$whatsapp = ['77776779777'];
	$whatsapp2 = ['77776779777'];
	
?>
<?php include "../../block/header.php"; ?>

	<div class="item">

         <div class="">
            <div class="bl_c">
               <div class="head_c">
                  <h3><?=$cours['name_'.$lang]?></h3>
                  <p>1-сабақ. Өзім туралы (Тегін сабақ)</p>
               </div>
               <div class="">
                  <div class="utm1_v">
                     <div class="container">
                        <iframe src="https://www.youtube.com/embed/r14Nmw3rJxE" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                     </div>
                  </div>

                  <br><br>
                  <h5>Бұл сабақ нейробиология туралы болады. Өз мақсатымызды анықтап, оған апаратын әркеттерді оңай жасау үшін не керек? Миымыз мақсатымызға ғашық болу үшін не істеуге болады?</h5>
                  <br>

                  <div class="utm1_v">
                     <div class="container">
                        <iframe src="https://www.youtube.com/embed/VTI69ueWAak" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                     </div>
                  </div>

                  <div class="uty1">
                     <p>Үй жұмысы: көзіңізді жұмып өзіңізді болашақта елестетіңіз.</p>
                     <ul>
                        <li>Сіз өз үйіңіздесіз. Тағы бір әдемі таң. Ешқайда асығыстық жоқ. Кухняға кіріп 1-стакан су іштіңіз де бөлмеңізге кірдіңіз. Көзіңіз үлкен айнадағы өз бейнеңізге түсті. </li>
                        <li>Бұл-СІЗ. Бірақ сіз өткен шақтағы бүгінгі СІЗДЕН бөлексіз. Әрине, ұқсайсыз, бірақ басқаша. Жақсырақ, әдемірек, сенімдірек пе, әйтеуір БАСҚАША.</li>
                        <li>Суреттеңіз,қандайсыз? Ақ парақ алыңыз да сол басқаша бейнені толық жазып шығыңыз.</li>
                        <li>Киімі, тісі, күтімі, фигурасы, иманы, мінезі,  рухани жай күйі, тырнағы қандай? Мүмкін ол қазіргіге қарағанда аз айқайлайтын болар? Мүмкін өмірінде спорт бар? Мүмкін кәзіргіге қарағанда батылырақ? Нешеде тұрады? Қалай тамақтанады? Бұның бәрі бейне болу керек. Өз бейнеңізді құрастырыңыз</li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>


			<!--  -->
			<div id="price" class="iprice">
				<div class="bl_c">
					<div class="iprice_c">
                  <div class="iprice_ci">
                     <div class="iprice_cin">
                        <div class="head_c head_c1"><h3>Толық нұсқасын алу</h3></div>
                        <div class="bq_cips">
                           <div class="bq_cipsi">9 сабақ. Әрқайсысы 20-25 минуттан.</div>
                           <div class="bq_cipsi">Әр сабақтан соң үй жұмысы.</div>
                           <div class="bq_cipsi">Әр сабақтың электронды кітаптары.</div>
                           <div class="bq_cipsi">Өмірдің барлық сферасын талдаймыз: карьера, ақша, қарым-қатынас, шығармашылық.</div>
                           <div class="bq_cipsi">Сабақтар жеңіл форматта іш пыстырмай өтеді.</div>
                        </div>
                        <div class="bq_cip">
                           <div class="bq_cipc">
                              <p class="bq_cip_sole">20000 тг</p>
                              <p>10000 тг</p>
                           </div>
                        </div>
                        <div class="bq_cib">
                           <div class="btn btn_ukl">Қатысамын</div>
                        </div>
                     </div>
                  </div>
					</div>
				</div>
			</div>

	</div>
	
<?php include "../../block/footer.php"; ?>


<!--  -->
<div class="oko">
	<div class="oko_a oko_close"></div>
	<div class="bl_c">
		<div class="oko_s">
			<div class="oko_s_name">Төлем жасау үшін KASPI <br>GOLD жібересіз</div>
			<img class="lazy_img copy" onclick="copytext('4400430125582806')" data-src="/assets/img/bag/Карта_Kaspi_Gold_aru.png" />
			<div class="oko_s_s">Көшіріп алу үшін картаны басыңыз</div>
			<div class="oko_s_p">Whatsapp желісіне <br>чек-ті жібересіз</div>
			<a href="https://wa.me/<?=$whatsapp[$san]?>" target="_blank" class="btn btn_cl">Жіберемін</a>
		</div>
	</div>
</div>

<!--  -->
<div class="pop_bl fr">
   <div class="pop_bl_a zabr_back"></div>
   <div class="pop_bl_c">
      <div class="head_c txt_c">
         <h4>Тегін сабақты алу</h4>
         <p>Төменге аты-жөніңізді жазыңыз, тегін сабаққа доступ беремін</p>
      </div>
      <div class="form_c">
         <div class="form_im">
            <i class="far fa-user form_icon"></i>
            <input type="text" class="form_im_txt name" placeholder="Аты-жөніңіз" data-lenght="3">
         </div>
         <div class="form_im">
            <i class="far fa-phone-alt form_icon"></i>
            <input type="tel" class="form_im_txt phone fr_phone" placeholder="8 (___) ___-__-__" data-lenght="6">
         </div>
         <div class="form_im form_im_bn">
            <div class="btn orderSend2">Аламын</div>
         </div>
      </div>
   </div>
</div>