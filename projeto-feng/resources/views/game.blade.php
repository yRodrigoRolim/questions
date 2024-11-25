<x-banner>
    <div class="h-screen absolute inset-0 z-[-10]"
        style="background-image: url('{{ asset('img/banner.jpg') }}'); background-size: cover;"></div>
</x-banner>
<x-layout>
    <div class="mt-8 w-1/2 rounded-r-[16px]">
        <div class="backdrop-blur-sm p-8 rounded-r-[16px] left-animation">
            <h1 class="text-white text-2xl my-4 font-desenhada">Jogo de Perguntas e Respostas</h1>
            {{-- <form action="...">
                @csrf
                <input type="text" placeholder="Pergunta:" class="border-purple border-solid border-2 bg-transparent px-2 py-1 rounded outline-none text-white">
                <button type="submit" class="ml-2 text-purple bg-white px-2 py-1 border-white border-solid border-2 rounded" >Cadastrar</button>
            </form> --}}


                {{-- Mensagens de sucesso ou erro --}}
                @if (session('success'))
                    <p style="color: green;">{{ session('success') }}</p>
                @endif
            
                @if (session('error'))
                    <p style="color: red;">{{ session('error') }}</p>
                @endif
                
                <h2 class="text-white text-2xl my-4 font-desenhada">Usuário: {{ $user->name }}</h2>
                <p class="text-white">Responda a pergunta!</p>
                <div class="p-2 bg-gray-700 mt-4 text-white">
                    <p>{{ $question->question }}</p>
                </div>
            
            
                {{-- Botões para Acerto e Erro --}}
                <form action="{{ route('game.result') }}" method="POST" class="mt-2 text-white">
                    @csrf
                    <input type="hidden" name="question_id" value="{{ $question->id }}">
                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                    
                    <button type="submit" class="w-20 rounded py-2 text-center bg-green-500 mr-4" name="result" value="acerto">Acertou</button>
                    <button type="submit" class="w-20 rounded py-2 text-center bg-red-500" name="result" value="erro">Errou</button>
                </form>
            
                {{-- Jogar novamente sem registrar resultado --}}
                <a href="{{ route('game') }}" class="mt-4 p-2 rounded text-center bg-gray-700 text-white">Novo sorteio</a>

        </div>
    </div>
    <script>
        ScrollReveal().reveal('.left-animation', {
            duration: 1000,
            origin: 'left',
            distance: '300px',
        });
    </script>
</x-layout>
