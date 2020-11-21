<?php

namespace App\Http\Livewire\Metadata\RecordCard\Identification\DriversPermit;

use App\Models\System\Serviceperson\DriversPermit\DriversPermitTransactionCode;
use Livewire\Component;
use Livewire\WithPagination;

class TransactionCodeComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search = '';
    public $name, $slug, $selectedId;
    public $updateMode = false;
    public $title = 'Drivers Permit Transaction Code';

    protected $listeners = ['drivers_permit_transaction_code' => 'destroy'];

    public function render()
    {

        $searchTerm = '%'  .$this->search . '%';
        return view('livewire.metadata.record-card.identification.drivers-permit.transaction-code-component',[
            'data' =>  DriversPermitTransactionCode::query()
                ->orderBy('created_at', 'desc')
                ->where('name', 'like', $searchTerm)
                ->where('slug', 'like', $searchTerm)
                ->paginate(10)
        ]);
    }
    private function resetInput()
    {
        $this->name = null;
        $this->slug = null;
    }
    public function store()
    {
        $this->validate([
            'name' => 'required|unique:drivers_permit_transaction_codes,name',
            'slug' => 'required',
        ],[
            'name.required' => 'Transaction Code is required',
            'slug.required' => 'Short Name is required'
        ]);

        DriversPermitTransactionCode::create([
            'name' => $this->name,
            'slug' => $this->slug,
        ]);
        $this->resetInput();
    }
    public function edit($id)
    {
        $record = DriversPermitTransactionCode::findOrFail($id);
        $this->selectedId = $id;
        $this->name = $record->name;
        $this->slug = $record->slug;
        $this->updateMode = true;
    }

    public function update()
    {
      $this->validate([
            'selectedId' => 'required|numeric',
            'name' => 'required|unique:drivers_permit_transaction_codes,name',
            'slug' => 'required',
        ],[
            'name.required' => 'Transaction Code is required',
            'slug.required' => 'Short Name is required'
        ]);

        if ($this->selectedId) {
            $record = DriversPermitTransactionCode::find($this->selectedId);
            $record->update([
                'name' => $this->name,
                'slug' => $this->slug,
            ]);
            $this->resetInput();
            $this->updateMode = false;
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = DriversPermitTransactionCode::where('id', $id);
            $record->delete();
        }
    }

}
