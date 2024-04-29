@extends('layouts.master')

@section('content')
    <div class="container-fluid container-messages">
        <div class="row container-messages">
            <!--Seccion de usuarios-->
            <div class="col-sm-3 users-border px-2 pt-2 pb-2 overflow-y-scroll overflow-x-hidden" id="chats">
                @include('layouts.contacts.contacts')
            </div>
            <!--Seccion de chat-->
            <div class="col pe-3 w-100 chat-borders" id="messages">
                @include('layouts.chat.menu')
                @include('layouts.chat.messages')
                @include('layouts.chat.send')
            </div>
        </div>
    </div>
    <script type="module" src="{!! asset('js/events.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('js/style.js') !!}"></script>
@endsection