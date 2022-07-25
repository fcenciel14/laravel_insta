$(function() {
    $('.deleteTarget').on('click', function() {
        if (confirm('Are you sure to delete')) {
            let clickEle = $(this)
            let commentId = clickEle.data('commentid');

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                },
                url: '/comment/delete',
                type: 'POST',
                data: {
                    'id': commentId,
                    '_method': 'DELETE'
                }
            })

            .done(function(res) {
                clickEle.parents('.comment').remove();
                alert(res.message);
            })

            .fail(function() {
                alert('error');
            });
        }
    });
});