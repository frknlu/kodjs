
$("input:checkbox").on('click', function() {

  var $box = $(this);
  if ($box.is(":checked")) {

    var group = "input:checkbox[box='" + $box.attr("box") + "']";
    $(group).prop("checked", false);
    $box.prop("checked", true);
  } else {
    $box.prop("checked", false);
  }
});