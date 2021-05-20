<?php
//パック一覧を取得
function getPackList($dbh) {
    $sqlPack = 'SELECT * FROM packs WHERE visible = 1';
    $queryPack = $dbh->query($sqlPack);
    $listPack = array();
    while ($rowPack = $queryPack->fetch(PDO::FETCH_ASSOC)) {
        $listPack[] = $rowPack;
    }
    return $listPack;
}

//最新弾の番号を取得
function getPackNow($dbh) {
    $sqlPack = 'SELECT MAX(id) AS id FROM packs';
    $queryPack = $dbh->query($sqlPack);
    $nowPack = $queryPack->fetch();
    return $nowPack[0];
}

//検索機能
function searchCard($pack_id,$rare,$cost,$class,$dbh) {
    $sqlCard = 'SELECT * FROM cards WHERE pack_id = "'.$pack_id.'" AND rare = "'.$rare.'" AND cost = "'.$cost.'" AND class = "'.$class.'" AND visible = 1';
    $queryCard = $dbh->query($sqlCard);
    $listCard = array();
    while ($rowCard = $queryCard->fetch(PDO::FETCH_ASSOC)) {
        $listCard[] = $rowCard;
    }
    return $listCard;
}

//大会URLを取得
function getLinkCompList($packNow) {
    $linkCompList = array();
    for ($i=1; $i<5; $i++) {
        $htmlTop = file_get_html("https://sv.j-cg.com/past-schedule/rotation?page=$i");
        $hrefTop = $htmlTop->find('a[class=schedule-link]');
        $nameTop = $htmlTop->find('div[class=schedule-title]');
        for ($j=0; $j<10; $j++) {
            $nameComp = $nameTop[$j*2+1]->plaintext;
            if (strpos($nameComp, $packNow)==false) {
              break 2;
            }
            $linkComp = $hrefTop[$j*2+1]->href;
            $linkCompList[] = $linkComp;
        }
    }
    $htmlTop->clear();
    return $linkCompList;
}

//カード名からカードIDの取得
function getCardId($cardName,$dbh) {
    $sqlId = 'SELECT card_id FROM cards WHERE card_name = "'.$cardName.'"';
    $queryId = $dbh->query($sqlId);
    $cardIdList = array();
    while ($rowId = $queryId->fetch(PDO::FETCH_COLUMN)) {
        $cardIdList[] = $rowId;
    }
    return $cardIdList;
}

//カードIDのハッシュ化
function getHash($cardId,$hashCharacter) {
    $returnHash = '';
    for ($i=0; $i<5; $i++) {
        $hashNo = $cardId % 64;
        $returnHash = $hashCharacter[$hashNo].$returnHash;
        $cardId = floor($cardId/64);
    }
    return $returnHash;
}

function searchHtml() {
    $getDom = file_get_html("https://sv.j-cg.com/competition/lUbQgfVlxR7r/bracket#/1");

    $matchBox = $getDom->find('div[class=match has-left-team]');
    var_dump($getDom);
    return $matchBox;
}