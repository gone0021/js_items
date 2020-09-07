<?php
$root = $_SERVER['DOCUMENT_ROOT'];
$root .= "/data/js_items/html";
require_once($root . "/classes/util/SessionUtil.php");
require_once($root . "/classes/util/ItemUtil.php");
require_once($root . "/classes/model/ItemModel.php");

SessionUtil::sessionStart();
// セッションに保存されたPOSTデータを削除
// unset($_SESSION['']);

try {
  $db = new ItemModel();
  $items = $db->getAll();
} catch (Exception $e) {
  echo 'index';
  echo '<pre>' . $e . '</pre>';
  // var_dump($e);
  exit;
}

$itemUtil = new Itemutil();
$itemUtil->database();

$tags = ['趣味', '付き合い', '仕事'];

$th_title = ['タイトル', '開始日', '終了日', 'タグ', 'メモ', '編集',];

foreach ($items as $k)
  $id = $k['id'];
var_dump($id);

if (isset($_POST['end'])) var_dump($_POST['end']);

?>
<!DOCTYPE html>
<html>
<?php require_once($root . "./head.php"); ?>

<body>
  <div class="container">
    <h1>
      <a href="./index.php">Itemリスト</a> <br>
    </h1>

    <button type="button" class="m-2" id="btNew">新規登録</button>
    <button type="button" class="m-2" id="btAdd">+</button>
    <button type="button" class="" id="btCancelAll">キャンセル</button>

    <p class="mEnd">

      <?php
      if (isset($_POST['end'])) var_dump($_POST['end']);
      ?>
    </p>

    <!-- <div id="new"> -->
    <form action="./index.php" method="post" id="new">
      <input type="hidden" name="post" value="_new" id="">
    </form>

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
        <?php foreach ($items as $k => $v) : ?>
          <tr class="">
            <td id="title<?= $k ?>"><?= $v['title'] ?></td>
            <td>
              <div id="start"> <?= date('y/m/d', strtotime($v['start'])) ?> </div>
              <div id="startTime"> <?= date('H:i', strtotime($v['start_time'])) ?> </div>
            </td>
            <td>              
              <div id="end"><?= date('y/m/d', strtotime($v['end'])) ?></div>
              <div id="endTime"><?= date('H:i', strtotime($v['end_time'])) ?>
            </td>
            <td id="tag">
              <?php foreach ($tags as $tag => $t) {
                if ($v['tag'] == $tag) echo $t;
              } ?>
            </td>
            <td id="memo"><?= $v['memo'] ?></td>
            <td id="send">
              <!-- edit:test -->
              <!-- <form action="_edit.php" method="POST" class="">
                <input type="text" name="id" value="<?= $v['id'] ?>">
                <input type="submit" value="edit" class="">
              </form> -->

              <!-- bt-edit & submit-delete -->
              <form action="index.php" method="POST" class="">
                <input type="text" name="id" class="inpId" value="<?= $v['id'] ?>">

                <button type="button" name="edit" value="<?= $v['id'] ?>" class="mr-2 btEdit">編集</button>

                <input type="submit" name="_post" value="delete" class="btDel">
              </form>
            </td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>

    <!-- modal -->
    <div id='glayLayer'></div>
    <?php require_once($root . "./modal.php"); ?>
  </div>

  <script type="text/javascript" src="./js/main.js">
    var now = <?= $now ?>
  </script>
</body>

</html>