/**
 * ThemeEngine v2023-10-13
 * @author: @folivora97
 * @param {*} event 
 */
var navBarColor = "#48b3b1";
var backgroundColor = "#1b1a1a";

window.onload = (event) => {
    $("#navBarColor").change(function () {
        navBarColor = ($(this).val().toLowerCase());
        console.log("navbar", navBarColor);

        $(".navbar").removeClass("bg-dark");
        $(".navbar").css("background-color", Cookies.get("navBarColor"));
        Cookies.set("navBarColor", navBarColor);
    });


    $("#backgroundColor").change(function () {
        backgroundColor = ($(this).val().toLowerCase());
        console.log("background", backgroundColor);
        Cookies.set("backgroundColor", backgroundColor);
    });





    // if(Cookies.get("mode")){
    //     $("body").addClass("dark-mode");
    //     $(".dark").hide();
    //     $(".light").show();
    //     $(".light").css("color", "white");
    // } else {
    //     $("body").removeClass("dark-mode");
    //     $(".dark").show();
    //     $(".light").hide();
    //     $(".dark").css("color", "gray");
    // }




};
