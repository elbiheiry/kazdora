/*Side Menu
==============================*/
$(document).ready(function () {
    "use strict";
    $(".side-menu ul li a").click(function (e) {
    $(".side-menu ul li ul").slideUp("slow"),
        $(this).next().is(":visible") || $(this).next().slideDown("slow"),
    e.stopPropagation()
    })
});

/* Toggle Icon
==============================*/
$(document).ready(function () {
    "use strict";
    $(".toggle-btn").click(function (){
        $(".side-menu").toggleClass("move");
        $(".main").toggleClass("move");
    });
});

/* Lock Screen
===============================*/
function lock(){
    $(".lock").show();
    $("body").css({"overflow":"hidden"});
}
function open_lock(){
    $(".lock").hide();
    $("body").css({"overflow":"auto"});
}

/* Full screen Mode
================================*/
$(document).ready(function () {
    "use strict";
    $(".open_fullscreen").click(function (){
        var elem = document.getElementById("body");
        if (elem.requestFullscreen) {
            elem.requestFullscreen();
        } else if (elem.mozRequestFullScreen) { /* Firefox */
            elem.mozRequestFullScreen();
        } else if (elem.webkitRequestFullscreen) { /* Chrome, Safari & Opera */
            elem.webkitRequestFullscreen();
        } else if (elem.msRequestFullscreen) { /* IE/Edge */
            elem.msRequestFullscreen();
        }
        $(this).hide();
        $(".exist_fullscreen").show();
    });
    $(".exist_fullscreen").click(function (){
        if (document.exitFullscreen) {
            document.exitFullscreen();
        } else if (document.mozCancelFullScreen) {
            document.mozCancelFullScreen();
        } else if (document.webkitExitFullscreen) {
            document.webkitExitFullscreen();
        } else if (document.msExitFullscreen) {
            document.msExitFullscreen();
        }
        $(this).hide();
        $(".open_fullscreen").show();
    });   
});

/* Full Screen
==============================*/
$(document).ready(function () {
    "use strict";
    function headerSize() {
        var winh = $(window).height(),
            halfH = $(window).innerHeight() / 2,
            centerh = $(".center-height"),
            divHeight = $(".center-height").outerHeight(),
            divHalfHeight = divHeight / 2,
            centerDiv = halfH - divHalfHeight;
        $(".login-wrap").height(winh);
        $(".center-height").css({top: centerDiv});
    }
    headerSize();
    $(window).resize(function () {
        headerSize();
    });
});

/* DataTable
==============================*/
$(document).ready(function () {
    "use strict";
    $('#datatable_btns').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'excel', 'pdf', 'print'
        ]
    });
    $('#datatable').DataTable();
});

/* ToolTip | Popover
==============================*/
$(document).ready(function () {
    "use strict";
    $('[data-toggle="tooltip"]').tooltip();
    $('[data-toggle="popover"]').popover();
});

/* Date Picker
=============================*/
$(document).ready(function () {
    "use strict";
    $('input[name="date_range"]').daterangepicker({
        autoApply: true,
        showDropdowns: true,
        autoUpdateInput: false,
        locale: {
            cancelLabel: 'Clear'
        }
    });
    $('input[name="date_range"]').on('apply.daterangepicker', function(ev, picker) {
        $(this).val('From :' + picker.startDate.format('MM/DD/YYYY') + '    To : ' + picker.endDate.format('MM/DD/YYYY'));
    });
    $('input[name="date_time_picker"]').daterangepicker({
        autoApply: true,
        singleDatePicker: true ,
        minYear: 1990 ,
        autoUpdateInput: false,
        locale: {
            cancelLabel: 'Clear'
        }
    });
    $('input[name="date_time_picker"]').on('apply.daterangepicker', function(ev, picker) {
      $(this).val(picker.startDate.format('MM/DD/YYYY'));
  });
    $('#timepicker1').timepicker();
});

/* Tag Select
============================*/
$(document).ready(function () {
    "use strict";
    $(".select").select2({
        placeholder:'Please Select'
    });
    $('.tags').select2({
        tags: true,
        placeholder:'Please Select' ,
        tokenSeparators: [',']
    });
});

/* Upload Button
==============================*/
$(document).ready(function () {
    "use strict";
        $('.uplaod-wrap .button').click(function () {
            $(".uplaod-wrap input[type='file']").trigger('click');
        });
        $("input[type='file']").change(function () {
            $('.path').text(this.value.replace(/C:\\fakepath\\/i, ''))
        });
});

/*Loading
==========================*/
$(window).on("load", function () {
    "use strict";
    $(".spinner").fadeOut(function () {
        $(this).parent().fadeOut();
        $("body").css({"overflow-y" : "visible"});
    });
});