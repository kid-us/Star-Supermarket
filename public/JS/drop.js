const catagoriesBtn = document.getElementById("catagories");
const pagesBtn = document.getElementById("pages");
const pagesPage = document.getElementById("pages-drop");
const catagoriesPage = document.getElementById("catagories-drop");

const dashPage = document.getElementById("dash-drop");

catagoriesBtn.addEventListener("click", function () {
    if (catagoriesPage.classList.contains("hidden")) {
        catagoriesPage.classList.remove("hidden");
        pagesPage.classList.add("hidden");
        if (dashPage) {
            dashPage.classList.add("hidden");
        }

        document.getElementById("up").classList.remove("bi-caret-down-fill");
        document.getElementById("up").classList.add("bi-caret-up-fill");
    } else {
        catagoriesPage.classList.add("hidden");
        document.getElementById("up").classList.add("bi-caret-down-fill");
        document.getElementById("up").classList.remove("bi-caret-up-fill");
    }
});

pagesBtn.addEventListener("click", function () {
    if (pagesPage.classList.contains("hidden")) {
        pagesPage.classList.remove("hidden");
        catagoriesPage.classList.add("hidden");
        if (dashPage) {
            dashPage.classList.add("hidden");
        }
        document.getElementById("aaoo").classList.remove("bi-caret-down-fill");
        document.getElementById("aaoo").classList.add("bi-caret-up-fill");
    } else {
        document.getElementById("aaoo").classList.add("bi-caret-down-fill");
        document.getElementById("aaoo").classList.remove("bi-caret-up-fill");
        pagesPage.classList.add("hidden");
        pagesBtn.classList.remove("bi-caret-down-fill");
    }
});

// zoom in image
const zoomContainer = document.querySelectorAll(".product-container");

zoomContainer.forEach(function (zoom) {
    zoom.addEventListener("mouseenter", function () {
        this.children[1].classList.add("zoom");
    });
    zoom.addEventListener("mouseleave", function () {
        this.children[1].classList.remove("zoom");
    });
});

// Dashboard Dropdown
const dashLink = document.getElementById("dash-link");
if (dashLink) {
    dashLink.addEventListener("click", function () {
        catagoriesPage.classList.add("hidden");
        pagesPage.classList.add("hidden");
        if (dashPage.classList.contains("hidden")) {
            dashPage.classList.remove("hidden");
            document
                .getElementById("down")
                .classList.remove("bi-caret-down-fill");
            document.getElementById("down").classList.add("bi-caret-up-fill");
        } else {
            dashPage.classList.add("hidden");
            document.getElementById("down").classList.add("bi-caret-down-fill");
            document
                .getElementById("down")
                .classList.remove("bi-caret-up-fill");
        }
    });
}

// filter script
