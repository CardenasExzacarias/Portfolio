if ($(location).attr('href').includes('home/') && window.screen.width < 576) {
    $('#chats').attr('hidden', true);
}

$(document).on('click', '.chat-select', function (e) {
    e.preventDefault();
    if(window.screen.width < 576){
        $('#chats').attr('hidden', true);
        $('#back').attr('hidden', false);
        $('#messages').attr('hidden', false);
    }else{
        $('#messages').attr('hidden', false);
    }
});

$(document).on('click', '.foundUser', function (e) {
    e.preventDefault();
    if(window.screen.width < 576){
        $('#chats').attr('hidden', true);
        $('#back').attr('hidden', false);
        $('#messages').attr('hidden', false);
    }else{
        $('#messages').attr('hidden', false);
    }
});

$(document).on('click', '#back', function (e) {
    e.preventDefault();
    if(window.screen.width < 576){
        $('#chats').attr('hidden', false);
        $('#chats').attr('hidden', false);
        $('#back').attr('hidden', true);
        $('#messages').attr('hidden', true);
    }else if($('#messages').is(':visible') == true){
        $('#messages').attr('hidden', true);
    }else{
        $('#messages').attr('hidden', false);
    }
});