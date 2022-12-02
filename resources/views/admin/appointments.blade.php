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


                    <ul class="mb-3 nav nav-tabs" id="appointments" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="products-tab" data-bs-toggle="tab"
                                data-bs-target="#products" type="button" role="tab" aria-controls="products"
                                aria-selected="true">Booked Appointments</button>
                        </li>
                        {{-- <li class="nav-item" role="presentation">
                            <button class="nav-link" id="services-tab" data-bs-toggle="tab" data-bs-target="#services" type="button" role="tab" aria-controls="services" aria-selected="false">Pending Appointments</button>
                        </li> --}}

                    </ul>

                </div>


                <div class="mt-3 ml-3 mr-3 tab-content" id="appointments">
                    <div class="tab-pane fade show active" id="products">
                        <div class="row">
                            @if (isset($appointments) && $appointments->count() > 0)

                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-hover e-commerce-table">
                                                <thead>
                                                    <tr>
                                                        <th>No.</th>

                                                        <th style="width:25%">Artiste</th>
                                                        <th style="width:25%">Booked By</th>
                                                        <th style="width:25%">Date</th>
                                                        <th>Time</th>
                                                        <th>Status</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>


                                                    @foreach ($appointments as $key => $appointment)
                                                        <tr>
                                                            <td>
                                                                {{ $key + 1 }}
                                                            </td>
                                                            <td>{{ $appointment->artiste->name ?? '' }}</td>
                                                            <td>
                                                                {{ $appointment->user->firstname }}
                                                                {{ $appointment->user->lastname }}
                                                            </td>


                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <h6 class="m-b-0">{{ $appointment->date ?? '' }}
                                                                    </h6>
                                                                </div>
                                                            </td>


                                                            <td>{{ $appointment->time ?? '' }}</td>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    @switch($appointment->status)
                                                                        @case('Unapproved')
                                                                            <span
                                                                                class="badge badge-style-light rounded-pill badge-danger">{{ $appointment->status }}</span>
                                                                        @break

                                                                        @case('Approved')
                                                                            <span
                                                                                class="badge badge-style-light rounded-pill badge-success">{{ $appointment->status }}</span>
                                                                        @break

                                                                        @case('Pending')
                                                                            <span
                                                                                class="badge badge-style-light rounded-pill badge-warning">{{ $appointment->status }}</span>
                                                                        @break

                                                                        @default
                                                                            <span
                                                                                class="badge badge-style-light rounded-pill badge-danger">{{ $appointment->status }}</span>
                                                                    @endswitch
                                                                </div>
                                                            </td>

                                                            <td class="text-right">
                                                                @switch($appointment->status)
                                                                    @case('Unapproved')
                                                                        <a href="{{ route('appointment-approve', $appointment->id ?? '#') }}"
                                                                            class="text-white btn btn-primary approve_confirm"><span
                                                                                class="material-icons">
                                                                                check_circle
                                                                            </span></a>
                                                                    @break

                                                                    @case('Approved')
                                                                        <a href="{{ route('appointment-cancel', $appointment->id ?? '#') }}"
                                                                            class="text-white btn btn-danger cancel_confirm"><span
                                                                                class="material-icons">
                                                                                cancel
                                                                            </span></a>
                                                                    @break

                                                                    @case('Cancelled')
                                                                        <a href="{{ route('appointment-delete', $appointment->id ?? '#') }}"
                                                                            class="btn btn-icon btn-hover btn-sm delete_confirm">
                                                                            <span class="material-icons">
                                                                                delete_forever
                                                                            </span>
                                                                        </a>
                                                                    @break

                                                                    @default
                                                                        <span><a href="{{ route('appointment-approve', $appointment->id ?? '#') }}"
                                                                                class="text-white btn btn-primary approve_confirm"><span
                                                                                    class="material-icons">
                                                                                    check_circle
                                                                                </span></a></span>
                                                                        <span><a href="{{ route('appointment-cancel', $appointment->id ?? '#') }}"
                                                                                class="text-white btn btn-danger cancel_confirm"><span
                                                                                    class="material-icons">
                                                                                    cancel
                                                                                </span></a></span>
                                                                @endswitch

                                                            </td>
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
