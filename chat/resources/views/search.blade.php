@foreach ($users as $user)
    <div class="mt-3 mx-2">
        <a class="foundUser" href='{{ secure_url("home/$user[1]") }}'>
            {{ $user[0] }}
        </a>
    </div>
@endforeach