
<x-layout>
    <div class="h-screen absolute inset-0 z-[-10]" style="background-image: url('{{ asset('img/banner.jpg') }}'); background-size: cover;"></div>

    <div class="mt-8 w-1/2 rounded-r-[16px]">
        <div class="backdrop-blur-sm p-8 rounded-r-[16px] left-animation">
            <h1 class="text-white text-2xl my-4 font-desenhada">Cadastre um usuário</h1>
            <form action="{{ route('users.store') }}" method="POST">
                @csrf
                <input type="text" name="name" placeholder="User"
                    class="border-purple border-solid border-2 bg-transparent px-2 py-1 rounded outline-none text-white">
                <button type="submit" class="ml-2 text-purple bg-white px-2 py-1 border-white border-solid border-2 rounded">Cadastrar</button>
            </form>


            <div class="relative overflow-x-auto max-h-90 overflow-y-auto mt-2">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 relative mt-2">
                    <thead
                        class="w-full text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-extrelightpurple">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Usuário
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Acertos
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Erros
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
                        
                        @if ($usersreturn)
                        
                         {{ $usersreturn->links() }}

                        @foreach ($usersreturn as $users)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white capitalize">
                                {{ $users->name }}
                            </th>
                            <td class="px-6 py-4">{{ $users->acertos }}</td>
                            <td class="px-6 py-4">{{ $users->erros }}</td>
                            <td class="px-6 py-4 text-center">
                                <a href="{{route('users.edit', $users->id)}}" class="text-blue-600 hover:text-blue-800"><i class="fa-solid fa-pen-to-square"></i></a>
                            </td>

                            <td class="px-6 py-4 text-center">
                                <form action="{{ route('users.destroy', $users->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800"><i class="fa-solid fa-trash"></i></button>
                                    
                                </form>
                            </td>

                        </tr>
                        @endforeach
                    @endif
                    

                        <!-- Mais linhas, conforme necessário -->
                    </tbody>
                </table>
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
