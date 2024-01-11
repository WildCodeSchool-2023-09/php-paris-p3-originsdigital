
document.addEventListener('DOMContentLoaded', function () {

    var splideOne = new Splide('#Cours-slider', {
        width: '100%',
        perPage: 3,
        perMove: 1,
        gap: '4rem',
        pagination: false,
        type: 'loop',
        autoplay: true,
        breakpoints: {
            768: {
                perPage: 1
            }
        }
    });

    splideOne.mount();
});

document.addEventListener('DOMContentLoaded', function () {

    var splideTwo = new Splide('#Tutoriel-slider', {
        perPage: 3,
        perMove: 1,
        gap: '4rem',
        pagination: false,
        type: 'loop',
        autoplay: true,
        breakpoints: {
            768: {
                perPage: 1
            }
        }
    });

    splideTwo.mount();
});

document.addEventListener('DOMContentLoaded', function () {

    var splideThree = new Splide('#LiveCoding-slider', {
        perPage: 3,
        perMove: 1,
        gap: '4rem',
        pagination: false,
        type: 'loop',
        autoplay: true,
        breakpoints: {
            768: {
                perPage: 1
            }
        }
    });

    splideThree.mount();
});