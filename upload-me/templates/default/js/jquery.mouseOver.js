// Detects if mouse is over element
// @author : http://stackoverflow.com/questions/8981463/detect-if-hovering-over-element-with-jquery
jQuery.fn.mouseIsOver = function () {
   	return $(this).parent().find($(this).selector + ":hover").length > 0;
}; 