;(function(){
  $(function(){
    $(window).on("resize", function(){
      if($(window).width() >= 768) {
        $(".news-box__body").perfectScrollbar();
      }else {
        $(".news-box__body").perfectScrollbar('destroy');
      }
    });
    $(window).trigger("resize");


    // $(".bxslider").bxSlider({
    //   auto: true,
    //   speed: 300,
    //   controls: false,
    //   oneToOneTouch: true
    // })


    
    
  });
})();

(function($){
  var backToFirstTimerId;
  var slider;
  var isManualMode = false;
  $(document).ready(function(){
    slider = $(".bxslider").bxSlider({
      auto : true,
      controls : false,
      infiniteLoop : false,
      onSlideBefore : onSlideBefore,
      onSliderLoad : onSliderLoad,
      useCSS: false,
      prevText: '&lt;',
      nextText: '&gt;',
      pagerType: 'full',
      speed: 800,
      pager : true
    });
    $(".bx-next").on("tap",function(){
        slider.goToNextSlide();
        isManualMode = true;
    });
    $(".bx-prev").on("tap",function(){
        slider.goToPrevSlide();
        isManualMode = true;
    });
  });
    
  function onSlideBefore($slideElement, oldIndex, newIndex){
    $("#slider_field .slider_controller .prev").show();
    $("#slider_field .slider_controller .next").show();
    if(backToFirstTimerId){
      clearTimeout(backToFirstTimerId);
    }
    if( slider.getSlideCount() ==  newIndex + 1){
      $("#slider_field .slider_controller .next").hide();
      if(!isManualMode){
        backToFirstTimerId = setTimeout(function(){
          if( slider.getSlideCount() == slider.getCurrentSlide() +1 ){
            slider.goToSlide(0);
          }
        },4000);
      }
    }else if( newIndex == 0 ){
      $("#slider_field .slider_controller .prev").hide();
    }
  }
  function onSliderLoad(currentIndex){
    if(currentIndex == 0){
      $("#slider_field .slider_controller .prev").hide();
    }
  }
})(jQuery);
