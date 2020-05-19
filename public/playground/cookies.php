<?php

    $cookie = $_COOKIE['cookie'] ?? 1;

    echo 'to Twoja '. $cookie . ' wizyta na tej stronie';
    setcookie('cookie', $cookie++);