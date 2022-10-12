<!--  -->
<div id="program" class="iprog">
   <div class="bl_c">
      <div class="cours_ls">
         <div class="head_c">
            <h3>Курс бағдарламасы</h3>
         </div>
         <div class="coursls_c">
         
            <?php $pl_d = mysqli_fetch_assoc($pl); ?>
            <?php $pack_id = $pl_d['id']; ?>
            <?php $pack_block = db::query("select * from c_block where pack_id = '$pack_id'"); ?>
            <?php if (mysqli_num_rows($pack_block) != 0): ?>
               <?php while ($block = mysqli_fetch_assoc($pack_block)): ?>
                  <?php	$block_id = $block['id']; ?>
                  <?php	$pack_item = db::query("select * from c_lesson where block_id = '$block_id'"); ?>

                  <div class="coursls_cn">
                     <?php if (mysqli_num_rows($pack_block) != 1): ?>
                        <div class="coursls_i coursls_b">
                           <div class="coursls_ic">
                              <div class="coursls_in"><p><?=$block['name']?></p></div>
                           </div>
                        </div>
                     <?php endif ?>
                     <?php if (mysqli_num_rows($pack_item) != 0): ?>
                        <?php while ($item = mysqli_fetch_assoc($pack_item)): ?>
                           <div class="coursls_i">
                              <div class="coursls_ic">
                                 <!-- <div class="coursls_il"><?=$item['logo_txt']?></div> -->
                                 <div class="coursls_in"><p><?=$item['number']?>. <?=$item['name']?></p></div>
                              </div>
                           </div>
                        <?php endwhile ?>
                     <?php endif ?>
                  </div>

               <?php endwhile ?>
            <?php endif ?>
         </div>
      </div>
   </div>
</div>