if (!Seasons) {
    var Seasons = {};
}

(function ($) {
    
    Seasons.mobileSelectNav = function () {
        // Create the dropdown base
        $("<select class=\"mobile\" />").appendTo("nav.top");
        
        // Create default option "Go to..."
        $("<option />", {
           "selected": "selected",
           "value"   : "",
           "text"    : "Go to..."
        }).appendTo("nav select");
        
        // Populate dropdown with menu items
        $("nav.top a").each(function() {
            var el = $(this);
            if (el.parents("ul ul").length) {
                var parentCount = el.parents("ul").length;
                var dashes = new Array(parentCount).join("- ");
                $("<option />", {
                    "value": el.attr("href"),
                    "text":  dashes + el.text()
                }).appendTo("nav select");
            } else {
                $("<option />", {
                    "value": el.attr("href"),
                    "text": el.text()
                }).appendTo("nav.top select");
            }
            $("nav.top select").change(function() {
              window.location = $(this).find("option:selected").val();
            });
        });
    }

    Seasons.touchHoverNav = function() {
        $("nav.top").on("click", ".nav-toggle", function() {
            var navToggleButton = $(this);
            navToggleButton.toggleClass("open");
            navToggleButton.siblings("ul").toggle();
        });
        $("nav.top > ul > li").each(function() {
            var navItem = $(this);
            var navToggleButton = "<button type=\"button\" class=\"nav-toggle\"></button>";
            if (navItem.children("ul").length > 0) {
                navItem.addClass("parent").append(navToggleButton);
                navItem.children("ul").first().addClass("sub-nav");
            }
        });
    }

})(jQuery);
