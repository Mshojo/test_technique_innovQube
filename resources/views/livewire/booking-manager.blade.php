<div class="p-6 bg-white rounded shadow">
    <form wire:submit.prevent="submit" class="space-y-4">
        @if (session()->has('message'))
            <div class="text-green-600 font-semibold">{{ session('message') }}</div>
        @endif

        <div>
            <label for="property" class="block text-sm font-medium text-gray-700">Bien immobilier</label>
            <select wire:model="propertyId" id="property" class="mt-1 block w-full border-gray-300 rounded">
                <option value="">-- Sélectionner --</option>
                @foreach ($properties as $property)
                    <option value="{{ $property->id }}">{{ $property->name }}</option>
                @endforeach
            </select>
            @error('propertyId') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Date de début</label>
            <input type="date" wire:model="startDate" class="mt-1 block w-full border-gray-300 rounded" />
            @error('startDate') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Date de fin</label>
            <input type="date" wire:model="endDate" class="mt-1 block w-full border-gray-300 rounded" />
            @error('endDate') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="bg-primary text-white px-4 py-2 rounded hover:bg-blue-800">
            Réserver
        </button>
    </form>
</div>
