@props(['route'])

<li><a href="{{ route($route) }}" @class([
    'bg-primary text-primary-content' => Route::is($route),
])>{{ $slot }}</a></li>
