// JavaScript Document
$(document).ready(function(){
	
//	var slider= $(".slider").owlCarousel({
//    loop:true,
//    margin:10,
//    dots:true,
//   items:1,
//   rewindSpeed:500,
//   autoplay:true,
//   animateIn:'fadeInLeft',
//   animateOut:'fadeOutRight',
//   autoplayTimeout:5000,
//})
//	
//	slider.on('changed .owl.carousel', function(event) {
//      var item = event.item.index - 2;     // Position of the current item
//     $('.p-circle').removeClass('animated bounceInDown');
//     $('.owl-item').not('.cloned').eq(item).find('.p-circle').addClass('animated bounceInDown');
//  });
// 
//});


var slider=$(".slider").owlCarousel({
       items:1,
       autoplay:true,
       loop:true,
       navigation:true,
       smartSpeed: 1000,
        slideSpeed: 500,
        paginationSpeed: 500,
       singleItem:true,
       pagination:false,
        rewindSpeed:500,
//        dotsContainer:'#slider-thum',
       animateIn:'fadeIn',
       animateOut:'fadeOut',
        responsive:{0:{items:1},
       480:{
            items:1
       },
       768:{
            items:1
        },
        992:{
            items:1
        }
    }
  
    });



slider.on('changed.owl.carousel', function(event) {
      var item = event.item.index - 2;     // Position of the current item
	   $('h2').removeClass('animated fadeInLeft');
      $('.owl-item').not('.cloned').eq(item).find('h2').addClass('animated fadeInLeft delay-1.5s');
	  
      $('h4').removeClass('animated fadeInLeft');
      $('.owl-item').not('.cloned').eq(item).find('h4').addClass('animated fadeInLeft delay-1s');
	  
      $('a').removeClass('animated fadeInLeft');
      $('.owl-item').not('.cloned').eq(item).find('a').addClass('animated fadeInLeft delay-2s');

    });
	
	
	 // Go to the next item
$('.c-next').click(function() {
    slider.trigger('next.owl.carousel');
})
//// Go to the previous item
$('.c-prev').click(function() {
    slider.trigger('prev.owl.carousel', [300]);
})
});


var slider = $('.owl-carousel');
slider.mouseover(function(){
slider.trigger('stop.owl.autoplay');
});

slider.mouseleave(function(){
slider.trigger('play.owl.autoplay',[1000]);
});