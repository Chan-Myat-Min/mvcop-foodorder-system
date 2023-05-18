<?php

function setMessage($name, $description)
{
    // A session is a way to store information (in variables) to be used across multiple pages.
    // Unlike a cookie, the information is not stored on the users computer.
    // session_id() is used to get or set the session id for the current session.
    if (session_id() == '') {
        // session_start() creates a session or resumes the current one based on a session identifier passed via a GET or POST request, or passed via a cookie.
        session_start();
    }
    $_SESSION[$name] = $description;
}

function unsetMessage($name)
{
    unset($_SESSION[$name]);
}

function set($name, $value)
{
    session_start();
    $_SESSION[$name] = $value;
}
