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

function OpenMenu($route){
    if( request()->route()->getName()=== $route ){
        return 'menu-open active';
    }
    return '';
}
function active($route){
    if( request()->route()->getName()=== $route ){
        return 'active';
    }
    return '';
}


