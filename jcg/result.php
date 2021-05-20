<?php
if ($_POST['card_name'] == NULL) {
  //リンク直貼りによる訪問をindexへリダイレクト
  header('Location: index.php');
  exit;
} else {
  require_once('lib/library.php');
  $cardName = $_POST['card_name'];
  //大会リンク一覧を取得
  $packNow = getPackNow($dbh).'th';
  $linkCompList = getLinkCompList($packNow);
  //カードのハッシュ値一覧を取得
  $cardIdList = getCardId($cardName,$dbh);
  foreach ($cardIdList as $cardId) {
    var_dump(getHash($cardId,$hashCharacter));
  }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>JCG</title>
</head>
<body>
<?php
var_dump(searchHtml());
?>
</body>
</html>
<?php } ?>