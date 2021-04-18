
var wpb_html = document.documentElement;
var wpb_body = document.body;

var wpbscroller = {
  target: document.querySelector(".sscroll"),
  ease: 0.25, // <= scroll speed
  endY: 0,
  y: 0,
  resizeRequest: 1,
  scrollRequest: 0,
};

var requestId = null;

TweenLite.set(wpbscroller.target, {
  rotation: 0.00,
  force3D: false
});

window.addEventListener("load", onLoad);

function onLoad() {    
  updateScroller();  
  window.focus();
  window.addEventListener("resize", onResize);
  document.addEventListener("scroll", onScroll); 
}

function updateScroller() {
  
  var resized = wpbscroller.resizeRequest > 0;
    
  if (resized) {    
    var height = wpbscroller.target.clientHeight;
    wpb_body.style.height = height + "px";
    wpbscroller.resizeRequest = 0;
  }
      
  var scrollY = window.pageYOffset || wpb_html.scrollTop || wpb_body.scrollTop || 0;

  wpbscroller.endY = scrollY;
  wpbscroller.y += (scrollY - wpbscroller.y) * wpbscroller.ease;

  if (Math.abs(scrollY - wpbscroller.y) < 0.05 || resized) {
    wpbscroller.y = scrollY;
    wpbscroller.scrollRequest = 0;
  }
  
  TweenLite.set(wpbscroller.target, { 
    y: -wpbscroller.y 
  });
  
  requestId = wpbscroller.scrollRequest > 0 ? requestAnimationFrame(updateScroller) : null;
}

function onScroll() {
  wpbscroller.scrollRequest++;
  if (!requestId) {
    requestId = requestAnimationFrame(updateScroller);
  }
}

function onResize() {
  wpbscroller.resizeRequest++;
  if (!requestId) {
    requestId = requestAnimationFrame(updateScroller);
  }
}