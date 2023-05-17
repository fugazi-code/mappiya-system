<div>
    <div class="row">
        <div class="col-md-12">
            {{-- <h1>Menu</h1> --}}
            <h1>{{ $restaurant['name'] }}'s Menu</h1>
        </div>
        <div class="col-12 d-flex flex-row">
            <button class="btn btn-primary mr-2" data-toggle="modal" wire:click="resetInput"
                data-target="#createModal">Create
                Menu</button>
            @livewire('menu-category', ['restaurant_id' => $restaurant_id])
        </div>
        <div class="col-12 mt-4">
            <div class="">
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    @foreach ($categories as $key => $category)
                        <label class="btn btn-sm btn-info @if ($key == 0) active @endif">
                            <input type="radio" name="options" id="option{{ $key }}"
                                value="{{ $category->id }}" @if ($key == 0) checked @endif
                                wire:model='categorySelected'>
                            {{ $category->name }}
                        </label>
                    @endforeach
                    <label class="btn btn-sm btn-warning">
                        <input type="radio" name="options" id="optionlast" value=""
                            wire:model='categorySelected'>
                        uncategorized
                    </label>
                </div>
            </div>
        </div>
        <div class="col-12 mt-4">
            <div class="d-flex flex-wrap justify-content-center">
                @empty(!$menus)
                    @foreach ($menus as $menu)
                        <div class="card" style="width: 18rem;">
                            <img src="{{ $menu->image }}" class="card-img-top" alt="{{ $menu->image }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $menu->name }}
                                    <span class="badge badge-secondary">{{ $menu->price }}</span>
                                </h5>
                                @if ($menu->categorized)
                                    <h6 class="card-subtitle mb-2 text-muted">{{ $menu->categorized->name }}</h6>
                                @endif
                                <p class="card-text">{{ $menu->description }}</p>
                                <a href="#" class="card-link" data-toggle="modal"
                                    wire:click="editMenu({{ $menu->id }})" data-target="#createModal">Edit</a>
                                <a href="#" class="card-link" wire:click='destroy({{ $menu->id }})'>Remove</a>
                            </div>
                        </div>
                    @endforeach
                @endempty
            </div>
        </div>
    </div>

    <!-- CUD -->
    <div wire:ignore.self class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        @if ($menu_id)
                            Edit Menu
                        @else
                            Add Menu
                        @endif
                    </h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <label>Name</label>
                            <input type="text" class="form-control" wire:model="name">
                        </div>
                        <div class="col-12">
                            <label>Category</label>
                            <select class="form-control" wire:model="menu_category_id">
                                <option value="">-- Select Options --</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12 d-flex flex-row pt-2">
                            <input wire:model='isAvailable' class="form-control my-auto" type="checkbox"
                                style="
                            width: fit-content;
                            height: fit-content;
                        ">
                            <label class="my-auto ml-2">Available {{ $isAvailable }}</label>
                        </div>
                        <div class="col-12">
                            <label>Selling Price</label>
                            <input type="number" class="form-control" wire:model="selling_price">
                        </div>
                        <div class="col-12">
                            <label>Vendor Price</label>
                            <input type="number" class="form-control" wire:model="vendor_price">
                        </div>
                        <div class="col-12">
                            <label>Image</label>
                            <input type="text" class="form-control" wire:model='image'></textarea>
                        </div>
                        <div class="col-12">
                            <label>Description</label>
                            <textarea class="form-control" wire:model='description'></textarea>
                        </div>
                        <div class="col-12">
                            @error('name')
                                <span class="error">{{ $message }}</span>
                            @enderror
                            @error('menu_category_id')
                                <span class="error">{{ $message }}</span>
                            @enderror
                            @error('description')
                                <span class="error">{{ $message }}</span>
                            @enderror
                            @error('selling_price')
                                <span class="error">{{ $message }}</span>
                            @enderror
                            @error('vendor_price')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary delete-cancel-btn"
                        data-dismiss="modal">Close</button>
                    @if ($menu_id)
                        <button type="button" class="btn btn-primary" wire:click='update'>Edit</button>
                    @else
                        <button type="button" class="btn btn-primary" wire:click='store'>Save changes</button>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
