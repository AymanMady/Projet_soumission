// function startAnimation() {
//     var container = document.querySelector('.container');
//     container.classList.add('animate');
//   }

var images = document.querySelectorAll('.image-container img');

function animateImages() {
  var index = 0;
  setInterval(function() {
    images.forEach(function(image) {
      image.classList.remove('active');
    });
    images[index].classList.add('active');
    index = (index + 1) % images.length;
  }, 2000);
}

animateImages();
