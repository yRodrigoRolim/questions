<x-layout>
    <div class="h-screen absolute inset-0 z-[-10]"
        style="background-image: url('{{ asset('img/banner.jpg') }}'); background-size: cover;"></div>

    <div class="mt-8 w-10/12 rounded-r-[16px]">
        <div class="backdrop-blur-sm p-8 rounded-r-[16px] left-animation">
            <h1 class="text-white text-2xl my-4 font-desenhada">Cadastre uma nova pergunta</h1>
            <form action="{{ route('questions.store') }}" method="POST">
                @csrf
                <input name="question" type="text" placeholder="Question"
                    class="border-purple border-solid border-2 bg-transparent px-2 py-1 rounded w-5/12 outline-none text-white">
                <button type="submit"
                    class="ml-2 text-purple bg-white px-2 py-1 border-white border-solid border-2 rounded">Cadastrar</button>
            </form>
            
            
            

            <div class="relative overflow-x-auto max-h-90 overflow-y-auto mt-2">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 mt-2">
                    <thead
                        class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-extrelightpurple">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Pergunta
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Quantidade de acertos
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Quantidade de erros
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Ultimo a responder
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Editar
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Remover
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($questionreturn->isNotEmpty())
                            @foreach ($questionreturn as $question)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white capitalize max-w-[128px] overflow-y-auto">
                                        {{ $question->question }}
                                    </th>
                                    <td class="px-6 py-4">{{ $question->acertos }}</td>
                                    <td class="px-6 py-4">{{ $question->erros }}</td>
                                    <td class="px-6 py-4">
                                        @if (isset($lastresponse[$question->id]) && $lastresponse[$question->id]->isNotEmpty())
                                            @php
                                                $response = $lastresponse[$question->id]->first();
                                            @endphp
                                            {{ $response->user->name }}
                                        @else
                                            ---
                                        @endif
                                    </td>
                    
                                    <td class="px-6 py-4 text-center">
                                        <a href="{{ route('questions.edit', $question->id) }}"
                                            class="text-blue-600 hover:text-blue-800"><i
                                                class="fa-solid fa-pen-to-square"></i></a>
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <form action="{{ route('questions.destroy', $question->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-800"><i
                                                    class="fa-solid fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="6" class="text-center py-4">Nenhuma pergunta encontrada.</td>
                            </tr>
                        @endif
                    </tbody>
                    
                    
                </table>
                <form method="GET" action="{{ route('questions.index') }}" class="w-full flex justify-between">
                    <input type="text" name="search" placeholder="Buscar perguntas..." value="{{ request('search') }}" class="border-purple p-2 border-solid bg-gray-800 w-10/12 outline-none text-white ">
                    <button type="submit" class="text-purple bg-white border-white border-solid border-2 w-2/12">Buscar</button>
                </form>
            </div>

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
