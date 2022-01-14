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
                            <h3 class="card-title">Users</h3>
                            <x-card-tools />

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover m-0">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Options</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($users as $user)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>

                                                <td>{{ $user->name }}</td>
                                                <td>
                                                    {{ $user->email }}
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-primary btn-sm"
                                                        wire:click="edit({{ $user->id }})"><i
                                                            class="fas fa-edit"></i></button>
                                                    <button type="button" class="btn btn-danger btn-sm"><i
                                                            wire:click="confirmDelete({{ $user->id }})"
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
                        @if ($users->hasPages())
                            <div class="card-footer clearfix">
                                {{ $users->links() }}
                            </div>
                        @endif
                        <div wire:loading.class.remove="d-none" class='overlay dark d-none' wire:target="search">
                            <i class="fas fa-2x fa-sync-alt fa-spin"></i>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- Add user Modal -->
        <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel"
            aria-hidden="true" data-bs-backdrop="static" wire:ignore.self>
            <div class="modal-dialog  modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <form class="needs-validation" novalidate wire:submit.prevent="save">

                        <div class="modal-header">
                            <h5 class="modal-title" id="addUserModalLabel" wire:ignore>Add user</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                    placeholder="Name" wire:model.lazy="user.name" autofocus>
                                <label for="name">Name</label>
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                    placeholder="name@example.com" wire:model.lazy="user.email">
                                <label for="email">Email address</label>
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    id="password" placeholder="Password" wire:model.lazy="user.password">
                                <label for="password">Password</label>
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-floating">
                                <input type="password"
                                    class="form-control @error('password_confirmation') is-invalid @enderror"
                                    id="password_confirmation" placeholder="Password"
                                    wire:model.lazy="user.password_confirmation">
                                <label for="password_confirmation">Password Confirmation</label>
                                @error('password_confirmation')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer" wire:ignore>
                            <button type="button" class="btn btn-secondary" wire:click.prevent="close">Close</button>
                            <button type="submit" class="btn btn-primary" id="modalSubmit">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
