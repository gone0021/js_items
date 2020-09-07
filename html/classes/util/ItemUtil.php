<?php
$root = $_SERVER['DOCUMENT_ROOT'];
$root .= "/data/js_items/html";
require_once($root . "/classes/util/SessionUtil.php");
require_once($root . "/classes/model/ItemModel.php");

class Itemutil
{
  public function database()
  {
    $itemModel = new ItemModel();
    if (isset($_POST['_post'])) {
      $data = array(
        'id' => $_POST['id'],
        'title' => $_POST['title'],
        'start' => $_POST['start'],
        'end' => $_POST['end'],
        'start_time' => $_POST['start_time'],
        'end_time' => $_POST['end_time'],
        'tag' => $_POST['tag'],
        'memo' => $_POST['memo'],
      );

      // insert
      if ($_POST['_post'] == 'new') {
        try {
          $itemModel->insert($data);
          header('Location: ./');
        } catch (Exception $e) {
          // var_dump($e);exit;
          header('Location: ./error.php');
        }
        // update
      } elseif ($_POST['_post'] == 'edit') {
        try {
          $itemModel->update($data);
          header('Location: ./');
        } catch (Exception $e) {
          // var_dump($e);exit;
          header('Location: ./error.php');
        }
        // delete
      } elseif ($_POST['_post'] == 'delete') {
        try {
          $itemModel->delete($_POST['id']);
          // var_dump($_POST['id']);
          header('Location: ./');
        } catch (Exception $e) {
          // var_dump($e);exit;
          header('Location: ./error.php');
        }
      }
    }
  }
}
