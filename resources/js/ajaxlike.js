$(function() {
    let like = $('.like-toggle');
    let likePostId;
    like.on('click', function() {
        let $this = $(this);
        likePostId = $this.data('postid');

        $.ajax({
            headers: {
                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
            },
            url: '/post/like',
            method: 'POST',
            data: {
                'post_id': likePostId
            },
        })

        // success
        .done(function(data) {
            $this.toggleClass('liked');
            $this.next('.like-counter').html(data.post_likes_count);
        })

        // fail
        .fail(function() {
            console.log('fail');
        });
    });
});