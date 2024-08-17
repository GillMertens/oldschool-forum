<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="flex gap-4 items-center">
                    @if($user->img)
                        <img src="{{ asset($user->img) }}" alt="Profile Picture" class="h-24 w-24 rounded-full object-cover">
                    @else
                        <div class="h-24 w-24 rounded-full bg-gray-300"></div>
                    @endif
                    <div>
                        <h4>{{ $user->username }}</h4>
                        @if($user->bio)
                            <p>{{ $user->bio }}</p>
                        @else
                            <p class="text-gray-500">No bio available</p>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Add this box for the user's information -->
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="flex">
                    <div class="flex flex-col gap-4 w-1/2">
                        <div>
                            <h6>Full name</h6>
                            <h5>{{ $user->first_name }} {{ $user->last_name }}</h5>
                        </div>
                        <div>
                            <h6>Birthday</h6>
                            <h5>{{ $user->dob }}</h5>
                        </div>
                    </div>
                    <div class="flex flex-col gap-4  w-1/2">
                        <div>
                            <h6>Email</h6>
                            <h5>{{ $user->email }}</h5>
                        </div>
                        <div>
                            <h6>Member since</h6>
                            <h5>{{ $user->created_at->diffForHumans() }}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
