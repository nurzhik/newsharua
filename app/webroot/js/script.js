$(document).ready(function(){  
  
  $('.partner-block').slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    speed:800,
    dots:false,
    arrows:false,
    Infinity:true,
    autoplay:true,
    autoplaySpeed: 400,
    responsive: [
      { breakpoint: 1101,
        settings: {
          slidesToShow: 3
        }
      }, 
      { breakpoint: 781,
        settings: {
          slidesToShow: 2
        }
      },
      { breakpoint: 501,
        settings: {
          slidesToShow: 1, 
          dots:true,
        }
      }
    ]
  });

  $('.main-block').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    speed:800,
    dots:true
  });


  // clicks menu active
  $(".header-bottom li").each(function(i){
    $(this).click(function(){
      $(".menu li").removeClass("active")
      $(".header-bottom li").eq(i).addClass("active")
      $(".footer-menu  li").eq(i).addClass("active")
    }) 
  })

  $(".footer-menu li").each(function(i){
    $(this).click(function(){
      $(".menu li").removeClass("active")
      $(".header-bottom li").eq(i).addClass("active")
      $(".footer-menu  li").eq(i).addClass("active")
    }) 
  })

  // burger scripts
  var windowsize = $(window).width();  
  var append = false
  $(window).resize(function() {
    windowsize = $(window).width();  
    if(windowsize   < 1001) {
        $(".header-bottom").addClass("menu-adap")
        $(".header-bottom").css("display","none")
        $( ".menu-adap" ).append( $(".cabinet"));
        $( ".menu-adap" ).append( $(".join"));
        append  = true
    }
    if(windowsize   >= 1001) {
        $(".header-bottom").removeClass("menu-adap")
        $(".header-bottom").css("display","flex")
      if (append == true) {
        $(".header-top-out .form-element").after( $(".join") )
        $(".header-top-out .join").after( $(".cabinet") )
        append = false
      }
    }

    if (windowsize < 681) {
      if(!$(".menu-about-links").hasClass("oopen")) {
        $(".menu-about-links").slideDown()
        $(".menu-about-links").addClass("oopen")
      } else {
        $(".menu-about-links").slideUp()
        $(".menu-about-links").removeClass("oopen")
      }
      // if($(".menu-about-links").css("display", "none")) {
      //   $(".menu-about-links").slideDown()
      // } else {
      //   alert("ok")
      //     $(".menu-about-links").slideUp()
      // }
    } 
  });
 
  if(windowsize   < 1001) {
    $(".header-bottom").addClass("menu-adap")
    $( ".menu-adap" ).append( $(".cabinet"));
    $( ".menu-adap" ).append( $(".join"));
    append  = true
  }  else {
    $(".header-bottom").removeClass("menu-adap")
    if (append == true) {
      $(".header-top-out .form-element").after( $(".join") )
      $(".header-top-out .join").after( $(".cabinet") )
      append = false
    }
  }

  if (windowsize < 681) {
  
    $(".menu-abouts").click(function(){
      if(!$(".menu-about-links").hasClass("oopen")) {
        $(".menu-about-links").slideDown()
        $(".menu-about-links").addClass("oopen")
      } else {
        $(".menu-about-links").slideUp();
        $(".menu-about-links").removeClass("oopen")
      }
      // if($(".menu-about-links").css("display", "none")) {
      //   $(".menu-about-links").slideDown()
      // } else {
      //     $(".menu-about-links").slideUp()
      // }
      
    })
  } 

  $(".menu-burger").click(function(){
    if($(".header-bottom").hasClass("menu-adap")) {
      $(".menu-burger").toggleClass("menu-clicked")
      if($(".menu-burger").hasClass("menu-clicked")) {
        $(".menu-adap").slideDown()
      } else {
        $(".menu-adap").slideUp()
      }
    } 
  });

  $(".my-alert__close").click(function(){
    $('.alert--active').removeClass('alert--active');
  })


  // mouseover( fn ) 
  // скролл страницы и шапки
  window.onscroll = function(){
  var top = Math.max(document.body.scrollTop, document.documentElement.scrollTop);
  var header = $('.header-top-out');
  if(top > 100){
    // $(header).addClass('scroll');
      // console.log("ok")
      // if(!$(".header-bottom").hasClass("menu-adap")) {
        // $(".header-bottom").slideUp()
      //   $(".header-top-out").addClass("to-mause-over")
      //   $(".header-top-out").addClass("scroll")
      // }
    $(".header-bottom").addClass("fixed-header")
  } else {
    $(".header-bottom").removeClass("fixed-header")
    // $(".header-top-out").removeClass("scroll")
    // if(!$(".header-bottom").hasClass("menu-adap")) {
    //   $(".header-top-out").removeClass("to-mause-over")
    //   $(".header-bottom").slideDown()
    // }
  }
  }

  // $(".to-mause-over").mouseover(function() {
  //   $(".header-bottom").slideDown()
  // })
  $(document).on('mouseover', '.to-mause-over', function(){ 
    $(".header-bottom").slideDown()
  });
  
  
  
  $(".lang").click(function(){
    if(!$(".choose-lang").hasClass("opened")) {
      $(".choose-lang").addClass("opened")
      $(".choose-lang").slideDown()
    } else{
      $(".choose-lang").removeClass("opened")
      $(".choose-lang").slideUp()
    }
  })
  $(".choose-lang__item").each(function(i){
    $(this).click(function(){
      $(".show-lang__item").removeClass("lang-active")
      $(".show-lang__item").eq(i).addClass("lang-active")
    })
  });

  

  // faq open answer
  $(".faq-item").each(function(i){
    $(this).click(function(){
      if (!$(this).hasClass("faq-active")) {
        $(this).addClass("faq-active")
        $(".faq-bottom").eq(i).slideDown()
      } else {
        $(this).removeClass("faq-active")
        $(".faq-bottom").eq(i).slideUp()
      }
    })
  })




})





$('input[type="tel"]').click(function(){
  $(this).setCursorPosition(3);
}).mask("+7 (999) 999 99 99");