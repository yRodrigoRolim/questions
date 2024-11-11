<x-banner>
    <div class="h-screen absolute inset-0 z-[-10]"
        style="background-image: url('{{ asset('img/banner.jpg') }}'); background-size: cover;"></div>
</x-banner>
<x-layout>
    <div class="mt-8 w-1/2 rounded-r-[16px]">
        <div class="backdrop-blur-sm p-8 rounded-r-[16px] left-animation">
            <h1 class="text-white text-2xl my-4 font-desenhada">Cadastre um usuário</h1>
            <form action="...">
                @csrf
                <input type="text" placeholder="Pergunta:" class="border-purple border-solid border-2 bg-transparent px-2 py-1 rounded outline-none text-white">
                <button type="submit" class="ml-2 text-purple bg-white px-2 py-1 border-white border-solid border-2 rounded" >Cadastrar</button>
            </form>
            

<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-extrelightpurple">
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
            </tr>
        </thead>
        <tbody>
            {{-- Ser dinâmico com o banco --}}
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Rodrigo
                </th>
                <td class="px-6 py-4">
                    5
                </td>
                <td class="px-6 py-4">
                    2
                </td>
            </tr>

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
