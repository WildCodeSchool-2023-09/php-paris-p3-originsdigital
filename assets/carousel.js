const carousels = document.getElementsByClassName('splide');

Array.from(carousels).forEach((carousel) => {
    carousels.forEach((carousel) => {
        let carouselElement = document.querySelector(carousel)

        if (carouselElement != null) {
            document.addEventListener('DOMContentLoaded', function () {

                var splideOne = new Splide(carousel, {
                    width: '100%',
                    perPage: 3,
                    perMove: 1,
                    gap: '4rem',
                    pagination: false,
                    type: 'slide',
                    autoplay: false,
                    breakpoints: {
                        768: {
                            perPage: 1
                        }
                    }
                });

                splideOne.mount();
            });
        }
    });
});
