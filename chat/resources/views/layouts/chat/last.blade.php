@php
    if (isset($data)) {
        $friend = [
            '0' => $data['name'],
            '1' => $data['href'],
            '2' => $data['message'],
            '3' => trim($data['date']),
        ];
    }

    if(isset($user)){
        $friend = [
            '0' => $user['0'],
            '1' => $user['1'],
            '2' => $user['2'],
            '3' => trim($user['3']),
        ];
    }

    if (count($friend) > 2) {
        $date = strrpos($friend['3'], ' ') - 2;
        $date = substr($friend['3'], 0, $date);

        $time = strrpos($friend['3'], ' ') + 1;
        $time = substr($friend['3'], $time, 5);
    } else {
        $date = '';
        $time = '';
        $friend[] = '';
    }
@endphp
<a href="{{ secure_url("home/$friend[1]") }}">
    <div class="row mx-0 px-0 pt-2">
        <div class="col-8">
            <p class="chat-name">
                <b>{{ $friend['0'] }}</b>
            </p>
        </div>
        <div class="col-4 d-flex justify-content-end px-2" style="padding:0px;">
            <p class="chat-data d-block" id="dateTime">
                {{ $time }}
            </p>
        </div>
    </div>
    <div class="row mx-0 px-0">
        <div class="col-10">
            <p class="chat-data d-block" id="lastMessage">
                {{ $friend['2'] }}
            </p>
        </div>
        <div class="col-2 d-flex justify-content-end" name="notify">
            @if (count(session('notifications')) > 0)
                @foreach (session('notifications') as $notification)
                    @if ($notification->href == secure_url("home/$friend[1]"))
                        <p class="notify">{{ $notification->count }}</p>
                        @break
                    @endif
                @endforeach
            @endif
        </div>
    </div>
</a>
