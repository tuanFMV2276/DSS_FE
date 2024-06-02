const listImagesPos1 = document.querySelector('.list-images');
const imgspos1 = document.querySelectorAll('.list-images img');
const listImagesTab1 = document.querySelector('.tab-1 .carousel-inner');
const imgsTab1 = document.querySelectorAll('.tab-1 .carousel-inner img');
const listImagesTab2 = document.querySelector('.tab-2 .carousel-inner');
const imgsTab2 = document.querySelectorAll('.tab-2 .carousel-inner img');
const listImagesTab3 = document.querySelector('.tab-3 .carousel-inner');
const imgsTab3 = document.querySelectorAll('.tab-3 .carousel-inner img');
const btnLeft = document.querySelector('.btn-left');
const btnRight = document.querySelector('.btn-right');
let current = 0;

const handleChangeSlide = () => {
    if (current === imgspos1.length - 1) {
        current = 0;
    } else {
        current++;

    }
    const width = imgspos1[0].offsetWidth;
    listImagesPos1.style.transform = `translateX(${-width * current}px)`;
    document.querySelector('.active').classList.remove('active');
    document.querySelector(`.index-item-${current}`).classList.add('active');
};

let handleEventChangeSlide = setInterval(handleChangeSlide, 4000);

btnRight.addEventListener('click', () => {
    clearInterval(handleEventChangeSlide);
    handleChangeSlide();
    handleEventChangeSlide = setInterval(handleChangeSlide, 4000);
});

btnLeft.addEventListener('click', () => {
    clearInterval(handleEventChangeSlide);
    if (current === 0) {
        current = imgspos1.length - 1;
    } else {
        current--;
    }
    const width = imgspos1[0].offsetWidth;
    listImagesPos1.style.transform = `translateX(${-width * current}px)`;
    document.querySelector('.active').classList.remove('active');
    document.querySelector(`.index-item-${current}`).classList.add('active');
    handleEventChangeSlide = setInterval(handleChangeSlide, 4000);
});

const handleChangeSlideTab1 = () => {
    if (current === imgsTab1.length - 1) {
        current = 0;
    } else {
        current++;

    }
    const width = imgsTab1[0].offsetWidth;
    listImagesTab1.style.transform = `translateX(${-width * current/3}px)`;
    document.querySelector('.active').classList.remove('active');
    document.querySelector(`.index-item-${current}`).classList.add('active');
};

let handleEventChangeSlideTab1 = setInterval(handleChangeSlideTab1, 4000);

btnRight.addEventListener('click', () => {
    clearInterval(handleEventChangeSlideTab1);
    handleChangeSlideTab1();
    handleEventChangeSlideTab1 = setInterval(handleChangeSlideTab1, 4000);
});

btnLeft.addEventListener('click', () => {
    clearInterval(handleEventChangeSlideTab1);
    if (current === 0) {
        current = imgsTab1.length - 1;
    } else {
        current--;
    }
    const width = imgsTab1[0].offsetWidth;
    listImagesTab1.style.transform = `translateX(${-width * current/3}px)`;
    document.querySelector('.active').classList.remove('active');
    document.querySelector(`.index-item-${current}`).classList.add('active');
    handleEventChangeSlideTab1 = setInterval(handleChangeSlideTab1, 4000);
});

const handleChangeSlideTab2 = () => {
    if (current === imgsTab2.length - 1) {
        current = 0;
    } else {
        current++;

    }
    const width = imgsTab2[0].offsetWidth;
    listImagesTab2.style.transform = `translateX(${-width * current/3}px)`;
    document.querySelector('.active').classList.remove('active');
    document.querySelector(`.index-item-${current}`).classList.add('active');
};

let handleEventChangeSlideTab2 = setInterval(handleChangeSlideTab2, 4000);

btnRight.addEventListener('click', () => {
    clearInterval(handleEventChangeSlideTab2);
    handleChangeSlideTab2();
    handleEventChangeSlideTab2 = setInterval(handleChangeSlideTab2, 4000);
});

btnLeft.addEventListener('click', () => {
    clearInterval(handleEventChangeSlideTab2);
    if (current === 0) {
        current = imgsTab2.length - 1;
    } else {
        current--;
    }
    const width = imgsTab2[0].offsetWidth;
    listImagesTab2.style.transform = `translateX(${-width * current/3}px)`;
    document.querySelector('.active').classList.remove('active');
    document.querySelector(`.index-item-${current}`).classList.add('active');
    handleEventChangeSlideTab2 = setInterval(handleChangeSlideTab2, 4000);
});

const handleChangeSlideTab3 = () => {
    if (current === imgsTab3.length - 1) {
        current = 0;
    } else {
        current++;

    }
    const width = imgsTab3[0].offsetWidth;
    listImagesTab3.style.transform = `translateX(${-width * current/3}px)`;
    document.querySelector('.active').classList.remove('active');
    document.querySelector(`.index-item-${current}`).classList.add('active');
};

let handleEventChangeSlideTab3 = setInterval(handleChangeSlideTab3, 4000);

btnRight.addEventListener('click', () => {
    clearInterval(handleEventChangeSlideTab3);
    handleChangeSlideTab3();
    handleEventChangeSlideTab3 = setInterval(handleChangeSlideTab3, 4000);
});

btnLeft.addEventListener('click', () => {
    clearInterval(handleEventChangeSlideTab3);
    if (current === 0) {
        current = imgsTab3.length - 1;
    } else {
        current--;
    }
    const width = imgsTab3[0].offsetWidth;
    listImagesTab3.style.transform = `translateX(${-width * current/3}px)`;
    document.querySelector('.active').classList.remove('active');
    document.querySelector(`.index-item-${current}`).classList.add('active');
    handleEventChangeSlideTab3 = setInterval(handleChangeSlideTab3, 4000);
});