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