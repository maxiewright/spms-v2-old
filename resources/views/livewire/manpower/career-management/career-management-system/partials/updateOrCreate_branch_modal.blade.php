<x-modal.livewire.dialog title="{{$title}}">
    <div class="">
        <x-form.input.livewire-text model="name" label="Name" placeholder="Name"  />
    </div>

    <div class="mt-3">
        <x-form.input.livewire-text model="slug"  label="Short Name" placeholder="Short Name" />
    </div>
</x-modal.livewire.dialog>

