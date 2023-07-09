<script>

    function getUsername(){
        var username = $("#username")[0].value;

        if(username.length >= 2){
            var settings = {
                "url": "https://api.mojang.com/users/profiles/minecraft/" + username,
                "method": "GET",
                "crossDomain": true,
                "timeout": 0,
                "xhrFields": {
                    "withCredentials": true
                },
                "headers": {
                    "accept": "application/json",
                    "Access-Control-Allow-Origin":"*",
                    "Access-Control-Allow-Credentials":"true"
                }
            };

            $.ajax(settings).done(function (response) {
            $("#mc_uuid")[0].value = response;
            });
        }
    }

    
</script>

<input type="text" id="username">
<button class="btn btn-info" onclick="getUsername()">Send</button>

<textarea id="mc_uuid" class="form-control" disabled rows=4></textarea>
