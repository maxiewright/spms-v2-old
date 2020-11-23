<div>
{{--    @if ($updateMode)--}}
{{--        <x-metadata.update title="{{$title}}">--}}
{{--            <x-slot name="updateFields">--}}
{{--                @include('livewire.system-admin.metadata.service-data.unit.partials.create_and_update_form_fields_with_parent_unit')--}}
{{--            </x-slot>--}}
{{--        </x-metadata.update>--}}
{{--    @else--}}
{{--        <x-metadata.create title="{{$title}}">--}}
{{--            <x-slot name="createFields">--}}
{{--                @include('livewire.system-admin.metadata.service-data.unit.partials.create_and_update_form_fields_with_parent_unit')--}}
{{--            </x-slot>--}}
{{--        </x-metadata.create>--}}
{{--    @endif--}}
    <x-tables.data-table title="{{$title}}">
        <x-slot name="filters">
            <div class="mr-2">
                <select wire:model="filter"  data-placeholder="Filter by Type" class="input box pr-10 w-full" >
                    <option value="">Filter by Parent Unit</option>
                    @foreach ($parentUnits as $parentUint)
                        <option value="{{$parentUint->id}}">{{$parentUint->slug}}</option>
                    @endforeach
                </select>
            </div>
        </x-slot>
        <x-slot name="thead">
            <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">#</th>
            <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Name</th>
            <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Short Name</th>
            <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Parent Unit</th>
            <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Inserted</th>
            <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Updated</th>
            <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap text-center">Actions</th>
        </x-slot>
        <x-slot name="tbody">
            @foreach($data as $row)
                <tr>
                    <td class="border-b whitespace-no-wrap w40" >
                        {{$loop->iteration}}
                    </td>
                    <td class="border-b whitespace-no-wrap">
                        {{$row->name}}
                    </td>
                    <td class="border-b whitespace-no-wrap">
                        {{$row->slug}}
                    </td>
                    <td class="border-b whitespace-no-wrap">
                        {{$row->battalion->slug ?? $row->company->slug ?? ''}}
                    </td>
                    <td class="border-b whitespace-no-wrap">
                        {{$row->created_at != null ? $row->created_at->format('d M Y') : ''}}
                    </td>
                    <td class="border-b whitespace-no-wrap">
                        {{$row->updated_at != null ? $row->updated_at->format('d M Y') : ''}}
                    </td>
                    <td class="border-b whitespace-no-wrap w-56">
                        <div class="flex justify-center items-center">
                            <a wire:click="edit({{$row->id}})"
                               class="flex items-center mr-3"
                               href="javascript:;">
                                <i data-feather="check-square" class="w-4 h-4 mr-1"></i>Edit
                            </a>
                            <a wire:click="$emit('{{str_replace(' ', '_', strtolower($title)).'_destroy'}}', {{$row->id}})"
                               class="flex items-center text-theme-6"
                               href="javascript:;"
                               data-toggle="modal"
                               data-target="#delete-confirmation-modal">
                                <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete
                            </a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </x-slot>
        <x-slot name="pagination">
            {{$data->links()}}
        </x-slot>
    </x-tables.data-table>
</div>


