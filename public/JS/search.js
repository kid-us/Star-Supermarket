const search = document.getElementById("searchInput");
const searchPage = document.getElementById("searchPage");
const searchClose = document.getElementById("searchClose");

// search input comes when clicked
search.addEventListener("click", function () {
    searchPage.classList.remove("hidden");
    document.getElementById("nav-bar").classList.remove("fixed-top");
    document.getElementById("carousel").classList.remove("carousel-m");
    document.getElementById("searchIn").focus();
    body.style.overflow = "hidden";
});
// close search input
searchClose.addEventListener("click", function () {
    searchPage.classList.add("hidden");
    document.getElementById("nav-bar").classList.add("fixed-top");
    document.getElementById("carousel").classList.add("carousel-m");
    body.removeAttribute("style");
});

// searching from Database
let searchItem = document.getElementById("searchIn");
searchItem.addEventListener("keyup", function () {
    if (!searchItem.value == "") {
        document.getElementById("searchInfo").classList.add("hidden");
        let xhg = new XMLHttpRequest();
        xhg.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document
                    .getElementById("search-item")
                    .classList.remove("hidden");
                document.getElementById("search-item").innerHTML =
                    this.responseText;
            }
        };
        xhg.open("GET", "/search/" + searchItem.value, true);
        xhg.send();
    } else {
        document.getElementById("search-item").innerHTML = "";
        document.getElementById("searchInfo").classList.remove("hidden");
    }
});

// Small Device search
const searchBtn = document.getElementById("search-btn");
const smSearch = document.getElementById("smallSearchInput");
const smSearchPage = document.getElementById("smallSearchPage");
const smSearchClose = document.getElementById("smallSearchClose");

// small device search icon clicked
searchBtn.addEventListener("click", function () {
    smSearchPage.classList.remove("hidden");
    document.getElementById("nav-bar").classList.remove("fixed-top");
    document.getElementById("carousel").classList.remove("carousel-m");
    document.getElementById("smSearchIn").focus();
    if (document.getElementById("small-nav-bar")) {
        document.getElementById("small-nav-bar").classList.remove("fixed-top");
    }
    body.style.overflow = "hidden";
});

// small device search page close
smSearchClose.addEventListener("click", function () {
    smSearchPage.classList.add("hidden");
    document.getElementById("nav-bar").classList.add("fixed-top");
    document.getElementById("carousel").classList.add("carousel-m");
    if (document.getElementById("small-nav-bar")) {
        document.getElementById("small-nav-bar").classList.add("fixed-top");
    }
    body.removeAttribute("style");
});

// small device search from DB
let smSearchItem = document.getElementById("smSearchIn");
smSearchItem.addEventListener("keyup", function () {
    if (!smSearchItem.value == "") {
        document.getElementById("smSearchInfo").classList.add("hidden");
        let xhg = new XMLHttpRequest();
        xhg.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document
                    .getElementById("sm-search-item")
                    .classList.remove("hidden");
                document.getElementById("sm-search-item").innerHTML =
                    this.responseText;
            }
        };
        xhg.open("GET", "/search/" + smSearchItem.value, true);
        xhg.send();
    } else {
        document.getElementById("sm-search-item").innerHTML = "";
        document.getElementById("smSearchInfo").classList.remove("hidden");
    }
});
