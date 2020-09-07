<?php

$root = $_SERVER['DOCUMENT_ROOT'];
$root .= '/data/js_items/html';
require_once($root . '/classes/model/BaseModel.php');
require_once($root . '/classes/model/ItemModel.php');

$itemModel = new ItemModel();

$id = $_POST['id'];

try {
  // idによる検索
  $ret = $itemModel->getItemById($id);
} catch (Exception $e) {
  echo 'edit';
  echo '<pre>' . $e . '</pre>';
  // 例外の内容を知りたいとき
  // echo json_encode(array('msg' => $e->getMessage()));
  exit;
}

$th_title = ['タイトル', '開始日', '終了日', 'タグ', 'メモ',];

var_dump($_POST['id']);

?>
<!DOCTYPE html>
<html>
<?php require_once($root . "./head.php"); ?>

<body>
  <div class="container">
    <h1>
      <a href="./index.php">Itemリスト</a> <br>
    </h1>

    <table class="table">
      <!-- tbale header -->
      <thead>
        <tr>
          </th>
          <?php foreach ($th_title as $v) { ?>
            <th> <?= $v ?> </th>
          <?php } ?>
        </tr>
      </thead>

      <!-- table body -->
      <tbody>
        <tr class="">
          <td id="title"><?= $ret['title'] ?></td>
          
          <td>
            <div id="sTime"><?= date('H:i', strtotime($ret['start_time'])) ?></div>
            <div id="start"><?= date('y/m/d', strtotime($ret['start'])) ?></div>
          </td>

          <td>
            <div id="end"><?= date('Y-m-d', strtotime($ret['end'])) ?></div>
            <div id="sTime"><?= date('H:i', strtotime($ret['end_time'])) ?></div>
          </td>

          <td id="tag"><?= $ret['tag'] ?></td>
          <td id="memo"><?= $ret['memo'] ?></td>
        </tr>
      </tbody>

    </table>
</body>

</html>