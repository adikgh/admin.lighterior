   <!--  -->
   <div class="pop_bl pop_bl2 product_add_block">
      <div class="pop_bl_a product_add_back"></div>
      <div class="pop_bl_c">
         <div class="head_c">
            <h4>Добавить товар</h4>
            <div class="btn btn_dd product_add_back"><i class="fal fa-times"></i></div>
         </div>
         <div class="pop_bl_cl">
            <div class="form_c">
               <div class="form_head">Основные:</div>
               <div class="form_im">
                  <div class="form_span">Наименование товара:</div>
                  <input type="text" class="form_im_txt pr_name" placeholder="Введите наименование" data-lenght="1">
                  <i class="fal fa-text form_icon"></i>
               </div>
               <div class="form_im">
                  <div class="form_span">Артикул товара:</div>
                  <input type="text" class="form_im_txt pr_article" placeholder="Введите артикул" data-lenght="3">
                  <i class="fal fa-barcode form_icon"></i>
               </div>
               <div class="form_im">
                  <div class="form_span">Штрих-код:</div>
                  <input type="tel" class="form_im_txt pr_barcode" placeholder="Сканируйте код" data-lenght="8">
                  <i class="fal fa-barcode form_icon"></i>
               </div>
               <div class="form_im form_sel">
                  <div class="form_span">Склад:</div>
                  <i class="fal fa-warehouse-alt form_icon"></i>
                  <div class="form_im_txt sel_clc pr_warehouses" data-val="5">Точка продажа</div>
                  <i class="fal fa-caret-down form_icon_sel"></i>
                  <div class="form_im_sel sel_clc_i">
                     <? $warehouses = db::query("select * from product_warehouses"); ?>
                     <? while ($warehouses_d = mysqli_fetch_assoc($warehouses)): ?>
                        <div class="form_im_seli" data-val="<?=$warehouses_d['id']?>"><?=$warehouses_d['name']?></div>
                     <? endwhile ?>
                  </div>
               </div>
               <div class="form_im">
                  <div class="form_span">Количество:</div>
                  <input type="tel" class="form_im_txt fr_number pr_quantity" placeholder="0" data-lenght="1">
                  <i class="fal fa-hashtag form_icon"></i>
               </div>
               <div class="form_im">
                  <div class="form_span">Цена продажи:</div>
                  <input type="tel" class="form_im_txt fr_price pr_price" placeholder="0" data-lenght="1">
                  <i class="fal fa-tenge form_icon"></i>
               </div>
               <div class="form_im form_im_toggle">
                  <div class="form_span">Доп. цены:</div>
                  <input type="checkbox" class="info_inp" data-val="" />
                  <div class="form_im_toggle_btn price1_clc"></div>
               </div>
               <div class="price1_bl">
                  <!-- <div class="form_head">Цена товара:</div> -->
                  <div class="form_im">
                     <div class="form_span">Закупочная цена:</div>
                     <input type="tel" class="form_im_txt fr_price pr_purchase_price" placeholder="0" data-lenght="1">
                     <i class="fal fa-tenge form_icon"></i>
                  </div>
                  <div class="form_im">
                     <div class="form_span">Оптовая цена:</div>
                     <input type="tel" class="form_im_txt fr_price pr_discount_price" placeholder="0" data-lenght="1">
                     <i class="fal fa-tenge form_icon"></i>
                  </div>
               </div>
            </div>

            <div class="form_c">
               <div class="form_head">Дополнительные:</div>
               <div class="form_im">
                  <div class="form_span">Бренд:</div>
                  <input type="text" class="form_im_txt pr_brand" placeholder="Введите бренда" data-lenght="1">
                  <i class="fal fa-text form_icon"></i>
               </div>
               <div class="form_im form_sel">
                  <div class="form_span">Категория товара:</div>
                  <i class="fal fa-inventory form_icon"></i>
                  <div class="form_im_txt sel_clc pr_catalog" data-val="">Выберите категорию</div>
                  <i class="fal fa-caret-down form_icon_sel"></i>
                  <div class="form_im_sel sel_clc_i">
                     <? $catalog = db::query("select * from product_catalog"); ?>
                     <? while ($catalog_d = mysqli_fetch_assoc($catalog)): ?>
                        <div class="form_im_seli" data-val="<?=$catalog_d['id']?>"><?=$catalog_d['name_ru']?></div>
                     <? endwhile ?>
                  </div>
               </div>
               <div class="form_im form_sel">
                  <div class="form_span">Цвет товара:</div>
                  <i class="fal fa-palette form_icon"></i>
                  <input type="text" class="form_im_txt pr_color" placeholder="Введите цвет" data-txt="Введите цвет" data-lenght="2">
               </div>
               <div class="form_im form_sel">
                  <div class="form_span">Размер товара:</div>
                  <i class="fal fa-ruler form_icon"></i>
                  <input type="text" class="form_im_txt pr_size" placeholder="Введите размер" data-txt="Введите размер" data-lenght="2">
               </div>
            </div>
            
            <div class="form_c">
               <div class="form_head">Добавить изображение товара:</div>
               <div class="form_im">
                  <input type="file" class="file dsp_n product_img pr_img" accept=".png, .jpeg, .jpg">
                  <div class="form_im_img lazy_img pr_img_add" data-txt="Обновить изображение">Выберите с устройства</div>
               </div>
            </div>

            <!-- <div class="form_c">
               <div class="form_im form_im_toggle">
                  <div class="form_span">Добавить параметры:</div>
                  <input type="checkbox" class="info_inp" data-val="" />
                  <div class="form_im_toggle_btn setting1_clc"></div>
               </div>
               <div class="setting1_bl">

               </div>

               <div class="form_im form_im_toggle">
                  <div class="form_span">Доп. информация:</div>
                  <input type="checkbox" class="info_inp" data-val="" />
                  <div class="form_im_toggle_btn info1_clc"></div>
               </div>
               <div class="info1_bl">
                  <div class="form_im form_sel">
                     <div class="form_span">Тип товара:</div>
                     <i class="fal fa-vector-square form_icon"></i>
                     <input type="text" class="form_im_txt type" placeholder="Введите тип" data-txt="Введите тип" data-lenght="2">
                  </div>
                  <div class="form_im">
                     <div class="form_span">Описание:</div>
                     <i class="fal fa-pen form_icon"></i>
                     <input type="text" class="form_im_txt description" placeholder="Введите производителя" data-lenght="3">
                  </div>
               </div>
            </div> -->

            <div class="form_c">
               <div class="form_im">
                  <div class="btn product_add"><span>Добавить</span></div>
               </div>
            </div>

         </div>
      </div>
   </div>


   <!--  -->
   <div class="pop_bl pop_bl2 product2_add_block">
      <div class="pop_bl_a product2_add_back"></div>
      <div class="pop_bl_c">
         <div class="head_c">
            <h4>Дублировать товар</h4>
            <div class="btn btn_dd product2_add_back"><i class="fal fa-times"></i></div>
         </div>
         <div class="pop_bl_cl"></div>
      </div>
   </div>

   <!-- upd item quantity -->
   <div class="pop_bl pop_bl2 pitem_updq_block">
      <div class="pop_bl_a pitem_updq_back"></div>
      <div class="pop_bl_c">
         <div class="head_c">
            <h4>Корректировка количество</h4>
            <div class="btn btn_dd pitem_updq_back"><i class="fal fa-times"></i></div>
         </div>
         <div class="pop_bl_cl lazy_c"></div>
      </div>
   </div>


   <!-- view_add_pop -->
   <div class="pop_bl pop_bl2 view_add_block">
      <div class="pop_bl_a view_add_back"></div>
      <div class="pop_bl_c">
         <div class="head_c">
            <h4>Добавить вид товара</h4>
            <div class="btn btn_dd view_add_back"><i class="fal fa-times"></i></div>
         </div>
         <div class="pop_bl_cl">
            <div class="form_c">
               <div class="form_im form_sel">
                  <div class="form_span">Склады:</div>
                  <i class="fal fa-warehouse-alt form_icon"></i>
                  <div class="form_im_txt sel_clc views_warehouses" data-val="">Выберите склад</div>
                  <i class="fal fa-caret-down form_icon_sel"></i>
                  <div class="form_im_sel sel_clc_i">
                     <? $warehouses = db::query("select * from product_warehouses"); ?>
                     <? while ($warehouses_d = mysqli_fetch_assoc($warehouses)): ?>
                        <div class="form_im_seli" data-val="<?=$warehouses_d['id']?>"><?=$warehouses_d['name']?></div>
                     <? endwhile ?>
                  </div>
               </div>
               <div class="form_im">
                  <div class="form_span">Количество:</div>
                  <i class="fal fa-hashtag form_icon"></i>
                  <input type="tel" class="form_im_txt fr_number views_quantity" placeholder="0" data-lenght="1">
               </div>
               <div class="form_im">
                  <div class="form_span">Комментарий:</div>
                  <i class="fal fa-text form_icon"></i>
                  <input type="text" class="form_im_txt views_comment" placeholder="" data-lenght="1">
               </div>
            </div>
            <div class="form_c">
					<div class="form_im">
						<div class="btn view_add" data-product-id="<?=$product_id?>" data-item-id=""><span>Добавить</span></div>
					</div>
				</div>
         </div>
      </div>
   </div>