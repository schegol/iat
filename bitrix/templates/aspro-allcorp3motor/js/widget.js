BX.addCustomEvent("onLoadjqmWidget", function (hash) {
    if (hash.w.hasClass("right_slide")) {
        hash.w.addClass("opened");
        if ($(".right-sidebar-wrapper").length) {
          if ($(".widget_frame iframe").length) {
            $(".widget_frame.right_slide").addClass("loading-state");
            $('.widget_frame iframe').on("load", function() {
              $(".widget_frame.right_slide").removeClass("loading-state");
            });
          } 
            if (hash.w.hasClass("narrow")) {
                if ($(".ajax_basket").length) {
                $(".ajax_basket").addClass("narrow");
                }
                if ($(".ajax_basket .fixed_wrapper").length) {
                    $(".ajax_basket .fixed_wrapper").addClass("narrow");
                }
            }
            if (hash.w.hasClass("wide")) {
                if ($(".ajax_basket").length) {
                $(".ajax_basket").addClass("wide");
                }
            }
        }
        if ($(".ajax_basket").length) {
            $(".ajax_basket").css("z-index", "3000").addClass('widget_open');
        }
        if ($(hash.t).parent()) {
            $(hash.t).parent().addClass("active");
        }
        $(hash.t).addClass("jqm_disable");

        if ($(hash.t).attr("data-show_slide") === "Y") {
            $(hash.t).parent().addClass("once_loaded");
        }
        
        $(".ajax_basket").removeClass("opened");
    }
});

BX.addCustomEvent("onHidejqmWidget", function (hash) {
    if (hash.w.hasClass("right_slide")) {
        hash.w.removeClass("opened");
        if ($(".right-sidebar-wrapper").length) {
          $(".right-sidebar-wrapper").removeClass("opened");
          $(".right-sidebar-wrapper .link").removeClass("active");
          $(".widget_frame.right_slide").removeClass("loading-state");
          $(".right-sidebar-wrapper .link span").removeClass("jqm_disable");
        }
        if ($(".ajax_basket").length) {
          $(".ajax_basket").css("z-index", "").removeClass("widget_open").removeClass("wide").removeClass("narrow");
        }
      }
});
$( document ).ready(function() {
    $(".right_dok .link>span").on("click", function (e) {
        if ($(this).hasClass("jqm_disable")) {
            $(".jqmWindow.right_slide.opened").jqmHide();
            e.stopImmediatePropagation(); // need for stop jqm open standart script
            $(this).parent().removeClass("loadings");
        }
    });
    
    // - slide_right close
    $(document).on("click", function () {
        if ($(".right_slide.opened").length) {
            $(".jqmWindow.right_slide.opened").jqmHide();
        }
    });

    $(document).on("click", ".right_slide.opened", function (e) {
        e.stopPropagation();
    });
});