/**
 * Created by Валерий on 23.04.2017.
 */

$( document ).ready(function(){
    $(".dropdown-button").dropdown({
        belowOrigin: true,
        constrainWidth: false,
        alignment: 'right'
    });

    $(".button-collapse").sideNav({
        edge: 'left',
        closeOnClick: true,
        draggable: true
    });
});