<?php

function lastName(){
    return auth()->user()->name;
}

function fistName(){
    return auth()->user()->prenom;
}

function fullName(){
    return fistName().' '. lastname();
}

function photo(){
    return auth()->user()->photo;
}
