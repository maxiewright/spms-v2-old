<div>
    <x-data.metadata title="{{$title}}">
        @if ($isOpen)
            @include('livewire.system-admin.metadata.contact.partials.city_or_town_createOrUpdate_modal')
        @endif
        <x-slot name="filters">
            <div class="mr-2">
                <select wire:model="filter" data-placeholder="Filter by Rank" class="input box pr-10 w-full">
                    <option value="">Find by Division or Region</option>
                    @foreach($divisionOrRegions as $divisionOrRegion)
                        <option value="{{$divisionOrRegion->id}}">{{$divisionOrRegion->name}}</option>
                    @endforeach
                </select>
            </div>
        </x-slot>
        <x-slot name="thead">
            <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">#</th>
            <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Name</th>
            <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Division or Region</th>
            <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Inserted</th>
            <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Updated</th>
            <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap text-center">Actions</th>
        </x-slot>
        <x-slot name="tbody">
            @foreach($data as $row)
                <tr>
                    <td class="border-b whitespace-no-wrap w40">
                        {{$loop->iteration}}
                    </td>
                    <td class="border-b whitespace-no-wrap">
                        {{$row->name}}
                    </td>
                    <td class="border-b whitespace-no-wrap">
                        {{$row->divisionOrRegion->name}}
                    </td>
                    <td class="border-b whitespace-no-wrap">
                        {{$row->created_at != null ? $row->created_at->format('d M Y') : ''}}
                    </td>
                    <td class="border-b whitespace-no-wrap">
                        {{$row->updated_at != null ? $row->updated_at->format('d M Y') : ''}}
                    </td>
                    <x-table.action-buttons id="{{$row->id}}" />
                </tr>
            @endforeach
        </x-slot>
        <x-slot name="pagination">
            {{$data->links()}}
        </x-slot>
    </x-data.metadata>
</div>



