<header>
    <nav class="flex items-center justify-between flex-wrap p-4">
        <div class="flex items-center flex-shrink-0 text-white mr-6">
          <a href="{{ route('home') }}">
            <img src="{{asset("img/logocaf.png")}}" class="h-6 w-40 mr-2">
          </a>
        </div>
        <div class="block lg:hidden">
          <button class="flex items-center px-3 py-2 border rounded text-white border-teal-400 hover:text-neutral-200 font-serifada hover:border-white">
            <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
          </button>
        </div>
        <div class="w-full block flex-grow lg:flex lg:items-center lg:w-auto">
          <div class="text-sm lg:flex-grow">
            <a href="{{ route('users.index') }}" class="block mt-4 lg:inline-block lg:mt-0 text-white hover:text-neutral-200 font-serifada mr-4">
              Usuários
            </a>
            <a href="{{ route('questions.index') }}" class="block mt-4 lg:inline-block lg:mt-0 text-white hover:text-neutral-200 font-serifada mr-4">
              Perguntas
            </a>
            <a href="{{ route('game') }}" class="block mt-4 lg:inline-block lg:mt-0 text-white hover:text-neutral-200 font-serifada">
              Começar o jogo
            </a>
          </div>
        </div>
      </nav>

</header>
