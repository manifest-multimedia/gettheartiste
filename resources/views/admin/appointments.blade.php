<x-neptune-layout>
    <x-slot name="title">
        GetTheArtiste &mdash; Appointments
    </x-slot>

    <div>
        {{-- Be like water. --}}
        <div class="example-container">
            <div class="example-content bg-light">
                <div class="page-description page-description-tabbed">
                    <h1>Appointments</h1>
                    {{-- <span>Access Products/Services from Approved Businesses</span> --}}

                    <ul class="nav nav-tabs mb-3" id="appointments" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="products-tab" data-bs-toggle="tab" data-bs-target="#products" type="button" role="tab" aria-controls="products" aria-selected="true">Booked Appointments</button>
                        </li>
                        {{-- <li class="nav-item" role="presentation">
                            <button class="nav-link" id="services-tab" data-bs-toggle="tab" data-bs-target="#services" type="button" role="tab" aria-controls="services" aria-selected="false">Pending Appointments</button>
                        </li> --}}

                    </ul>

                </div>


        <div class="tab-content mt-3 mr-3 ml-3" id="appointments">
            <div class="tab-pane fade show active" id="products">
                <div class="row">
                    @if (isset($appointments) && $appointments->count()>0)

                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover e-commerce-table">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Artiste</th>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>Status</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>


                                       @foreach ($appointments as $key => $appointment)
                                       <tr>
                                        <td>
                                            {{$key + 1}}
                                         </td>

                                         <td>{{$appointment->artiste->name}}</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <h6 class="m-b-0">{{$appointment->date}}</h6>
                                            </div>
                                        </td>


                                        <td>{{$appointment->time}}</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="badge badge-secondary badge-dot m-r-10"></div>
                                                <div>{{$appointment->status}}</div>
                                            </div>
                                        </td>
                                        @if ($appointment->status == 'Pending')
                                        <td class="text-right">
                                            <a href="{{ route('appointment-status', $appointment->id)}}" class="btn text-white btn-primary">Approve</a>
                                            {{-- <button class="btn btn-icon  btn-hover btn-sm btn-rounded">
                                                <span class="material-icons btn-danger">
                                                    close
                                                    </span>
                                            </button> --}}
                                        </td>
                                        @endif
                                    </tr>
                                       @endforeach



                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    @endif
                </div>
            </div>
        </div>

    </div>

    </div>
    </div>


</x-neptune-layout>
