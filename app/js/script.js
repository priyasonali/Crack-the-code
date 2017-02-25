(function() {
    $(function() {
        $('.error').hide();
        var times = 0;
        $('.submitBtn').prop('disabled', true);
        $("#guessForm input[name='guess']").on("keyup",function (e) {
            var that = $(this);
            if(!/^\d{4}$/.test(that.val())) {
                $('.error').show();
                $('.submitBtn').prop('disabled', true);
            }
            else {
                $('.error').hide();
                $('.submitBtn').prop('disabled', false);
            }
        });
        $("#guessForm").on("submit",function (e) {
            e.preventDefault();
            $('.submitBtn').prop('disabled', true);
            var form = $(this);
            times++;
            if(times<=10){
                var formData = form.serialize();
                $.ajax({
                    'url': './crack/runGuess.php',
                    'method': 'GET',
                    'data': formData,
                    'success':function (data) {
                        $(".result").append("<p>"+formData.split('=')[1]+"</p>");
                        $(".result2").append("<p>"+data+"</p>");
                        if(data==Correct) {
                            $('.submitBtn').prop('disabled', true);
                            $("input").prop('disabled',true);
                        }
                    },
                    'error':function (data) {
                        console.error(data);
                    }
                });
            } else {
                alert('Game over!');
                location.reload();
            }
            console.log(form);
            form[0].reset();
        });
    });
})();