<?php $pagecategory = get_term(get_field( 'pagecategory', $page->ID )); ?>
<?php $mypagename = $pagecategory->slug; ?>
<?php $pagecategoryname = $pagecategory->name; ?>
<?php $title = "お知らせ " . get_the_title($page->ID) . " 北海道の高野山真言宗のお寺 供養、護摩 | 樺戸山 金剛寺";?>
<?php $description = "北海道・浦臼町にある高野山真言宗のお寺、樺戸山金剛寺の" . get_the_title($page->ID) . "です。";?>
<?php $content= get_page($page->ID); ?>
<?php get_header(); ?>
<section class=contents>
  <div class="wrap">
    <div class="contents__directory bghome"><a href="/">トップ</a> ＞ <a href="/news.html">お知らせ</a> ＞ <?php echo get_the_title($content->ID); ?></div>
    <h1 class="contents__title"><?php echo get_the_title($content->ID); ?></h1>
    <div class="">
      <div class="contents__inner">
        <div class="contents__text"><?php echo nl2br($content -> post_content);?></div>
      </div>
    </div>
    <div class="return">
      <a href="/news.html">お知らせ一覧へ戻る</a>
    </div>
  </div>
</section>
<?php get_footer(); ?>
