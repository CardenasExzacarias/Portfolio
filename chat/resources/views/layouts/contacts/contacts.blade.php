<div class="col mt-1 container">
    <div class="row">
        <div class="col">
            <h3 class="contact-select bg-primary p-2 d-flex justify-content-center align-items-center" id="Friends" >
                Favoritos
            </h3>
        </div>
        <div class="col">
            <h3 class="contact-select p-2 d-flex justify-content-center align-items-center" id="Directs">
                Directos
            </h3>
        </div>
    </div>
    <div class="row" id="friendsContainer">
        <div id="contactsFriends">
            @foreach (session('friends') as $friend)
                @include('layouts.contacts.friends')
            @endforeach
        </div>
        <div id="contactsDirects" hidden>
            @foreach (session('users') as $user)
                @include('layouts.contacts.direct')
            @endforeach
        </div>
    </div>
</div>
