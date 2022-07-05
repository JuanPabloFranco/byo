(function($) {

    'use strict';

    var win = $(window),
        progressCheck = false;

    /*========== Skills Progress  ==========*/
     function skillsPogress() {
        $(".progress-container").each(function () {
            var timer = $(this).find(".percent"),
                progressBar = $(this).find(".progress-bar");
            timer.countTo();
            timer.css("left", "calc(" + timer.data("to") + "% - 15px)");
            progressBar.css("width", progressBar.attr("aria-valuenow") + "%");
        });
    }
    
    if (!progressCheck && $(this).scrollTop() >= $(".skills").offset().top - 300) {
        skillsPogress();
        progressCheck = true;
    }
    
    win.on("scroll", function () {
        
        if (!progressCheck && $(this).scrollTop() >= $(".skills").offset().top - 300) {
            skillsPogress();
            progressCheck = true;
        }
        
    });    

})(jQuery);