$(document).ready(function() {

   $('.fi').click(function (e) { 
      // e.preventDefault();
      
      $('.fi').removeClass('fi_act')
      $(this).addClass('fi_act')

      $('.print_bl').width($(this).attr('data-sw'))
      $('.print_bl').css('min-height', $(this).attr('data-sh') + 'px')
      $('.print_bl_c').css('transform', 'scale(' + $(this).attr('data-ssc') + ')')
      
   });
   
   $('.fi').each(function () {
      if ($(this).hasClass('fi_act') == true) {
         $('.print_bl').width($(this).attr('data-sw'))
         $('.print_bl').css('min-height', $(this).attr('data-sh') + 'px')
         $('.print_bl_c').css('transform', 'scale(' + $(this).attr('data-ssc') + ')')
      }
   });


   $('.code_select').on('input', function () {
      if ($(this).val()) {
         $('.print_bl_code').html($(this).val())
      } else {
         $('.print_bl_code').html('0123456789')
      }
   })

   $('.price_select').on('input', function () {
      if ($(this).val()) {
         $('.print_bl_price').html($(this).val())
         $('.print_bl_price').removeClass('dsp_n')
      } else {
         $('.print_bl_price').addClass('dsp_n')
      }
   })
   $('.price_delete').on('click', function () {
      $('.price_select').val('')
      $('.print_bl_price').addClass('dsp_n')
   })

   $('.name_select').on('input', function () {
      if ($(this).val()) {
         $('.print_bl_name').html($(this).val())
         $('.print_bl_name').removeClass('dsp_n')
      } else {
         $('.print_bl_name').addClass('dsp_n')
      }
   })
   $('.name_delete').on('click', function () {
      $('.name_select').val('')
      $('.print_bl_name').addClass('dsp_n')
   })



   $('.onPrint').click(function() {
      window.print()
   })



})