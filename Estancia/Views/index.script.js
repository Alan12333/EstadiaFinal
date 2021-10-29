var head = document.getElementById("header");
var head = document.getElementById("header");
var card1 = document.getElementById("card1");
var card2 = document.getElementById("card2");
var card3 = document.getElementById("card3");
var last_known_scroll_position = 0;
var ticking = false;



window.addEventListener('scroll', function(e) {
last_known_scroll_position = window.scrollY;
if (!ticking) {
window.requestAnimationFrame(function() {
  doSomething(last_known_scroll_position);
  ticking = false;
});
}
ticking = true;
});


function doSomething(scroll_pos) {
    if(scroll_pos>"150")
    {
        head.style.background="rgb(108, 22, 72)";
        head.style.webkitTransition="all 1s";
    }
    else
    {
        head.style.background="transparent"; 
        head.style.webkitTransition="all 1s";
    }
}

card1.addEventListener("click", function(){
    card2.style.boxShadow="none";
    card3.style.boxShadow="none";
    card1.style.opacity="0.5";
    card2.style.opacity="0.5";
    card1.style.opacity="8";
    card1.style.boxShadow="12px 0px 24px silver";
    card1.style.transition="1s all";
})
card2.addEventListener("click", function(){
    card1.style.boxShadow="none";
    card3.style.boxShadow="none";
    card1.style.opacity="0.5";
    card3.style.opacity="0.5";
    card2.style.opacity="8";
    card2.style.boxShadow="12px 0px 24px silver";
    card2.style.transition="1s all";
})
card3.addEventListener("click", function(){
    card1.style.boxShadow="none";
    card2.style.boxShadow="none";
    card1.style.opacity="0.5";
    card2.style.opacity="0.5";
    card3.style.opacity="1";
    card3.style.boxShadow="12px 0px 24px silver";
    card3.style.transition="1s all";
})