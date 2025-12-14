@if (request()->routeIs('login'))
    <p class="text-lg text-center text-gray-500">Login to</p>
@endif
<img src="/assets/scavengerLogo.png" alt="" {{ $attributes->merge(['class' => 'h-12 w-auto mx-auto']) }}>
