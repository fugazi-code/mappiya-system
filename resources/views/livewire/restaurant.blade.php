<div>
	<style>
		nav svg {
			height: 30px;
		}
	</style>
	@if (session()->has('message'))
		<div class="alert alert-success text-center">{{ session('message') }}</div>
	@endif
    <div class="row">
        <div class="col-12">
            <h1>Restaurant</h1>
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
					<button class="btn btn-warning">Edit</button>
					<button class="btn btn-danger">Delete</button>
				</td>
			</tr>
			@endforeach
		</tbody>
		
    </table>
	<div class="p-2 bg-indigo-50">
		{{ $restaurants->links() }}
	</div>
</div>
