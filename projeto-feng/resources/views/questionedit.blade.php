<x-layout>
    <x-modal>
        <h1 class="font-bold text-3xl text-white">EDITE A PERGUNTA</h1>
        <form action="{{ route('questions.update', ['question' => $questionreturn->id]) }}" method="POST" class="w-full">
            @csrf
            @method('PUT')
            
            <input name="editquestion" type="text" class="w-full mt-8 py-2 px-4 rounded dark:bg-gray-800 text-white outline-none" value="{{ $questionreturn->question }}">
        
            <div class="flex w-full items-center justify-between">
                <button type="submit" class="mt-8 text-purple bg-white px-2 py-1 border-white border-solid border-2 rounded">
                    Alterar
                </button>
                <a href="{{ route('questions.index') }}" class="mt-8 text-white bg-purple px-2 py-1 border-purple border-solid border-2 rounded">
                    Voltar <i class="fa-solid fa-backward"></i>
                </a>
            </div>
        </form>
        
        
    </x-modal>

    <div class="h-screen absolute inset-0 z-[-10]"
        style="background-image: url('{{ asset('img/banner.jpg') }}'); background-size: cover;"></div>



    <script>
        ScrollReveal().reveal('.left-animation', {
            duration: 1000,
            origin: 'left',
            distance: '300px',
        });
    </script>
</x-layout>
