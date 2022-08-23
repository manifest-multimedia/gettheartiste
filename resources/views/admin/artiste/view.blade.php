<x-neptune-layout>
    <x-slot name="title">
        GetTheArtiste &mdash; View Artiste List
    </x-slot>

    <div>


        <div class="page-header">
            <h2 class="header-title">List Artistes</h2>

        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover e-commerce-table">
                                <thead>
                                    <tr>
                                        {{-- <th>ID</th> --}}
                                        <th>Artiste</th>
                                        {{-- <th>Category</th>
                                        <th>Price</th>
                                        <th>Stock Left</th>
                                        <th>Status</th> --}}
                                        {{-- <th></th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($artiste as $key => $item)
                                    <tr>

                                        <td>
                                            #{{$key+1}}
                                        </td>
                                        <td>

                                            <div class="d-flex align-items-center">
                                                {{-- <img class="img-fluid rounded" src="{{asset($item->picture)}}" style="max-width: 60px" alt=""> --}}
                                                <img class="img-fluid rounded" src="{{$item->getFirstMediaUrl('artiste')}}" style="max-width: 60px" alt="">
                                                <h6 class="m-b-0 m-l-10">{{$item->name}}</h6>
                                            </div>
                                        </td>

                                        <td class="text-right">
                                            <a href="{{route('edit-artiste', $item->slug ??
                                                '#')}}" class="btn btn-icon btn-hover btn-sm btn-rounded pull-right">
                                                <i class="anticon anticon-edit"></i>
                                            </a>
                                            <a href="{{route('delete-artiste', $item->slug ??
                                            '#')}}" class="btn btn-icon btn-hover btn-sm btn-rounded">
                                                <i class="anticon anticon-delete"></i>
                                            </a>
                                        </td>
                                    </tr>

                                    @endforeach


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-md-4">
                <form method="POST" action="{{ route('upload-artiste')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="productModalLabel">Add New Artiste</h5>

                        </div>
                        {{-- <x-validation-errors /> --}}
                        <div class="modal-body">
                            <div class="form-group">
                                <div class="row">

                                    <div class="col-md-12">
                                        <label for="product_name" class="float-left">Artiste Name</label>
                                        <input type="text" name="name" id="name" class="form-control" placeholder="Artiste Name">
                                        @error('name') <span style="color:red">{{ $message }}</span> @enderror
                                    </div>

                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12 mt-2">
                                        <label for="artiste_image" class="float-left">Artiste Picture</label>
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
