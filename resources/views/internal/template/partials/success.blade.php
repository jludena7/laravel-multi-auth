@if (session('success', false))
    <?php $data = session('success'); ?>
    @if (is_array($data))
        <?php $data = array_unique($data); ?>
        <div class="alert alert-success" role="alert">
            @foreach ($data as $msg)
                <p class="m-1">{{ $msg }}</p>
            @endforeach
        </div>
    @else
        <div class="alert alert-success" role="alert">
            <p class="m-1">{{ $data }}</p>
        </div>
    @endif
@endif
