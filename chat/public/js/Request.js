'use strict';

export class Request {
    sendMessage(href, data) {
        $.ajax({
            type: "POST",
            url: href,
            data: data,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            statusCode: {
                201: function (data) {
                    if($('#overflow div:first').length == 0){
                        $('#overflow').append(data);
                    }else{
                        $('#overflow div:first').before(data);
                    }
                }
            }
        });
    }

    sendMessageUpdate(data, newElements) {
        $.ajax({
            type: "POST",
            url: 'https://chat.soyjace.com/public/home/update',
            data: data,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            statusCode: {
                201: function (data) {
                    
                    let initId = data.indexOf('="');
                    let endId = data.indexOf('">');
                    let href = data.substring(initId + 2, endId).trim();

                    let prependParent = (element) => {
                        let parent = element.parent().attr('id');
                        element.prependTo(`#${parent}`);
                    };

                    if ($('.chat-selected').length == 0) {
                        let div = $("<div>", {
                            class: "chat-select mt-1 mb-1 chat-selected"
                        });
                        div.prependTo('#contactsDirects');
                    }

                    if ($('.chat-selected').children().eq(0).attr('href') == href)
                        prependParent($('.chat-selected'));
                    else {
                        newElements.forEach(newElement => {
                            if (newElement.children[0].href == href)
                                prependParent($(newElement));
                        });
                    }

                    $('.chat-selected').html(data);

                    $('[name="message"]').val('');
                }
            }
        });
    }
    
    search(data) {
        $.ajax({
            type: "GET",
            url: 'https://chat.soyjace.com/public/search',
            data: data,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            statusCode: {
                200: function (data) {
                    $('.modal-body').append(data);
                }
            }
        });
    }

    loadFound(user) {
        $.ajax({
            type: "GET",
            url: `https://chat.soyjace.com/public/found/${user}`,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            statusCode: {
                200: function (data) {

                    ($('#messages').children().length != 0) ?
                        $('#messages').empty().append(data) :
                        $('#messages').append(data);
                }
            }
        });
    }

    getMessages(href) {
        $.get(href, function (data) {

            ($('#messages').children().length != 0) ?
                $('#messages').empty().append(data) :
                $('#messages').append(data);
        });
    }

    seenNotification(user) {
        $.ajax({
            type: "DELETE",
            url: `https://chat.soyjace.com/public/home/seen/${user}`,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            statusCode: {
                204: function () {
                    $('.chat-selected').find('[name=notify]').empty();
                }
            }
        });
    }

    send(newElements) {
        $.ajax({
            type: "GET",
            url: 'https://chat.soyjace.com/public/home/contacts',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            statusCode: {
                200: function (data) {

                    data = JSON.parse(data);
                    let initId;
                    let endId;
                    let href;
                    let date;
                    let newMessage;
                    let compare;

                    for (let message in data) {
                        compare = data[message][1].trim();
                        initId = compare.indexOf('="');
                        endId = compare.indexOf('">');
                        href = compare.substring(initId + 2, endId).trim();

                        initId = compare.indexOf('id="dateTime"');
                        endId = compare.indexOf('id="lastMessage"');
                        date = compare.substring(initId + 15, endId - 138).trim();

                        initId = compare.indexOf('id="lastMessage"');
                        endId = compare.indexOf('name="notify"');
                        newMessage = compare.substring(initId + 17, endId - 76).trim();

                        if ($('.chat-select').find(`a[href="${href}"]`).length > 0) {
                            (new Request).insertNewData($(`a[href="${href}"]`).parent(), date, newMessage, data[message]);
                        } else {
                            newElements.forEach(newElement => {
                                if (newElement.children[0].href == href) {
                                    (new Request).insertNewData($(newElement), date, newMessage, data[message]);
                                }
                            });
                        }
                    }
                }
            }
        });
    }

    insertNewData(element, date, newMessage, data) {
        let compare = element.html().trim();
        let initId = compare.indexOf('id="dateTime"');
        let endId = compare.indexOf('id="lastMessage"');
        let displayDate = compare.substring(initId + 15, endId - 138).trim();

        initId = compare.indexOf('id="lastMessage"');
        endId = compare.indexOf('name="notify"');
        let displayMessage = compare.substring(initId + 17, endId - 74).trim();

        if (displayDate != date || displayMessage != newMessage) {
            if (element.parent().attr('id') == 'contactsFriends') {
                element.prependTo("#contactsFriends");
                element.html(data[1]);
            } else if (element.parent().attr('id') == 'contactsDirects') {
                element.prependTo("#contactsDirects");
                element.html(data[1]);
            }
        }
    }

    getUnseen(user) {
        $.get(`https://chat.soyjace.com/public/home/unseen/${user}`, function (data) {

            data = JSON.parse(data);
            let overflow = document.getElementById('overflow');
            let scroll = overflow.scrollTop;
            let total = overflow.scrollHeight;
            let scrollPercent = ((scroll * 100) / total);
            let initId;
            let endId;
            let id;

            for (let message in data) {
                initId = data[message].indexOf('id');
                endId = data[message].indexOf('">');
                id = data[message].substring(initId + 4, endId);

                if ($('#overflow').find(`#${id}`).length == 0) {
                    if (scrollPercent <= 1 && scrollPercent >= 0) {
                        $('#overflow div:first').before(data[message]);
                        overflow.scrollTop = overflow.scrollHeight;
                        (new Request).seenNotification(href);
                    } else {
                        $('#overflow div:first').before(data[message]);
                    }
                }

                if (scrollPercent <= 1 && scrollPercent >= 0) {
                    (new Request).seenNotification(href);
                }
            }
        });
    }
}