const headerColorDefine = () => {
    const header = document.getElementById("header");
    const scroll = window.scrollY;

    if (scroll > 100) {
        header.classList.add("is-scrolled");
    } else {
        header.classList.remove("is-scrolled");
    }
};
document.addEventListener("DOMContentLoaded", () => {
    headerColorDefine();
});

document.addEventListener("scroll", () => {
    headerColorDefine();
});
