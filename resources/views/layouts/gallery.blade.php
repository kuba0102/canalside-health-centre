
<!-- Gallery -->

    <div class="row">
      <div class="col-lg-8 col-lg-offset-3 text-center">
          <img class="mySlides" src="{{asset('img/img2.jpg') }}" style="width:70%; ">
          <img class="mySlides" src="{{asset('img/img3.jpg') }}" style="width:70%; ">
          <img class="mySlides" src="{{asset('img/img4.jpg') }}" style="width:70%;">
          <img class="mySlides" src="{{asset('img/img5.jpg') }}" style="width:70%; ">
          <img class="mySlides" src="{{asset('img/img6.jpg') }}" style="width:70%; ">
          <img class="mySlides" src="{{asset('img/img1.jpg') }}" style="width:70%; ">
      </div>
    </div>

<script>
var myIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}
  x[myIndex-1].style.display = "block";
  setTimeout(carousel, 3000); // Change image every 2 seconds
}
</script>
