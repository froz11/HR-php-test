$(document).ready(function() {
    $('form#price_update').change(event => {
        event.preventDefault()

        const _this =$('form#price_update'), action = _this.attr('action'), data = $(event.target).serialize()

        $.ajax({
            url: action,
            method: 'PATCH',
            data: data,
            cache: false,
            success: function(resp){
                $('#price_input').html(resp.price);
            },
            headers: {

                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')

            },
        });
    });
});