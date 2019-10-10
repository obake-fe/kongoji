<?php $pagecategory = get_term(get_field( 'pagecategory', $page->ID )); ?>
<?php $mypagename = $pagecategory->slug; ?>
<?php $pagecategoryname = $pagecategory->name; ?>
<?php $title = get_the_title($page->ID) . " " . $pagecategory->name . "　北海道の高野山真言宗のお寺 供養、護摩 | 樺戸山 金剛寺";?>
<?php $description = "北海道・浦臼町にある高野山真言宗のお寺、樺戸山金剛寺の" . $pagecategory->name . " " . get_the_title($page->ID) . "です。";?>
<?php $content= get_page($page->ID); ?>
<?php get_header(); ?>
<section class=contents>
  <div class="wrap">
    <div class="contents__directory bghome"><a href="/">トップ</a> ＞ <?php echo $pagecategoryname; ?> ＞ <?php echo get_the_title($content->ID); ?></div>
    <h1 class="contents__title"><?php echo get_the_title($content->ID); ?></h1>
    <div class="contents__box">
      <div class="contents__inner">
        <?php if (get_field('mainphoto' , $content->ID )) { ?>
        <div class="contents__mainimage pc-on">
          <?php echo setImage(get_field('mainphoto' , $content->ID )); ?>
        </div>
        <div class="contents__mainimage sp-on">
          <?php echo setImage(get_field('mainphoto' , $content->ID )); ?>
        </div>
        <?php } ?>
        <div class="contents__text"><?php echo nl2br($content -> post_content);?></div>

        <div class="modalwrap">
          <?php echo setImageLightbox (get_field('pagephoto1' , $content->ID ), 'no1') ; ?> 
          <?php echo setImageLightbox (get_field('pagephoto2' , $content->ID ), 'no2') ; ?> 
          <?php echo setImageLightbox (get_field('pagephoto3' , $content->ID ), 'no1') ; ?> 
          <?php echo setImageLightbox (get_field('pagephoto4' , $content->ID ), 'no2') ; ?> 
        </div>

      </div>
    </div>
    <div class="return">
<!--      <a href="">< <?php echo get_the_title($page->ID); ?></a>-->
      <a href="/">トップページへ戻る</a>
    </div>
  </div>
</section>
<?php get_footer(); ?>
