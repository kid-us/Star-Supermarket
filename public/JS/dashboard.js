// const searchBtn = document.getElementById("search-btn");
const searchInput = document.getElementById("search-input");
const menuBtn = document.getElementById("menu-link");
const smallCartBtn = document.getElementById("small-cart-link");
const menuPage = document.getElementById("menu-page");
const closeMenu = document.getElementById("close-menu");
const overlayInDash = document.getElementById("overlay");

menuBtn.addEventListener("click", function () {
    overlay.classList.remove("hidden");
    menuPage.classList.remove("hidden");
    document.getElementById("small-nav-bar").classList.remove("fixed-top");
    document.getElementById("carousel").classList.remove("carousel-m");
});

closeMenu.addEventListener("click", function () {
    menuPage.classList.add("hidden");
    overlayInDash.classList.add("hidden");
    document.getElementById("small-nav-bar").classList.add("fixed-top");
    document.getElementById("carousel").classList.add("carousel-m");
});

// searchBtn.addEventListener("click", function () {
//     if (searchInput.classList.contains("hidden")) {
//         searchInput.classList.remove("hidden");
//     } else {
//         searchInput.classList.add("hidden");
//     }
// });

overlayInDash.addEventListener("click", function () {
    menuPage.classList.add("hidden");
    overlayInDash.classList.add("hidden");
    document.getElementById("small-nav-bar").classList.add("fixed-top");
    document.getElementById("carousel").classList.add("carousel-m");
});

const pageIs = document.getElementById("page-is");
// console.log(pageIs.textContent);
if (pageIs.textContent === " Profile") {
    document.getElementById("profile").classList.add("btn-danger");
    document.getElementById("orders").classList.remove("btn-danger");
    document.getElementById("overview").classList.remove("btn-danger");
} else if (pageIs.textContent === " My Orders") {
    document.getElementById("orders").classList.add("btn-danger");
    document.getElementById("profile").classList.remove("btn-danger");
    document.getElementById("overview").classList.remove("btn-danger");
} else {
    document.getElementById("overview").classList.add("btn-danger");
    document.getElementById("orders").classList.remove("btn-danger");
    document.getElementById("profile").classList.remove("btn-danger");
}

const editBtn = document.getElementById("edit-btn");
const cancelBtn = document.getElementById("cancel-btn");
const fieldset = document.getElementById("fieldset");
const newPassword = document.getElementById("new-password");
const updateForm = document.getElementById("updateForm");
const newPasswordContainer = document.getElementById("new-password-container");

if (editBtn || cancelBtn || newPassword) {
    editBtn.addEventListener("click", function () {
        fieldset.removeAttribute("disabled");
        cancelBtn.classList.remove("hidden");
    });
    cancelBtn.addEventListener("click", function () {
        fieldset.setAttribute("disabled", true);
        cancelBtn.classList.add("hidden");
    });

    newPassword.addEventListener("click", function () {
        if (newPasswordContainer.classList.contains("hidden")) {
            newPasswordContainer.classList.remove("hidden");
            updateForm.classList.add("hidden");
        } else {
            newPasswordContainer.classList.add("hidden");
            updateForm.classList.remove("hidden");
        }
    });
}
const errorMessage = document.getElementById("errorMessage");
if (errorMessage) {
    if (errorMessage.textContent !== "") {
        newPasswordContainer.classList.remove("hidden");
        updateForm.classList.add("hidden");
    }
}
