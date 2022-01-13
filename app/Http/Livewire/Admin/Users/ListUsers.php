<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class ListUsers extends Component
{

    public $user = [];
    protected $rules = [
        'name' => 'required',
        'email' => 'required|email',
        'password' => 'sometimes|confirmed'
    ];

    protected $listeners = [
        'delete' => 'delete',
        'deleteMember' => 'deleteMember',
    ];

    public function mount()
    {
        $this->user['id'] = '';
    }

    public function render()
    {
        $users = User::latest()->paginate();
        return view('livewire.admin.users.list-users', ['users' => $users]);
    }

    public function create()
    {
        $this->dispatchBrowserEvent('show-modal', [
            'modalName' => 'addUserModal',
            'title' => 'Add a user',
            'button' => 'Add user',
        ]);
    }

    public function save()
    {
        $validatedData = Validator::make($this->user, $this->rules)->validate();

        if ($validatedData) {
            if ($this->user['id'] != '') {
                if (isset($this->user['password'])) {
                    $validatedData['password'] = Hash::make($validatedData['password']);
                }

                User::updateOrCreate(['id'=> $this->user['id']], $validatedData);
            }
        }

        $this->dispatchBrowserEvent('hide-modal', [
            'target' => 'addUserModal'
        ]);

        $this->dispatchBrowserEvent('swal:modal', [
            'icon' => 'success',
            'title' => 'Success',
            'text' => 'User saved successfully'
        ]);
    }

    public function edit(User $user)
    {
        $this->user = $user->toArray();
        $this->dispatchBrowserEvent('show-modal', [
            'modalName' => 'addUserModal',
            'title' => 'Edit a user',
            'button' => 'Save user',
        ]);
    }

    public function close()
    {
        $this->reset('user');
        $this->dispatchBrowserEvent('hide-modal', [
            'target' => 'addUserModal'
        ]);
    }

    public function confirmDelete(User $user)
    {
        $this->dispatchBrowserEvent('swal:confirm', [
            'icon' => 'warning',
            'title' => 'Delete ' . $user->name,
            'text' => "Are you sure you want to delete '{$user->name}'?",
            'action' => 'delete',
            'id' => $user->id,
        ]);
    }

    public function delete(User $user)
    {
        $user->delete();
        $this->dispatchBrowserEvent('swal:modal', [
            'icon' => 'success',
            'title' => 'Success',
            'text' => "{$user->name} was deleted",
        ]);
        $this->reset('user');
    }
}
