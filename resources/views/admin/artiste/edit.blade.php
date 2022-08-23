<x-neptune-layout>
    <x-slot name="title">
        GetTheArtiste &mdash; View Artiste List
    </x-slot>

    <div>


        <div class="page-header">
            <h2 class="header-title">Update Artiste</h2>

        </div>
        <div class="row">

            <div class="col-md-8">
                <form method="POST" action="{{ route('update-artiste', $artiste->slug)}}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="productModalLabel">Edit Artiste</h5>
                        </div>

                        <div class="modal-body">
                            <div class="form-group">
                                <div class="row">

                                    <div class="col-md-12">
                                        <label for="name" class="float-left">Artiste Name</label>
                                        <input type="text" name="name" value="{{$artiste->name}}" class="form-control" placeholder="Artiste Name">
                                        @error('name') <span style="color:red">{{ $message }}</span> @enderror
                                    </div>

                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">

                                    <div class="col-md-12">
                                        <label for="about" class="float-left">Artiste Name</label>
                                        <textarea  name="about"  class="form-control" rows="5" placeholder="About Artiste">{{$artiste->about}}</textarea>
                                        @error('name') <span style="color:red">{{ $message }}</span> @enderror
                                    </div>

                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12 mt-2">
                                        <img src="{{$artiste->getFirstMediaUrl('artiste') ?? asset('avatar.jpg')}}" style="width: 150px" alt="{{$artiste->name}}">
                                    </div>
                                    <div class="col-md-12 mt-2">
                                        <label for="artiste_image" class="float-left">Replace Picture</label>
                                                <input type="file" class="form-control" name="image">
                                            @error('image') <span style="color:red">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Upload</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    {{-- Upload Modal --}}


    <!-- Modal -->
    <div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog">
            <form method="POST" action="{{ route('upload-artiste')}}" enctype="multipart/form-data">
                @csrf
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
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Artiste Name">
                                    @error('artiste_name') <span style="color:red">{{ $message }}</span> @enderror
                                </div>

                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 mt-2">
                                    <label for="artiste_image" class="float-left">Artiste Picture</label>
                                </div>
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="form-control" name="image">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            @error('image') <span style="color:red">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-white" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Upload</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    </div>


</x-neptune-layout>
