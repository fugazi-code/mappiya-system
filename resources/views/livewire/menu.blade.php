<div>
    <div class="row">
        <div class="col-md-12">
            {{-- <h1>Menu</h1> --}}
            <h1>{{$restaurant['name']}}'s Menu</h1>
            <button class="btn btn-primary" data-toggle="modal" wire:click="resetInput" data-target="#createModal">Create Menu</button>
        </div>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Name</th>						
                    <th>Image</th>						
                    <th>Price</th>
                    <th>Description</th>
                    <th>Category</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($menus as $menu)
                    
                <tr>
                    <td>{{$menu->name}}</td>
                    <td>
                        @if($menu->image == null) 
                            <img src={{"https://cdn2.iconfinder.com/data/icons/toolbar-edge/512/forbidden-512.png"}} alt={{$menu->name}} />
                        @else
                            <img src={{$menu->image}} alt={{$menu->name}} />
                        @endif
                    </td>
                    <td>${{$menu->price}}</td>                        
                    <td>{{$menu->description}}</td>
                    <td>{{$menu->category}}</td>
                    <td>
                        <button class="btn btn-warning" data-toggle="modal" data-target="#updateModal" wire:click="editMenu({{ $menu->id }})">Edit</button>
                        <button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal" wire:click="deleteMenu({{ $menu->id }})" >Delete</button>
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
                        <h5 class="modal-title" id="createModalId">Create Menu</h5>
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
                                <label for="category">Category</label>
                                <select class="form-control" wire:model="category" id="category" type="text" class="form-control">
                                    <option value="" disabled>Select Category</option>
                                    <option value="Food">Food</option>
                                    <option value="Drink">Drink</option>
                                    <option value="Dessert">Dessert</option>
                                </select>
                                @error('category')
                                <div>{{ $message }}</div> @enderror

                            </div>
                            <div class="col-md-12 mb-2">
                                <label for="description">Description</label>
                                <input wire:model="description" id="description" type="text" class="form-control"/>
                                @error('description')
                                <div>{{ $message }}</div> @enderror

                            </div>
                            <div class="col-md-12 mb-2">
                                <label for="price">Price</label>
                                <input wire:model="price" id="price" type="number" class="form-control" step="0.01" min="0"/>
                                @error('price')
                                <div>{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-12 mb-2">
                                <label for="image">Image</label>
                                <input wire:model="image" id="image" type="text" class="form-control"/>
                                @error('image')
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


        <!-- Update Menu Modal -->
        <div wire:ignore.self class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateMenuModalLabel"
        aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="updateMenuModalLabel">Edit Menu</h5>
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
                                <label for="category">Category</label>
                                <select class="form-control" wire:model="category" id="category" type="text" class="form-control">
                                    <option value="" disabled>Select Category</option>
                                    <option value="Food">Food</option>
                                    <option value="Drink">Drink</option>
                                    <option value="Dessert">Dessert</option>
                                </select>
                                @error('category')
                                <div>{{ $message }}</div> @enderror

                            </div>
                            <div class="col-md-12 mb-2">
                                <label for="description">Description</label>
                                <input wire:model="description" id="description" type="text" class="form-control"/>
                                @error('description')
                                <div>{{ $message }}</div> @enderror

                            </div>
                            <div class="col-md-12 mb-2">
                                <label for="price">Price</label>
                                <input wire:model="price" id="price" type="number" class="form-control" step="0.01"/>
                                @error('price')
                                <div>{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-12 mb-2">
                                <label for="image">Image</label>
                                <input wire:model="image" id="image" type="text" class="form-control"/>
                                @error('image')
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
                        <h5 class="modal-title" id="deleteModalLabel">Delete Menu</h5>
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
</div>
