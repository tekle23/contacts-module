<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Show Contact') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a class="text-green-500 text-lg" href="{{ route('admin.contacts.index') }}">Back</a>
                   <p>Name: {{ $contact->name }}</p>
                   <p>Email: {{ $contact->email }}</p>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>
