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
      // insert
      if ($_POST['_post'] == 'new') {
        $data = array(
          'title' => $_POST['title'],
          'start' => $_POST['start'],
          'end' => $_POST['end'],
          'tag' => $_POST['tag'],
          'memo' => $_POST['memo'],
        );
        try {
          $itemModel->insert($data);
          header('Location: ./');
        } catch (Exception $e) {
          // var_dump($e);exit;
          header('Location: ./error.php');
        }
        // update
      } elseif ($_POST['_post'] == 'edit') {
        $data = array(
          'title' => $_POST['title'],
          'start' => $_POST['start'],
          'end' => $_POST['end'],
          'tag' => $_POST['tag'],
          'memo' => $_POST['memo'],
        );
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
