<div>
    {{-- Because she competes with no one, no one can compete with her. --}}


    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#productModal"><i class="anticon anticon-plus-circle m-r-5"></i>
    <span>Add Artiste</span>
</button>

<!-- Modal -->
<div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog">
        <form wire:submit.prevent="save">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="productModalLabel">Add New Artiste</h5>
                    {{-- <x-validation-errors /> --}}
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">

                            <div class="col-md-12">
                                <label for="product_name" class="float-left">Artiste Name</label>
                                <input type="text" name="artiste_name" id="artiste_name" class="form-control" placeholder="Artiste Name" wire:model='artiste_name'>
                                @error('artiste_name') <span style="color:red">{{ $message }}</span> @enderror
                            </div>

                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4 mt-2">
                                <label for="artiste_image" class="float-left">Artiste Picture</label>
                            </div>
                            <div class="col-md-8">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="inputGroupFile01"
                                        aria-describedby="inputGroupFileAddon01" wire:model='artiste_image'>
                                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-12">

                        @error('artiste_image') <span style="color:red">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Upload</button>
                </div>
            </div>
        </form>
    </div>
</div>


</div>
