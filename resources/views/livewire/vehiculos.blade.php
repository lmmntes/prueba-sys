    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Vehiculos') }}
        </h2>
    </x-slot>

    <div class="py-12 container-fluid">   
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif 
    @if (session()->has('bd'))
        <div class="alert alert-danger">
            {{ session('bd') }}
        </div>
    @endif 
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 ">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg ">
                <div class="max-w">                                
                <livewire:vehiculos.list-vehiculos />
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w">                    
                <livewire:vehiculos.form />

                </div>
            </div>
           
        </div>
    </div>
