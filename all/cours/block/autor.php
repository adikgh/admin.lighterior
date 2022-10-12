<!--  -->
<div class="cr3">
   <div class="bl_c">
      <div class="head_c head_c1">
         <h3>Автор жайлы</h3>
      </div>
      <div class="cr3_c">
         <div class="cr3_cl">
            <div class="cr3_clc">
               <div class="cr3_clca"></div>
               <div class="cr3_clcb"></div>
               <div class="cr3_clci lazy_img" data-src="/assets/img/bag/<?=$autor['bag']?>"></div>
            </div>
         </div>
         <div class="cr3_cr">
            <div class="cr3_crh"><?=$autor['name']?> <?=$autor['surname']?></div>
            <div class="cr3_crl">
               <?php $autor_id = $cours['autor_id']; ?>
               <?php $autor_i = db::query("select * from u_autor_info where autor_id = '$autor_id'"); ?>
               <?php while ($autor_id = mysqli_fetch_assoc($autor_i)): ?>
                  <div class="cr3_crli"><?=$autor_id['txt']?></div>
               <?php endwhile ?>
            </div>
         </div>
      </div>
   </div>
</div>