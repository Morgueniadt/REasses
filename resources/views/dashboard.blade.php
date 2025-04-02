<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-black dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-white-900 dark:text-white-100">
                    <p>{{ __("You're logged in!") }}</p>

                    <!-- Links to other pages -->
                    <div class="mt-6">
                        <ul class="space-y-4">
                            <!-- Link to Notes Index (All Notes) -->
                            <li>
                                <a href="{{ route('note.index') }}" class="text-blue-500 hover:text-blue-700">
                                    View All Notes
                                </a>
                            </li>

                            <!-- Link to Create New Note -->
                            <li>
                                <a href="{{ route('note.create') }}" class="text-blue-500 hover:text-blue-700">
                                    Create New Note
                                </a>
                            </li>

                            <!-- Link to User's Own Notes (If available) -->
                            <li>
                                <a href="{{ route('user.notes') }}" class="text-blue-500 hover:text-blue-700">
                                    View My Notes
                                </a>
                            </li>

<!-- Optional: Link to Profile Page (If needed) -->
<li>
    <a href="{{ route('profile.show') }}" class="text-blue-500 hover:text-blue-700">
        View Profile
    </a>
</li>

      
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
