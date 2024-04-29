'use strict';

import { Request } from './Request.js';
import { Time } from './Time.js';

let hrefChat;
let newElements = [];
let overflow;
let request = new Request();

const selected = 'chat-selected';
const select = 'chat-select';

const chatList = document.getElementById('chats');
const messages = document.getElementById('messages');

const getUser = href => href.split('home/')[1];
const scrollLast = element => element.scrollTop = element.scrollHeight;

const update = () => {
    if ($(`.${selected}`).length > 0) {
        request.getUnseen(getUser($(`.${selected}`).children().eq(0).attr('href')));
    }

    request.send(newElements);
};

const observer = new MutationObserver((mutationList) => {
    mutationList.forEach((element) => {
        if (element.target.className.includes(select)) {
            newElements.push(element.target);
        }
    });
});

const messagesObserver = new MutationObserver((mutationList) => {
    mutationList.forEach((element) => {
        if (element.addedNodes[2] != undefined) {
            overflow = $(element.addedNodes[2]);
        }
    });
});

const observerOptions = {
    childList: true,
    subtree: true,
    attributes: false
}

messagesObserver.observe(messages, observerOptions);

observer.observe(chatList, observerOptions);

setInterval(update, 1000);

if ($(location).attr('href').includes('home/')) {
    hrefChat = $(location).attr('href');
    $(`a[href="${hrefChat}"]`).parent().addClass(selected);
    overflow = document.getElementById('overflow');
    scrollLast(overflow);
}

$(document).on('submit', '#message', function (e) {
    e.preventDefault();

    let form = $('#message');

    let href = form.attr('action');
    let data = form.serialize();

    let time = new Time();
    let name = $('.chat-title').text();

    data += `&date=${time.dateTime}`;

    request.sendMessage(href, data);

    scrollLast(overflow);

    hrefChat = $(location).attr('href');

    let hrefSplit = getUser(hrefChat);

    data += `
        &name=${name}
        &href=${hrefSplit}
    `;

    request.sendMessageUpdate(data, newElements);
});

$(document).on('submit', '#search', function (e) {
    e.preventDefault();

    let data = $('#search').serialize();

    $('.modal-body').empty();

    request.search(data);
});

$(document).on('click', `.${select}`, function (e) {
    e.preventDefault();

    let href = $(this).children().eq(0).attr('href');

    hrefChat = href;

    if ($(`.${select}`).hasClass(selected)) {
        $(`.${select}`).map(function () {
            return $(this).removeClass(selected);
        });
    }

    request.seenNotification(getUser(href));

    request.getMessages(href);

    if (overflow != undefined) {
        scrollLast(overflow);
    }

    $(this).addClass(selected);

    history.pushState(null, "", href);
});

$(document).on('click', '.foundUser', function (e) {
    e.preventDefault();

    let user = getUser($(this).attr('href'));

    if (this.href != $(`.${selected}`).children().eq(0).attr('href'))
        $(`.${selected}`).removeClass(selected);

    $(`.${select}`).each((index, element) => {
        if ($(element).children().eq(0).attr('href') == this.href) {
            $(element).addClass(selected);
        }
    });

    request.loadFound(user);

    history.pushState(null, "", $(this).attr('href'));
});

$(document).on('click', '.contact-select', function () {
    let primary = 'bg-primary';
    let friends = 'Friends';
    let directs = 'Directs';

    if (!$(this).hasClass(primary)) {
        $(this).addClass(primary);
    }

    const contactView = (visible, hidden) => {
        $(`#${hidden}`).removeClass(primary);
        $(`#contacts${hidden}`).attr('hidden', true);
        $(`#contacts${visible}`).attr('hidden', false);
    }

    ($(this).attr('id') == friends) ?
        contactView(friends, directs) :
        contactView(directs, friends);
});

$(document).on('click', '#closeModal', function () {
    $('.modal-body').empty();
});