<div class="row pt-2 message-border">
    <form id="message" action="{{ secure_url('home/send') }}" Method="POST">
        <div class="row mt-1">
            <div class="col-11" style="padding-right: 0em; padding-left:1em">
                <input class="message-send-text" type="text" name="message" placeholder="Escribe un mensaje...">
            </div>
            <div class="col-1" style="padding-left: 0.5em">
                <input type="text" name="user" hidden value="{{ session('conversation')[1] }}">
                <button class="message-send-button" id="sendMessage">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24"
                        viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path fill="#0d6efd"
                            d="M16.1 260.2c-22.6 12.9-20.5 47.3 3.6 57.3L160 376V479.3c0 18.1 14.6 32.7 32.7 32.7c9.7 0 18.9-4.3 25.1-11.8l62-74.3 123.9 51.6c18.9 7.9 40.8-4.5 43.9-24.7l64-416c1.9-12.1-3.4-24.3-13.5-31.2s-23.3-7.5-34-1.4l-448 256zm52.1 25.5L409.7 90.6 190.1 336l1.2 1L68.2 285.7zM403.3 425.4L236.7 355.9 450.8 116.6 403.3 425.4z" />
                    </svg>
                </button>
            </div>
        </div>
    </form>
</div>