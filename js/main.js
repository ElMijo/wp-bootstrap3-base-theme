requirejs.config({
    baseUrl: App.jsuri,
    waitSeconds:5,
    paths: {
        "jquery": [
            "http://code.jquery.com/jquery-2.1.1.min",
            "jquery/jquery.min"
        ],
        "jquery.bootstrap": [
            "https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min",
            "jquery/bootstrap/js/bootstrap.min"
        ]
    },
    shim: {
        "jquery.bootstrap": {
            deps: ["jquery"]
        }
    }
});

requirejs(["jquery","jquery.bootstrap"], function($)
{
    $(function()
    {
        $('a[href*=#]:not([href=#])').click(function()
        {
            if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname)
            {
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
                if (target.length)
                {
                    $('html,body').animate({scrollTop: target.offset().top}, 1000);
                    return false;
                }
            }
        });
        // $('body')
        //     .on('click','.comment-reply-link',function(event){
        //         event.preventDefault();
        //         var args = $(this).data('onclick');
        //         args = args.replace(/.*\(|\)/gi, '').replace(/\"|\s+/g, '').split(',');
        //         tinymce.EditorManager.execCommand('mceRemoveEditor', true, 'comment');
        //         addComment.moveForm.apply( addComment, args );
        //         tinymce.EditorManager.execCommand('mceAddEditor', true, 'comment');
        //     })
        // ;
    });
});