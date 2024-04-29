<div class="row">
    @foreach (session('friends') as $friend)
        @php
            if ($friend[0] == session('conversation')[2]) {
                $isFriend = true;
                break;
            }
        @endphp
    @endforeach
    <div class="col d-flex align-items-center" id="back">
        <svg xmlns="http://www.w3.org/2000/svg" height="32" width="40"
            viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
            <path fill="#0d6efd"
                d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z" />
        </svg>
    </div>
    <div class="col-5 d-flex align-items-center justify-content-center">
        <h2 class="p-1 chat-title d-block">
            @if(isset($user))
                {{ $user }}
            @else
                {{ session('conversation')[2] }}
            @endif
        </h2>
    </div>
    <div class="col d-flex justify-content-end">
        <div class="dropdown mt-1">
            <button class="btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <svg xmlns="http://www.w3.org/2000/svg" height="32" width="28"
                    viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                    <path fill="#0d6efd"
                        d="M8 256a56 56 0 1 1 112 0A56 56 0 1 1 8 256zm160 0a56 56 0 1 1 112 0 56 56 0 1 1 -112 0zm216-56a56 56 0 1 1 0 112 56 56 0 1 1 0-112z" />
                </svg>
            </button>
            <ul class="dropdown-menu bg-dark">
                @if (isset($isFriend))
                    <li>
                        <form action="{{ secure_url('delete') }}" method="POST">
                            {{ csrf_field() }}
                            <input type="text" name="delete" value="{{ session('conversation')[1] }}" hidden>
                            <input class="dropdown-item drop-item bg-dark" type="submit" value="Eliminar Favorito">
                        </form>
                    </li>
                @else
                    <li>
                        <form action="{{ secure_url('add') }}" method="POST">
                            {{ csrf_field() }}
                            <input type='text' name='add' value="{{ session('conversation')[1] }}" hidden>
                            <input class="dropdown-item drop-item bg-dark" type="submit" value="Agregar Favorito">
                        </form>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</div>
