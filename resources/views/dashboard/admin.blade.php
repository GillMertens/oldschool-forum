<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="w-full">
        <table class="table-auto w-full">
            <thead>
            <tr class="text-left">
                <th class="px-4 py-2">First Name</th>
                <th class="px-4 py-2">Last Name</th>
                <th class="px-4 py-2">Username</th>
                <th class="px-4 py-2">Email</th>
                <th class="px-4 py-2">Role</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr class="hover:bg-gray-100">
                    <td class="border-b px-4 py-2">{{ $user->first_name }}</td>
                    <td class="border-b px-4 py-2">{{ $user->last_name }}</td>
                    <td class="border-b px-4 py-2">{{ $user->username }}</td>
                    <td class="border-b px-4 py-2">{{ $user->email }}</td>
                    <td class="border-b px-4 py-2">{{ $user->roles->first()->name }}</td>
                    <td class="border-b px-4 py-2">
                        <form action="{{ route('users.toggleAdmin', $user) }}" method="POST" onsubmit="return confirm('Are you sure you want to change the role of {{ $user->username }} to {{ $user->roles->first()->name === 'admin' ? 'user' : 'admin' }}?')">
                            @csrf
                            <button type="submit" class="text-blue-500 hover:underline">
                                {{ $user->roles->contains('name', 'admin') ? 'Demote from Admin' : 'Promote to Admin' }}
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
