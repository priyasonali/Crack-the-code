(function() {
    $(function() {
        $('.error').hide();
        var times = 1;
        $('.submitBtn').prop('disabled', true);
        $('#playAgain').hide();
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
            if(times<=5){
                var formData = form.serialize();
                $.ajax({
                    'url': './crack/runGuess.php',
                    'method': 'GET',
                    'data': formData,
                    'success':function (data) {
                        $(".result").append("<p>"+formData.split('=')[1]+"</p>");
                        if(/Correct/.test(data)==true) {
                            $('.submitBtn').prop('disabled', true);
                            $('#guessId').prop('disabled',true);
                            $('.ans').append(formData.split('=')[1]);
                            $('.ques').hide();
                            $('.result2').append("<span class='glyphicon glyphicon-ok text-success'></span>" +
                                "<span class='glyphicon glyphicon-ok text-success'></span>" +
                                "<span class='glyphicon glyphicon-ok text-success'></span>" +
                                "<span class='glyphicon glyphicon-ok text-success'></span>"
                            );
                            $('#playAgain').show();
                        }else if(times==5){
                            var q = data.split(",")[1];
                            $(".fail").append("Game over! Correct answer is: "+q);
                            $('#guessId').prop('disabled',true);
                            $(".result2").append("<p>"+data.split(",")[0]+"</p>");
                            $('#playAgain').show();
                        }
                        else{
                            $(".result2").append("<p>"+data.split(",")[0]+"</p>");
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