<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Contacts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <p>
                        <Link class="text-green-500 text-lg" href="{{ route('admin.contacts.create')  }}">Add Contact</Link>
                    </p>

                    <x-splade-table :for="$contacts">
                        @cell('action', $contact)
                        <Link href="{{ route('admin.contacts.edit', $contact) }}" class="font-bold text-indigo-600"> Edit</Link> |
                        <Link href="{{ route('admin.contacts.delete', $contact) }}" class="font-bold text-red-600"> Delete</Link>
                        @endcell
                    </x-splade-table>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>
