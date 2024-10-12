<x-app-layout>
    @slot('title', 'Pengguna')

    <x-side-nav>
        <div class="mx-auto max-w-screen-xl">
            <div class="relative shadow-md sm:rounded-lg overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                <th scope="col" class="px-4 py-3">No.</th>
                                <th scope="col" class="px-4 py-3">Nama</th>
                                <th scope="col" class="px-4 py-3">Email</th>
                                <th scope="col" class="px-4 py-3">Role</th>
                                <th scope="col" class="px-4 py-3">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                                <tr class="border-b">
                                    <td class="px-4 py-3">{{ $loop->iteration }}</td>
                                    <td class="px-4 py-3">{{ $user->name }}</td>
                                    <td class="px-4 py-3">{{ $user->email }}</td>
                                    <td class="px-4 py-3">
                                        @if (!$user->roles->contains('name', 'admin') && !$user->roles->contains('name', 'partner'))
                                            <!-- Memeriksa apakah user bukan admin -->
                                            <form action="{{ route('user_roles.update', $user->id) }}" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="role_id" value="{{ $adminRoleId }}">
                                                <!-- Pastikan $adminRoleId adalah ID dari role admin -->
                                                <input type="hidden" name="user_id" value="{{ $user->id }}">
                                                <button type="submit"
                                                    class="text-sm text-orange-400 rounded text-start hover:underline"
                                                    onclick="return confirm('Apakah Anda yakin ingin menaikkan pangkat user ini?')">Jadikan
                                                    Partner</button>
                                            </form>
                                        @else
                                            @foreach ($user->roles as $role)
                                                <!-- Loop untuk setiap role -->
                                                <span class="text-green-600">{{ $role->name }}</span>
                                                <!-- Tampilkan nama role -->
                                                @if (!$loop->last)
                                                    <!-- Jika bukan role terakhir, tambahkan koma -->
                                                    ,
                                                @endif
                                            @endforeach
                                        @endif
                                    </td>
                                    <td class="px-4 py-3">
                                        @if($user->roles->contains('name', 'partner'))
                                            <!-- Tombol hapus -->
                                            <form action="{{ route('user_roles.destroy', $user->id) }}" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" name="role_id" value="{{ $role->id }}">
                                                <input type="hidden" name="user_id" value="{{ $user->id }}">
                                                <button type="submit" class="text-red-600 hover:underline text-start"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?')">Hapus</button>
                                            </form>
                                        @else
                                            -
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr class="border-b">
                                    <td class="px-4 py-3 text-center" colspan="5">Tidak ada pengguna</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="p-2 sm:p-5">
                    {{ $users->links() }}
                </div>

            </div>
        </div>
    </x-side-nav>
</x-app-layout>
