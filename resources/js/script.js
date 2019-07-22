window.onload = function () {
    fetch_passwd_data();

    // function to toggle password visibility
    $(".toggle-password").click(function() {

        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    });
    // function to search for passwords
    function fetch_passwd_data(query = ''){
        $.ajax({
            url:"/search",
            method:'GET',
            data:{query:query},
            dataType:'json',
            success: function(data){
                $('.searchitems').html(data.table_data);
            }
        })
    }

    //keyup for searchbox
    $('#search').keyup(function () {
       let query =  $(this).val();
       fetch_passwd_data(query);
    });

    // function to put searchbar at top when scrolling
    $(window).scroll(function () {
        let st = window.pageYOffset || document.documentElement.scrollTop;
        // after 155 we fix the searchbar
        if(st > 155){
            $("#scrollfix").addClass("fixed-top");
        }else if(st < 155){
            $("#scrollfix").removeClass("fixed-top");
        }

        // scroll back to top
        if(document.body.scrollTop > 20 || document.documentElement.scrollTop > 20){
            $("#topBtn").css("display","block");
        }else{
            $("#topBtn").css("display","none");
        }

        $("#topBtn").click(function(){
           document.body.scrollTop = 0;
           document.documentElement.scrollTop = 0;
        });
    });
}



