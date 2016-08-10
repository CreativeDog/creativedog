// Pre-Loader
$(window).load(function(){
  $('#divLoading').fadeOut(2000);
});

// SLIDE HOME

// Can also be used with $(document).ready()
$(window).load(function() {
  $('.flexslider').flexslider({
    animation: "slide"
  });


  // Masorny
  if($('#container').length != 0){
    $(function(){
      $('#container').isotope({
        // options
        itemSelector : '.item',
        columnWidth : '.item-sizer',
        percentPosition: true,
        gutter: 100,  
        isAnimated: true,
        isResizable: true,
        animationOptions: {
          duration: 750,
          easing: 'linear',
          queue: false
        },
      });

      //Add the class selected to the item that is clicked, and remove from the others
      var optionSets = $('#filters');
      optionLinks = optionSets.find('button');

      optionLinks.click(function(){
        var $this = $(this);
        // don't proceed if already selected
        if ( $this.hasClass('selected') ) {
          return false;
        }
        var optionSet = $this.parents('#filters');
        optionSets.find('.selected').removeClass('selected');
        $this.addClass('selected');

        //When an item is clicked, sort the items.
         var selector = $(this).attr('data-filter');

        $('#container').isotope({ filter: selector });
       
        return false;
      });
    });
    initTaglines();
  }
});


// TAGLINES

function initTaglines(){
  first = $('.content_tagline').first();
  setTimeout(function(){
    rotateTagline(first);
  },1000);
}

function rotateTagline(tagline){
  tagline.siblings().hide();
  tagline.show(); 
  tagline.children('h2').removeClass('flipOutX').addClass('animated flipInX');
  tagline.children('h4').removeClass('fadeOut').addClass('animated fadeIn');
  tagline.children('a').removeClass('fadeOut').addClass('animated fadeIn');

  setTimeout(function(){
    tagline.children('h2').removeClass('fadeIn').addClass('flipOutX');
    tagline.children('h4').removeClass('fadeIn').addClass('fadeOut');
    tagline.children('a').removeClass('fadeIn').addClass('fadeOut'); 
  },5000);


  setTimeout(function(){
    if(tagline.is($('.content_tagline').last())) {
      tagline = $('.content_tagline').first();
    }else{
      tagline = tagline.next();  
    }
    rotateTagline(tagline);
  },6000);
}

// PARALLAX 
function initPrallax(){
  /* detect touch */
  if("ontouchstart" in window){
      document.documentElement.className = document.documentElement.className + " touch";
  }
  if(!$("html").hasClass("touch")){
      /* background fix */
      $(".parallax").css("background-attachment", "fixed");
  }

  /* fix vertical when not overflow
  call fullscreenFix() if .fullscreen content changes */
  function fullscreenFix(){
      var h = $('body').height();
      // set .fullscreen height
      $(".content-b").each(function(i){
          if($(this).innerHeight() <= h){
              $(this).closest(".fullscreen").addClass("not-overflow");
          }
      });
  }
  $(window).resize(fullscreenFix);
  fullscreenFix();

  /* resize background images */
  function backgroundResize(){
      var windowH = $(window).height();
      $(".background").each(function(i){
          var path = $(this);
          // variables
          var contW = path.width();
          var contH = path.height();
          var imgW = path.attr("data-img-width");
          var imgH = path.attr("data-img-height");
          var ratio = imgW / imgH;
          // overflowing difference
          var diff = parseFloat(path.attr("data-diff"));
          diff = diff ? diff : 0;
          // remaining height to have fullscreen image only on parallax
          var remainingH = 0;
          if(path.hasClass("parallax") && !$("html").hasClass("touch")){
              var maxH = contH > windowH ? contH : windowH;
              remainingH = windowH - contH;
          }
          // set img values depending on cont
          imgH = contH + remainingH + diff;
          imgW = imgH * ratio;
          // fix when too large
          if(contW > imgW){
              imgW = contW;
              imgH = imgW / ratio;
          }
          //
          path.data("resized-imgW", imgW);
          path.data("resized-imgH", imgH);
          path.css("background-size", imgW + "px " + imgH + "px");
      });
  }
  $(window).resize(backgroundResize);
  $(window).focus(backgroundResize);
  backgroundResize();

  /* set parallax background-position */
  function parallaxPosition(e){
      var heightWindow = $(window).height();
      var topWindow = $(window).scrollTop();
      var bottomWindow = topWindow + heightWindow;
      var currentWindow = (topWindow + bottomWindow) / 2;
      $(".parallax").each(function(i){
          var path = $(this);
          var height = path.height();
          var top = path.offset().top;
          var bottom = top + height;
          // only when in range
          if(bottomWindow > top && topWindow < bottom){
              var imgW = path.data("resized-imgW");
              var imgH = path.data("resized-imgH");
              // min when image touch top of window
              var min = 0;
              // max when image touch bottom of window
              var max = - imgH + heightWindow;
              // overflow changes parallax
              var overflowH = height < heightWindow ? imgH - height : imgH - heightWindow; // fix height on overflow
              top = top - overflowH;
              bottom = bottom + overflowH;
              // value with linear interpolation
              var value = min + (max - min) * (currentWindow - top) / (bottom - top);
              // set background-position
              var orizontalPosition = path.attr("data-oriz-pos");
              orizontalPosition = orizontalPosition ? orizontalPosition : "50%";
              $(this).css("background-position", orizontalPosition + " " + value + "px");
          }
      });
  }
  if(!$("html").hasClass("touch")){
      $(window).resize(parallaxPosition);
      //$(window).focus(parallaxPosition);
      $(window).scroll(parallaxPosition);
      parallaxPosition();
  }
}

$(document).ready(function(){
  initPrallax();
});


// MENU

/*
$(document).ready(function() {
 	$('.btn_menu').on('click', function(){
  		$('#nav_main').show();
  		$('#nav_main').animate({
    	  	marginRight: '0px'
			}, 500, function(){ $('.btn_close_menu').fadeIn(); $('.btn_menu').fadeOut();});	
		$('.content_page').animate({
    	  	marginLeft: '-270px'
			}, 500);
	});

	$('.btn_close_menu').on('click', function(){
  		$('#nav_main').animate({
    	  	marginRight: '-300px'
			}, 500, function(){ $('.btn_close_menu').fadeOut(); $('.btn_menu').fadeIn();});	
		$('.content_page').animate({
    	  	marginLeft: '0px'
			}, 500);
	});

});
*/

// Menu - Animaciones 

function animacionMenuEntrada(){
  $('.btn_close_menu').show();
  $('#nav_main').show();
  $('.menu-item').hide();
  $('.slogan').hide();
  $('.separador_nav').hide();
  $('.soc').hide();
  $('#content_nav').fadeIn(function(){
    var cont =0;
    $('.menu-item').each(function(){
      cont = cont + 200;
      element = $(this);
      setTimeout(function(element){
        element.show();
        element.removeClass('flipOutX').addClass('animated flipInX');  
      },cont, element);  
    });
    cont = cont +500;
    setTimeout(function(){
      $('.separador_nav').fadeIn();
      $('.soc').fadeIn();  
    },cont);
    cont = cont +500;
    setTimeout(function(){
      $('.slogan').fadeIn(); 
    },cont);  
  });
}


function animacionMenuSalida(){
  var cont =0;
  cont = cont +200;
  setTimeout(function(){
    $('.slogan').fadeOut();
    $('.separador_nav').fadeOut();
    $('.soc').fadeOut();  
  },cont);

  $($('.menu-item').get().reverse()).each(function(){
    cont = cont + 150;
    element = $(this);
    setTimeout(function(element){
      element.removeClass('flipInX').addClass('animated flipOutX');  
    },cont, element);  
  });

  cont = cont + 300;
  setTimeout(function(){
    $('#content_nav').fadeOut(); 
  },cont);    
};


//Home - Animacion Taglines

function animacionTaglines(){
  elementos = $('.txt_video.first_tag').children();
  
}


$(document).ready(function() {
  $('.btn_menu').on('click', animacionMenuEntrada);
  $('.btn_close_menu').on('click', animacionMenuSalida);
  animacionTaglines(); 
});


// Magnific PopUp

$(document).ready(function() {

  $('.ajax-popup-link').magnificPopup({
    type: 'ajax',
    mainClass: 'mfp-fade',
    closeBtnInside: true,
    closeOnBgClick: false,
    showCloseBtn: true,
    preloader: true,
    enableEscapeKey: true,
    alignTop: true,
    tLoading: 'Cargando',
  
    callbacks: {
      parseAjax: function(mfpResponse) {
        mfpResponse.data = $(mfpResponse.data).find('.content_single');    
      },
      ajaxContentAdded:function(){
        initPrallax();
      }
    }
  });

  //Página de contacto

  $('.btn_contact').on('click', function(){
    $('.btn_close_menu').trigger('click');
    setTimeout(function(){ $('#content_contacto').removeClass('bounceOutUp').addClass('animated bounceInDown').show(); }, 500);  
  });

  $('.btn_close_contacto').on('click', function(){
    $('#content_contacto').removeClass('bounceInDown').addClass('animated bounceOutUp');;
  });

  /*
  $('.contact a').magnificPopup({
    type: 'ajax',
    mainClass: 'mfp-fade',
    closeBtnInside: true,
    closeOnBgClick: false,
    showCloseBtn: true,
    preloader: true,
    enableEscapeKey: true,
    alignTop: true,
    tLoading: 'Cargando',
    callbacks: {
      beforeOpen: function() {
        $('.btn_close_menu').trigger('click');
        
      },
      ajaxContentAdded: function() {  
        $('.btn_close_contacto').on('click', function(){
          $('.ajax-contact a').magnificPopup('close'); 
        }); 
      }
    },
  });
  */

  $('.iframe-popup-link').magnificPopup({ type: 'iframe', showCloseBtn: true,});
});