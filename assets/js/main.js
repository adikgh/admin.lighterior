// start jquery
$(document).ready(function() {



	$('.atops_clc').click(function(){
		history.back();
	})



	// menu
	$('div.umenu_ci2').click(function(){
		$(location).attr('href', $(this).attr('href'));
	})














	// 
	$('.ub1_lx').on('click', function() {
		$(this).parent().toggleClass('menu_act');
	})



	// 
	// if ($(window).width() < 501) {
	// 	if ($('.uitemc_umi').length == 1){
	// 		$('.uitemc_umi').css('width', '100%')
	// 	} else if ($('.uitemc_umi').length == 2) {
	// 		$('.uitemc_umi').css('width', '50%')
	// 	} else if ($('.uitemc_umi').length > 3) {
	// 		$('.uitemc_umi:nth-child(1n+3)').addClass('dsp_n')
	// 		$('.uitemc_umid').removeClass('dsp_n')
	// 		$('.uitemc_umidcs').html($('.uitemc_umi.dsp_n'))
	// 		$('.uitemc_umidcs .uitemc_umi').removeClass('dsp_n')
	// 	}
	// }

	// $('.uitemc_umidl').on('click', function () { 
	// 	$('.uitemc_umid').toggleClass('uitemc_umid_act')
	// })


	// // скрол
	// let scroll = $(window).scrollTop()
	// if (scroll > 30) $('.uitemc_u').addClass('uitemc_u_act')
  	// else $('.uitemc_u').removeClass('uitemc_u_act')
	// $(window).scroll(function() {
	// 	scroll = $(window).scrollTop()
	// 	if (scroll > 30) $('.uitemc_u').addClass('uitemc_u_act')
  	// 	else $('.uitemc_u').removeClass('uitemc_u_act')
	// })




	// menu clc
	$('.ub1_ly').click(function() { if ($(window).width() > 1024 && $(window).width() <= 1440) $('.ub1').toggleClass('ub1_ms') })




	 


	// sign in
	$('.btn_sign_in').on('click', function() {
		phone = $('.phone')
		password = $('.password')

		if (phone.attr('data-sel') != 1 || password.attr('data-sel') != 1) {
			if (phone.attr('data-sel') != 1) mess('Cіз телефен номеріңізді жазбапсыз')
			else if (password.attr('data-sel') != 1) mess('Cіз кілт сөзді жазбапсыз')
		} else {
			$.ajax({
				url: "/get.php?phone",
				type: "POST",
				dataType: "html",
				data: ({
					phone: phone.attr('data-val'),
					password: password.attr('data-val')
				}),
				success: function(data){
					if (data == 'yes') location.reload();
					else if (data == 'code') mess('Сізді базадан таптым, бірақ тіркелмегенсіз! <br> <a href="sign_up.php">Тіркелу</a>')
					else if (data == 'password') {
						mess('Cіз кілт сөзді қате теріп жатсыз')
						$('.si_blc_bn').removeClass('dsp_n')
					}
					else if (data == 'phone') mess('Cіз базада тіркелмегенсіз, админмен байланысып көріңіз!')
					else console.log(data)
				},
				beforeSend: function(){ },
				error: function(data){ console.log(data) }
			})
		}
	});
















	$('.btn_ubd_acc').click(function () { 
		// form
		this_btn = $(this)
		n_name = $('.name')
		surname = $('.surname')
		sex = $('.sex')
		age = $('.age')
		mail = $('.mail')
		phone = $('.phone')
		password = $('.password')

		if (n_name.attr('data-sel') != 1 || surname.attr('data-sel') != 1 || age.attr('data-sel') != 1 || mail.attr('data-sel') != 1 || phone.attr('data-sel') != 1 || password.attr('data-sel') != 1) mess('Форманы толтырыңыз')
		else {
			$.ajax({
				url: "/user/get.php?ubd_acc",
				type: "POST",
				dataType: "html",
				data: ({
					n_name: n_name.attr('data-val'),
					surname: surname.attr('data-val'),
					sex: sex.attr('data-val'),
					age: age.attr('data-val'),
					mail: mail.attr('data-val'),
					phone: phone.attr('data-val'),
					password: password.attr('data-val')
				}),
				success: function(data){
					if (data == 'yes') {
						mess('Cәтті сақталды!')
					} else {console.log(data)}
					console.log(data);
				},
				beforeSend: function(){},
				error: function(data){console.log(data)}
			})
		}
	})
	
	
	


	$('.phone').on('input', function() {
		if ($('.btn_fdal').parent().attr('data-type') == 'reg_info') {
			$('.btn_fdal').children('span').html($('.btn_fdal').attr('data-aut'))
			$('.btn_fdal').parent().attr('data-type', 'aut')
			$('.lg_top_head > *').each(function() {$(this).html($(this).attr('data-lg'))})
		}
	})





	// 
	$('.btn_lc_log').on('click', function() {

		phone = $(this).parent().siblings().children('.phone');
		form_sms = $(this).parent().siblings().children('.form_sms');
		num = '';
		$('.form_cn_code2 input').each(function() {
			num += $(this).attr('data-val')
		});
		
		if (phone.attr('data-sel') != 1 || num.length != 4) {
			phone.parent().addClass('form_pust')
			form_sms.html(form_sms.attr('data-code-pust'))
			form_sms.parent().removeClass('dsp_n')
		} else {
			$.ajax({
				url: "/user/get.php?ls_aut",
				type: "POST",
				dataType: "html",
				data: ({phone: phone.attr('data-val'), code: num}),
				success: function(data){
					if (data == 'yes') {
						location.reload();
					} else if (data == 'none') {
						form_sms.parent().removeClass('dsp_n')
						form_sms.html(form_sms.attr('data-code'))
					} else {console.log(data)}
				},
				beforeSend: function(){},
				error: function(data){console.log(data)}
			})
		}

	});







	// bookmark
	$('.bq3_ci_book').on('click', function() {
		var btn = $(this)
		if (btn.hasClass('bq3_ci_book_act') == false) { 
         btn.addClass('bq3_ci_book_act')
			$.ajax({
				url: "/user/get.php?bookmark_plus",
				type: "POST",
				dataType: "html",
				data: ({ cours_id: btn.attr('data-id') }),
				success: function(data){ 
               if (data=='yes') {
                  mess('Сақтаулыға сақталынды')
                  btn.children('.btn').children('i').addClass('fas')
               }
            },
				beforeSend: function(){ },
				error: function(data){ mess('Ошибка..') }
			})
		} else {
         btn.removeClass('bq3_ci_book_act')
         btn.children('.btn').children('i').removeClass('fas')
         $.ajax({
            url: "/user/get.php?bookmark_del",
				type: "POST",
				dataType: "html",
				data: ({ cours_id: btn.attr('data-id') }),
				success: function(data){ 
               mess('Сақтаулыдан алып тасталынды')
               if (data=='yes') {if (btn.hasClass('bq3_ci_book_act2')==true) btn.parent().remove()}
               if (data=='none') { 
                  $('.bookmark_nn').removeClass('dsp_n')
                  if (btn.hasClass('bq3_ci_book_act2')==true) btn.parent().parent().remove()
               }
               console.log(data);
            },
				beforeSend: function(){ },
				error: function(data){ mess('Ошибка..') }
			})

		}
	})




	$('.form_im_btn_clc .form_im_btn_i').click(function(){
		if ($(this).hasClass('form_im_btn_act') == false) {
			$(this).siblings('.form_im_btn_i').removeClass('form_im_btn_act')
			$(this).addClass('form_im_btn_act')
			$(this).parent().attr('data-val', $(this).attr('data-val'))
		}
	})





	// 
	$('.rad1').on('click', function () { 
		if ($(this).parent().attr('data-sel') == 0) {
			$(this).addClass('form_radio_act')
			$(this).parent().attr('data-sel', 1)

			if ($(this).hasClass('answer') == true) {
				$(this).addClass('form_radio_true');
				var answer = 1;
				mess('Сіздің жауабыңыз дұрыс');
			} else {
				$(this).addClass('form_radio_false');
				$(this).siblings('.answer').addClass('form_radio_true');
				var answer = 0;
				mess('Сіздің жауабыңыз қате, талқылауды қараңыз');
			}

			$.ajax({
				url: "/user/get.php?test_answer",
				type: "POST",
				dataType: "html",
				data: ({ 
					answer: answer, 
					v: $(this).attr('data-val'), 
					test_id: $(this).parent().attr('data-test-id'), 
					lesson_id: $(this).parent().attr('data-lesson-id') 
				}),
				success: function(data){ },
				beforeSend: function(){ },
				error: function(data){ }
			})

		}
	})


	$('.lsb_it1 .lsb_i').on('click', function () {
		if ($(this).hasClass('lsb_act') != true) {
			var nm = Number($(this).attr('data-number')) + 1;
			var cls = '.lsb_i[data-number="' + nm + '"]';
			$(cls).removeClass('dsp_n');
			$(this).addClass('lsb_act');
	
			$.ajax({
				url: "/user/get.php?sub_info_upd",
				type: "POST",
				dataType: "html",
				data: ({ lesson_id: $(this).parent().attr('data-lesson-id'), nm: nm }),
				success: function(data){ },
				beforeSend: function(){ },
				error: function(data){ }
			})
		}
	})

	$('.btn_hw').on('click', function () {

		btn = $(this)
		inp_hm = $('.inp_hm')

		if (inp_hm.val() != '') {
			$.ajax({
				url: "/user/get.php?home_work",
				type: "POST",
				dataType: "html",
				data: ({ 
					cours_id: btn.attr('data-cours-id'), 
					pack_id: btn.attr('data-pack-id'), 
					lesson_id: btn.attr('data-lesson-id'), 
					inp_hm: inp_hm.val()
				}),
				success: function(data){ 
					if (data == 'yes') { location.reload(); }
					console.log(data);
				},
				beforeSend: function(){ },
				error: function(data){ }
			})
		} else { mess('Жазуды ұмыттыңыз') }
	})



	$('.btn_rev').on('click', function () {

		btn = $(this)
		inp_rev = $('.inp_rev')

		if (inp_rev.val() != '') {
			$.ajax({
				url: "/user/get.php?rev_add",
				type: "POST",
				dataType: "html",
				data: ({ 
					cours_id: btn.attr('data-cours-id'), 
					inp_rev: inp_rev.val()
				}),
				success: function(data){ 
					if (data == 'yes') { location.reload(); }
					console.log(data);
				},
				beforeSend: function(){ },
				error: function(data){ }
			})
		} else { mess('Жазуды ұмыттыңыз') }
	})


	// 
	$('.btn_add_ques').on('click', function () {

		btn = $(this)
		txt = $('.inp_form')

		if (txt.val() != '') {
			$.ajax({
				url: "/user/get.php?add_ques",
				type: "POST",
				dataType: "html",
				data: ({ 
					cours_id: btn.attr('data-cours-id'), 
					pack_id: btn.attr('data-pack-id'), 
					lesson_id: btn.attr('data-lesson-id'), 
					txt: txt.val()
				}),
				success: function(data){ 
					if (data == 'yes') { location.reload(); }
					console.log(data);
				},
				beforeSend: function(){ },
				error: function(data){ }
			})
		} else { mess('Жазуды ұмыттыңыз') }
	})


	// 
	$('.btn_add_review').on('click', function () {

		btn = $(this)
		txt = $('.inp_form')

		if (txt.val() == '') mess('Жазуды ұмыттыңыз')
		else {
			$.ajax({
				url: "/user/cours/masterclass/get.php?add_review",
				type: "POST",
				dataType: "html",
				data: ({ 
					mc_id: btn.attr('data-mc-id'),
					type: btn.attr('data-type'),
					txt: txt.val()
				}),
				success: function(data){ 
					if (data == 'yes') location.reload();
					console.log(data);
				},
				beforeSend: function(){ },
				error: function(data){ }
			})
		} 
	})

	// 
	$('.lsb_crv_ictd').on('click', function () {
		btn = $(this)
		$.ajax({
			url: "/user/cours/masterclass/get.php?del_review",
			type: "POST",
			dataType: "html",
			data: ({ id: btn.attr('data-id') }),
			success: function(data){
				if (data == 'yes') {
					if (btn.attr('data-type') == 1) btn.parents('.lsb_crv_u').remove();
					if (btn.attr('data-type') == 2) {
						if (btn.parents('.lsb_crv_u2').children('.lsb_crv_i').length > 1) btn.parents('.lsb_crv_i').remove();
						else btn.parents('.lsb_crv_u2').remove();
					}
				}
				console.log(data);
			},
			beforeSend: function(){ },
			error: function(data){ }
		})
	})

	// add user
	$('.review_answer_open').click(function(){
		$('.review_answer').addClass('pop_bl_act');
		$('#html').addClass('ovr_h');
		$('.review_answer .btn_review_answer').attr('data-id', $(this).attr('data-id'))
	})
	$('.review_answer_back').click(function(){
		$('.review_answer').removeClass('pop_bl_act');
		$('#html').removeClass('ovr_h');
	})
	$('.btn_review_answer').on('click', function() {
		btn = $(this); txt = $('.inp_form2');
		if (txt.val() == '') mess('Жазуды ұмыттыңыз')
		else {
			$.ajax({
				url: "/user/cours/masterclass/get.php?add_review_answer",
				type: "POST",
				dataType: "html",
				data: ({ 
					id: btn.attr('data-id'),
					txt: txt.val()
				}),
				success: function(data){ 
					if (data == 'yes') location.reload();
					console.log(data);
				},
				beforeSend: function(){ },
				error: function(data){ }
			})
		} 
	})












	// 
	$('.rad2').on('click', function () { 
		if ($(this).parent().attr('data-sel') == 0) {
			$(this).addClass('form_radio_act form_radio_true')
			$(this).parent().children('.rad2').removeClass('form_radio_false')
			$(this).parent().attr('data-sel', 1)

			san = Number($(this).parent().parent().siblings('.btn').attr('data-ball'))
			san = san + Number($(this).attr('data-ball'))
			$(this).parent().parent().siblings('.btn').attr('data-ball', san)
		}
	})

	$('.rad2_btn').on('click', function () { 
		san2 = 0
		$(this).siblings('.lsb_icm').children('.form_im').each(function () { 
			if ($(this).attr('data-sel') == 0) { 
				mess('Тест толық орындаңыз')
				$(this).children('.rad2').addClass('form_radio_false')
			} else san2++
		})
		if (san2 == $(this).attr('data-number')){
			$(this).siblings('.otv_rad2').removeClass('dsp_n')
			if ($(this).attr('data-min') <= $(this).attr('data-ball')) $(this).siblings('.otv_rad2').children('.v1').removeClass('dsp_n')
			if ($(this).attr('data-max') >= $(this).attr('data-ball')) $(this).siblings('.otv_rad2').children('.v2').removeClass('dsp_n')
		}
	})












	// chat
	$('.btn_chat_send').on('click', function () {

		btn = $(this)
		txt = $('.inp_form')

		if (txt.val() == '') mess('Жазуды ұмыттыңыз')
		else {
			$.ajax({
				url: "/user/chat/get.php?add_chat_item",
				type: "POST",
				dataType: "html",
				data: ({ 
					id: btn.attr('data-chat-id'),
					txt: txt.val()
				}),
				success: function(data){ 
					if (data == 'yes') location.reload();
					console.log(data);
				},
				beforeSend: function(){ },
				error: function(data){ }
			})
		} 
	})







	// 
	$('html').on('click', '.uc_uibo', function() {
		if ($(this).parent().hasClass("uc_uibs_act")	!= true) {
			$('.uc_uibo').parent().removeClass("uc_uibs_act");
			$(this).parent().addClass("uc_uibs_act");
		} else $('.uc_uibo').parent().removeClass("uc_uibs_act");
	})

	// 
	$('html').on('click', '.ucours_tmi', function() {
		if ($(this).parent().hasClass("ucours_tm_act")	!= true) {
			$('.ucours_tmi').parent().removeClass("ucours_tm_act");
			$(this).parent().addClass("ucours_tm_act");
		} else $('.ucours_tmi').parent().removeClass("ucours_tm_act");
	})



}) // end jquery