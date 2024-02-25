
<div>
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
    @if ($update)
                {{ __('Actualizar Vehiculo') }}
    @else
                {{ __('Registrar Vehiculo') }}
    @endif
    </h2>
    <form  class="mt-6 space-y-6">
    <div class="row">
        <div class="col-6">
            <x-input-label  :value="__('Placa')" />
            <x-text-input wire:model="placa" type="text" class="mt-2 block w-full" required autofocus  />
            <x-input-error class="mt-2" :messages="$errors->get('placa')" />
        </div>

        <div class="col-6">
            <x-input-label  :value="__('Color')" />
            <x-select wire:model="color" type="text" class="mt-2 block w-full" pattern="^[a-zA-Z]+$" required >
                <option value=""  hidden selected >Color</option>
                <option value="Plateado">Plateado</option>
                <option value="Azul">Azul</option>
                <option value="Rojo">Rojo</option>
                <option value="Negro">Negro</option>
            </x-select>
            <x-input-error class="mt-2" :messages="$errors->get('color')" />                
        </div>
        <div class="col-6">
            <x-input-label :value="__('Año')" />
            <x-text-input wire:model="año" type="number" class="mt-2 block w-full" min="1901" max="2099" step="1" required  />
            <x-input-error class="mt-4" :messages="$errors->get('año')" />                
        </div>
        <div class="col-6">
            <x-input-label :value="__('Fecha de Ingreso')" />
            <x-text-input wire:model="fecha_i" type="date" class="mt-2 block w-full" required  />
            <x-input-error class="mt-2" :messages="$errors->get('fecha_i')" />                
        </div>
        <div class="col-6">
            <x-input-label  :value="__('Modelo')" />
            <x-text-input wire:model="modelo" type="text" class="mt-2 block w-full" required />
            <x-input-error class="mt-2" :messages="$errors->get('modelo')" />                
        </div>
        <div class="col-6">
            <x-input-label  :value="__('Marca')" />
            <x-text-input wire:model="marca" type="text" class="mt-2 block w-full" required  />
            <x-input-error class="mt-2" :messages="$errors->get('marca')" />                
        </div>

        </div>
        @if ($update)
        <div class="flex items-center gap-4">
            <x-primary-button wire:click.prevent="update2()">{{ __('Actualizar') }}</x-primary-button>
            
            <x-danger-button wire:click.prevent="cancel()">{{ __('Cancelar') }}</x-primary-button>
        </div>
        @else 
        <div class="flex items-center gap-4">
            <x-primary-button wire:click.prevent="store()">{{ __('Guardar') }}</x-primary-button>
         
        </div>
        @endif
    </div>
    </form>
</div>
