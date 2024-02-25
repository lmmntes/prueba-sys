                        
                        <div class="col-lg-12">
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight">    
                                    {{ __('Consultar Vehiculos') }}
                        
                        </h2>
                            <div class="p-6">
                            <x-text-input wire:model.live="search" type="text" class="mt-2 block w-full" placeholder="Buscar . . ." required autofocus/>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <table id="table_data" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Placa</th>
                                                <th>Año</th>
                                                <th>Color</th>
                                                <th>Fecha Ingreso</th>
                                                <th>Modelo</th>
                                                <th>Marca</th>                                                
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($vehiculos as $vehiculo)
                                            <tr>
                                                <td>{{ $vehiculo->id }}</td>
                                                <td>{{ $vehiculo->placa }}</td>
                                                <td>{{ $vehiculo->año }}</td>
                                                <td>{{ $vehiculo->color }}</td>
                                                <td>{{ $vehiculo->fecha_ingreso }}</td>
                                                <td>{{ $vehiculo->modelo }}</td>
                                                <td>{{ $vehiculo->marca }}</td>
                                                <td>
                                                    <button wire:click="edit({{ $vehiculo }})" class="btn btn-primary btn-sm">Editar</button>
                                                </td>
                                                <td>
                                                    <button wire:click="delete({{ $vehiculo }})" class="btn btn-danger btn-sm">Borrar</button>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        @if ($vehiculos->hasPages())
                                        <tfoot class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                                            <tr>
                                                <td colspan="9" class="border px-4 py-2">
                                                    {{ $vehiculos->links() }}
                                                </td>
                                            </tr>
                                        </tfoot>
                                        @endif  
                                    </table>
                                </div>
                            </div>
                        </div>