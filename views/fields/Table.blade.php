<div class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
    <table class="min-w-full">
        <thead>
        @foreach ($headers as $column)
            <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                {{ $column }}
            </th>
        @endforeach
        </thead>
        <tbody class="bg-white">
        @forelse ($rows as $row)
            <tr>
                @foreach($row as $column)
                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                        @include('panel::fields/value', ['value' => $column['value']])
                    </td>
                @endforeach
            </tr>
        @empty
            <tr class="text-center text-gray h-40">
                <td colspan="{{ count($headers) }}">No rows found</td>
            </tr>
        @endforelse
        </tbody>
    </table>
    <div class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
        @include('panel::fields/value', ['value' => $footer])
    </div>
</div>
