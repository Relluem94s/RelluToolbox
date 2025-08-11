<div class="container">
    <div class="row row-cols-1">
        <div class="col">
            <fieldset class="fieldset-card-small">
                <legend class="fieldset-legend">Stock Tracker</legend>
                <div class="mb-2">
                    <br>
                    <form id="portfolioForm">
                        <div class="form-group">
                            <label for="symbol">Stock Symbol:</label>
                            <input type="text" class="form-control" name="symbol" id="symbol" required>
                        </div>
                        <div class="form-group">
                            <label for="quantity">Share Count:</label>
                            <input type="number" class="form-control" name="quantity" id="quantity" required>
                        </div>
                        <br>
                        <button type="button" class="btn btn-primary" id="addStockButton" onclick="fetchStockData()">Add
                            Stock</button>
                    </form>

                    <div id="portfolioList" class="mt-4">
                    </div>
                </div>
            </fieldset>
        </div>
    </div>
</div>