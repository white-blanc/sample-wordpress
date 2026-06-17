const galleryLarge = document.getElementById("gallery-main");
const galleryBtns = document.getElementById("gallery-btns");

const galleryIndex = (index) => {
    const galleryLargeItems = galleryLarge.querySelectorAll("img");
    const galleryBtnItems = galleryBtns.querySelectorAll("img");

    for (let i = 0; i < galleryLargeItems.length; i++) {
        const element = galleryLargeItems[i];
        if (element.dataset.index == index) {
            element.classList.add("is-active");
        } else {
            element.classList.remove("is-active");
        }
    }

    for (let i = 0; i < galleryBtnItems.length; i++) {
        const element = galleryBtnItems[i];
        if (element.dataset.index == index) {
            element.classList.add("is-active");
        } else {
            element.classList.remove("is-active");
        }
    }
};

document.addEventListener("DOMContentLoaded", () => {
    galleryIndex(1);
});

const galleryBtnItems = galleryBtns.querySelectorAll("img");
galleryBtnItems.forEach((e) => {
    e.addEventListener("click", () => {
        galleryIndex(e.dataset.index);
    });
});
