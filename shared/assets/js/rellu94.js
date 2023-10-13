jQuery(function(){

    toggleMode();

    $(".toggleMode span").on("click", function(){
        (Cookies.get("mode")) ? Cookies.remove("mode") : Cookies.set("mode", "dark")
        toggleMode();
    });

});

function toggleMode(){
    if(Cookies.get("mode")){
        $("body").addClass("dark-mode");
        $(".dark").hide();
        $(".light").show();
        $(".light").css("color", "white");
    } else {
        $("body").removeClass("dark-mode");
        $(".dark").show();
        $(".light").hide();
        $(".dark").css("color", "gray");
    }
}