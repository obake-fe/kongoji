<?php
// ■■■setting start■■■ 	========================================================
// ●送信元emailアドレス
$from_email = "info@kongoji.or.jp";
// ●完了時用リダイレクトHTML
$thanks_html = "contact_thanks.html";
// ●自動返信メール
$auto_mail_flg = true;  // 				自動返信があるか （ON：true, OFF:false）
$auto_subject = "【樺戸山 金剛寺】お問い合わせいただきありがとうございます"; // 				自動返信メールの件名
// ●管理者用送信メール
$admin_subject = "【樺戸山 金剛寺】ホームページからお問い合わせがありました"; // 			管理者用メールの件名
$admin_emails = array("info@kongoji.or.jp");
// 									管理者用送信メール
// ■■■setting end■■■ 		========================================================
// ■■■option start■■■ 	========================================================
// ■都道府県
$prefs = array(1=>"北海道",2=>"青森県",3=>"岩手県",4=>"宮城県",5=>"秋田県",6=>"山形県",7=>"福島県",8=>"茨城県",9=>"栃木県",10=>"群馬県",11=>"埼玉県",12=>"千葉県",13=>"東京都",14=>"神奈川県",15=>"新潟県",16=>"富山県",17=>"石川県",18=>"福井県",19=>"山梨県",20=>"長野県",21=>"岐阜県",22=>"静岡県",23=>"愛知県",24=>"三重県",25=>"滋賀県",26=>"京都府",27=>"大阪府",28=>"兵庫県",29=>"奈良県",30=>"和歌山県",31=>"鳥取県",32=>"島根県",33=>"岡山県",34=>"広島県",35=>"山口県",36=>"徳島県",37=>"香川県",38=>"愛媛県",39=>"高知県",40=>"福岡県",41=>"佐賀県",42=>"長崎県",43=>"熊本県",44=>"大分県",45=>"宮崎県",46=>"鹿児島県",47=>"沖縄県");
// ■■■option end■■■ 		========================================================
// ■■■mailbody start■■■ 		========================================================
// ●自動返信メールのテンプレート
function getAutoMess($prefs){
  $auto_mess = "";
  $auto_mess .= getPost("shi") . getPost("mei") . '様' . "\r\n";
  $auto_mess .= '' . "\r\n";
  $auto_mess .= 'このメールは自動返信システムにより送信しています。' . "\r\n";
  $auto_mess .= '' . "\r\n";
  $auto_mess .= 'お問い合わせいただきありがとうございました。' . "\r\n";
  $auto_mess .= '' . "\r\n";
  $auto_mess .= 'お名前：' . getPost("shi") . getPost("mei") . "\r\n";
  $auto_mess .= 'フリガナ：' . getPost("kana_shi") . getPost("kana_mei") . "\r\n";
  $auto_mess .= 'ご住所：' . getPost("zip") . " " . $prefs[getPost("prefecture")] . " " . getPost("addr") . " " . getPost("addr2") . " \r\n";
  $auto_mess .= '電話番号：' . getPost("tel") . "\r\n";
  $auto_mess .= 'メールアドレス：' . getPost("email") . "\r\n";
  $auto_mess .= '問い合せ内容：' . getPost("content") . "\r\n";
  return $auto_mess;
}
// ●管理者用送信メールのテンプレート
function getAdminMess($prefs){
  $admin_mess = "";
  $admin_mess .= 'ご担当者様' . "\r\n";
  $admin_mess .= 'ホームページより問い合せがありました。' . "\r\n";
  $admin_mess .= 'お名前：' . getPost("shi") . getPost("mei") . "\r\n";
  $admin_mess .= 'フリガナ：' . getPost("kana_shi") . getPost("kana_mei") . "\r\n";
  $admin_mess .= 'ご住所：' . getPost("zip") . " " . $prefs[getPost("prefecture")] . " " . getPost("addr") . " " . getPost("addr2") . " \r\n";
  $admin_mess .= '電話番号：' . getPost("tel") . "\r\n";
  $admin_mess .= 'メールアドレス：' . getPost("email") . "\r\n";
  $admin_mess .= '問い合せ内容：' . getPost("content") . "\r\n";
  return $admin_mess;
}
// ■■■mailbody end■■■ 		========================================================
// ■■■control start■■■ 	========================================================
// ●バリデーション
function valiForm() {
  $errormsgs = array();
  
  if (getPost("shi") == "" || getPost("mei") == "") {
    array_push($errormsgs, "お名前は必須項目です。");
  }
  if (getPost("kana_shi") == "" || getPost("kana_mei") == "") {
    array_push($errormsgs, "フリガナは必須項目です。");
  }
  if (getPost("email") == "") {
    array_push($errormsgs, "メールアドレスは必須項目です。");
  } else if (!preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", getPost("email"))) {
    array_push($errormsgs, "メールアドレスの形式が間違っています。");
  }
  if (getPost("email") != getPost("email_confirm")) {
    array_push($errormsgs, "メールアドレス(確認用)が一致しません。");
  }
  if (getPost("content") == "") {
    array_push($errormsgs, "お問い合わせ内容は必須項目です。");
  }
  return $errormsgs;
}
// 以下修正不要箇所
$errormsgs = array();
if($_SERVER["REQUEST_METHOD"] == "POST" && getPost("type")){
  // バリデーション
  $errormsgs = valiForm();
  $type = getPost("type", $type);
  // input の場合、確認画面
  if ($type == "input") {
    if (count($errormsgs) == 0) {
      // メール送信
      if ($auto_mail_flg) { // 自動返信メールがONの場合
        sendMailForm(getPost("email"), $auto_subject, getAutoMess($prefs), $from_email);
      }
      foreach ($admin_emails as $admin_email) :
        sendMailForm($admin_email, $admin_subject, getAdminMess($prefs), $from_email);
      endforeach;
      // 送信後、thanks画面にリダイレクト
      header('Location: ' . $thanks_html);
      exit;
    }
  }
}
if ($type == "" || $type == "back") {
  $type = "input";
}
// ■■■control end■■■ 		========================================================
// ■■■funtion start■■■ 	========================================================
// ■POST取得用
function getPost($key, $value = ""){
  if (isset($_POST[$key])) {
    return htmlspecialchars($_POST[$key] ,ENT_QUOTES);
  }
  return $value;
}
// ■mail送信
function sendMailForm($to, $subject, $mess, $from_email){
  $from = 'From: ' . $from_email;
  mb_language('uni');
  mb_internal_encoding('UTF-8');
  mb_send_mail($to, $subject, $mess, $from); //メール送信
}
// ■■■funtion end■■■ 		========================================================