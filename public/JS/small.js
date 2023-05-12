// const searchInput = document.getElementById("search-input");
const menuBtn = document.getElementById("menu-link");
const smallCartBtn = document.getElementById("small-cart-link");
const menuPage = document.getElementById("menu-page");
const hideBtn = document.getElementById("hide");

menuBtn.addEventListener("click", function () {
    overlay.classList.remove("hidden");
    menuPage.classList.remove("hidden");
    body.style.overflow = "hidden";
    document.getElementById("small-nav-bar").classList.remove("fixed-top");
    document.getElementById("carousel").classList.remove("carousel-m");
});

smallCartBtn.addEventListener("click", function () {
    overlay.classList.remove("hidden");
    cartPage.classList.remove("hidden");
    body.style.overflow = "hidden";
    document.getElementById("small-nav-bar").classList.remove("fixed-top");
    document.getElementById("carousel").classList.remove("carousel-m");
});

// searchBtn.addEventListener("click", function () {
//     if (searchInput.classList.contains("hidden")) {
//         searchInput.classList.remove("hidden");
//     } else {
//         searchInput.classList.add("hidden");
//     }
// });

hideBtn.addEventListener("click", function () {
    menuPage.classList.add("hidden");
    overlay.classList.add("hidden");
    body.removeAttribute("style");
    document.getElementById("small-nav-bar").classList.add("fixed-top");
    document.getElementById("carousel").classList.add("carousel-m");
});
