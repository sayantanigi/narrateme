$(document).ready(function() {

var owl = $("#owl-demo");

owl.owlCarousel({
navigation : true,
singleItem : true,
autoPlay : 3500,
navigation : false,
pagination : false,
transitionStyle : "fade",
navigationText: [
"<i class='fa fa-angle-left'></i>",
"<i class='fa fa-angle-right'></i>"
]
});

});


$('#myTabs a').click(function (e) {
e.preventDefault()
$(this).tab('show')
})


$(window).scroll(function() {
$('.list').each(function(){
var imagePos = $(this).offset().top;

var topOfWindow = $(window).scrollTop();
if (imagePos < topOfWindow+400) {
$(this).addClass("fadeIn");
}
});
});


$('.list').click(function() {
$(this).addClass("fadeIn");
});



$(document).ready(function(){

var top_header = $('.parallax');
top_header.css({'background-position':'center center'}); // better use CSS

$(window).scroll(function () {
var st = $(this).scrollTop();
top_header.css({'background-position':'center calc(50% + '+(st*.5)+'px)'});
});
});





$(document).ready(function(){

var top_header = $('.parallax2');
top_header.css({'background-position':'center center'}); // better use CSS

$(window).scroll(function () {
var st = $(this).scrollTop();
top_header.css({'background-position':'center calc(20% + '+(st*.5)+'px)'});
});
});





$(window).scroll(function() {
$('.ani').each(function(){
var imagePos = $(this).offset().top;

var topOfWindow = $(window).scrollTop();
if (imagePos < topOfWindow+400) {
$(this).addClass("fadeIn");
}
});
});


$('.ani').click(function() {
$(this).addClass("fadeIn");
});


$(window).scroll(function() {
$('.tabimg').each(function(){
var imagePos = $(this).offset().top;

var topOfWindow = $(window).scrollTop();
if (imagePos < topOfWindow+400) {
$(this).addClass("slideUp");
}
});
});








   if (window.addEventListener) window.addEventListener('DOMMouseScroll', wheel, false);
window.onmousewheel = document.onmousewheel = wheel;

function wheel(event) {
    var delta = 0;
    if (event.wheelDelta) delta = event.wheelDelta / 120;
    else if (event.detail) delta = -event.detail / 3;

    handle(delta);
    if (event.preventDefault) event.preventDefault();
    event.returnValue = false;
}

function handle(delta) {
    var time = 600;
	var distance = 500;
    
    $('html, body').stop().animate({
        scrollTop: $(window).scrollTop() - (distance * delta)
    }, time );
}

