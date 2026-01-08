<?php

if(Session::has('message') && Session::has('type')){
    $message = Session::get('message');
    $type = Session::get('type');

    Session::remove('message');
    Session::remove('type');
    echo "
            <div class='msg-box' id='flash-message'>
                <p class='msg {$type}'>
                    {$message}
                </p>
            </div>
         ";
}

