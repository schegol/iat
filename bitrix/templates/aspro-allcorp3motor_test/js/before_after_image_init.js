$( document ).ready(function() {
    $('.before-after-image').each(function(){
        var cur = $(this);
        // Adjust the slider
        var width = cur.width()+'px';
        cur.find('.resize img').css('width', width);
        // Bind dragging events
        DragsImage(cur.find('.handle'), cur.find('.resize'), cur);
    });
});