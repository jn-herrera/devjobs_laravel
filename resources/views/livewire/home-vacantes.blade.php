<div>
    <livewire:filtrar-vacantes />

    <div class="py-12">
        <div class="max-w-7xl mx-auto">
            <h3 class="font-extrabold text-4xl text-gray-300 mb-12">Nuestras vacantes disponibles</h3>
            <div class="bg-gray-800 shadow-sm rounded-lg p-6 divide-y divide-gray-200">
                @forelse ($vacantes as $vacante)
                    <div class="md:flex md:justify-between md:items-center py-5">
                        <div class="md:flex-1">
                            <!-- Muestra el título de la vacante -->
                            <a class="text-3xl font-extrabold text-white" href="{{ route('vacantes.show', $vacante->id) }}">{{ $vacante->titulo }}</a>
                            <p class="text-white text-base mb-1">{{ $vacante->empresa }}</p>
                          <p class="text-white font-bold text-xs text-gray-600">Último día para postularse <span class="font-normal">{{ \Carbon\Carbon::parse($vacante->ultimo_dia)->format('d/m/Y') }}</span></p>

                        </div>
                        <div class="mt-5 md:mt-0">
                            <!-- Enlace a la página de detalles de la vacante -->
                            <a
                            class="bg-gray-500 p-3 text-sm uppercase font-bold text-white hover:text-white-500 rounded-lg block text-center"
                            href="{{ route('vacantes.show', $vacante->id) }}">Ver vacante</a>
                        </div>
                    </div>
                @empty
                    <p class="p-3 text-center text-sm text-gray-500">No hay vacantes aun</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
