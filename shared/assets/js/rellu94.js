jQuery(function(){
    if(Cookies.get("dismissedCookieBanner")){
        $(".cookieBanner").hide();
    }

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


dismissCookieBanner = () =>{
    Cookies.set("dismissedCookieBanner", true, {sameSite: ' None'})
    $(".cookieBanner").hide();
}


async function copyToClipboard(field_name, display_name){
        
    let field = document.getElementById(field_name);

    if(field.value){
        navigator.clipboard.writeText(field.value); 
        foliSuccess(display_name + " copied successfully to clipboard!");

        /* For security reasons clear Clipboard after 10sec */
        await delay(10000);
        navigator.clipboard.writeText("");
    }
    else{
        foliWarn("No " + display_name + " generated yet!");
    }
}
