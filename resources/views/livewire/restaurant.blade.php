<div>
    <div class="row">
        <div class="col-12">
            <h1>Restaurant</h1>
            <h2>Create Restaurants:</h2>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 mb-2">
                            <label for="name">Name</label>
                            <input wire:model="name" id="name" type="text" class="form-control"/>
                            @error('name')
                            <div>{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-12 mb-2">
                            <label for="address">Address</label>
                            <input wire:model="address" id="address" type="text" class="form-control"/>
                            @error('address')
                            <div>{{ $message }}</div> @enderror

                        </div>
                        <div class="col-md-12 mb-2">
                            <label for="longitude">Longitude</label>
                            <input wire:model="longitude" id="longitude" type="text" class="form-control"/>
                            @error('longitude')
                            <div>{{ $message }}</div> @enderror

                        </div>
                        <div class="col-md-12 mb-2">
                            <label for="latitude">Latitude</label>
                            <input wire:model="latitude" id="latitude" type="text" class="form-control"/>
                            @error('latitude')
                            <div>{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-12 mb-2 d-flex justify-content-center">
                            <a href="#" class="btn btn-primary" wire:click="store">Submit</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
