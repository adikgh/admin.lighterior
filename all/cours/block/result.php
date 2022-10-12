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