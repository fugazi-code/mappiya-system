<div>
    <div class="d-flex flex-column">
        <div class="mb-2">
            <h1>Restaurant</h1>
        </div>
        <div class="mb-2">
            <button type="button" class="btn btn-sm btn-success" wire:click="resetInput" data-toggle="modal"
                data-target="#createModal">
                Add Restaurant
            </button>
        </div>
        <div class="mb-2">
            <livewire:datatables.restaurant-datatable />
        </div>
    </div>
    <!-- Update Restaurant Modal -->
    <div wire:ignore.self class="modal fade" id="createModal" tabindex="-1" aria-labelledby="updateRestaurantModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateRestaurantModalLabel">
                        @if ($restaurant_id)
                            Edit Restaurant
                        @else
                            Add Restaurant
                        @endif
                    </h5>
                    <button type="button" class="btn-close" data-dismiss="modal" wire:click="closeModal"
                        aria-label="Close"></button>
                </div>
                <form wire:submit.prevent="update">
                    <div class="modal-body">
                        <div class="col-md-12 mb-2">
                            <label for="name">Name</label>
                            <input wire:model="name" id="name" type="text" class="form-control">
                            @error('name')
                                <div>{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-2">
                            <label for="address">Address</label>
                            <input wire:model="address" id="address" type="text" class="form-control" />
                            @error('address')
                                <div>{{ $message }}</div>
                            @enderror

                        </div>
                        <div class="col-md-12 mb-2">
                            <label for="longitude">Longitude</label>
                            <input wire:model="longitude" id="longitude" type="text" class="form-control" />
                            @error('longitude')
                                <div>{{ $message }}</div>
                            @enderror

                        </div>
                        <div class="col-md-12 mb-2">
                            <label for="latitude">Latitude</label>
                            <input wire:model="latitude" id="latitude" type="text" class="form-control" />
                            @error('latitude')
                                <div>{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button id="update-cancel-btn" type="button" class="btn btn-secondary" wire:click="closeModal"
                            data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" wire:click='save'>Save</button>
                        <button type="button" class="btn btn-danger" wire:click='destroy'>Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--- delete modal --->
    <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Delete Restaurant</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" wire:click="closeModal"
                        aria-label="Close"></button>
                </div>
                <form wire:submit.prevent="destroy">
                    <div class="modal-body">
                        <h4>Are you sure you want to delete this data ?</h4>
                    </div>
                    <div class="modal-footer">
                        <button id="delete-cancel-btn" type="button" class="btn btn-secondary" wire:click="closeModal"
                            data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
