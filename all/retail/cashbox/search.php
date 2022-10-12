<? include "../../../config/acore.php"; ?>

   <!--  -->
   <? if (isset($_GET['product_search'])): ?>
		<? $search = strip_tags($_POST['result']); ?>
		<? $oid = strip_tags($_POST['oid']); ?>

      <? $pitem = db::query("select * from product_item where (article like '%$search%') or (barcode like '%$search%') order by ins_dt desc limit 18"); ?>
      <? if (mysqli_num_rows($pitem)): ?>

         <? while ($pitem_d = mysqli_fetch_assoc($pitem)): ?>
            <? $product_d = product::product($pitem_d['product_id']); ?>
            <? $quantity = product::pr_item_quantity($pitem_d['id']); ?>
            <div class="bs_wi cashbox_add" data-oid="<?=$oid?>" data-id="<?=$product_d['id']?>" data-item-id="<?=$pitem_d['id']?>" data-quantity="<?=$quantity?>">
               <div class="bs_wi_img">
                  <? if ($pitem_d['img']): ?> <div class="lazy_img" data-src="/assets/uploads/products/<?=$pitem_d['img']?>"></div>
                  <? else: ?> <i class="fal fa-box"></i> <? endif ?>
               </div>
               <div class="bs_wi_c">
                  <? if ($product_d['name_ru']): ?> <div class="bs_wi_cn"><?=$product_d['name_ru']?></div> <? endif ?>
                  <div class="bs_wi_cd">
                     <div class="bs_wi_cp"><?=$pitem_d['price']?> тг</div>
                     <div class="bs_wi_cs"><?=$quantity?> шт</div>
                  </div>
               </div>
            </div>
         <? endwhile ?>

      <? else: ?>

         <? $product = db::query("select * from product where (name_kz like '%$search%') or (name_ru like '%$search%') order by ins_dt desc limit 18"); ?>
         <? while ($product_d = mysqli_fetch_assoc($product)): ?>
            <? $product_id = $product_d['id']; ?>
            <? $pitem = db::query("select * from product_item where product_id = '$product_id'"); ?>
            <? while ($pitem_d = mysqli_fetch_assoc($pitem)): ?>
               <? $quantity = product::pr_item_quantity($pitem_d['id']); ?>
               <div class="bs_wi cashbox_add" data-oid="<?=$oid?>" data-id="<?=$product_d['id']?>" data-item-id="<?=$pitem_d['id']?>" data-quantity="<?=$quantity?>">
                  <div class="bs_wi_img">
                     <? if ($pitem_d['img']): ?> <div class="lazy_img" data-src="/assets/uploads/products/<?=$pitem_d['img']?>"></div>
                     <? else: ?> <i class="fal fa-box"></i> <? endif ?>
                  </div>
                  <div class="bs_wi_c">
                     <? if ($product_d['name_ru']): ?> <div class="bs_wi_cn"><?=$product_d['name_ru']?></div> <? endif ?>
                     <div class="bs_wi_cd">
                        <div class="bs_wi_cp"><?=$pitem_d['price']?> тг</div>
                        <div class="bs_wi_cs"><?=$quantity?> шт</div>
                     </div>
                  </div>
               </div>
            <? endwhile ?>
         <? endwhile ?>

      <? endif ?>

		<? exit(); ?>
	<? endif ?>