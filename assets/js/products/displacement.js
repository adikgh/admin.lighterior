// start jquery
$(document).ready(function() {


   // from_stock_с
   $('.from_stock .form_im_seli').on('click', function() {
      btn = $(this)
      $.ajax({
         url: "/products/displacement/get.php?from_stock",
         type: "POST",
         dataType: "html",
         data: ({
            warehouses: btn.data('val'),
            id: $('.from_stock').data('id'),
         }),
         success: function(data){ 
            if (data == 'yes') location.reload();
            else console.log(data);
         },
         beforeSend: function(){ },
         error: function(data){ }
      })
   })
   // in_stock
   $('.in_stock .form_im_seli').on('click', function() {
      btn = $(this)
      $.ajax({
         url: "/products/displacement/get.php?in_stock",
         type: "POST",
         dataType: "html",
         data: ({
            warehouses: btn.data('val'),
            id: $('.in_stock').data('id'),
         }),
         success: function(data){ 
            if (data == 'yes') location.reload();
            else console.log(data);
         },
         beforeSend: function(){ },
         error: function(data){ }
      })
   })


	// cashbox_remove
	$('.cashbox_remove').on('click', function () {
		btn = $(this)
      $.ajax({
         url: "/products/displacement/get.php?cashbox_remove",
         type: "POST",
         dataType: "html",
         data: ({ id: btn.data('id'), }),
         success: function(data){ 
            if (data == 'yes') location.reload();
            else console.log(data);
         },
         beforeSend: function(){ },
         error: function(data){ }
      })
	})




	// item price update
	$('html').on('input', '.cashbox_upd', function () {
		btn = $(this);
      elem = btn.parents('.uc_ui')
      quantity = btn.attr('data-val')
      if (quantity < elem.data('quantity')) { } else {
         mess('Больше нет');
         quantity = elem.data('quantity')
         btn.val(elem.data('quantity') + ' шт')
         btn.attr('data-val', elem.data('quantity'))
      }
		
      if (btn.attr('data-sel') == 1) {
         $.ajax({
            url: "/products/displacement/get.php?cashbox_upd",
            type: "POST",
            dataType: "html",
            data: ({ 
               id: elem.data('id'),
               quantity: quantity,
            }),
            beforeSend: function(){ },
            error: function(data){ },
            success: function(data){
               console.log(data);
               console.log(btn.attr('data-val'));
            },
         })
      } else mess('Введите свой данный')
	})


	// disp_full
	$('.disp_full').on('click', function () {
		btn = $(this)
      if (btn.data('qn') < btn.data('quantity')) {
         $.ajax({
            url: "/products/displacement/get.php?disp_full",
            type: "POST",
            dataType: "html",
            data: ({ 
               id: btn.data('id'),
               quantity: btn.data('quantity'),
            }),
            success: function(data){ 
               if (data == 'yes') location.reload();
               else if (data == 0) mess('Товар уже не осталось');  
               else console.log(data);
            },
            beforeSend: function(){ },
            error: function(data){ }
         })
      } else mess('Больше нет');
	})





   // cashbox_search
   $('.cashbox_search').on('input', function() {
      $.ajax({
         url: "/products/displacement/get.php?cashbox_search",
         type: "POST",
         dataType: "html",
         data: ({
            search: $('.cashbox_search').val(),
            id: $('.cashbox_search').data('id'),
         }),
         success: function(data){ 
            if (data == 'yes') location.reload();
            else if (data == 0) mess('Товар уже не осталось');
            else console.log(data);
         },
         beforeSend: function(){ },
         error: function(data){ }
      })
   })


	// cashbox_add
	$('.cashbox_add').on('click', function () {
      btn = $(this)
      $.ajax({
         url: "/retail/cashbox/get.php?cashbox_add",
         type: "POST",
         dataType: "html",
         data: ({
            id: btn.data('id'),
            item_id: btn.data('item-id'),
            oid: btn.data('oid'),
         }),
         success: function(data){ 
            if (data == 'yes') location.reload();
            else if (data == 0) mess('Товар уже не осталось');
            else console.log(data);
         },
         beforeSend: function(){ },
         error: function(data){ }
      })
	})







   
	// cashbox_pay
	$('.displacement_success').on('click', function () {
		btn = $(this)
      $.ajax({
         url: "/products/displacement/get.php?displacement_success",
         type: "POST",
         dataType: "html",
         data: ({ id: btn.data('id'), }),
         success: function(data){ 
            if (data == 'yes') location.reload();
            console.log(data);
         },
         beforeSend: function(){ },
         error: function(data){ }
      })
	})


















}) // end jquery









	// cashbox_minus
	$('.cashbox_minus').on('click', function () {
		btn = $(this)
      if (btn.parent().data('quantity') == 1) {
         $.ajax({
            url: "/products/displacement/get.php?cashbox_remove",
            type: "POST",
            dataType: "html",
            data: ({ id: btn.parent().data('id'), }),
            success: function(data){ 
               if (data == 'yes') location.reload();
               console.log(data);
            },
            beforeSend: function(){ },
            error: function(data){ }
         })
      } else {
         $.ajax({
            url: "/products/displacement/get.php?cashbox_minus",
            type: "POST",
            dataType: "html",
            data: ({ id: btn.parent().data('id'), }),
            success: function(data){ 
               if (data == 'yes') location.reload();
               console.log(data);
            },
            beforeSend: function(){ },
            error: function(data){ }
         })
      }
	})
	// cashbox_plus
	$('.cashbox_plus').on('click', function () {
		btn = $(this)
      if (btn.parent().data('quantity') < btn.parent().data('max')) {
         $.ajax({
            url: "/products/displacement/get.php?cashbox_plus",
            type: "POST",
            dataType: "html",
            data: ({ id: btn.parent().data('id'), }),
            success: function(data){ 
               if (data == 'yes') location.reload();
               else if (data == 0) mess('Товар уже не осталось');  
               else console.log(data);
            },
            beforeSend: function(){ },
            error: function(data){ }
         })
      } else mess('Больше нет');
	})