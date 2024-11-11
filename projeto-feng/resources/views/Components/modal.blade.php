<div class="h-screen absolute inset-0 z-20">
    <div class="h-full h-full backdrop-blur-sm opacity-animation  flex justify-center items-center">
        <div class="max-w-lg w-full opacity-animation-2x bg-[#debadc3d] p-4 rounded-lg shadow-purpleshadow border-2 border-solid border-lightpurple relative">
            {{$slot}}
        </div>
    </div>
</div>

<script>
    ScrollReveal().reveal('.opacity-animation', {
        duration: 1000,
        opacity: [0.7, 1],
        easing: 'ease-in-out', // Acelera e desacelera suavemente
    });
    ScrollReveal().reveal('.opacity-animation-2x', {
        duration: 2500,
        opacity: [0, 1],
        easing: 'ease-in-out', // Acelera e desacelera suavemente
    });
</script>
