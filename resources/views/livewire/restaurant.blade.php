
<div>
    <h1>Restaurant</h1>
    <h2>Create Restaurants:</h2>
    
    <form wire:submit.prevent="submit">
        <div>
            <label for="name">Name</label>
            <input wire:model="name" id="name" type="text" />
            @error('name') <div>{{ $message }}</div> @enderror
            
        </div>
        <div>
            <label for="address">Address</label>
            <input wire:model="address" id="address" type="text" />
            @error('address') <div>{{ $message }}</div> @enderror
            
        </div>
        <div>
            <label for="longitude">Longitude</label>
            <input wire:model="longitude" id="longitude" type="text" />
            @error('longitude') <div>{{ $message }}</div> @enderror
            
        </div>
        <div>
            <label for="latitude">Latitude</label>
            <input wire:model="latitude" id="latitude" type="text" />
            @error('latitude') <div>{{ $message }}</div> @enderror
            
        </div>
        <button type="submit">Submit Me</button>
    </form>
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
			<tr>
				<td>1</td>
				<td><a href="#"><img src="/examples/images/avatar/1.jpg" class="avatar" alt="Avatar"> Michael Holz</a></td>
				<td>04/10/2013</td>                        
				<td>Admin</td>
				<td><span class="status text-success">&bull;</span> Active</td>
				<td>
					<a href="#" class="settings" title="Settings" data-toggle="tooltip"><i class="material-icons">&#xE8B8;</i></a>
					<a href="#" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE5C9;</i></a>
				</td>
				<td>false</td>
				<td>
					<button>Edit</button>
					<button>Delete</button>
				</td>
			</tr>
		</tbody>
    </table>
</div>
