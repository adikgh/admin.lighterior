// start jquery
$(document).ready(function() {



   // add product
	$('.user_staff_add_pop').click(function(){
		$('.user_staff_add_block').addClass('pop_bl_act');
		$('#html').addClass('ovr_h');
	})
	$('.user_staff_add_back').click(function(){
		$('.user_staff_add_block').removeClass('pop_bl_act');
		$('#html').removeClass('ovr_h');
	})
	$('html').on('click', '.price1_clc', function() { $('.price1_bl').toggleClass('price1_bl_act') });
	$('html').on('click', '.setting1_clc', function() { $('.setting1_bl').toggleClass('setting1_bl_act') });
	$('html').on('click', '.info1_clc', function() { $('.info1_bl').toggleClass('info1_bl_act') });


	$('.user_staff_add').on('click', function() {		
		if ($('.staff_phone').attr('data-sel') != 1) {
			if ($('.staff_phone').attr('data-sel') != 1) mess('Введите свой данный')
		} else {
			$.ajax({
				url: "/users/get.php?staff_add",
				type: "POST",
				dataType: "html",
				data: ({
					name: $('.staff_name').attr('data-val'),
					phone: $('.staff_phone').attr('data-val'),
               staff_id: $('.staff').attr('data-val'),
				}),
				success: function(data){
					if (data == 'yes') {
						mess('Успешно')
						setTimeout(function() { location.reload(); }, 500);
					} else mess('Ошибка!'); console.log(data);
				},
				beforeSend: function(){ mess('Отправка..') },
				error: function(data){ mess('Ошибка..') }
			})
		}
	})

	$('.user_staff_btn_delete').on('click', function() {
		btn = $(this)
		$.ajax({
			url: "/users/get.php?meng_delete",
			type: "POST",
			dataType: "html",
			data: ({ id: btn.attr('data-id'), }),
			success: function(data){
				if (data == 'yes') {
					mess('Успешно')
					setTimeout(function() { location.reload(); }, 500);
				} else mess('Ошибка!'); console.log(data);
			},
			beforeSend: function(){ mess('Отправка..') },
			error: function(data){ mess('Ошибка..') }
		})
	})













   // add product
	$('.designer_add_pop').click(function(){
		$('.designer_add_block').addClass('pop_bl_act');
		$('#html').addClass('ovr_h');
	})
	$('.designer_add_back').click(function(){
		$('.designer_add_block').removeClass('pop_bl_act');
		$('#html').removeClass('ovr_h');
	})
	$('html').on('click', '.price1_clc', function() { $('.price1_bl').toggleClass('price1_bl_act') });
	$('html').on('click', '.setting1_clc', function() { $('.setting1_bl').toggleClass('setting1_bl_act') });
	$('html').on('click', '.info1_clc', function() { $('.info1_bl').toggleClass('info1_bl_act') });


	$('.designer_add').on('click', function() {		
		if ($('.phone').attr('data-sel') != 1) {
			if ($('.phone').attr('data-sel') != 1) mess('Введите свой данный')
		} else {
			$.ajax({
				url: "/users/get.php?designer_add",
				type: "POST",
				dataType: "html",
				data: ({
					name: $('.name').attr('data-val'),
					phone: $('.phone').attr('data-val'),
               compn: $('.designer_compn').attr('data-val'),
               ins: $('.designer_ins').attr('data-val'),
               site: $('.designer_site').attr('data-val'),
				}),
				success: function(data){
					if (data == 'on') {
						mess('Успешно')
						setTimeout(function() { location.reload(); }, 500);
					} else mess('Ошибка!'); console.log(data);
				},
				beforeSend: function(){ mess('Отправка..') },
				error: function(data){ mess('Ошибка..') }
			})
		}
	})

	// add product
	$('.designer_edit_pop').click(function(){
		$('.designer_edit_block').addClass('pop_bl_act');
		$('#html').addClass('ovr_h');

		btn = $(this)
		$.ajax({
			url: "/users/designers/view.php?edit",
			type: "POST",
			dataType: "html",
			data: ({ id: btn.attr('data-id'), }),
			success: function(data){ 
				$('.designer_edit_block .pop_bl_cl').html(data);
				$('.fr_phone').mask('8 (000) 000-00-00');
			},
			beforeSend: function(){ },
			error: function(data){ }
		})
	})
	$('.designer_edit_back').click(function(){
		$('.designer_edit_block').removeClass('pop_bl_act');
		$('#html').removeClass('ovr_h');
	})
	$('html').on('click', '.designer_edit', function() {
		$.ajax({
			url: "/users/get.php?designer_edit",
			type: "POST",
			dataType: "html",
			data: ({
				id: $('.designer_edit').attr('data-id'),
				name: $('.name_edit').attr('data-val'),
				compn: $('.designer_compn_edit').attr('data-val'),
				ins: $('.designer_ins_edit').attr('data-val'),
				site: $('.designer_site_edit').attr('data-val'),
			}),
			success: function(data){
				if (data == 'yes') {
					mess('Успешно')
					setTimeout(function() { location.reload(); }, 500);
				} else mess('Ошибка!'); console.log(data);
			},
			beforeSend: function(){ mess('Отправка..') },
			error: function(data){ mess('Ошибка..') }
		})
	})

	// 
	$('.designer_btn_delete').on('click', function() {
		btn = $(this)
		$.ajax({
			url: "/users/get.php?designer_delete",
			type: "POST",
			dataType: "html",
			data: ({ id: btn.attr('data-id'), }),
			success: function(data){
				if (data == 'yes') {
					mess('Успешно')
					setTimeout(function() { location.reload(); }, 500);
				} else mess('Ошибка!'); console.log(data);
			},
			beforeSend: function(){ mess('Отправка..') },
			error: function(data){ mess('Ошибка..') }
		})
	})

	// 
	$('.designer_btn_check').on('click', function() {
		btn = $(this)
		$.ajax({
			url: "/users/get.php?designer_check",
			type: "POST",
			dataType: "html",
			data: ({ id: btn.attr('data-id'), }),
			success: function(data){
				if (data == 'yes') {
					mess('Успешно')
					setTimeout(function() { location.reload(); }, 500);
				} else mess('Ошибка!'); console.log(data);
			},
			beforeSend: function(){ mess('Отправка..') },
			error: function(data){ mess('Ошибка..') }
		})
	})





























}) // end jquery