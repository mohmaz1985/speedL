$(function(){
	"use strict";
	// Change Language Mohammad Alsayyed
    $(document).on('click','.language',function(){
        var langValue = $(this).attr('id');
        $.post('index.php?r=site/language',{'lang':langValue},function(data){
        	//alert(data);
            location.reload();
        });
    });
    $(document).on('click','.main-sidebar .sidebar-menu li',function(){
    	
    	//var urlValue = decodeURIComponent(document.URL);
  		//  alert(urlValue);
  		// var manJSCmon = urlValue.split('r=site/');

    	$('.active').removeClass('active');
    	$(this).addClass('active menu-open');
    });
});