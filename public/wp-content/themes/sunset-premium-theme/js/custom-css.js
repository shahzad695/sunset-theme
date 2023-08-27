let cssDiv = document.getElementById("customCss");
let cssTextArea = document.getElementById("sunset_custom_css");
let cssForm = document.getElementById("css-form-submit");

var editor = ace.edit("customCss");
editor.setTheme("ace/theme/monokai");
editor.getSession().setMode("ace/mode/css");

let updateText = function () {
  cssTextArea.value = editor.getSession().getValue();
};

cssDiv.addEventListener("keydown", updateText);
