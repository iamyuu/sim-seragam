"use strict";

$(document).ready(function domReady() {
    $(".js-select2").select2({
        placeholder: "Choose your option",
        theme: "material"
    });
    
    $(".select2-selection__arrow")
        .addClass("material-icons")
        .html("arrow_drop_down");
});