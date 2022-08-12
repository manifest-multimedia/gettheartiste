<div>


    <div class="page-header">
        <h2 class="header-title">List Artistes</h2>

    </div>
    <div class="card">
        <div class="card-body">
            <div class="row m-b-30">
                {{-- <div class="col-md-8">
                    <div class="d-md-flex">

                        <div class="col-md-3 mr-3 ml-3">
                            <div class="form-group">
                                <select class="form-control custom-select" style="min-width: 180px;">
                                    <option selected>Status</option>
                                    <option value="all">All</option>
                                    <option value="inStock">In Stock </option>
                                    <option value="outOfStock">Out of Stock</option>
                                </select>
                            </div>

                        </div>

                        <div class="col-md-8 mr-3 ml-3">
                                <div class="input-affix">
                                    <i class="prefix-icon anticon anticon-search opacity-04"></i>
                                    <input type="text" class="form-control" placeholder="Product Search" wire:model='livesearch'>
                                </div>
                        </div>
                    </div>
                </div> --}}

                <div class="col-lg-4 text-right">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#productModal"><i class="anticon anticon-plus-circle m-r-5"></i>
                        <span>Add Artiste</span>
                    </button>
                   {{-- @if(Auth::user()->account_status!=0) --}}

                    {{-- <a href="{{url('new-product')}}" class="btn btn-primary">
                        <i class="anticon anticon-plus-circle m-r-5"></i>
                        <span>Add Product</span>
                    </a> --}}
                    {{-- @endif --}}
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-hover e-commerce-table">
                    <thead>
                        <tr>
                            <th>
                                <div class="checkbox">
                                    <input id="checkAll" type="checkbox">
                                    <label for="checkAll" class="m-b-0"></label>
                                </div>
                            </th>
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
                        @foreach ($artiste as $item)
                        <tr>
                            <td>
                                <div class="checkbox">
                                    <input id="check-item-1" type="checkbox">
                                    <label for="check-item-1" class="m-b-0"></label>
                                </div>
                            </td>
                            {{-- <td>
                                #{{$item->id}}
                            </td> --}}
                            <td>
                                <div class="d-flex align-items-center">
                                    <img class="img-fluid rounded" src="images/others/thumb-9.jpg" style="max-width: 60px" alt="">
                                    <h6 class="m-b-0 m-l-10">{{$item->name}}</h6>
                                </div>
                            </td>
                           {{--  <td>{{getProductCategory($item->category_id)}}</td>
                            <td>${{$item->price}}</td>
                            <td>{{$item->stock}}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="badge badge-success badge-dot m-r-10"></div>
                                    <div>{{$item->status}}</div>
                                </div>
                            </td> --}}
                            {{-- <td class="text-right">
                                <button class="btn btn-icon btn-hover btn-sm btn-rounded pull-right">
                                    <i class="anticon anticon-edit"></i>
                                </button>
                                <button class="btn btn-icon btn-hover btn-sm btn-rounded">
                                    <i class="anticon anticon-delete"></i>
                                </button>
                            </td> --}}
                        </tr>

                        @endforeach


                    </tbody>
                </table>
            </div>
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
