;(function(){
  $(function(){
    //フッターpagetop
    $(".footer__pagetop a").on("click", function(){
      $("body,html").animate({scrollTop:0}, 400);
      return false;
    });

    //.ovの画像をマウスオーバー
    $("img.ov").each(function(){
      var src = $(this).attr("src");
      var src_on = src.split(".png")[0] + "_on.png";
      $(this).on("mouseenter", function(){
        $(this).attr("src", src_on);
      }).on("mouseleave", function(){
        $(this).attr("src", src);
      });
    });

    //gnavi toggle
    var gnavClickFlg = false;
    function megaMenuToggle(self, category, targetCategory){
      if(targetCategory && targetCategory == category){
        gnavClickFlg = false;
        return false;
      }
      if(!category) {
        gnavClickFlg = false;
        return false;
      }
      $(".mega-menu__block").hide();
      $(".mega-menu__block[data-category='"+category+"']").show();
      $(".mega-menu").slideDown(300, function(){
        gnavClickFlg = false;
      });
    }
    $(".gnavi a").on("click", function(){
      if(gnavClickFlg) return false;
      gnavClickFlg = true;
      var self = this;
      var category = $(self).data("category");
      var targetCategory = $(".mega-menu__block:visible").data("category");
      $(".gnavi a").removeClass("is-active");
      if(!targetCategory || targetCategory != category) $(self).addClass("is-active");
      if($(".mega-menu").is(":visible")){
        $(".mega-menu").slideUp(300, function(){
          megaMenuToggle(self, category, targetCategory);
        });
      }else {
        megaMenuToggle(self, category, targetCategory);
      }
      return false;
    });

    //sp gnavi
    $(".header__spmenu a").on("click", function(){
      $(".header").toggleClass("is-open");
      $(this).toggleClass("is-open");
      $(".sp-mega-menu").slideToggle(300);
      return false;
    });
    $(".child-open").on("click", function(){
      $(this).parent().toggleClass("is-open");
      $(this).next(".sp-mega-menu__childlist").slideToggle(300);
      return false;
    });

    //faqのtoggle
    $(".faq-answer dt").on("click", function(){
      $(this).next().slideToggle();
      $(this).toggleClass("active");
    });

    $(".bxslider-people").bxSlider({
      controls: false,
      speed: 300,
      auto: true,
      oneToOneTouch: true,
      pager: false
    });

    $('#page-link .column-block').each(function() {
      var columnBlockH = $(this).height();
      if(columnBlockH == 0){
        $(this).remove();
      }
    });

  });
})();
