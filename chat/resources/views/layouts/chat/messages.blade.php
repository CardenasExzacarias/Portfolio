<div class="row overflow-y-auto chat-container chat-name-borders d-flex" style="flex-flow: row wrap-reverse;" id="overflow">
    @foreach (session('conversation')[0] as $message)
        @include('layouts.chat.message')
    @endforeach
</div>