<table class="w-full border-collapse" id="datatable_1">
    <thead class="bg-slate-100 dark:bg-slate-700/20">
        <tr>
            <th scope="col"
                class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 dark:text-gray-400 uppercase">
                Username
            </th>
            <th scope="col"
                class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 dark:text-gray-400 uppercase">
                Ip Address
            </th>
            <th scope="col"
                class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 dark:text-gray-400 uppercase">
                Browser
            </th>
            <th scope="col"
                class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 dark:text-gray-400 uppercase">
                Browser Version
            </th>
            <th scope="col"
                class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 dark:text-gray-400 uppercase">
                OS
            </th>
            <th scope="col"
                class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 dark:text-gray-400 uppercase">
                Log Details
            </th>
            <th scope="col"
                class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 dark:text-gray-400 uppercase">
                Time Activity
            </th>
        </tr>
    </thead>
    <tbody>
        @if (!$data || $data == null)
            <small>Tidak ada log aktivitas di sini</small>
        @else
            @foreach ($data as $item)
                <tr class="bg-white border-b border-dashed dark:bg-gray-900 dark:border-gray-700">
                    <td class="p-3 text-sm font-medium whitespace-nowrap dark:text-white">
                        {{ $item['username'] }}
                    </td>
                    <td class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                        {{ $item['ip_address'] }}
                    </td>
                    <td class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                        {{ $item['browser'] }}
                    </td>
                    <td class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                        {{ $item['browser_version'] }}
                    </td>
                    <td class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                        {{ $item['os'] }}
                    </td>
                    <td class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                        {{ $item['log_detail'] }}
                    </td>
                    <td>
                        {{ date('d/m/Y', strtotime($item['created_at'])) }} <br>
                        {{ date('H:i:s', strtotime($item['created_at'])) }} WIB
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>
