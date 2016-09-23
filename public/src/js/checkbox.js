$('.approved').click(function(){
    var status, url;
    status = $('.approved').val();
    url = '/changeStatus';

    $.ajax({
        url: url,
        data: {
            approved: status,
            _token: '{{ csrf_token() }}'
        },
        type: 'POST',
        datatype: 'JSON'
    });
});
/*$('.approved').on('click', function () {
    var url;
    var $this = $(this);
    url = '{{route('changestatus')}}';

    $.ajax({
        data: {
            approved: $this.val(),
            _token: '{{ crfs_toekn() }}'
        },
        url: url,
        type: 'POST',
        dataType: 'json'
    });
});*/
