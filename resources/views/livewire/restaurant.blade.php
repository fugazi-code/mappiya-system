<div>
	<style>
		nav svg {
			height: 30px;
		}
	</style>

    <div class="row">
        <div class="col-md-12">
            <h1>Restaurant</h1>
            <button class="btn btn-primary" wire:click="resetInput" data-toggle="modal" data-target="#createModal">Create Restaurant</button>
        </div>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>						
                    <th>Address</th>
                    <th>Longitude</th>
                    <th>Latitude</th>
                    <th>Available</th>
                    <th>Blocked</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($restaurants as $restaurant)
                    
                <tr>
                    <td>{{$restaurant->id}}</td>
                    <td>{{$restaurant->name}}</td>
                    <td>{{$restaurant->address}}</td>                        
                    <td>{{$restaurant->longitude}}</td>
                    <td>{{$restaurant->latitude}}</td>
                    <td>{{$restaurant->is_available}}</td>
                    <td>{{$restaurant->is_blocked}}</td>
                    <td>
                        <button class="btn btn-success" data-toggle="modal" wire:click="menu({{ $restaurant->id }})" >Menu</button>
                        <button class="btn btn-warning" data-toggle="modal" data-target="#updateModal" wire:click="editRestaurant({{ $restaurant->id }})">Edit</button>
                        <button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal" wire:click="deleteRestaurant({{ $restaurant->id }})" >Delete</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!--- create modal --->
        <div wire:ignore.self class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalId"
        aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createModalId">Create Restaurant</h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"
                            wire:click="closeModal"></button>
                    </div>
                    <form wire:submit.prevent="store">
                        <div class="modal-body">
                            <div class="col-md-12 mb-2">
                                <label for="name">Name</label>
                                <input wire:model="name" id="name" type="text" class="form-control">
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
                        </div>
                        <div class="modal-footer">
                            <button id="create-cancel-btn" type="button" class="btn btn-secondary" wire:click="closeModal"
                            data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Update Restaurant Modal -->
        <div wire:ignore.self class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateRestaurantModalLabel"
        aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="updateRestaurantModalLabel">Edit Student</h5>
                        <button type="button" class="btn-close" data-dismiss="modal" wire:click="closeModal"
                            aria-label="Close"></button>
                    </div>
                    <form wire:submit.prevent="update">
                        <div class="modal-body">
                            <div class="col-md-12 mb-2">
                                <label for="name">Name</label>
                                <input wire:model="name" id="name" type="text" class="form-control">
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
                        </div>
                        <div class="modal-footer">
                            <button id="update-cancel-btn" type="button" class="btn btn-secondary" wire:click="closeModal"
                            data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
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

    {{-- <div class="p-2 bg-indigo-50">
        {{ $restaurants->links() }}
    </div> --}}
</div>