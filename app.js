function displayUsername(){
    console.log("Top G");
    $.ajax({
        url:"processor.php",
        method:"POST",
        data:{getusername:"getusername"},
        success:function(data){
            console.log(data);
            user = JSON.parse(data);
            $(".username").text(user.username);
            $(".gender").html(user.gender);
        },
        error:function(data){
            console.log(data);
        }
    });
}
$(document).ready(function(){
    $(".main").on("submit", "form", function(e){
       e.preventDefault();
    });
    $(".main").on("submit", "#user-data", function(e){
        let userDetails = $(this).serialize();
        let gender = $('input[name="gender"]:checked').val();
        if (gender!=undefined) {
            //console.log(userDetails);
            if (userDetails!=undefined) {
                $.ajax({
                    url:"processor.php",
                    method:"POST",
                    data:userDetails,
                    success:function(data){
                        $(".dynamic").html(data);
                        console.log(data);
                        $(".welcome-form").toggleClass("active");
                        $(".quiz").toggleClass("show");
                        console.log(data);
                        $(".username").text(data);
                        displayUsername();
                    },
                    error:function(data){
                        console.log(data);
                    }
                });  
            }
            else{
                alert("Kindly Fill All The Fields");
            }
        }
        else{
            alert("Kindly Select Your Gender");
        }
     });
     //Manual Navigation
     $(".main").on("click", ".control", function(e){
        let action = $(this).attr("id");
        $.ajax({
            url:"processor.php",
            method:"POST",
            data: {action:action},
            success:function(data){
                $(".dynamic").html(data);
                console.log(data);
                console.log(action);
            },
            error:function(data){
                console.log(data);
            }
        });  
     });
     //On Answering
     $(".main").on("click", ".choice", function(e){
        let selectedAnswer = $('input[name="choices"]:checked').attr("id");
        console.log(selectedAnswer);
        $.ajax({
            url:"processor.php",
            method:"POST",
            data: {selectedAnswer:selectedAnswer},
            success:function(data){
                $(".dynamic").html(data);
                console.log(data);
                console.log(selectedAnswer);
            },
            error:function(data){
                console.log(data);
            }
        });  
     });
     $(".main").on("click", ".reset", function(e){
        let deed = "reset";
        $.ajax({
        url:"processor.php",
        method:"POST",
        data: {deed:"reset"},
        success:function(data){
            $(".welcome-form").toggleClass("active");
            $(".quiz").toggleClass("show");
        },
        error:function(data){
            console.log(data);
        }
    });
     });
     //saving Result
     $(".main").on("click", "#save", function(e){
        let deed = "save";
        console.log("x") ;
        $.ajax({
        url:"processor.php",
        method:"POST",
        data: {deed:"save"},
        success:function(data){
            console.log(data);
            console.log("x") ;
        },
        error:function(data){
            console.log(data);
        }
        });
    });
    //Analysis
    $("body").on("click", "#analyse", function(){
        let analysis = $("#analysis");
        console.log(analysis)
        $(analysis).toggle();
        $(".dynamic").replaceWith(analysis);
    });
});