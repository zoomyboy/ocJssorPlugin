(function($) {
    var active = 0;
    var el = null;
    var bullets = null;

    $.fn.jssor = function(options) {
        el = this;
        bullets = $(this).children('.bullets').eq(0).children('.bullet');
        startTimeout();
    }

    function startTimeout() {
        window.setInterval(function() {
            var elementsCount = $(el).children('.jssor-item').length;
            var currentItem = $(el).children('.jssor-item').eq(active)
            var nextItem = $(el).children('.jssor-item').eq((active+1) % elementsCount);
            nextItem.addClass('active--in');

            nextItem.animate({opacity: 1}, 500, "linear", function() {
                nextItem.removeClass('active--in').addClass('active');
                currentItem.removeClass('active').css({opacity: 0});

                active = (active+1) % elementsCount;
            });

            var currentBullet = $(bullets).eq(active);
            var nextBullet = $(bullets).eq((active+1) % elementsCount);
            currentBullet.removeClass('active');
            nextBullet.addClass('active');
        }, 6000);
    }
}(jQuery));

jQuery(document).ready(function() {
    jQuery('.jssor').jssor();
});
