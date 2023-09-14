<script>

const delay = ms => new Promise(res => setTimeout(res, ms));

function generatePassword() {
    var length = 32,
        charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789+-.,*§$!%&/()=?{[]}",
        password = "";
    for (var i = 0, n = charset.length; i < length; ++i) {
        password += charset.charAt(Math.floor(Math.random() * n));
    }
    $("#password")[0].value = password;
}


async function copyToClipboard(){
    
    let password = document.getElementById("password");

    if(password.value){
        navigator.clipboard.writeText(password.value); 
        toastr.success('Password copied to clipboard successful!'); 

        /* For security reasons clear Clipboard after 10sec */
        await delay(10000);
        navigator.clipboard.writeText("");
    }
    else{
        toastr.warning('No Password generated yet!'); 
    }
}

</script>

<div class="input-group">
    <input type="text" class="form-control" id="password" disabled>
    <button class="btn btn-success" onclick="generatePassword()"><i class="fa-solid fa-gears"></i> Generate</button>
    <button class="btn btn-primary" onclick="copyToClipboard()"><i class="fa-solid fa-clipboard"></i> Copy</button>
</div>
