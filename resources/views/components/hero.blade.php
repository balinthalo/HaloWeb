@if (!Request::is('user*'))
    <div class="mx-auto flex flex-col gap-4 max-w-5xl px-4 pt-12 pb-2 bg-cyan-500 rounded-lg my-10">
        <h1 class="text-3xl text-cyan-50 text-center">HaloWeb</h1>
        <p class="text-4xl text-cyan-50 text-center">Welcome Here</p>
        <p class="text-lg text-cyan-50 text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. In, voluptatem. Exercitationem similique dolor amet aliquam earum itaque at repudiandae aut enim! Officia at facere est, rerum ipsum soluta sequi nisi!</p>
        {{--<svg id='patternId' width='100%' height='100%' xmlns='http://www.w3.org/2000/svg'><defs><pattern id='a' patternUnits='userSpaceOnUse' width='60' height='30' patternTransform='scale(2) rotate(0)'><rect x='0' y='0' width='100%' height='100%' fill='hsla(0,0%,100%,1)'/><path d='M1-6.5v13h28v-13H1zm15 15v13h28v-13H16zm-15 15v13h28v-13H1z'  stroke-width='1' stroke='none' fill='rgb(6 182 212)'/><path d='M31-6.5v13h28v-13H31zm-45 15v13h28v-13h-28zm60 0v13h28v-13H46zm-15 15v13h28v-13H31z'  stroke-width='1' stroke='none' fill='rgb(6 182 212)'/></pattern></defs><rect width='800%' height='800%' transform='translate(0,0)' fill='url(#a)'/></svg> --}}
    </div>
@endif
