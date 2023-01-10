<div>
    <button class="btn btn-primary" data-toggle="modal" data-target="#categoryModal">Menu Category</button>
    <!-- CUD -->
    <div wire:ignore.self class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="categoryModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        Menu Category
                    </h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-auto">
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <div class="d-flex flex-row">
                                    <input wire:model="categoryName" type="text"
                                        class="form-control form-control-sm">
                                    <button wire:click="store" type="button" class="btn btn-success ml-1">Add</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach ($categories as $category)
                            <div class="col-md-2">
                                <div class="card border">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <div class="my-auto text-nowrap mr-2">
                                                {{ $category['name'] }}
                                            </div>
                                            <div>
                                                <button wire:click='destroy({{ $category['id'] }})'type="button" class="btn btn-sm btn-danger"><i
                                                        class="fas fa-times"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="delete-cancel-btn" type="button" class="btn btn-secondary"
                        data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
