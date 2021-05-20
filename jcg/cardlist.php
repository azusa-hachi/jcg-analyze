<?php require_once('lib/library.php'); ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>JCG</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
  <div class="wrapper">
    <?php if (in_array('no-select',$_POST)) { ?>
      <p>入力していない絞り込みがあります。</p>
      <a href="javascript:history.back();">検索画面へ戻る</a>
    <?php } else { ?>
      <?php $listCard = searchCard($_POST['pack_id'],$_POST['rare'],$_POST['cost'],$_POST['class'],$dbh); ?>
      <p>検索結果：<?php echo(count($listCard)); ?>件</p>
      <form method="post" action="result.php">
        <?php for ($i=0; $i<count($listCard); $i++) { ?>
          <button type="submit" name="card_name" value="<?php echo($listCard[$i]['card_name']); ?>">
            <img class="card-img" src="https://shadowverse-portal.com/image/card/phase2/common/C/C_<?php echo($listCard[$i]['card_id']); ?>.png" alt="<?php echo($listCard[$i]['card_name']); ?>">
          </button>
        <?php } ?>
      </form>
    <?php } ?>
  </div>
</body>
</html>