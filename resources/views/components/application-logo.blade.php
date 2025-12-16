@if (request()->routeIs('login'))
    <p class="text-lg text-center text-gray-500">Login to</p>
@endif
@if (request()->routeIs('register'))
    <p class="text-lg text-center text-gray-500">Register to</p>
@endif
<img src="{{ asset('/assets/scavengerLogo.png') }}" alt="" {{ $attributes->merge(['class' => 'h-12 w-auto mx-auto']) }}>
