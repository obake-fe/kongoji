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
  
  <nav class="gnavi sp-on">
    <div class="gnavi__wrapper">
      <ul class="gnavi__block" id="menu">
        <li class="gnavi__item gnavi__item-bb top"><a href="/">トップ</a></li>
        <li class="gnavi__item gnavi__item-bb about">金剛寺について
          <ul class="child child--wide">
            <div class="gnavi__subitem">
              <ul>
                <li>歴史</li>
                <li>境内の案内</li>
              </ul>
            </div>
            <?php if(isset($gnavis["about_history"])) { foreach ($gnavis["about_history"] as $gnavi) : ?>
            <li><a href="<?php echo $gnavi['url'];?>"><?php echo $gnavi["title"];?></a></li>
            <?php endforeach ; } ?>
            <?php if(isset($gnavis["about_keidai"])) { foreach ($gnavis["about_keidai"] as $gnavi) : ?>
            <li><a href="<?php echo $gnavi['url'];?>"><?php echo $gnavi["title"];?></a></li>
            <?php endforeach ; } ?>
          </ul>
        </li>
        <li class="gnavi__item gnavi__item-bb prayer">祈祷祈願
          <ul class="child">
            <?php if(isset($gnavis["kitoukigan"])) { foreach ($gnavis["kitoukigan"] as $gnavi) : ?>
            <li><a href="<?php echo $gnavi['url'];?>"><?php echo $gnavi["title"];?></a></li>
            <?php endforeach ; } ?>
          </ul>
        </li>
        <li class="gnavi__item memorial-service">供養
          <ul class="child">
            <?php if(isset($gnavis["kuyou"])) { foreach ($gnavis["kuyou"] as $gnavi) : ?>
            <li><a href="<?php echo $gnavi['url'];?>"><?php echo $gnavi["title"];?></a></li>
            <?php endforeach ; } ?>
          </ul>
        </li>
        <li class="gnavi__item experience">体験
          <ul class="child">
            <?php if(isset($gnavis["taiken"])) { foreach ($gnavis["taiken"] as $gnavi) : ?>
            <li><a href="<?php echo $gnavi['url'];?>"><?php echo $gnavi["title"];?></a></li>
            <?php endforeach ; } ?>
          </ul>
        </li>
        <li class="gnavi__item gnavi__item-last event"><a href="/event.html">行事</a></li>
      </ul>
    </div>
  </nav>
  
  <div class="footer__upper">
   
   
    <div class="wrap">
      <div class="footer__info">
        <div class="footer__logo"><img src="/assets/img/sp/logo_footer.png" alt=""></div>
        <div class="footer__navi-text header__text sp-on">
          <ul>
            <li class="header__text-item01"><a href="/sitemap.html">サイトマップ</a></li>
            <li class="header__text-item02"><a href="/access.html">交通案内</a></li>
            <li class="header__text-item03"><a href="/contact.html">お問い合わせ</a></li>
          </ul>
        </div>
        <div class="footer__text">
          <p class="">〒061-0600</p>
          <p>北海道樺戸郡浦臼町字キナウスナイ196-31</p>
          <p>Tel: 0125-68-2202　/　Fax: 0125-68-2217</p>
        </div>
      </div>
      <div class="footer__navi pc-on">
        <div class="footer__link-block" id="menuf">
           <li class="footer__link-item top"><a href="/">トップ</a></li>
          <li class="footer__link-item about about_history about_keidai"><span>金剛寺について</span>
          <ul class="child child--wide">
           <li class="footer__subitem">
              <ul>
                <li>歴史</li>
                <li>境内の案内</li>
              </ul>
            </li>
           <li class="footer__subitem">
              <ul>
            <?php if(isset($gnavis["about_history"])) { foreach ($gnavis["about_history"] as $gnavi) : ?>
            <li><a href="<?php echo $gnavi['url'];?>"><?php echo $gnavi["title"];?></a></li>
            <?php endforeach ; } ?>
            <?php if(isset($gnavis["about_keidai"])) { foreach ($gnavis["about_keidai"] as $gnavi) : ?>
            <li><a href="<?php echo $gnavi['url'];?>"><?php echo $gnavi["title"];?></a></li>
            <?php endforeach ; } ?>
              </ul>
            </li>
          </ul>
        </li>
        
         <li class="footer__link-item kitoukigan"><span>祈祷祈願</span>
          <ul class="child">
            <?php if(isset($gnavis["kitoukigan"])) { foreach ($gnavis["kitoukigan"] as $gnavi) : ?>
            <li><a href="<?php echo $gnavi['url'];?>"><?php echo $gnavi["title"];?></a></li>
            <?php endforeach ; } ?>
          </ul>
        </li>
        
        </div>
        <div class="footer__link-block" id="menu">
          <li class="footer__link-item kuyou"><span>供養</span>
          <ul class="child">
            <?php if(isset($gnavis["kuyou"])) { foreach ($gnavis["kuyou"] as $gnavi) : ?>
            <li><a href="<?php echo $gnavi['url'];?>"><?php echo $gnavi["title"];?></a></li>
            <?php endforeach ; } ?>
          </ul>
        </li>
        <li class="footer__link-item taiken"><span>体験</span>
          <ul class="child">
            <?php if(isset($gnavis["taiken"])) { foreach ($gnavis["taiken"] as $gnavi) : ?>
            <li><a href="<?php echo $gnavi['url'];?>"><?php echo $gnavi["title"];?></a></li>
            <?php endforeach ; } ?>
          </ul>
        </li>
        <li class="footer__link-item event"><a href="/event.html">行事</a></li>
      </ul>
        </div>
        <div class="footer__navi-text header__text">
          <ul>
            <li class="header__text-item01"><a href="/sitemap.html">サイトマップ</a></li>
            <li class="header__text-item02"><a href="/access.html">交通案内</a></li>
            <li class="header__text-item03"><a href="/contact.html">お問い合わせ</a></li>
            <li class="footer__icon"><a href="https://www.facebook.com/kongohji/" target="_blank"><img src="/assets/img/sp/icon_fb.png" alt=""></a></li>
            <li class="footer__icon"><a href="https://www.instagram.com/kongoji_hokkaido/" target="_blank"><img src="/assets/img/sp/icon_in.png" alt=""></a></li>
            <li class="footer__icon"><a href="https://www.youtube.com/channel/UCMU20xzRX5SjMi5d_nXMU_Q" target="_blank"><img src="/assets/img/top/icon_yt.png" alt=""></a></li>
          </ul>
        </div>
      </div>
      <div class="footer__icon sp-on">
        <a href="https://www.facebook.com/kongohji/" target="_blank"><img src="/assets/img/sp/icon_fb.png" alt=""></a>
        <a href="https://www.instagram.com/kongoji_hokkaido/" target="_blank"><img src="/assets/img/sp/icon_in.png" alt=""></a>
        <a href="https://www.youtube.com/channel/UCMU20xzRX5SjMi5d_nXMU_Q" target="_blank"><img src="/assets/img/top/icon_yt.png" alt=""></a>
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
