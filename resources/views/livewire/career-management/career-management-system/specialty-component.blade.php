<div>
    @if ($updateMode)
        <x-metadata.update title="{{$title}}">
            <x-slot name="updateFields">
                @include('livewire.career-management.career-management-system.partials.specialty_create_and_update_form_fields')
            </x-slot>
        </x-metadata.update>
    @else
        <x-metadata.create title="{{$title}}">
            <x-slot name="createFields">
                @include('livewire.career-management.career-management-system.partials.specialty_create_and_update_form_fields')
            </x-slot>
        </x-metadata.create>
    @endif
    <x-metadata.metadata-component title="{{$title}}">
        <x-slot name="filter">
            <div wire:ignore>
                <select wire:model="filter" class="form-control custom-select">
                    <option value="">Filter by Career Path</option>
                    @foreach ($careerPaths as $careerPath)
                        <option value="{{$careerPath->id}}">{{$careerPath->name}}</option>
                    @endforeach
                </select>
            </div>

        </x-slot>
        <x-slot name="tableHeaders">
            <th>Name</th>
            <th>Short Name</th>
            <th>Career Path</th>
            <th>Inserted</th>
            <th>Updated</th>
        </x-slot>
        <x-slot name="tableData">
            @foreach($data as $row)
                <tr>
                    <td class="w40">{{$loop->iteration}}</td>
                    <td>{{$row->name ?? ''}}</td>
                    <td>{{$row->slug ?? ''}}</td>
                    <td>{{$row->careerPath->name ?? ''}}</td>
                    <td>{{$row->created_at != null ? $row->created_at->format('d M Y') : ''}}</td>
                    <td>{{$row->updated_at != null ? $row->updated_at->format('d M Y') : ''}}</td>
                    <x-metadata.action-buttons id="{{$row->id}}" destroyField="{{$title}}"/>
                </tr>
            @endforeach
        </x-slot>
        <x-slot name="pagination">
            {{$data->onEachSide(1)->links()}}
        </x-slot>
    </x-metadata.metadata-component>
</div>
@push('livewire-scripts')
    <script>
        livewireDeleteConfirmation('specialty_destroy','specialty')
    </script>
@endpush

