<x-banner>
    <div class="h-screen absolute inset-0 z-[-10]"
        style="background-image: url('{{ asset('img/banner.jpg') }}'); background-size: cover;"></div>
</x-banner>
<x-layout>
    <div class="mt-8 w-96 rounded-r-[16px]">
        <div class="backdrop-blur-sm p-8 rounded-r-[16px] left-animation">
            <h1 class="text-white text-2xl my-4 font-desenhada">O que é o Questions CAF ?</h1>
            <p class="text-white font-serifada mb-4">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ullam
                perspiciatis reiciendis aperiam temporibus amet minima accusantium cum animi blanditiis quibusdam
                maiores adipisci vero, perferendis error totam, fugit, dolorum inventore harum.</p>
            <a href="#"
                class="mb-4 px-4 transition hover:transition py-1 hover:text-lightpurple text-purple rounded bg-white shadow-md shadow-lightpurple">Saiba
                mais</a>

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
