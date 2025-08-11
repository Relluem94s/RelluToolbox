<div class="container">
    <div class="row row-cols-1">
        <div class="col">
            <fieldset class="fieldset-card-small">
                <legend class="fieldset-legend">Departures</legend>
                <div class="mb-2">
                    <br>
                    <form id="departuresForm" action="javascript:setManualAddress();">
                        <div class="input-group">
                            <input id="manualAddress" class="form-control" type="text"></input>
                            <button title="Search Address" type="button" class="btn btn-primary" id="getAddress"><i
                                    class="fa-solid fa-search"></i> Search</button>
                            <button title="Use current Geo Location" type="button" class="btn btn-secondary"
                                id="getLocation"><i class="fa-solid fa-location-crosshairs"></i></button>
                        </div>
                    </form>
                    <br>

                    <div id="availableStations">
                    </div>

                    <div>This is using <a target="_blank"
                            href="https://v6.db.transport.rest/api.html">v6.db.transport.rest</a> and <a target="_blank"
                            href="https://openstreetmap.org">OpenStreetMap</a> Data </div>

                </div>
            </fieldset>
        </div>
    </div>
</div>

<script src="../shared/assets/js/departures.js">
