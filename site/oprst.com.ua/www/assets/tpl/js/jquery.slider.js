(function($) {
    $.fn.slider = function() {
        var $this = this;
        var msInterval = 3000;
        var msTimeout = 1000;
        var interval = null;
        var timeout = null;
        var timeoutManual = null;

        function _move() {
            $this.addClass('motion');
            $('.images', $this).css('left', '-100%');

            var index = $('.images li', $this).eq(1).data('slide');
            $('.pagination ul li.active', $this).removeClass('active');
            $('.pagination ul li[data-slide=' + index + ']').addClass('active');

            timeout = setTimeout(_afterMove, msTimeout);
        }

        function _afterMove() {
            $this.removeClass('motion');
            $('.images', $this).append($('.images li:first', $this));
            $('.images', $this).css('left', '0');

            clearTimeout(timeout);
        }

        function _afterManualMove() {
            $this.removeClass('motion');

            var slide = $('.pagination ul li.active').data('slide');
            var slideIndex = $('.images li[data-slide=' + slide + ']', $this).index();

            for (var i = 0; i < slideIndex; i++) {
                $('.images', $this).append($('.images li:first', $this).show());
            }

            $('.images', $this).css('left', '0');
            clearTimeout(timeoutManual);
        }

        $('.images', $this).css('width', 100 * $('.images li', $this).length + '%')
        $('.images li', $this).css('width', 100 / $('.images li', $this).length + '%');

        interval = setInterval(_move, msInterval);

        $('.pagination ul li', $this).click(function() {
            if (!$(this).hasClass('active')) {
                if (interval) {
                    clearInterval(interval);
                }

                if (timeout) {
                    clearTimeout(timeout);
                    _afterMove();
                }

                if (timeoutManual) {
                    clearTimeout(timeoutManual);
                    _afterManualMove();
                }

                $(this).siblings('.active').removeClass('active');
                $(this).addClass('active');

                var slide = $(this).data('slide');
                var slideIndex = $('.images li[data-slide=' + slide + ']', $this).index();

                for (var i = 1; i < slideIndex; i++) {
                    $('.images li', $this).eq(i).hide();
                }

                $this.addClass('motion')
                $('.images', $this).css('left', '-100%');

                timeoutManual = setTimeout(_afterManualMove, 1000);
            }
        });
    }
})(jQuery);
