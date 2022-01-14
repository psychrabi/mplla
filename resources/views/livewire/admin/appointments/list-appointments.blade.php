<div>
    @includeIf("layouts.partials.heading",['header' => $header])
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <!-- all in one -->
                    <div class="card card-primary card-outline">
                        <div class="card-header border-transparent">
                            <h3 class="card-title">Appointments</h3>
                            <x-card-tools />
                            <div class="btn-toolbar card-tools me-2">
                                <div class="btn-group btn-group-sm" role="group"
                                    aria-label="Basic radio toggle button group">
                                    <input type="radio" class="btn-check" wire:click="filter('')" id="all"
                                        autocomplete="off" {{$filter == ''? 'checked' :''}}>
                                    <label class="btn btn-outline-secondary" for="all">
                                        <span class="badge rounded-pill bg-primary"></span>All

                                    </label>

                                    <input type="radio" class="btn-check" wire:click="filter('confirmed')"
                                        id="confirmed" autocomplete="off" {{$filter == 'confirmed'? 'confcheckedrmed' :''}}>
                                    <label class="btn btn-outline-info" for="confirmed">
                                        <span class="badge rounded-pill bg-info  me-1">{{$count['Confirmed']}}</span>
                                        Confirmed</label>

                                    <input type="radio" class="btn-check" wire:click="filter('completed')"
                                        id="completed" autocomplete="off" {{$filter == 'completed'? 'checked' :''}}>
                                    <label class="btn btn-outline-success" for="completed">
                                        <span class="badge rounded-pill bg-success  me-1">{{$count['Completed']}}</span>Completed</label>

                                    <input type="radio" class="btn-check" wire:click="filter('cancelled')"
                                        id="cancelled" autocomplete="off" {{$filter == 'cancelled'? 'checked' :''}}>
                                    <label class="btn btn-outline-secondary" for="cancelled">
                                        <span class="badge rounded-pill bg-secondary me-1">{{$count['Cancelled']}}</span>
                                        Cancelled</label>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover m-0">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Client name</th>
                                            <th scope="col">Appointment Date</th>
                                            <th scope="col">Time</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($appointments as $appointment)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $appointment->client->name }}</td>
                                                <td>{{ $appointment->date }}</td>
                                                <td>{{ $appointment->time }}</td>
                                                <td>{{ $appointment->status }}</td>
                                                <td>
                                                    <button type="button" class="btn btn-primary btn-sm"
                                                        wire:click="edit({{ $appointment->id }})"><i
                                                            class="fas fa-edit"></i></button>
                                                    <button type="button" class="btn btn-danger btn-sm"><i
                                                            wire:click="confirmDelete({{ $appointment->id }})"
                                                            class="fas fa-trash"></i></button>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" class="text-center">
                                                    no data
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->

                        </div>
                        <!-- /.card-body -->
                        @if ($appointments->hasPages())
                            <div class="card-footer clearfix">
                                {{ $appointments->links() }}
                            </div>
                        @endif
                        <div wire:loading.class.remove="d-none" class='overlay dark d-none' wire:target="search,filter">
                            <i class="fas fa-2x fa-sync-alt fa-spin"></i>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- Add appointment Modal -->
        <div class="modal fade" id="addAppointmentModal" tabindex="-1" aria-labelledby="addAppointmentModalLabel"
            aria-hidden="true" data-bs-backdrop="static" wire:ignore.self>
            <div class="modal-dialog  modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <form class="needs-validation" novalidate wire:submit.prevent="save">

                        <div class="modal-header">
                            <h5 class="modal-title" id="addAppointmentModalLabel" wire:ignore>Add appointment</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>


                        <div class="modal-body">
                            <div class="row">
                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <select class="form-select" id="client" aria-label="Choose a client"
                                            wire:model.lazy="appointment.client_id" @error('client_id') is-invalid
                                            @enderror>
                                            <option>select client</option>
                                            @foreach ($clients as $client)
                                                <option value="{{ $client->id }}">{{ $client->name }}</option>
                                            @endforeach

                                        </select>
                                        <label for="client">Client</label>
                                        @error('client_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <select class="form-select" id="client"
                                            aria-label="Choose appointment status" wire:model.lazy="appointment.status"
                                            @error('status') is-invalid @enderror>
                                            <option value="">Choose status</option>
                                            <option>Scheduled</option>

                                            <option>Confirmed</option>
                                            <option>Cancelled</option>
                                            <option>Postponed</option>
                                            <option>Completed</option>
                                        </select>
                                        <label for="client">Client</label>
                                        @error('status')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <input type="date" class="form-control" wire:model.lazy="appointment.date"
                                            @error('date') is-invalid @enderror />
                                        <label>Appointment date:</label>
                                        @error('date')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <input type="time" class="form-control" wire:model.lazy="appointment.time"
                                            @error('time') is-invalid @enderror />
                                        <label>Appointment time:</label>
                                        @error('time')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-floating mb-3">
                                <textarea class="form-control" wire:model.lazy="appointment.note" @error('note')
                                    is-invalid @enderror placeholder="Leave a comment here" id="note"
                                    style="height: 120px"></textarea>
                                <label for="note">Notes</label>

                                @error('note')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer" wire:ignore>
                            <button type="button" class="btn btn-secondary" wire:click.prevent="close" wire>Close
                            </button>
                            <button type="submit" class="btn btn-primary" id="modalSubmit">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
