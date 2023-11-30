

$(".toggleMode span").on("click", function(){
    (Cookies.get("mode")) ? Cookies.remove("mode") : Cookies.set("mode", "dark", {sameSite: ' None', secure: true})
    toggleMode();
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

if(Cookies.get("dismissedCookieBanner")){
    $(".cookieBanner").hide();
}



    
toggleMode();


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


/* Credit https://stackoverflow.com/a/9083857 */
function toRoman (number) {
    let num = Math.floor(number), 
        val, s= '', i= 0, 
        v = [1000, 900, 500, 400, 100, 90, 50, 40, 10, 9, 5, 4, 1], 
        r = ['M', 'CM', 'D', 'CD', 'C', 'XC', 'L', 'XL', 'X', 'IX', 'V', 'IV', 'I']; 

    function toBigRoman(n) {
        let ret = '', n1 = '', rem = n;
        while (rem > 1000) {
            let prefix = '', suffix = '', n = rem, s = '' + rem, magnitude = 1;
            while (n > 1000) {
                n /= 1000;
                magnitude *= 1000;
                prefix += '(';
                suffix += ')';
            }
            n1 = Math.floor(n);
            rem = s - (n1 * magnitude);
            ret += prefix + n1.toRoman() + suffix;
        }
        return ret + rem.toRoman();
    }

    if (this - num || num < 1) num = 0;
    if (num > 3999) return toBigRoman(num);

    while (num) {
        val = v[i];
        while (num >= val) {
            num -= val;
            s += r[i];
        }
        ++i;
    }
    return s;
};

/* Credit https://stackoverflow.com/a/9083857 */
function fromRoman(roman) {
    let s = roman.toUpperCase().replace(/ +/g, ''), 
        L = s.length, sum = 0, i = 0, next, val, 
        R = { M: 1000, D: 500, C: 100, L: 50, X: 10, V: 5, I: 1 };

    function fromBigRoman(rn) {
        let n = 0, x, n1, S, rx =/(\(*)([MDCLXVI]+)/g;

        while ((S = rx.exec(rn)) != null) {
            x = S[1].length;
            n1 = Number.fromRoman(S[2])
            if (isNaN(n1)) return NaN;
            if (x) n1 *= Math.pow(1000, x);
            n += n1;
        }
        return n;
    }

    if (/^[MDCLXVI)(]+$/.test(s)) {
        if (s.indexOf('(') == 0) return fromBigRoman(s);

        while (i < L) {
            val = R[s.charAt(i++)];
            next = R[s.charAt(i)] || 0;
            if (next - val > 0) val *= -1;
            sum += val;
        }
        if (toRoman(sum) === s) return sum;
    }
    return NaN;
};