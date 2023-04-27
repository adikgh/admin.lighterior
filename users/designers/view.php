<? include "../../config/core.php"; ?>
   
   <? if (isset($_GET['edit'])): ?>
		<? $id = strip_tags($_POST['id']); ?>
      <? $user_d = fun::user($id); ?>
      <? $designer_d = fun::user_designer($id); ?>

      <div class="form_c">
         <div class="form_im">
            <div class="form_span">Номер:</div>
            <input type="tel" class="form_im_txt fr_phone " disabled placeholder="8 (___) ___-__-__" data-lenght="11" value="<?=$user_d['phone']?>" />
            <i class="fal fa-mobile form_icon"></i>
         </div>
         <div class="form_im">
            <div class="form_span">Имя:</div>
            <input type="text" class="form_im_txt name_edit" placeholder="" data-lenght="11" value="<?=$user_d['name']?>" />
            <i class="fal fa-text form_icon"></i>
         </div>
         <div class="form_im">
            <div class="form_span">Называние компания:</div>
            <input type="text" class="form_im_txt designer_compn_edit" placeholder="" data-lenght="11" value="<?=$designer_d['company_name']?>" />
            <i class="fal fa-text form_icon"></i>
         </div>
         <div class="form_im">
            <div class="form_span">Instagram:</div>
            <input type="url" class="form_im_txt designer_ins_edit" placeholder="@" data-lenght="11" value="<?=$designer_d['instagram']?>" />
            <i class="fab fa-instagram form_icon"></i>
         </div>
         <div class="form_im">
            <div class="form_span">Site:</div>
            <input type="url" class="form_im_txt designer_site_edit" placeholder="" data-lenght="11" value="<?=$designer_d['site']?>" />
            <i class="fal fa-globe form_icon"></i>
         </div>
      </div>
      
      <div class="form_c">
         <div class="form_im">
            <div class="btn designer_edit" data-id="<?=$id?>"><span>Добавить</span></div>
         </div>
      </div>

		<? exit(); ?>
	<? endif ?>