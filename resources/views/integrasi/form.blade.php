<form action="{{ route('integrasi.store', $type) }}" method="post">
    @csrf
    <div class="grid grid-cols-1 md:grid-cols-2">
        <div class="col-span-1 mb-3">
            <label class="font-bold dark:text-slate-300/70" for="link">Tautan</label>
        </div>
        <div class="col-span-1 mb-3">
            <input required type="text" id="link" name="link"
                class="w-full bg-slate-300 border-0 rounded p-2 text-xs dark:font-normal font-thin">
        </div>
        @error('link')
            <div class="col-span-1 mb-3 -mt-3 text-red">
            </div>
            <div class="col-span-1 mb-3 -mt-3 text-red">
                {{ $message }}
            </div>
        @enderror
        @if ($type != 'default')
            <div class="col-span-1 mb-3">
                <label class="font-bold dark:text-slate-300/70"
                    for="{{ $type == 'auth' ? 'username' : 'token' }}">{{ $type == 'auth' ? 'Username' : 'Token' }}</label>
            </div>
            <div class="col-span-1 mb-3">
                <input required type="text" id="{{ $type == 'auth' ? 'username' : 'token' }}"
                    name="{{ $type == 'auth' ? 'username' : 'token' }}"
                    class="w-full bg-slate-300 border-0 rounded p-2 text-xs dark:font-normal font-thin">
            </div>
            @if ($type == 'auth')
                @error('username')
                    <div class="col-span-1 mb-3 -mt-3 text-red">
                    </div>
                    <div class="col-span-1 mb-3 -mt-3 text-red">
                        {{ $message }}
                    </div>
                @enderror
            @elseif($type == 'token')
                @error('token')
                    <div class="col-span-1 mb-3 -mt-3 text-red">
                    </div>
                    <div class="col-span-1 mb-3 -mt-3 text-red">
                        {{ $message }}
                    </div>
                @enderror
            @endif
            @if ($type == 'auth')
                <div class="col-span-1 mb-3">
                    <label class="font-bold dark:text-slate-300/70" for="password">Password</label>
                </div>
                <div class="col-span-1 mb-3">
                    <input required type="text" id="password" name="password"
                        class="w-full bg-slate-300 border-0 rounded p-2 text-xs dark:font-normal font-thin">
                </div>
                @error('password')
                    <div class="col-span-1 mb-3 -mt-3 text-red">
                    </div>
                    <div class="col-span-1 mb-3 -mt-3 text-red">
                        {{ $message }}
                    </div>
                @enderror
            @endif
        @endif
        <div class="col-span-1">

        </div>
        <div class="col-span-1">
            <div class="flex flex-row justify-end">
                <button class="{{ $starterPack['theme']['button'] }}">Simpan</button>
            </div>
        </div>
    </div>
</form>
