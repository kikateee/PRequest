<form action="/searchRequests" method="GET">
    <div class="row">
        <div class="col">
            <label for="">Filter by</label>
            <div class="input-group ">
                <select name="filterBy" class="form-control" required>
                    <optgroup label="Filters">
                        <option value="costcenter_name">Cost Center</option>
                        <option value="source">Fund Source</option>
                    </optgroup>
                </select>
            </div>
        </div>
        <div class="col">
            <label for="">Quarter</label>
            <div class="input-group ">
                <select name="quarter" class="form-control" required>
                    <optgroup label="Quarters">
                        <option value="1st Quarter">1st Quarter</option>
                        <option value="2nd Quarter">2nd Quarter</option>
                        <option value="3rd Quarter">3rd Quarter</option>
                        <option value="4th Quarter">4th Quarter</option>
                    </optgroup>
                </select>
            </div>
        </div>
        <div class="col">
            <label for="">Type</label>
            <div class="input-group ">
                <select name="type" class="form-control" required>
                    <optgroup label="Types">
                        <option value="Primary">Primary</option>
                        <option value="Supplemental">Supplemental</option>
                    </optgroup>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <label for=""></label>
            <div class="input-group mb-3">
                <input type="text" name="searchInput" class="form-control" placeholder="(e.g, 'IT Department')" required>
                <div class="input-group-append">
                    <input type="Submit" value="Search" class="btn btn-primary">
                </div>
            </div>
        </div>
    </div>
</form>