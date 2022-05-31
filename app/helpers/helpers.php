<?php

function lastName(){
    return auth()->user()->name;
}

function fistName(){
    return auth()->user()->prenom;
}

function photo(){
    return auth()->user()->photo;
}
