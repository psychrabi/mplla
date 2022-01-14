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
                            <div class="card-tools">
                                <button wire:click.prevent="create" type="button" class="btn btn-tool bg-primary btn-sm"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Add new appointment">
                                    <i class="fas fa-plus"></i>
                                </button>
                                <button type="button" class="btn btn-tool btn-sm">
                                    <i class="fas fa-download"></i>
                                </button>
                                <button type="button" class="btn btn-tool btn-sm">
                                    <i class="fas fa-bars"></i>
                                </button>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-tool dropdown-toggle" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                        <i class="fas fa-wrench"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end" role="menu">
                                        <a href="#" class="dropdown-item">Action</a>
                                        <a href="#" class="dropdown-item">Another action</a>
                                        <a href="#" class="dropdown-item">Something else here</a>
                                        <a class="dropdown-divider"></a>
                                        <a href="#" class="dropdown-item">Separated link</a>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-tool" data-lte-toggle="card-collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-lte-toggle="card-maximize">
                                    <i class="fas fa-expand"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-lte-dismiss="card-remove">
                                    <i class="fas fa-times"></i>
                                </button>
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
                                            <td>{{$loop->iteration}}</td>

                                            <td>{{$appointment->client->name}}</td>
                                            <td>
                                                {{$appointment->date}}
                                            </td>
                                            <td>
                                                {{$appointment->time}}
                                            </td>
                                            <td>
                                                {{$appointment->status}}
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-primary btn-sm"
                                                        wire:click="edit({{$appointment->id}})"><i
                                                        class="fas fa-edit"></i></button>
                                                <button type="button" class="btn btn-danger btn-sm"><i
                                                        wire:click="confirmDelete({{$appointment->id}})"
                                                        class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center">
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
                        <div class="card-footer clearfix">
                            {{$appointments->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Add appointment Modal -->
        <div class="modal fade" id="addAppointmentModal" tabindex="-1" aria-labelledby="addAppointmentModalLabel"
             aria-hidden="true"
             data-bs-backdrop="static" wire:ignore.self>
            <div class="modal-dialog  modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <form class="needs-validation" novalidate wire:submit.prevent="save">

                        <div class="modal-header">
                            <h5 class="modal-title" id="addAppointmentModalLabel" wire:ignore>Add appointment</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>


                        <div class="modal-body">
                            <div class="row">
                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <select class="form-select" id="client" aria-label="Choose a client"
                                                wire:model.lazy="appointment.client_id" @error('client_id') is-invalid @enderror>
                                            <option>select client</option>
                                            @foreach($clients as $client)
                                                <option value="{{$client->id}}">{{$client->name}}</option>
                                            @endforeach

                                        </select>
                                        <label for="client">Client</label>
                                        @error('client_id')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <select class="form-select" id="client" aria-label="Choose appointment status"
                                                wire:model.lazy="appointment.status" @error('status') is-invalid @enderror>
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
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <input type="date" class="form-control" wire:model.lazy="appointment.date" @error('date') is-invalid @enderror/>
                                        <label>Appointment date:</label>
                                        @error('date')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <input type="time" class="form-control" wire:model.lazy="appointment.time" @error('time') is-invalid @enderror/>
                                        <label>Appointment time:</label>
                                        @error('time')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-floating mb-3">
                                <textarea class="form-control" wire:model.lazy="appointment.note"@error('note') is-invalid @enderror
                                          placeholder="Leave a comment here" id="note"
                                          style="height: 120px"></textarea>
                                <label for="note">Notes</label>

                                @error('note')
                                <div class="invalid-feedback">
                                    {{$message}}
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
