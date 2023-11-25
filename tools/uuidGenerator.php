<div class="container">
    <form id="portfolioForm">
        <div class="form-group">
            <label for="symbol">UUID:</label>
            <input type="text" class="form-control" name="uuid" id="uuid" required>
        </div>
        <br>
        <button type="button" class="btn btn-primary" id="getUUIDButton">Get UUID</button>
    </form>
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
