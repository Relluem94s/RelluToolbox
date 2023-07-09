<script>
    function calcCoords(){
        var chunkX = $("#chunkX")[0].value;
        var chunkZ = $("#chunkZ")[0].value;

        var regionX = Math.floor(chunkX / 32);
        var regionZ = Math.floor(chunkZ / 32);

        regionX = chunkX >> 5;
        regionZ = chunkZ >> 5;

        $("#regionfile")[0].value = "r." + regionX + "." + regionZ + ".mcr";


    }
</script>
<div class="input-group">
    <input class="form-control" type="number" id="chunkX" placeholder="X" oninput="calcCoords()">
    <input class="form-control" type="number" id="chunkZ" placeholder="Z" oninput="calcCoords()">
</div>


<input class="form-control" type="text" id="regionfile" placeholder="r.x.z.mcr" disabled>