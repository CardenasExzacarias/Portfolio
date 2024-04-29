@if (!in_array($user, session('friends')))
    <div class="chat-select mt-1 mb-1">
        @include('layouts.chat.last')
    </div>
@endif
