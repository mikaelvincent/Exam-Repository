@unless($isLast)
    <li class="breadcrumb-item">
        <a class="text-decoration-none" href="{{ $breadcrumb['url'] }}">
            <span>{{ $breadcrumb['name'] }}</span>
        </a>
    </li>
@else
    <li class="breadcrumb-item active">
        <span>{{ $breadcrumb['name'] }}</span>
    </li>
@endunless
