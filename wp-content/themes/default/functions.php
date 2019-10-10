<?php

add_action( 'wp_head', function() {
  if (is_page( array(157) )) {
      // 本文
      remove_filter('the_content', 'wpautop');
      // 抜粋
      remove_filter('the_excerpt', 'wpautop');
  }
});

global $title;
global $description;
global $cur;
global $pagetype;
global $mypagename;

function setImage($image, $class_name = ""){
  if (isset($image['url'])) {
    return '<img src="' . $image['url'] . '" alt="" class="' . $class_name . '">';
  }
  return "";
}

function setImageLightbox($image, $class_name = ""){
$html = "";
  if (isset($image['url'])) {
$html = $html . '<div class="modal-box ' .$class_name. ' mg40px">';
$html = $html . '<a href="' . $image['url'] . '" rel="lightbox">';
$html = $html . '<img src="' . $image['url'] . '" alt="">';
$html = $html . '<span><img src="/assets/img/contents/about_shinshikoku_45.png" alt=""></span>';
$html = $html . '</a>';
$html = $html . '</div>';
    return $html;
  }
  return "";
}
