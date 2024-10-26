@if(!empty($breadcrumbs))
    <nav>
        <div class="container py-4 py-xl-5">
            <ol class="breadcrumb">
                @foreach($breadcrumbs as $key => $breadcrumb)
                    @include('partials.breadcrumbs.breadcrumb-item', [
                        'breadcrumb' => $breadcrumb,
                        'isLast' => $loop->last  // Marks the last item as active
                    ])
                @endforeach
            </ol>
        </div>
    </nav>
@endif
