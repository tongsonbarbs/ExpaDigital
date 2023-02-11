<div class="max-w-6xl mx-auto">
    <div class="flex justify-end m-2 p-2">
        <x-jet-button wire:click="showCreateModal">Add</x-jet-button>
    </div>
    <div class="m-2 p-2">


        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Product name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Description
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Price
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $product->name }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $product->description }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $product->price }}
                            </td>
                            <td class="px-6 py-4">
                                <x-jet-button wire:click="showEditProductModal({{ $product->id }})">Edit</x-jet-button>
                                <x-jet-button wire:click="deleteProduct({{ $product->id }})" class="bg-red-900">Delete
                                </x-jet-button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="dialog-container">
        <x-jet-dialog-modal wire:model="showingCreateModal">
            <x-slot name="title">
                <div class="title-holder">
                    @if ($this->isEdit)
                        Edit Product
                    @else
                        Add a Product
                    @endif
                </div>
            </x-slot>
            <x-slot name="content">
                <form class="w-full max-w-lg">
                    <div class="-mx-3 mb-6 flex flex-wrap">
                        <div class="mb-6 w-full px-3 md:mb-0">
                            <label class="mb-2 block text-xs font-bold uppercase tracking-wide text-gray-700"
                                for="name"> Name </label>
                            <input
                                class="mb-3 block w-full appearance-none rounded border bg-gray-200 py-3 px-4 leading-tight text-gray-700 focus:bg-white focus:outline-none"
                                id="name" name="name" type="text" placeholder="Juan Dela Cruz"
                                wire:model="name" />
                            @error('name')
                                <span class="text-red-400">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="-mx-3 mb-6 flex flex-wrap">
                        <div class="w-full px-3">
                            <label class="mb-2 block text-xs font-bold uppercase tracking-wide text-gray-700"
                                for="description"> Description </label>
                            <textarea
                                class="mb-3 block w-full appearance-none rounded border border-gray-200 bg-gray-200 py-3 px-4 leading-tight text-gray-700 focus:border-gray-500 focus:bg-white focus:outline-none"
                                id="description" name="description" placeholder="Message" wire:model="description"></textarea>
                            @error('description')
                                <span class="text-red-400">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="-mx-3 mb-2 flex flex-wrap">
                        <div class="mb-6 w-full px-3 md:mb-0 md:w-1/3">
                            <label class="mb-2 block text-xs font-bold uppercase tracking-wide text-gray-700"
                                for="price"> price </label>
                            <input
                                class="block w-full appearance-none rounded border border-gray-200 bg-gray-200 py-3 px-4 leading-tight text-gray-700 focus:border-gray-500 focus:bg-white focus:outline-none"
                                id="price" name="price" type="number" placeholder="1000" wire:model="price" />
                            @error('price')
                                <span class="text-red-400">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </form>
            </x-slot>
            <x-slot name="footer">
                @if ($this->isEdit)
                    <x-jet-button wire:click="updateProduct">Save</x-jet-button>
                @else
                    <x-jet-button wire:click="storeProduct">Save</x-jet-button>
                @endif
                <x-jet-button wire:click="closeModal" class="mx-4 bg-red-500">Close</x-jet-button>
            </x-slot>
        </x-jet-dialog-modal>
    </div>
</div>
