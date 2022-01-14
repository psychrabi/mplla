<?php

namespace App\Http\Livewire\Admin\Appointments;

use App\Http\Livewire\Admin\AdminComponent;
use App\Models\Appointment;
use App\Models\Client;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class ListAppointments extends AdminComponent
{

    public string $search = '';
    public string $filter = '';
    protected $rules = [
        'date' => 'required|date',
        'time' => 'required|date_format:H:i',
        'note' => 'nullable|string',
        'status' => 'required|string',
        'client_id' => 'required|integer',

    ];
    public $header = "Appointments";
    public $appointment = [];

    protected $queryString = ['filter'];


    protected $listeners = [
        'delete' => 'delete',
    ];

    public function mount()
    {
        $this->appointment['id'] = '';
    }

    public function render()
    {
        $appointments = Appointment::with('client')->when($this->filter != '', function ($query) {
            return $query->where('status', $this->filter);
        })->paginate(5);

        $count = Appointment::groupBy('status')->select('status', DB::raw('count(*) as total'))->pluck('total', 'status');

        $clients = Client::all();
        return view('livewire.admin.appointments.list-appointments', ['appointments' => $appointments, 'clients' => $clients, 'count' => $count]);
    }

    public function filter($filter)
    {
        $this->filter = $filter;
        $this->resetPage();
    }

    public function create()
    {
        $this->reset('appointment');
        $this->appointment['id'] = '';
        $this->dispatchBrowserEvent('show-modal', [
            'modalName' => 'addAppointmentModal',
            'title' => 'Add a appointment',
            'button' => 'Add appointment',
        ]);
    }



    public function save()
    {
        $validatedData = Validator::make(
            $this->appointment,
            [
                'date' => 'required|date',
                'time' => 'required|date_format:H:i',
                'note' => 'nullable|string',
                'status' => 'required|string',
                'client_id' => 'required|integer',
            ]
        )->validate();

        // dd($this->getErrorBag());



        if ($validatedData) {

            $appointment = Appointment::updateOrCreate(['id' => $this->appointment['id']], $this->appointment);

            $this->dispatchBrowserEvent('hide-modal', [
                'target' => 'addAppointmentModal'
            ]);

            $this->dispatchBrowserEvent('swal:modal', [
                'icon' => 'success',
                'title' => 'Success',
                'text' => 'Appointment for ' . $appointment->client->name . ' saved successfully'
            ]);
            $this->reset('appointment');
        }
    }

    public function edit(Appointment $appointment)
    {
        $this->appointment = $appointment->toArray();
        $this->dispatchBrowserEvent('show-modal', [
            'modalName' => 'addAppointmentModal',
            'title' => 'Edit a appointment',
            'button' => 'Save appointment',
        ]);
    }

    public function close()
    {
        $this->reset('appointment');
        $this->dispatchBrowserEvent('hide-modal', [
            'target' => 'addAppointmentModal'
        ]);
    }

    public function confirmDelete(Appointment $appointment)
    {
        $this->dispatchBrowserEvent('swal:confirm', [
            'icon' => 'warning',
            'title' => 'Delete appointment',
            'text' => "Are you sure you want to delete appointment for '{$appointment->client->name}'?",
            'action' => 'delete',
            'id' => $appointment->id,
        ]);
    }

    public function delete(Appointment $appointment)
    {
        $appointment->delete();
        $this->dispatchBrowserEvent('swal:modal', [
            'icon' => 'success',
            'title' => 'Success',
            'text' => "Appointment for {$appointment->client->name} was deleted",
        ]);
        $this->reset('appointment');
    }
}
