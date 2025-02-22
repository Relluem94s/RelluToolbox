
<div class="container">
    <div class="row row-cols-1">

        <div class="col">
            <fieldset class="fieldset-card-small">
                <legend class="fieldset-legend">UUID</legend>
                <div class="mb-2">
                    <div class="input-group">
                        <button id="getUUIDButton" class="btn btn-success" onclick="fetchUUIDData"><i class="fa-solid fa-gears"></i> Generate</button>
                        <button class="btn btn-primary" onclick="copyToClipboard('uuid', 'UUID')"><i class="fa-solid fa-clipboard"></i> Copy</button>
                    </div>
                    <div class="mt-2">
                        <input name="uuid" type="text" class="form-control" id="uuid" disabled>
                    </div>
                </div>
            </fieldset>
        </div>
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
    
</script>
