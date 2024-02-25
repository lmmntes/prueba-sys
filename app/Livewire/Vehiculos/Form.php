<?php

namespace App\Livewire\Vehiculos;

use Livewire\Component;
use App\Models\Vehiculo;
use Livewire\Attributes\On; 



class Form extends Component
{
    public $placa, $color, $año, $fecha_i,$modelo,$marca;
    public $update=false;
    public $id;
   

    public function cancel()
    {
        $this->update = false;
        $this->resetInput();
    }

    public function rules(): array
    {
        return [
            'placa' => 'required|string|max:255',
            'color' => 'required|string|max:1000',
            'año' => 'required|digits:4',
            'fecha_i' => 'required',
            'modelo' => 'required|string|max:1000',
            'marca' => 'required|string|max:1000'
        ];
    }

    public function messages(): array
    {
        return [
            'placa.required' => __('El campo placa es obligatorio.'),
            'placa.string' => __('El campo placa debe ser una cadena de texto.'),
            'placa.max' => __('El campo placa no debe ser mayor a :max caracteres.'),
            'placa.unique' => __('El campo placa ya está en uso.'),
            'color.required' => __('El campo color es obligatorio.'),
            'color.string' => __('El campo color debe ser una cadena de texto.'),
            'color.max' => __('El campo color no debe ser mayor a :max caracteres.'),
            'año.required' => __('El campo año es obligatorio.'),
            'año.digits' => __('El campo año no debe ser de 4 digitos.'),
            'fecha_i.required' => __('El campo fecha de ingreso es obligatorio.'),
            'modelo.required' => __('El campo modelo es obligatorio.'),
            'modelo.string' => __('El campo modelo debe ser una cadena de texto.'),
            'modelo.max' => __('El campo modelo no debe ser mayor a :max caracteres.'),
            'marca.required' => __('El campo marca es obligatorio.'),
            'marca.string' => __('El campo marca debe ser una cadena de texto.'),
            'marca.max' => __('El campo marca no debe ser mayor a :max caracteres.'),

        ];
    }


    public function resetInput(){
        $this->placa = null;
        $this->año= null;
        $this->color= null;         
        $this->fecha_i= null;
        $this->modelo= null;
        $this->marca= null;
    }

    public function store()
    {
        $this->validate();

        try{
        $nuevo= new Vehiculo;        
        $nuevo->placa = $this->placa;
        $nuevo->año = $this->año;
        $nuevo->color = $this->color;
        $nuevo->fecha_ingreso = $this->fecha_i;
        $nuevo->modelo = $this->modelo;
        $nuevo->marca = $this->marca;
        $nuevo->save();
        }
        catch (\Illuminate\Database\QueryException $ex) {
            session()->flash('bd','Error al guardar');
     
            return redirect()->to(route("vehiculos"));
        }

        session()->flash('message','Vehiculo agregado satisfactoriamente');
        $this->resetInput();

        return redirect()->to(route("vehiculos"));
    }



    #[On('editsol')] 
    public function edit(Vehiculo $vehiculo)
    {
        $this->id = $vehiculo->id;
        $this->placa = $vehiculo->placa;
        $this->año= $vehiculo->año;
        $this->color= $vehiculo->color;
        $this->fecha_i= $vehiculo->fecha_ingreso;
        $this->modelo= $vehiculo->modelo;
        $this->marca= $vehiculo->marca;
        $this->update=true;

    }


    public function update2(){
        $this->validate();

        try {
        $vehiculo = Vehiculo::find($this->id);
        $vehiculo->placa = $this->placa;
        $vehiculo->año = $this->año;
        $vehiculo->color = $this->color;
        $vehiculo->fecha_ingreso = $this->fecha_i;
        $vehiculo->modelo = $this->modelo;
        $vehiculo->marca = $this->marca;
        $vehiculo->update();
        } catch (\Illuminate\Database\QueryException $ex) {
            session()->flash('bd','Error al guardar');
     
            return redirect()->to(route("vehiculos"));
        }

        

        $this->resetInput();
        session()->flash('message','Vehiculo actualizado satisfactoriamente');

        return redirect()->to(route("vehiculos"));



    }



    
    public function render()
    {
        return view('livewire.vehiculos.form');
    }
}
