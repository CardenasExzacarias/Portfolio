@php
    if(isset($data)){
        $message = (object) $data;
    }

    if ($message->name == session('user')['name']) {
        $align = 'justify-content-end';
        $bg = 'bg-primary';
    } else {
        $align = 'justify-content-start';
        $bg = 'bg-secondary';
    }

    $date = strrpos($message->created_at, ' ') - 2;
    $date = substr($message->created_at, $message->created_at[0], $date);

    $time = strrpos($message->created_at, ' ') + 1;
    $time = substr($message->created_at, $time, 5);

@endphp
<div class="d-flex {{ $align }} my-3" id="{{ $message->id }}">
    <div class="{{ $bg }} message">
        <p class="d-flex {{ $align }} mt-2 px-2 text" style="margin-bottom: 0px">
            {{ $message->message }}
        </p>
        <p class="d-flex {{ $align }} message-time">
            {{ $time }}
        </p>
    </div>
</div>
