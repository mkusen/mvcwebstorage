<?php

function clear(){
        session_unset();
        session_destroy();
               echo 'clear';
}