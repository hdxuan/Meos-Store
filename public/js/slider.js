$(document).ready(function () {
  $('#carousel-banner').owlCarousel({
    loop: true,
    margin: 10,
    items: 1,
    loop: true,
    margin: 10,
    autoplay: true,
    autoplayTimeout: 3000,
    autoplayHoverPause: true
  })

  $('#carousel-best-seller').owlCarousel({
    loop: true,
    margin: 10,
    responsive: {
      0: {
        items: 1,
      },
      600: {
        items: 3
      },
      1000: {
        items: 4
      }
    }
  })
  $('#carousel-related__products').owlCarousel({
    loop: true,
    margin: 10,
    responsive: {
      0: {
        items: 1,
      },
      600: {
        items: 3
      },
      1000: {
        items: 4
      }
    }
  })
  $('#carousel-discount__products').owlCarousel({
    loop: true,
    margin: 10,
    responsive: {
      0: {
        items: 1,
      },
      600: {
        items: 3
      },
      1000: {
        items: 4
      }
    }
  })




});

