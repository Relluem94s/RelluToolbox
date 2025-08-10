<div class="container">
    <div class="row row-cols-1">

        <div class="col">
            <fieldset class="fieldset-card-small">
                <legend class="fieldset-legend">Username to UUID</legend>
                <div class="mb-2">
                    <div class="input-group">
                        <input type="text" id="mc_input_username" class="form-control">
                        <button class="btn btn-info" onclick="getUsername()">Send</button>
                    </div>
                    <div class="mt-2">
                        <input type="text" id="mc_output_uuid" class="form-control" disabled>
                    </div>
                </div>
            </fieldset>
        </div>

        <div class="col">
            <fieldset class="fieldset-card-small">
                <legend class="fieldset-legend">UUID to Usernames</legend>
                <div class="mb-2">
                    <div class="input-group">
                        <input type="text" id="mc_input_uuid" class="form-control">
                        <button class="btn btn-info" onclick="getUsernameFromUUID()">Send</button>
                    </div>
                    <div class="mt-2">
                        <input type="text" id="mc_output_username" class="form-control" disabled>
                    </div>
                </div>
            </fieldset>
        </div>

        <div class="col">
            <fieldset class="fieldset-card-small">
                <legend class="fieldset-legend">Coordinates to Region File</legend>
                <div class="mb-2">
                    <div class="input-group">
                        <input class="form-control" type="number" id="chunkX" placeholder="X" oninput="calcCoords()">
                        <input class="form-control" type="number" id="chunkZ" placeholder="Z" oninput="calcCoords()">
                    </div>
                    <div class="mt-2">
                        <input class="form-control" type="text" id="regionfile" placeholder="r.x.z.mcr" disabled>
                    </div>
                </div>
            </fieldset>
        </div>

        <div class="col">
            <fieldset class="fieldset-card-small">
                <legend class="fieldset-legend">Convert Coords Overworld/Nether </legend>
                <div class="mb-2">
                    <div class="input-group">
                        <input type="number" id="mc_coord_x" placeholder="X" class="form-control">
                        <input type="number" id="mc_coord_z" placeholder="Z" class="form-control">
                        <button class="btn btn-info" onclick="convertCoordinates(false)">Overworld</button>
                        <button class="btn btn-info" onclick="convertCoordinates(true)">Nether</button>
                    </div>
                    <div class="mt-2">
                        <div class="input-group">
                            <input type="text" id="mc_output_coords_convert_x" class="form-control" disabled>
                            <input type="text" id="mc_output_coords_convert_z" class="form-control" disabled>
                        </div>
                    </div>
                </div>
            </fieldset>
        </div>
    </div>
</div>


<script>

    function convertCoordinates(toNether = true) {
        var x = $("#mc_coord_x")[0].value;
        var z = $("#mc_coord_z")[0].value;

        var result =  toNether ? { x: Math.floor(x / 8), z: Math.floor(z / 8) } : { x: x * 8, z: z * 8 };

        $("#mc_output_coords_convert_x")[0].value = result.x;
        $("#mc_output_coords_convert_z")[0].value = result.z;
    }

    function calcCoords(){
        var chunkX = $("#chunkX")[0].value;
        var chunkZ = $("#chunkZ")[0].value;

        var regionX = Math.floor(chunkX / 32);
        var regionZ = Math.floor(chunkZ / 32);

        regionX = chunkX >> 5;
        regionZ = chunkZ >> 5;

        $("#regionfile")[0].value = "r." + regionX + "." + regionZ + ".mcr";


    }

    function getUsername() {
        var username = $("#mc_input_username").val();

        if (username.length >= 2) {
            $.ajax({
                url: "tools/minecraft/username.php?username=" + encodeURIComponent(username),
                method: "GET",
                dataType: "json",
                success: function (response) {
                    $("#mc_output_uuid").val(response.id || "Fehler: Keine UUID gefunden");
                },
                error: function () {
                    $("#mc_output_uuid").val("Fehler: Benutzer nicht gefunden");
                }
            });
        }
    }

    function getUsernameFromUUID() {
        var uuid = $("#mc_input_uuid").val();

        if (uuid.length === 32) {
            $.ajax({
                url: "tools/minecraft/uuid.php?uuid=" + encodeURIComponent(uuid),
                method: "GET",
                dataType: "json",
                success: function (response) {
                    $("#mc_output_username").val(response.name || "Fehler: Kein Name gefunden");
                },
                error: function () {
                    $("#mc_output_username").val("Fehler: UUID nicht gefunden");
                }
            });
        }
    }
</script>
