<?php include $_SERVER['DOCUMENT_ROOT']. '/wp-load.php'; ?>
<?php require('contact_function.php'); ?>
<?php $mypagename = "top";?>
<?php $title = "樺戸山 金剛寺 | 北海道の高野山真言宗のお寺 先祖供養、護摩祈祷";?>
<?php $description = "樺戸山金剛寺は北海道・浦臼町にある高野山真言宗のお寺です。空知周辺（樺戸郡、岩見沢市、砂川市、滝川市等）および札幌市、旭川市などから参拝頂けます。先祖供養、永代供養、厄除け・厄払いなど祈祷祈願を執り行います。";?>
<?php get_header(); ?>
  <div class="news__title sp-on">
    <a href=""><img src="http://kongoji.local/wp-content/uploads/2019/10/top_news_SP.png" alt=""></a>
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
        <p class="news__more"><a href="/news.html">もっと見る</a></p>
      </div>
      <div class="news__title pc-on">
        <a href="/news.html"><img src="http://kongoji.local/wp-content/uploads/2019/10/top_news_PC.png" alt=""></a>
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
  <section class="top__access">
    <div class="top__access__inner">
      <div class="top__access__textWrap">
        <div class="top__access__img"></div>
        <p class="top__access__text">〒061-0600<br>北海道樺戸郡浦臼町字キナウスナイ196-31</p>
        <div class="top__access__linkWrap">
          <a class="top__access__link" href="/access.html">交通手段ごとのアクセス情報</a>
        </div>
      </div>
      <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2896.591545203427!2d141.8312713154911!3d43.44824597912888!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x5f0b5faa09406aeb%3A0x54276a82ffe5ae06!2z6auY6YeO5bGx55yf6KiA5a6XIOaouuaIuOWxsSDph5HliZvlr7o!5e0!3m2!1sja!2sjp!4v1569739828599!5m2!1sja!2sjp" width="100%" height="390" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
    </div>
  </section>
  <section>
    <div class="top__form__inner">
      <div class="top__form__textWrap">
        <div class="top__form__img"></div>
        <p class="top__form__text">お気軽に問い合わせください。<br class="only-PC">お電話でのお問い合わせも受け付けております。</p>
        <div class="top__form__linkWrap">
          <a class="top__form__link sp-on" href="tel:0125682202">お電話にて問い合わせる</a>
        </div>
      </div>
      <?php if (count($errormsgs)) { ?>
      <p class="required-text">
      <?php foreach ($errormsgs as $errormsg) : ?>
      <span class="required-mark"><?php echo $errormsg;?></span><br>
      <?php endforeach ; ?>
      </p>
      <?php } ?>
      <form action="contact.html" method="post">
        <input type="hidden" name="type" value="input">
        <table class="contactForm topForm">
          <tr class="contactForm__box topForm">
            <th class="contactForm__head topForm">お名前<span class="required">必須</span></th>
            <td class="contactForm__body topForm">
              <span class="brafter topFormHalf"><label class="contactForm__label">姓</label><input class="contactForm__textarea topForm topFormName mg10px" type="text" name="shi" value="<?php echo getPost('shi'); ?>" placeholder="山田"></span>
              <label class="contactForm__label">名</label><input class="contactForm__textarea topForm topFormName" type="text" name="mei" value="<?php echo getPost('mei'); ?>" placeholder="太郎">
            </td>
          </tr>
          <tr class="contactForm__box topForm">
            <th class="contactForm__head topForm">フリガナ<span class="required">必須</span></th>
            <td class="contactForm__body topForm">
              <span class="brafter topFormHalf"><label class="contactForm__label">セイ</label><input class="contactForm__textarea topForm topFormKana mg10px" type="text" name="kana_shi" value="<?php echo getPost('kana_shi'); ?>" placeholder="ヤマダ"></span>
              <label class="contactForm__label">メイ</label><input class="contactForm__textarea topForm topFormKana" type="text" name="kana_mei" value="<?php echo getPost('kana_mei'); ?>" placeholder="タロウ">
            </td>
          </tr>
          <tr class="contactForm__box topForm">
            <th class="contactForm__head topForm">メールアドレス<span class="required">必須</span></th>
            <td class="contactForm__body topForm">
              <input class="contactForm__textarea topForm topFormMail" type="text" name="email" value="<?php echo getPost('email'); ?>">
              <p class="contactForm__text">念の為もう一度入力して下さい</p>
              <input class="contactForm__textarea topForm topFormMail" type="text" name="email_confirm" value="<?php echo getPost('email_confirm'); ?>">
            </td>
          </tr>
          <tr class="contactForm__box topForm">
            <th class="contactForm__head topForm">お問い合わせ<span class="required">必須</span></th>
            <td class="contactForm__body topForm topFormContact">
              <textarea class="contactForm__textarea topForm topFormContact" name="content"><?php echo getPost('content'); ?></textarea>
            </td>
          </tr>
        </table>
        <p class="top__contactForm__txt">以下は任意で記載をお願いします。</p>
        <table class="contactForm topForm">
          <tr class="contactForm__box topForm">
            <th class="contactForm__head topForm">電話番号</th>
            <td class="contactForm__body topForm">
              <input class="contactForm__textarea" type="text" name="tel" value="<?php echo getPost('tel'); ?>">
              <br>
              <span class="exam">例)　000-0000-0000</span>
            </td>
          </tr>
          <tr class="contactForm__box topForm">
            <th class="contactForm__head topForm">郵便番号</th>
            <td class="contactForm__body topForm">
              <input class="contactForm__textarea" type="text" name="zip" value="<?php echo getPost('zip'); ?>" onKeyUp="AjaxZip2.zip2addr(this,'prefecture','addr');" placeholder="0000000">
              <br>
              <span class="exam">※ハイフンなしで入力してください</span>
            </td>
          </tr>
          <tr class="contactForm__box topForm">
            <th class="contactForm__head topForm">ご住所</th>
            <td class="contactForm__body topForm vtatop">
              <p class="contactForm__text">都道府県</p>
              <select name="prefecture">
                <option value="">選択して下さい</option>

                  <?php foreach ($prefs as $key => $pref) : ?>
                  <?php   if ($key == getPost('prefecture')) { ?>
                  <option value="<?php echo $key;?>" selected><?php echo $pref;?></option>
                  <?php   } else { ?>
                  <option value="<?php echo $key;?>"><?php echo $pref;?></option>
                  <?php   } ?>
                  <?php endforeach ; ?>

              </select>
              <p class="contactForm__text">市区群町村</p>
              <input class="contactForm__textarea topFormAddress" type="text" name="addr" value="<?php echo getPost('addr'); ?>">
              <p class="contactForm__text">丁目番地号 建物名等</p>
              <input class="contactForm__textarea topFormAddress" type="text" name="addr2" value="<?php echo getPost('addr2'); ?>">
            </td>
          </tr>
        </table>
        <div class="sendBtn topForm">
          <div class="sendBtn__inner topForm">
            <input class="sendBtn__input topForm" type="submit" value="送信">
          </div>
        </div>
      </form>
    </div>
  </section>
<?php get_footer(); ?>