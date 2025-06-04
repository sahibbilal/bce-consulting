var $ = jQuery.noConflict();
$(document).ready(function () {
  /***WOW INIT**/
  wow = new WOW({
    boxClass: 'wow',
    animateClass: 'animated',
    offset: 20,
    mobile: true,
    live: true
  })
  wow.init();
  /*** Header fixed ***/
  $(window).scroll(function () {
    var scrollPixel = $(window).scrollTop();
    if (scrollPixel < 100) {
      $("header").removeClass("headerFix");
    } else {
      $("header").addClass("headerFix");
    };
  });

  funInputPlaceholder();
  wpFromLblPlaceholder();
  headerResize();
  viewPortHeight();
  $(document).on('show.bs.modal','#searchPopup', function () {
    $('html').addClass('search-overlay');
  })
  $(document).on('hiden.bs.modal','#searchPopup', function () {
    $('html').removeClass('search-overlay');
  })
});

$(window).on("load", function () {
  var scrollPixel = $(window).scrollTop();
  if (scrollPixel < 100) {
    $("header").removeClass("headerFix");
  } else {
    $("header").addClass("headerFix");
  }

  /** Mega Menu Active Class while open submenu */
  var subItems = $(".mega-sub-menu .menu-item");
  $.each(subItems,function(i,item){
    if($(item).hasClass("current-menu-item")){
      $(item).closest('li.mega-menu-item-has-children').addClass('mega-current_page_item');
    }
  });
  /** Mega Menu Active Class while open submenu */

  jQuery("img.svg").each(function () {
    var $img = jQuery(this);
    var imgID = $img.attr("id");
    var imgClass = $img.attr("class");
    var imgURL = $img.attr("src");
    jQuery.get(
      imgURL,
      function (data) {
        var $svg = jQuery(data).find("svg");
        if (typeof imgID !== "undefined") {
          $svg = $svg.attr("id", imgID);
        }
        if (typeof imgClass !== "undefined") {
          $svg = $svg.attr("class", imgClass + " replaced-svg");
        }
        $svg = $svg.removeAttr("xmlns:a");
        if (
          !$svg.attr("viewBox") &&
          $svg.attr("height") &&
          $svg.attr("width")
        ) {
          $svg.attr(
            "viewBox",
            "0 0 " + $svg.attr("height") + " " + $svg.attr("width")
          );
        }
        $img.replaceWith($svg);
      },
      "xml"
    );
  });

});

/*** Label Placeholder ***/
function funInputPlaceholder() {
  $('.form-label').find('input,textarea').each(function () {
    if ($.trim($(this).val()) != '')
      $(this).attr('data-empty', !$(this).val());
  });
  $('.form-label').find('select').each(function () {
    if ($.trim($(this).val()).toString().indexOf('?') < 0)
      $(this).attr('data-empty', !$(this).val());
  });
  $('.form-label').find('input,textarea').on('input', function (e) {
    $(e.currentTarget).attr('data-empty', !e.currentTarget.value);
  });
  $('.form-label').find('select').on('change', function (e) {
    $(e.currentTarget).attr('data-empty', !e.currentTarget.value);
  });
}

function funResetInputPlaceholder() {
  $('.form-label').find('input,textarea').each(function () {
    if ($.trim($(this).val()) == '')
      $(this).attr('data-empty', true);
  });
  $('.form-label').find('select').each(function () {
    if ($.trim($(this).val()).toString().indexOf('?') > 0)
      $(this).attr('data-empty', true);
  });
}

/*** WP From Label Placeholder Move ***/
function wpFromLblPlaceholder() {
  setTimeout(function () {
    $(".form-label label").each(function () {
      var frmInput = $(this).closest(".form-label").find(".wpcf7-form-control");
      $(this).insertAfter(frmInput);
    });
  }, 10);
};


/***  Select2 Custom Scrollbar ***/

$(window).on('resize', function () {
  headerResize();
  viewPortHeight();
});
/** Header **/
function headerResize() {
  var screen_width = $(window).width();
  const myModal = document.getElementById('staticBackdrop');
  var previousScrollY = 0;
  if (screen_width < 991.9) {
    $('.navbar-toggler').off('click');
    $('.navbar-toggler').on('click', function () {
      $(this).toggleClass('open');
      $('body').toggleClass('menu-open');
      // if ($('body').hasClass('menu-open')) {
      //   previousScrollY = window.scrollY;
      //   $('html').addClass('side-menu-open');
      //   $('html').css('margin-top', -previousScrollY + "px");
      //   $('header').addClass('page-scroll');
      // } else {
      //   $('html').removeClass('side-menu-open');
      //   $('html').attr('style', "");
      //   window.scrollTo(0, previousScrollY);
      //   $('header').removeClass('page-scroll');
      // }
    });

    $('.mega-back-link .mega-menu-item a').on('click', function (e) {
      e.preventDefault();
      $(this).closest(".mega-menu-item-has-children").find(".mega-indicator").trigger("click");
    });
  }
}
 // vh height converter for mobile 
 function viewPortHeight() {
  let vh = window.innerHeight * 0.01;
  document.documentElement.style.setProperty('--vh', `${vh}px`);
 }