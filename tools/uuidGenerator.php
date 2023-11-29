<div class="container">
    <div class="input-group">
        <input name="uuid" type="text" class="form-control" id="uuid" disabled>
        <button id="getUUIDButton" class="btn btn-success" onclick="fetchUUIDData"><i class="fa-solid fa-gears"></i> Generate</button>
        <button class="btn btn-primary" onclick="copyUUIDToClipboard()"><i class="fa-solid fa-clipboard"></i> Copy</button>
    </div>
</div>

<script>
    document.getElementById('getUUIDButton').addEventListener('click', function () {
        fetchUUIDData();
    });

    function fetchUUIDData() {
        const uuid_field = document.getElementById('uuid');
        fetch(`tools/uuidGenerator/getUUID.php`)
            .then(response => response.json())
            .then(data => {
                if (data.error) {
                    throw new Error(data.error);
                }


                uuid_field.value = data[0].uuid;
            })
            .catch(error => {
                console.error(error);
                foliError('Error retrieving the UUID. Please try again later.');
            });
    }
    
    
    async function copyUUIDToClipboard(){
        
        let uuid = document.getElementById("uuid");

        if(uuid.value){
            navigator.clipboard.writeText(uuid.value); 
            foliSuccess("UUID copied successfully to clipboard!");

            /* For security reasons clear Clipboard after 10sec */
            await delay(10000);
            navigator.clipboard.writeText("");
        }
        else{
            foliWarn("No UUID generated yet!");
        }
    }
</script>
