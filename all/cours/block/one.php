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
            <div class="head_c head_c1 txt_c cr1_head2">
               <h3>Бұл курс сіз үшін</h3>
            </div>
         </div>
      </div>
   </div>
<?php endif ?>