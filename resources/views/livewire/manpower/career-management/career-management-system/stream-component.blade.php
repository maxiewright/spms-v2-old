<div>
    <x-data.metadata title="{{$title}}">
        @if($isOpen)
            @include('livewire.manpower.career-management.career-management-system.partials.updateOrCreate_stream_modal')
        @endif
        <x-slot name="filters">
            <div wire:ignore>
                <select wire:model="filter" class="input box pr-10 w-full">
                    <option value="">Filter by Branch</option>
                    @foreach ($branches as $branch)
                        <option value="{{$branch->id}}">{{$branch->name}}</option>
                    @endforeach
                </select>
            </div>
        </x-slot>
        <x-slot name="thead">
            <x-table.th>#</x-table.th>
            <x-table.th>Name</x-table.th>
            <x-table.th>Short Name</x-table.th>
            <x-table.th>Branch</x-table.th>
            <x-table.th>Inserted</x-table.th>
            <x-table.th>Updated</x-table.th>
            <x-table.th class="text-center">Actions</x-table.th>
        </x-slot>
        <x-slot name="tbody">
            @foreach($data as $row)
                <tr>
                    <x-table.td>{{$loop->iteration}}</x-table.td>
                    <x-table.td>{{$row->name ?? ''}}</x-table.td>
                    <x-table.td>{{$row->slug ?? ''}}</x-table.td>
                    <x-table.td>{{$row->branch->name ?? ''}}</x-table.td>
                    <x-table.td>{{$row->created_at != null ? $row->created_at->format('d M Y') : ''}}</x-table.td>
                    <x-table.td>{{$row->updated_at != null ? $row->updated_at->format('d M Y') : ''}}</x-table.td>
                    <x-table.action-buttons id="{{$row->id}}"/>
                </tr>
            @endforeach
        </x-slot>
        <x-slot name="pagination">
            {{$data->links()}}
        </x-slot>
    </x-data.metadata>>
</div>




