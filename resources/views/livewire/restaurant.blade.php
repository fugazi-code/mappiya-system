
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
</div>
