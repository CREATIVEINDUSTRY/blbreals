var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function currentSlide(n) {
  showDivs(slideIndex = n);
}

function showDivs(n) {
  var i,
      x = document.getElementsByClassName("mySlides"),
      dots = document.getElementsByClassName("dots");


  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
     dots[i].className = dots[i].className.replace(" actived", " ");
     
  
  }
  x[slideIndex-1].style.display = "block"; 
  x[slideIndex-1].style.flexWrap = "wrap";
  dots[slideIndex-1].className += " actived";

}