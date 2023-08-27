let cssDiv = document.getElementById("customCss");
let cssTextArea = document.getElementById("sunset_custom_css");
let cssForm = document.getElementById("css-form-submit");
jQuery(document).ready(function ($) {});

var editor = ace.edit("customCss");
console.log(cssForm);
editor.setTheme("ace/theme/monokai");
editor.getSession().setMode("ace/mode/css");

let updateText = function () {
  cssTextArea.value = editor.getSession().getValue();
  console.log(cssTextArea.value);
};

cssDiv.addEventListener("keydown", updateText);

// cssForm.addEventListener("submit", function (e) {
//   e.preventDefault();
//   cssForm.submit();
// });
