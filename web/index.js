$(document).ready(function(){
    // click on button submit
    $("#submit").on('click', function(){
        var data = {request_type : "web_postback",
            postback: {
                email :$("input[name='email']").val(),
                password :$("input[name='password']").val()
            }
        };
        // send ajax
        $.ajax({
            url: '{{dynamic_url}}', // url where to submit the request
            type : "POST",
            headers: {
                'Content-Type': 'application/json',
                'Access-Control-Allow-Origin': '*'
            },
            dataType : 'json',
            data : JSON.stringify(data),
            success : function(result) {
                window.location.href = "https://www.messenger.com/closeWindow/?image_url=http://a.a.a&display_text=close";
            },
            error: function(xhr, resp, text) {
                console.log(xhr, resp, text);
            }
        })
    });
});