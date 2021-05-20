<?php
require_once('lib/library.php');
$listPack = getPackList($dbh);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>JCG</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
  <div class="wrapper">
    <form method="post" action="cardlist.php">
      <!-- パック名 -->
      <div class="select-box">
        <p>パック名：</p>
        <select name="pack_id">
          <option value="no-select">-選択してください-</option>
          <?php for ($i=0; $i<count($listPack); $i++) { ?>
            <option value="<?php echo($listPack[$i]['id']); ?>">
              <?php echo($listPack[$i]['pack_name']); ?>
            </option>
          <?php } ?>
        </select>
      </div>
      <!-- レアリティ -->
      <div class="select-box">
        <p>レアリティ：</p>
        <select name="rare">
          <option value="no-select">-選択してください-</option>
          <?php for ($i=0;$i<count($listRare); $i++) { ?>
            <option value="<?php echo($listRare[$i]); ?>">
              <?php echo($listRare[$i]); ?>
            </option>
          <?php } ?>
        </select>
      </div>
      <!-- クラス -->
      <div class="select-box">
        <p>クラス：</p> 
        <select name="class">
          <option value="no-select">-選択してください-</option>
          <?php for ($i=0; $i<count($listClass); $i++) { ?>
            <option value="<?php echo($listClass[$i]); ?>">
              <?php echo($listClass[$i]); ?>
            </option>
          <?php } ?>
        </select>
      </div>
      <!-- コスト -->
      <div class="select-box">
        <p>コスト：</p> 
        <select name="cost">
          <option value="no-select">-選択してください-</option>
          <?php for ($i=0; $i<13; $i++) { ?>
            <option value="<?php echo($i); ?>">
              <?php echo($i); ?>
            </option>
          <?php } ?>
        </select>
      </div>
      <input type="submit" value="検索" name="">
    </form>
  </div>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.min.js"></script>
<script src="js/script.js"></script>
</html>