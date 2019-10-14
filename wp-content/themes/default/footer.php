<?php
global $mypagename;
global $title;
global $description;
global $cur;
global $mypagename;

$gnavis = array();
$loop = new WP_Query( array( 'post_type' => 'page', 'posts_per_page' => 100 ) );
if ($loop->have_posts()):
while ( $loop->have_posts() ) : $loop->the_post();
  $post = get_post( $post );
  $category_obj = get_term(get_field( 'pagecategory', $post->ID ));
  $gnavis[$category_obj->slug][$post->ID]["title"] = get_the_title($post->ID);
  $gnavis[$category_obj->slug][$post->ID]["url"] = get_permalink($post->ID);
endwhile;
endif;
?>
</div>
<footer class="footer">
  <a href="#"><img src="/assets/img/sp/btn_top.png" alt="" class="btn_top sp-on"></a>
  
  <div class="footer__upper">
   
   
    <div class="wrap">
      <div class="footer__info">
        <div class="footer__logo"><a href="/"><img src="/assets/img/sp/logo_footer.png" alt=""></a></div>
        <div class="footer__text">
          <p class="">〒061-0600</p>
          <p>北海道樺戸郡浦臼町字キナウスナイ196-31</p>
          <p>Tel: 0125-68-2202　/　Fax: 0125-68-2217</p>
        </div>
        <p class="fotter__linkTxt"><a href="/sitemap.html" class="fotter__link">サイトマップ</a></p>
      </div>
    </div>
  </div>
  <div class="footer__under">
    <div class="wrap">
      <div class="footer__copyright">
        Copyright kabatozan kongoji All rights reserved.
      </div>
    </div>
  </div>
</footer>

<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script type="text/javascript" src="/assets/js/jquery.bxslider.min.js"></script>
<script type="text/javascript" src="/assets/js/lightbox.js"></script>


<script>
$(function(){
   // #で始まるアンカーをクリックした場合に処理
   $('a[href^="#"]').click(function() {
      // スクロールの速度
      var speed = 400; // ミリ秒
      // アンカーの値取得
      var href= $(this).attr("href");
      // 移動先を取得
      var target = $(href == "#" || href == "" ? 'html' : href);
      // 移動先を数値で取得
      var position = target.offset().top;
      // スムーススクロール
      $('body,html').animate({scrollTop:position}, speed, 'swing');
      return false;
   });

  $('.keyvisual').bxSlider({
    auto: true,
    mode: 'fade',
    speed: 1800,
    pause: 5000,
    controls: false,
    pager: true,
    minSlides: 2
  });

    $('#menu li').hover(function(){
        $("ul",this).show();
    },
    function(){
        $("ul",this).hide();
    });

	$('#menuf li').hover(function(){
        $("ul.child",this).show();
    },
    function(){
        $("ul.child",this).hide();
    });


  var id = $("body").attr("id");
  $(".gnavi__wrapper ul li."+id).addClass("current");
});

</script>
<script src="/ajaxzip2/ajaxzip2.js" charset="UTF-8"></script>

</body>
</html>
