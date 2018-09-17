$(function(){
	"use strict";

   // $('.dropdown').hover(function() {
   //      $(this).addClass('open');
   //  },
   //  function() {
   //      $(this).removeClass('open');
   //  });
  
	// Change Language Mohammad Alsayyed
    $(document).on('click','.language',function(){

        var langValue = $(this).attr('id');
        //alert(langValue);
        $.post('index.php?r=site/language',{'lang':langValue},function(data){
        	//alert(data);
            location.reload();
        });
    });

    /* Services Scroll */
    if(document.getElementById('goToDiv')){
      var goTO = document.getElementById('goToDiv').value;
      //alert(goTO);
      if(goTO!= undefined && goTO!= null && goTO!=''){
         
         //alert(111)
         //$(document).scrollTop($('#'+goTO.value).offset().top);
         $("html,body").delay(100).animate({
              scrollTop: $('#'+goTO).offset().top-60},1000);
    }
    }
    if(document.getElementById('goToDivCat')){
      var goTOCat = document.getElementById('goToDivCat').value;
      //alert(goTO);
        if(goTOCat!= undefined && goTOCat!= null && goTOCat!=''){
           var gotToValue="Cat"+goTOCat;

           // alert(gotToValue);
           //$(document).scrollTop($('#'+goTO.value).offset().top);
           $("html,body").delay(100).animate({
                scrollTop: $('#'+gotToValue).offset().top},1000);
           
      }
    }
    /* Panel */
    $('.collapse').on('show.bs.collapse',function(){
        
        $('.panel-collapse').not(document.getElementById($(this).attr('id'))).removeClass('in').addClass('collapse');

    });
    /* End Panel */

});








