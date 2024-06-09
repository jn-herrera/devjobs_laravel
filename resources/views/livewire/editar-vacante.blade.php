<form class="md:w-1/2 space-y-5" wire:submit.prevent="crearVacante">
    <div>
        <x-input-label for="titulo" :value="__('Titulo vacante')" />
        <x-text-input id="titulo" class="block mt-1 w-full" type="text" wire:model="titulo"
            placeholder="Titulo vacante" />
        @error('titulo')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>


    <div>
        <x-input-label for="salario" :value="__('Salario mensual')" />

        <select wire:model="salario" id="salario"
            class="border-gray-300 dark:border-gray-700  dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full">
            <option value="">-- Seleccionar salario --</option>
            @foreach ($salarios as $salario)
                <option value="{{ $salario->id }}">{{ $salario->salario }}</option>
            @endforeach
        </select>
        @error('salario')
            <livewire:mostrar-alerta :message="$message" />
        @enderror

    </div>

    <div>
        <x-input-label for="categoria" :value="__('Categoria')" />

        <select wire:model="categoria" id="categoria"
            class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full">
            <option value="">-- Seleccionar categoria --</option>
            @foreach ($categorias as $categoria)
                <option value="{{ $categoria->id }}">{{ $categoria->categoria }}</option>
            @endforeach
        </select>
        @error('categoria')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>

    <div>
        <x-input-label for="empresa" :value="__('Empresa')" />
        <x-text-input id="empresa" class="block mt-1 w-full" type="text" wire:model="empresa" :value="old('empresa')"
            placeholder="Empresa: ej. Netflix, Uber, Meta" />
        @error('empresa')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>

    <div>
        <x-input-label for="ultimo_dia" :value="__('Ultimo dia para postularse')" />
        <x-text-input id="ultimo_dia" class="block mt-1 w-full" type="date" wire:model="ultimo_dia"
            :value="old('ultimo_dia')" />
        @error('ultimo_dia')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>

    <div>
        <x-input-label for="descripcion" :value="__('Descripcion puesto')" />
        <textarea wire:model="descripcion" id="descripcion"
            class="border-gray-300 dark:border-gray-700 h-72 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full"
            placeholder="descripcion">
            
    </textarea>
        @error('descripcion')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>



    <div>
        <x-input-label for="imagen" :value="__('Imagen')" />
        <x-text-input id="imagen" class="block mt-1 w-full" type="file" wire:model="imagen" accept="image/*" />

        <div class="my-5 w-80">
            <x-input-label :value="__('Imagen actual')" />
            <img src="{{ asset('storage/vacantes/' . $imagen) }}" alt="{{ 'Imagen vacante ' . $titulo }}">
        </div>
    </div>

    {{--
        <div class="my-5 w-80">
            @if ($imagen)
            Imagen: <img src="{{$imagen->temporaryUrl()}}" alt="">
                
            @endif

        </div>
    --}}

    @error('imagen')
        <livewire:mostrar-alerta :message="$message" />
    @enderror
    </div>

    <x-primary-button class="w-full justify-center">
        Guardar
    </x-primary-button>

</form>
