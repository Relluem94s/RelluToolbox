/**
 * ThemeEngine v2023-10-13
 * @author: folivora97
 */
window.addEventListener('load', function(){
    var navBarColor = "#48b3b1"; //Default Rellu Teal Color
    var backgroundColor = "#fff"; //Default Background White
    var iconColor = null;

    if(Cookies.get("navBarColor")){
        navBarColor = Cookies.get("navBarColor");

        $(".navbar").removeClass("bg-dark");
        $(".navbar").css("background-color", navBarColor);
        $("#navBarColor").attr("value", navBarColor);
    }

    if(Cookies.get("backgroundColor")){
        backgroundColor = Cookies.get("backgroundColor");

        $("body").removeClass("dark-mode");
        $("body").css("background-color", backgroundColor);
        $("#backgroundColor").attr("value", backgroundColor);
    }

    if(Cookies.get("iconColor")){
        iconColor = Cookies.get("iconColor");

        $(".info-box").removeClass(function (index, css) {
            return (css.match (/(^|\s)bg\S+/g) || []).join(' ');
         });

        $(".info-box").css("background-color", iconColor);
        $("#iconColor").attr("value", iconColor);
    }



    $("#navBarColor").change(function () {
        navBarColor = ($(this).val().toLowerCase());

        $(".navbar").removeClass("bg-dark");
        $(".navbar").css("background-color", navBarColor);
        Cookies.set("navBarColor", navBarColor);
    });

    $("#backgroundColor").change(function () {
        backgroundColor = ($(this).val().toLowerCase());

        $("body").removeClass("dark-mode");
        $("body").css("background-color", backgroundColor);
        Cookies.set("backgroundColor", backgroundColor);
    });

    $("#iconColor").change(function () {
        iconColor = ($(this).val().toLowerCase());

        $(".info-box").removeClass(function (index, css) {
            return (css.match (/(^|\s)bg\S+/g) || []).join(' ');
         });

        $(".info-box").css("background-color", iconColor);
        Cookies.set("iconColor", iconColor);
    });  
});
