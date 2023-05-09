@if (session('errors', false))
    <?php $data = session('errors')->all(); ?>
    @if (is_array($data))
        <?php $data = array_unique($data); ?>
        <div class="alert alert-danger" role="alert">
            @foreach ($data as $msg)
                <p class="m-1">{{ $msg }}</p>
            @endforeach
        </div>
    @else
        <div class="alert alert-danger" role="alert">
            <p class="m-1">{{ $data }}</p>
        </div>
    @endif
@endif
