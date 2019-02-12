$(function() {
    //$('.homeSlider').slider();

    $('a.project').each(function() {
        $(this).css('background-image', 'url(' + $(this).data('icon') + ')');
    });

    $('.bubles li').each(function() {
        var delay = Math.random() * 2;

        $(this).children().css({
            '-webkit-animation-name' : 'bubles_show',
            '-webkit-animation-duration' : '1s',
            '-webkit-animation-iteration-count': '1',
            '-webkit-animation-fill-mode': 'forwards',
            '-webkit-animation-delay': delay + 's',
            '-moz-animation-name' : 'bubles_show',
            '-moz-animation-duration' : '1s',
            '-moz-animation-iteration-count': '1',
            '-moz-animation-fill-mode': 'forwards',
            '-moz-animation-delay': delay + 's',
            '-o-animation-name' : 'bubles_show',
            '-o-animation-duration' : '1s',
            '-o-animation-iteration-count': '1',
            '-o-animation-fill-mode': 'forwards',
            '-o-animation-delay': delay + 's',
            'animation-name' : 'bubles_show',
            'animation-duration' : '1s',
            'animation-iteration-count': '1',
            'animation-fill-mode': 'forwards',
            'animation-delay': delay + 's'
        });
    });

    setTimeout(function() {
        $('.bubles li').children().css('opacity', 1).each(function(index) {
            if ($.inArray(index, [0, 9, 18, 27, 36]) >= 0) {
                $(this).css({
                    '-webkit-animation-name' : 'bubles_pulse_big',
                    '-webkit-animation-duration' : '3s',
                    '-webkit-animation-iteration-count': 'infinite',
                    '-webkit-animation-fill-mode': 'none',
                    '-webkit-animation-delay': index * 0.054 + 's',
                    '-moz-animation-name' : 'bubles_pulse_big',
                    '-moz-animation-duration' : '3s',
                    '-moz-animation-iteration-count': 'infinite',
                    '-moz-animation-fill-mode': 'none',
                    '-moz-animation-delay': index * 0.054 + 's',
                    '-o-animation-name' : 'bubles_pulse_big',
                    '-o-animation-duration' : '3s',
                    '-o-animation-iteration-count': 'infinite',
                    '-o-animation-fill-mode': 'none',
                    '-o-animation-delay': index * 0.054 + 's',
                    'animation-name' : 'bubles_pulse_big',
                    'animation-duration' : '3s',
                    'animation-iteration-count': 'infinite',
                    'animation-fill-mode': 'none',
                    'animation-delay': index * 0.054 + 's'
                });
            } else {
                $(this).css({
                    '-webkit-animation-name' : 'bubles_pulse',
                    '-webkit-animation-duration' : '3s',
                    '-webkit-animation-iteration-count': 'infinite',
                    '-webkit-animation-fill-mode': 'none',
                    '-webkit-animation-delay': index * 0.054 + 's',
                    '-moz-animation-name' : 'bubles_pulse',
                    '-moz-animation-duration' : '3s',
                    '-moz-animation-iteration-count': 'infinite',
                    '-moz-animation-fill-mode': 'none',
                    '-moz-animation-delay': index * 0.054 + 's',
                    '-o-animation-name' : 'bubles_pulse',
                    '-o-animation-duration' : '3s',
                    '-o-animation-iteration-count': 'infinite',
                    '-o-animation-fill-mode': 'none',
                    '-o-animation-delay': index * 0.054 + 's',
                    'animation-name' : 'bubles_pulse',
                    'animation-duration' : '3s',
                    'animation-iteration-count': 'infinite',
                    'animation-fill-mode': 'none',
                    'animation-delay': index * 0.054 + 's',
                });
            }
        })
    }, 3000);

    $('.question a').click(function() {
        $(this).parent().toggleClass('open');
        $(this).parent().next().slideToggle();
    });
});