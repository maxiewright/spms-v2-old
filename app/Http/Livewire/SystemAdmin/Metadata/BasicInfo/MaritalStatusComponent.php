<?php

namespace App\Http\Livewire\SystemAdmin\Metadata\BasicInfo;


use App\Http\Livewire\Traits\WithAlerts;
use App\Http\Livewire\Traits\WithDataTable;
use App\Http\Livewire\Traits\WithModal;
use App\Models\System\Universal\Lookup\MaritalStatus;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class MaritalStatusComponent extends Component
{
    use WithPagination, WithModal, WithAlerts, WithDataTable;

    public $search = '';
    public $name, $selectedId;
    public $title = 'Marital Status';

    protected $listeners = ['destroyMaritalStatus'];

    /**
     * Render the component view
     *
     * @return Application|Factory|View
     */
    public function render()
    {

        $searchTerm = '%' . $this->search . '%';

        return view('livewire.system-admin.metadata.basic-info.marital-status', [
            'data' => MaritalStatus::query()
                ->orderBy('created_at', 'desc')
                ->where('name', 'like', $searchTerm)
                ->paginate(10)
        ]);
    }

    /**
     * Show the create form
     */
    public function create()
    {
        $this->openModal();
        $this->resetInput();
    }

    /**
     * Reset input fields
     */
    private function resetInput()
    {
        $this->name = null;
        $this->selectedId = null;
    }

    /**
     * Create and update record
     */
    public function store()
    {
        $this->validate([
            'name' => 'required|unique:ethnicities,name',
        ], [
            'name.required' => 'This field is required'
        ]);

        MaritalStatus::updateOrCreate(['id' => $this->selectedId], [
            'name' => $this->name,
        ]);

        $this->closeModal();

        $this->resetInput();

        $this->showSuccessAlert();

    }

    /**
     * Show the edit form
     * @param $id
     */
    public function edit($id)
    {
        $record = MaritalStatus::findOrFail($id);
        $this->selectedId = $id;
        $this->name = $record->name;

        $this->openModal();
    }

    /**
     * Delete a record
     * @param $id
     */
    public function destroyMaritalStatus($id)
    {
        if ($id) {
            $record = MaritalStatus::where('id', $id);
            $record->delete();
        }

        $this->showDeleteAlert();
    }

}
