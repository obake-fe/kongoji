<?php $mypagename = "top";?>
<?php $title = "樺戸山 金剛寺 | 北海道の高野山真言宗のお寺 先祖供養、護摩祈祷";?>
<?php $description = "樺戸山金剛寺は北海道・浦臼町にある高野山真言宗のお寺です。空知周辺（樺戸郡、岩見沢市、砂川市、滝川市等）および札幌市、旭川市などから参拝頂けます。先祖供養、永代供養、厄除け・厄払いなど祈祷祈願を執り行います。";?>
<?php get_header(); ?>
  <div class="news__title sp-on">
    <a href=""><img src="assets/img/sp/title_news.png" alt=""></a>
  </div>
  <section class="news">
    <div class="wrap">
      <div class="news__box">
        <ul class="news__block">
<?php $loop = new WP_Query( array( 'post_type' => 'post', 'posts_per_page' => 5 ) ); ?>
<?php if ($loop->have_posts()): ?>
 <?php while ( $loop->have_posts() ) : $loop->the_post();
 $post = get_post( $post );
  ?>
 <?php
   $cat = get_the_category();
   $cat = $cat[0];
 ?>
  <li class="news__list">
    <div class="news__item news__date"><?php the_time("Y.m.d") ?></div>
    <div class="news__item news__category"><img src="assets/img/top/icon_<?php echo $cat->slug;?>.png" alt=""></div>
    <div class="news__item news__text"><a href="<?php echo get_permalink( $post->ID ); ?>"><?php the_title(); ?><?php $flg = get_post_meta($post->ID,"new_flag");if( $flg[0]): ?></a><span class="news__newicon">NEW</span><?php endif;?></div>
  </li>
 <?php endwhile; ?>
<?php endif; ?>
        </ul>
        <p class="news__more pc-on"><a href="/news.html">もっと見る</a></p>
        <a href="/news.html"><img src="assets/img/sp/btn_more.png" alt="" class="btn_more sp-on"></a>
      </div>
      <div class="news__title pc-on">
        <a href="/news.html"><img src="assets/img/top/title_news.png" alt=""></a>
      </div>
    </div>
  </section>
  <section class="photo">
    <div class="wrap">
      <div class="photo__block">
<?php $loop = new WP_Query( array( 'post_type' => 'page', 'posts_per_page' => 100 ) ); ?>
<?php if ($loop->have_posts()): ?>
 <?php while ( $loop->have_posts() ) : $loop->the_post();
 $post = get_post( $post );
 if (get_field('pcthum' , $page->ID )) {
  ?>
  <div class="photo__item"><a href="<?php echo get_permalink( $post->ID ); ?>"><?php echo setImage(get_field('pcthum' , $page->ID )); ?></a></div>
 <?php
  }
  endwhile; ?>
<?php endif; ?>
      </div>
    </div>
  </section>
<?php get_footer(); ?>