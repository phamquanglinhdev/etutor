$("#custom-select-time").on("click", function() {
    $("#custom-select-time-option-box").toggle(300);
    $("#custom-select-tags-option-box").hide(300);
    $("#custom-select-other-option-box").hide(300);

});
$("#custom-select-tags").on("click", function() {
    $("#custom-select-tags-option-box").toggle(300);
    $("#custom-select-time-option-box").hide(300);
    $("#custom-select-other-option-box").hide(300);
});
$("#custom-select-other").on("click", function() {
    $("#custom-select-other-option-box").toggle(300);
    $("#custom-select-tags-option-box").hide(300);
    $("#custom-select-time-option-box").hide(300);
});
function toggleFillColor(obj) {
    if ($(obj).prop('checked') == true) {
        $(obj).parent().css("background", '#c6e7ed');
    } else {
        $(obj).parent().css("background", '#FFF');
    }
}
$(".custom-select-option").on("click", function(e) {
    var checkboxObj = $(this).children("input");
    if ($(checkboxObj).prop('checked') == true) {
        $(checkboxObj).prop('checked', false)
    } else {
        $(checkboxObj).prop("checked", true);
    }
    toggleFillColor(checkboxObj);
});