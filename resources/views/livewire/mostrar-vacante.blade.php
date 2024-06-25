<div class="p-10">
    <div class="mb-5">
        <h3 class="font-bold text-3xl text-white my-3">
            {{ $vacante->titulo }}


        </h3>

        <div class="md:grid md:grid-cols-2 bg-gray-700 p-4 my-10">
            <p class="font-bold text-sm uppercase text-white my-3">Empresa:
                <span class="normal-case font-normal">{{ $vacante->empresa }}</span>
            </p>

            <p class="font-bold text-sm uppercase text-white my-3">Ultimo día para postularse:
                <span
                    class="normal-case font-normal">{{ Carbon\Carbon::parse($vacante->ultimo_dia)->toFormattedDateString() }}</span>
            </p>


            <p class="font-bold text-sm uppercase text-white my-3">Categoria:
                <span class="normal-case font-normal">{{ $vacante->categoria->categoria }}</span>
            </p>

            <p class="font-bold text-sm uppercase text-white my-3">Salario:
                <span class="normal-case font-normal">{{ $vacante->salario->salario }}</span>
            </p>

        </div>
    </div>

    <div class="md:grid md:grid-cols-6 gap-4">
        <div class="md:col-span-2">
            <img src="{{ asset('storage/vacantes/' . $vacante->imagen) }}"
                alt="{{ 'Imagen vacante' . $vacante->titulo }}">

        </div>

        <div class="md:col-span-4 text-white">
            <h2 class="text-2xl font-bold mb-5">
                Descripcion del puesto
            </h2>
            <p>{{ $vacante->descripcion }}</p>
        </div>

    </div>

    @guest
        <div class="mt-5 bg-gray-50 border border-dashed p-5 text-center">
            <p>
                Deseas aplicar a esta vacante? <a class="font-bold text-indigo-600" href="{{ route('register') }}">Obten una
                    cuenta ahora y aplica a cualquier oferta de trabajo</a>
            </p>
        </div>
    @endguest

    @auth
        @cannot('create', App\Models\Vacante::class)
            <livewire:postular-vacante :vacante="$vacante" />
        @endcannot
    @endauth

</div>
