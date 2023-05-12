// Theme script

const dark = document.getElementById("dark");
const moon = document.getElementById("moon");
const sun = document.getElementById("sun");
let main = document.getElementById("main");
// let account = document.getElementById("account-href");

let theme = localStorage.getItem("theme");

if (theme == null) {
    setTheme("light");
} else {
    setTheme(theme);
}

if (dark) {
    dark.addEventListener("click", function () {
        let themes = dark.getAttribute("data-theme");
        if (themes == "light") {
            dark.setAttribute("data-theme", "dark");
            moon.classList.add("hidden");
            sun.classList.remove("hidden");
            let mode = dark.getAttribute("data-theme");
            // darkAccout;
            setTheme(mode);
        } else {
            dark.setAttribute("data-theme", "light");
            moon.classList.remove("hidden");
            sun.classList.add("hidden");
            let mode = dark.getAttribute("data-theme");

            setTheme(mode);
        }
    });
}

function setTheme(mode) {
    if (mode == "light") {
        // if (account) {
        //     account.setAttribute(
        //         "href",
        //         "http://127.0.0.1:8000/Css/accounts.css"
        //     );
        // }
        if (main)
            main.setAttribute(
                "href",
                window.location.origin + "/Css/style.css"
            );

        if (dark) {
            dark.removeAttribute("checked");
            dark.setAttribute("data-theme", "light");
        }
    } else if (mode == "dark") {
        // if (account) {
        //     account.setAttribute(
        //         "href",
        //         "{{ asset('') }}"
        //         "http://127.0.0.1:8000/Css/darkAccout.css"
        //     );
        // }
        main.setAttribute("href", window.location.origin + "/Css/dark.css");
        dark.setAttribute("data-theme", "dark");
        dark.setAttribute("checked", true);
    }
    localStorage.setItem("theme", mode);
}

// small device theme
const darkSm = document.getElementById("sm-dark");
const moonSm = document.getElementById("sm-moon");
const sunSm = document.getElementById("sm-sun");
let mainSm = document.getElementById("main");
// let accountSm = document.getElementById("account-href");

let themeSm = localStorage.getItem("theme");

if (themeSm == null) {
    smSetTheme("light");
} else {
    smSetTheme(themeSm);
}

if (darkSm) {
    darkSm.addEventListener("click", function () {
        let themes = darkSm.getAttribute("data-theme");
        if (themes == "light") {
            darkSm.setAttribute("data-theme", "dark");
            moonSm.classList.add("hidden");
            sunSm.classList.remove("hidden");
            let mode = darkSm.getAttribute("data-theme");
            // darkSmAccout;
            smSetTheme(mode);
        } else {
            darkSm.setAttribute("data-theme", "light");
            moonSm.classList.remove("hidden");
            sunSm.classList.add("hidden");
            let mode = darkSm.getAttribute("data-theme");

            smSetTheme(mode);
        }
    });
}

function smSetTheme(mode) {
    if (mode == "light") {
        // if (accountSm) {
        //     accountSm.setAttribute(
        //         "href",
        //         "http://127.0.0.1:8000/Css/accounts.css"
        //     );
        // }
        if (mainSm)
            mainSm.setAttribute(
                "href",
                window.location.origin + "/Css/style.css"
            );
        if (darkSm) {
            darkSm.setAttribute("data-theme", "light");
            darkSm.removeAttribute("checked");
        }
    } else if (mode == "dark") {
        // if (accountSm) {
        //     accountSm.setAttribute(
        //         "href",
        //         "http://127.0.0.1:8000/Css/darkAccout.css"
        //     );
        // }
        mainSm.setAttribute("href", window.location.origin + "/Css/dark.css");
        darkSm.setAttribute("data-theme", "dark");
        darkSm.setAttribute("checked", true);
    }
    localStorage.setItem("theme", mode);
}
