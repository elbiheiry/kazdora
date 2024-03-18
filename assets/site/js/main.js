/*Smooth Scroll
================================*/
$(document).ready(function () {
    "use strict";
    function goToByScroll(id) {
        $('html , body').animate({
            scrollTop: $(id).offset().top
        }, 'slow');
    }
    $('.main-section a.scroll , .page-head a.scroll ').click(function () {
        goToByScroll($(this).attr('href'));
        return false;
    });
});

/* Top
=============================*/
$(document).ready(function () {
    "use strict";
    var scrollbutton = $(".up_btn");
    $(window).scroll(function () {
        $(this).scrollTop() >= 700 ? scrollbutton.show() : scrollbutton.hide();
    });
    scrollbutton.click(function () {
        $("html,body").animate({
            scrollTop: 0
        }, 600);
    });
});

/* Timer Counter
===============================*/
var v_count = '0';
$(window).scroll(function () {
    'use strict';
    $('.timer').each(function () {
        var imagePos = $(this).offset().top,
            topOfWindow = $(window).scrollTop();
        if (imagePos < topOfWindow + 500 && v_count === '0') {
            $(function ($) {
                function count(options) {
                    v_count = '1';
                    options = $.extend({}, options || {}, $(this).data('countToOptions') || {});
                    $(this).countTo(options);
                }
                // start all the timers
                $('.timer').each(count);
            });
        }
    });
});

/* Date Picker
=============================*/
$(document).ready(function () {
    "use strict";
    $('input[name="date_range"]').daterangepicker({
        autoApply: true,
        showDropdowns: true,
        autoUpdateInput: false,
        minYear: 2020 ,
        locale: {
            cancelLabel: 'Clear'
        }
    });
    $('input[name="date_range"]').on('apply.daterangepicker', function(ev, picker) {
        $(this).val('From : ' + picker.startDate.format('MM/DD/YYYY') + '    To : ' + picker.endDate.format('MM/DD/YYYY'));
    });
    $('input[name="date_time_picker"]').daterangepicker({
        autoApply: true,
        singleDatePicker: true ,
        minYear: 2020 ,
        autoUpdateInput: false,
        locale: {
            cancelLabel: 'Clear'
        }
    });
});

/* Tag Select
============================*/
$(document).ready(function () {
    "use strict";
    $(".select").select2();
});

/* Side Filiter 
===============================*/
$(document).ready(function () {
    "use strict";
    $(".filt-icon").click(function () {
        $(".side-filter").toggleClass("move");
    });
    $(".prof-icon").click(function () {
        $(".profile-side").toggleClass("move");
    });
    
});

/* Gallery Slide
===============================*/
$(document).ready(function () {
    "use strict";
    var galleryThumbs = new Swiper('.gallery-thumbs', {
        spaceBetween: 10,
        slidesPerView: 4,
        freeMode: true,
        watchSlidesVisibility: true,
        watchSlidesProgress: true,
    });
    var galleryTop = new Swiper('.gallery-top', {
        spaceBetween: 10,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        thumbs: {
            swiper: galleryThumbs
        }
    });
});

/* Upload
==========================*/
$(document).ready(function () {
    var files=[];
    //once refered,  files are not lost after re-choosing files..
    $('#file').change(function (v) {
        $.each(v.target.files,function (n,i) {
            var reader = new FileReader(); //need to create new ones...they get busy..
            reader.readAsDataURL(i);
            reader.onload = (function (i) {
                return function(x) {
                    files.push({file:i,data:x.target.result});
                    updateList(files.length-1);
                }
            })(i);
        });
    }); 
    var thumb= $('.thumb').clone().show(), gallery= $('.gallery');
    function updateList(n) {
        var e = thumb.clone();
        e.find('img').attr('src',files[n].data);
        e.find('button').click(removeFromList).data('n',n);
        gallery.append(e);
        function removeFromList() {
            files[$(this).data('n')] = null;
            $(this).parent().remove();
        }  
    }
});


/*Loading
==========================*/
$(window).on("load", function () {
    "use strict";
    $(".loader").fadeOut(function () {
        $(this).fadeOut();
        $("body").css({"overflow-y" : "visible"});
    });
});
