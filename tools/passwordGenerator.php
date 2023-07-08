<script>

function generatePassword() {
    var length = 32,
        charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789+-.,*§$!%&/()=?{[]}",
        password = "";
    for (var i = 0, n = charset.length; i < length; ++i) {
        password += charset.charAt(Math.floor(Math.random() * n));
    }
    $("#password")[0].value = password;
}

</script>

<input type="text" class="form-control" id="password" disabled> <button class="btn btn-success" onclick="generatePassword()">Generate</button>