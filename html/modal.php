<div id="modal">
  <form action="./" method="post" id="mForm">

    <div>
      <label for="mTitle">タイトル</label>
      <input type="text" name="title" id="mTitle" value="<?php if(isset($_POST['title'])) echo $_POST['title'];?>" required>
    </div>

    <div>
      <label for="mStart">開始日時</label>
      <input type="datetime-local" name="start" id="mStart" value="<?php if(isset($_POST['start'])) echo date('Y-m-d\TH:i', strtotime($_POST['start'])); ?>" required>
    </div>

    <div>
      <label for="mEnd">開始日時</label>
      <input type="text" name="title" id="mEnd" value="<?php if(isset($_POST['end'])) echo $_POST['end'];?>" required>
      <!-- <input type="datetime-local" name="end" id="mEnd" value="<?php if(isset($_POST['end'])) echo $_POST['end']->format('Y-m-d\TH:i'); ?>" required> -->
    </div>

    <div class="newModal">
      <label for="mTag">タグ</label>

      <select name="tag" id="mTag">
        <?php foreach ($tags as $tag => $t) : ?>
          <option value="<?= $tag ?>" 
          <?php if(isset($_POST['tag']) && $_POST['tag'] == $tag) echo " selected"; ?>>
          <?= $t ?>
        </option>
        <?php endforeach ?>
      </select>
    </div>

    <div>
      <label for="mMemo">メモ</label>
      <textarea name="memo" id="mMemo" cols="30" rows="3">
      <?php if(isset($_POST['memo'])) echo $_POST['memo']; ?>
      </textarea>
    </div>

  </form>
</div>
