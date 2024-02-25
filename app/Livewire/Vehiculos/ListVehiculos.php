<?php

namespace App\Livewire\Vehiculos;

use Livewire\Component;
use App\Models\Vehiculo;
use Livewire\WithPagination;

class ListVehiculos extends Component
{
    use WithPagination;

    public $placa, $color, $año, $fecha_i,$modelo,$marca;
    public $search = '';



    public function render()
    {
        $vehiculos = Vehiculo::latest()->paginate(5);
        $vehiculos = Vehiculo::where('placa', 'LIKE', '%'.$this->search.'%')
                             ->orWhere('color', 'LIKE', '%'.$this->search.'%')
                             ->orWhere('año', 'LIKE', '%'.$this->search.'%')
                             ->orWhere('fecha_ingreso', 'LIKE', '%'.$this->search.'%')
                             ->orWhere('modelo', 'LIKE', '%'.$this->search.'%')
                             ->orWhere('marca', 'LIKE', '%'.$this->search.'%')
                             ->paginate(5);
        return view('livewire.vehiculos.list-vehiculos',compact('vehiculos'));
    }

    public function delete(Vehiculo $vehiculo){
        $vehiculo->delete();

    }

    public function edit(Vehiculo $vehiculo){

        $this->dispatch('editsol',$vehiculo);

        
        
    }
}
