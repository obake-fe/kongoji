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
<!doctype html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title><?php echo $title;?></title>
  <meta name="description" content="<?php echo $description;?>">
  <meta name="keywords" content="金剛寺,北海道,空知,樺戸,浦臼,岩見沢,砂川,滝川,札幌,旭川,真言宗,高野山,高野山真言宗,樺戸山金剛寺,厄除け,厄払い,護摩,護摩祈祷,不動護摩,星供,年始祈祷,祈祷祈願,祈祷,祈願,お祓い,家内安全,身体堅固,交通安全,安産祈願,開運厄除,商売繁盛,学業成就,合格祈願,心願成就,良縁吉祥,お寺,寺,寺院,供養,先祖供養,永代供養,水子供養,灯籠流し,葬儀,法事,仏事,七五三祈祷,車お祓い,御詠歌,宗教舞踊,寺子屋,新四国八十八ヶ所,鶴沼">
  <link href="https://fonts.googleapis.com/css?family=Sawarabi+Mincho" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Sawarabi+Gothic" rel="stylesheet">
  <link rel="stylesheet" href="/assets/css/style.css">
  <link rel="stylesheet" href="/assets/css/jquery.bxslider.css">
  <link rel="stylesheet" href="/assets/css/lightbox.css">
  <link href="https://fonts.googleapis.com/earlyaccess/sawarabimincho.css" rel="stylesheet">
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-91162558-1', 'auto');
  ga('send', 'pageview');

</script>
</head>
<body id="<?php echo $mypagename;?>">

<header class="header">
  <div class="header__top">

    <div class="header__sns">
        <a href="https://www.facebook.com/kongohji/" target="_blank"><img src="/assets/img/sp/icon_fb.png" alt=""></a>
        <a href="https://www.instagram.com/kongoji_hokkaido/" target="_blank"><img src="/assets/img/sp/icon_in.png" alt=""></a>
        <a href="https://www.youtube.com/channel/UCMU20xzRX5SjMi5d_nXMU_Q" target="_blank"><img src="/assets/img/top/icon_yt.png" alt=""></a>
    </div>

  </div>
  <nav class="gnavi pc-on">
    <div class="gnavi__wrapper">
      <ul class="gnavi__block" id="menu">
        <li class="gnavi__item top"><a href="/"></a></li>
        <li class="gnavi__item about about_history about_keidai">金剛寺について
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
        <li class="gnavi__item kitoukigan">祈祷祈願
          <ul class="child">
            <?php if(isset($gnavis["kitoukigan"])) { foreach ($gnavis["kitoukigan"] as $gnavi) : ?>
            <li><a href="<?php echo $gnavi['url'];?>"><?php echo $gnavi["title"];?></a></li>
            <?php endforeach ; } ?>
          </ul>
        </li>
        <li class="gnavi__item funeral">
          <a href="/funeral/">葬儀</a>
        </li>
        <li class="gnavi__item kuyou">供養
          <ul class="child">
            <?php if(isset($gnavis["kuyou"])) { foreach ($gnavis["kuyou"] as $gnavi) : ?>
            <li><a href="<?php echo $gnavi['url'];?>"><?php echo $gnavi["title"];?></a></li>
            <?php endforeach ; } ?>
          </ul>
        </li>
        <?php if (isset($mypagename) && $mypagename == "top") { ?> 
          <li class="gnavi__item topImg"></li>
        <?php } ?> 
        <li class="gnavi__item taiken">体験
          <ul class="child">
            <?php if(isset($gnavis["taiken"])) { foreach ($gnavis["taiken"] as $gnavi) : ?>
            <li><a href="<?php echo $gnavi['url'];?>"><?php echo $gnavi["title"];?></a></li>
            <?php endforeach ; } ?>
          </ul>
        </li>
        <li class="gnavi__item gnavi__item-last event"><a href="/event.html">行事</a></li>
        <li class="gnavi__item gnavi__item-last accessNav"><a href="/access.html">交通案内</a></li>
        <li class="gnavi__item gnavi__item-last contactNav"><a href="/contact.html">お問い合わせ</a></li>
      </ul>
    </div>
  </nav>
</header>

<div class="contents">
<?php if (isset($mypagename) && $mypagename == "top") { ?> 
  <div>
    <ul class="keyvisual">
      <li class="keyvisualItem img01"></li>
      <li class="keyvisualItem img02"></li>
      <li class="keyvisualItem img03"></li>
      <li class="keyvisualItem img04"></li>
    </ul>
  </div>

<?php } ?> 

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