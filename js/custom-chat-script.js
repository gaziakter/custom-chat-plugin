// js/custom-chat-script.js

jQuery(document).ready(function($) {
    $('#chat-form').submit(function() {
        var message = $('#chat-message').val();

        $.ajax({
            type: 'post',
            url: custom_chat_ajax_object.ajax_url,
            data: {
                action: 'custom_chat_send_message',
                message: message,
            },
            success: function(response) {
                // Handle success response
                console.log(response);
            }
        });

        return false;
    });
});
