@props(['href', 'icon','class'])

<li class="nav-item">
    <a href="{{ $href }}" {{ $attributes->merge(['class'=> 'nav-link '.$class]) }} >
        <i class="nav-icon {{$icon}}"></i>
        <p>{{$slot}}</p>
    </a>
</li>
