<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Vehiculo;
use Livewire\WithPagination;
use Livewire\Attributes\On; 


class Vehiculos extends Component
{

    public function render()
    {       

       // return view('livewire.vehiculo.paginacion',compact('vehiculos'));
        return view('livewire.vehiculos');
    }
  

    public function edit(Vehiculo $vehiculo){

        $this->emit('editsol',$vehiculo);       
        
    }
    
}