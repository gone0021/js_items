let title = '<input type="text" name="title" class="mr-2" required placeholder="title">';
let start = '<input type="datetime-local" name="start" class="mr-2" required>';
let end = '<input type="datetime-local" name="end" class="mr-2" required>';
let tag = '<select name="tag" id="" class="mr-2">' +
  '<option value="0">趣味</option>' +
  '<option value="1">付き合い</option>' +
  '<option value="2">仕事</option>' +
  '</select>';

let bt_del = '<button type="button" class="btCancel" >削除</button>';
let bt_new = '<input type="submit" name="_post" value="new" class="mb-2 add">';
let bt_edit = '<button type="button" value="編集">';

let inp_new = '<div class="mb-2 add">' + title + start + end + tag + bt_del + '</div>';

let new_flag = false;
let modal_flag = false;

$(function () {
  // 新規ボタン
  $("#btNew").click(function () {
    $("#glayLayer").show();
    $("#modal").show();
    $("#mForm").append('<input type="submit" name="_post" value="new" id="mNew">');
  });

  // 編集ボタン
  $(".btEdit").click(function () {
    // モーダル
    $("#glayLayer").show();
    $("#modal").css("display", "block"); //show()と同じ
    $("#mForm").append('<input type="submit" name="_post" value="edit" id="mEdit">');

    // 確認用
    // let val = $(this).val();
    // $("#mForm").append(val);

    // 非同期post
    $.ajax({
      type: "POST",
      url: "./edit.php",
      data: {
        id: $(this).val()
      },
      //Ajax通信が成功した場合に呼び出されるメソッド
      success: function (data) {
        $('#mTitle').val(data.title);
        $('#mStart').val(data.start);
        $('#mEnd').val(data.end);
        $('#mTag').val(data.tag);
        $('#mMemo').val(data.memo);
      },
      //処理がエラーであれば
      error: function () {
        alert('なんかおかしい');
      }
    });
  });

  // モーダル背景
  $("#glayLayer").click(function () {
    $(this).hide()
    $("#modal").hide();
    $("#mNew").remove();
    $("#mEdit").remove();
  });

  // 削除アラート
  $('.btDel').click(function (e) {
    var message = [
      '削除します'
    ].join('\n')
    if (!window.confirm(message)) {
      e.preventDefault()
    }
  });


  // 保留
  // 追加ボタン
  $("#btAdd").click(function () {
    // submitは一回だけのため有無をflagで判定する
    if (new_flag == false) {
      new_flag = true;
      $('#new').append(bt_new);
    }
    $('#new').
      prepend(inp_new);
  });

  // 追加の削除
  $(document).on("click", ".btCancel", function () {
    $(this).parent().remove();
  });

  // キャンセル
  $("#btCancelAll").click(function () {
    new_flag = false;
    $(".add").remove();
    // $('#new').detach();
  });



});