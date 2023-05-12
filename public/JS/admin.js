// getting the current page url
// if (window.location.href == "http://127.0.0.1:8000/admin/forms") {
if (document.getElementById("form-Page")) {
    const inputProductName = document.getElementById("product-name");
    const inputPrice = document.getElementById("price");
    const inputDelPrice = document.getElementById("del-price");
    const InputPerPrice = document.getElementById("price-per");

    const viewOff = document.getElementById("view-off");
    const viewProductName = document.getElementById("view-name");
    const viewPrice = document.getElementById("view-price");
    const viewDelPrice = document.getElementById("view-del-price");
    const viewPerPrice = document.getElementById("view-per-price");

    // Product type
    const category = document.getElementById("category");
    const vg = document.getElementById("vg");
    const food = document.getElementById("food");
    const beverage = document.getElementById("beverage");
    const meat = document.getElementById("meat");
    const electronic = document.getElementById("electronic");
    const typeLabel = document.getElementById("type-label");

    category.addEventListener("click", function () {
        if (category.value == "Beverage") {
            typeLabel.classList.remove("hidden");
            beverage.classList.remove("hidden");
            beverage.removeAttribute("disabled", true);
            electronic.classList.add("hidden");
            meat.classList.add("hidden");
            food.classList.add("hidden");
            vg.classList.add("hidden");
            // disabled
            meat.setAttribute("disabled", true);
            electronic.setAttribute("disabled", true);
            vg.setAttribute("disabled", true);
            food.setAttribute("disabled", true);
        } else if (category.value == "Electronics") {
            typeLabel.classList.remove("hidden");
            electronic.classList.remove("hidden");
            electronic.removeAttribute("disabled", true);
            food.classList.add("hidden");
            meat.classList.add("hidden");
            vg.classList.add("hidden");
            beverage.classList.add("hidden");
            // disabled
            meat.setAttribute("disabled", true);
            vg.setAttribute("disabled", true);
            food.setAttribute("disabled", true);
            beverage.setAttribute("disabled", true);
        } else if (category.value == "Foods") {
            typeLabel.classList.remove("hidden");
            food.classList.remove("hidden");
            food.removeAttribute("disabled", true);
            electronic.classList.add("hidden");
            meat.classList.add("hidden");
            vg.classList.add("hidden");
            beverage.classList.add("hidden");
            // disabled
            meat.setAttribute("disabled", true);
            electronic.setAttribute("disabled", true);
            vg.setAttribute("disabled", true);
            beverage.setAttribute("disabled", true);
        } else if (category.value == "MeatFish") {
            typeLabel.classList.remove("hidden");
            meat.classList.remove("hidden");
            meat.removeAttribute("disabled", true);
            food.classList.add("hidden");
            electronic.classList.add("hidden");
            vg.classList.add("hidden");
            beverage.classList.add("hidden");
            // disabled
            electronic.setAttribute("disabled", true);
            vg.setAttribute("disabled", true);
            food.setAttribute("disabled", true);
            beverage.setAttribute("disabled", true);
        } else if (category.value == "FruitsVegetables") {
            typeLabel.classList.remove("hidden");
            vg.classList.remove("hidden");
            vg.removeAttribute("disabled", true);
            food.classList.add("hidden");
            electronic.classList.add("hidden");
            meat.classList.add("hidden");
            beverage.classList.add("hidden");
            // disabled
            meat.setAttribute("disabled", true);
            electronic.setAttribute("disabled", true);
            food.setAttribute("disabled", true);
            beverage.setAttribute("disabled", true);
        } else {
            typeLabel.classList.add("hidden");
            vg.classList.add("hidden");
            food.classList.add("hidden");
            electronic.classList.add("hidden");
            meat.classList.add("hidden");
            beverage.classList.add("hidden");
            // disabled
            meat.setAttribute("disabled", true);
            electronic.setAttribute("disabled", true);
            vg.setAttribute("disabled", true);
            food.setAttribute("disabled", true);
            beverage.setAttribute("disabled", true);
        }
    });

    inputProductName.addEventListener("keyup", function () {
        viewProductName.innerText = inputProductName.value;
    });

    InputPerPrice.addEventListener("keyup", () => {
        viewPerPrice.innerText = InputPerPrice.value;
    });
    inputPrice.addEventListener("keyup", () => {
        viewPrice.innerText = inputPrice.value + "$";
        if (inputDelPrice.value != "") {
            const diff = inputDelPrice.value - inputPrice.value;
            if (diff == 0) {
                viewOff.innerText = "0% off";
            } else if (diff > 1) {
                const off = parseInt((diff * 100) / inputDelPrice.value);
                viewOff.innerText = off + "% off";
            } else {
                viewOff.innerText = "?% off";
            }
        }
    });
    // website looking scrypt
    inputDelPrice.addEventListener("keyup", () => {
        if (Number(inputDelPrice.value) < Number(inputPrice.value)) {
            inputDelPrice.classList.add("border-error");
        } else {
            inputDelPrice.classList.remove("border-error");
            viewDelPrice.innerText = inputDelPrice.value + "$";
            if (inputPrice.value != "") {
                const diff = inputDelPrice.value - inputPrice.value;
                if (diff == 0) {
                    viewOff.innerText = "0% off";
                } else if (diff >= 1) {
                    const off = parseInt((diff * 100) / inputDelPrice.value);
                    viewOff.innerText = off + "% off";
                } else {
                    viewOff.innerText = "?% off";
                }
            }
        }
    });
    // image preview script
    function previewFile() {
        const preview = document.getElementById("view-image");
        const file = document.getElementById("product-image").files[0];
        const reader = new FileReader();

        reader.addEventListener(
            "load",
            () => {
                // convert image file to base64 string
                preview.src = reader.result;
            },
            false
        );

        if (file) {
            reader.readAsDataURL(file);
        }
    }

    // Edit form Script
    let editBtn = document.querySelectorAll(".edit-btn");

    editBtn.forEach(function (edit) {
        edit.addEventListener("click", function () {
            edit.classList.add("hidden");
            let num = edit.getAttribute("data-num");
            let fieldset = document.querySelectorAll(".fieldset" + num);
            fieldset.forEach(function (f) {
                f.removeAttribute("disabled");
            });

            let del = document.querySelectorAll(".delete-btn" + num);
            let submit = document.querySelectorAll(".submit-btn" + num);
            let closeBtn = document.querySelectorAll(".clsBtn" + num);

            closeBtn.forEach((cls) => {
                cls.classList.remove("hidden");
            });
            del.forEach(function (d) {
                d.classList.add("hidden");
            });

            submit.forEach(function (s) {
                s.classList.remove("hidden");
            });
        });
    });

    let closeBtn = document.querySelectorAll(".close-btn");
    closeBtn.forEach(function (close) {
        close.addEventListener("click", function () {
            let num = close.getAttribute("data-num");
            let fieldset = document.querySelectorAll(".fieldset" + num);
            fieldset.forEach(function (f) {
                f.setAttribute("disabled", true);
            });

            let del = document.querySelectorAll(".delete-btn" + num);
            let submit = document.querySelectorAll(".submit-btn" + num);
            del.forEach(function (d) {
                d.classList.remove("hidden");
            });

            submit.forEach(function (s) {
                s.classList.add("hidden");
            });

            let edit = document.querySelectorAll(".edit-btn");
            edit.forEach(function (e) {
                e.classList.remove("hidden");
            });

            close.classList.add("hidden");
        });
    });

    let delBtn = document.querySelectorAll(".del-product");
    delBtn.forEach(function (del) {
        del.addEventListener("click", function () {
            let num = del.getAttribute("data-num");
            let fieldset = document.querySelectorAll(".fieldset" + num);
            fieldset.forEach(function (f) {
                f.removeAttribute("disabled");
            });
        });
    });

    // search script
    let searchKey = document.getElementById("searchInput");
    searchKey.addEventListener("keyup", function () {
        // input = document.getElementById("myInput");
        let filter = searchKey.value.toUpperCase();
        let container = document.getElementById("updateContainer");
        let form = container.getElementsByTagName("form");
        for (let i = 0; i < form.length; i++) {
            let searchPlace = form[i].getElementsByTagName("input")[2];
            let searchKey = searchPlace.value;
            if (searchKey.toUpperCase().indexOf(filter) > -1) {
                form[i].style.display = "";
            } else {
                form[i].style.display = "none";
            }
        }
    });

    let searchSmKey = document.getElementById("searchSmInput");
    searchSmKey.addEventListener("keyup", function () {
        // input = document.getElementById("myInput");
        let filter = searchSmKey.value.toUpperCase();
        let container = document.getElementById("smUpdateContainer");
        let form = container.getElementsByTagName("form");
        for (let i = 0; i < form.length; i++) {
            let searchPlace = form[i].getElementsByTagName("input")[2];
            let searchSmKey = searchPlace.value;
            if (searchSmKey.toUpperCase().indexOf(filter) > -1) {
                form[i].style.display = "";
            } else {
                form[i].style.display = "none";
            }
        }
    });
    // on other page without forms
} else {
    // Employee fire validation
    let fireBtn = document.querySelectorAll(".fire-btn");
    fireBtn.forEach(function (fire) {
        fire.addEventListener("click", function () {
            num = fire.getAttribute("data-num");
            let sureContainer = document
                .getElementById("sure" + num)
                .classList.remove("hidden");
        });
    });
    let notSureBtn = document.querySelectorAll(".not-sure");
    notSureBtn.forEach(function (notSure) {
        notSure.addEventListener("click", function () {
            num = notSure.getAttribute("data-num");
            let sureContainer = document
                .getElementById("sure" + num)
                .classList.add("hidden");
        });
    });

    // Site setting image preview script
    function previewFile() {
        const preview = document.getElementById("view-site-image");
        const file = document.getElementById("site-image").files[0];
        const reader = new FileReader();

        reader.addEventListener(
            "load",
            () => {
                // convert image file to base64 string
                preview.src = reader.result;
            },
            false
        );

        if (file) {
            reader.readAsDataURL(file);
        }
    }

    // Admin Profile changer script
    const chgLink = document.getElementById("chgPass");
    const passPage = document.getElementById("password-page");

    if (chgLink) {
        chgLink.addEventListener("click", function () {
            if (passPage.classList.contains("hidden")) {
                passPage.classList.remove("hidden");
            } else {
                passPage.classList.add("hidden");
            }
        });
    }

    const errorMessage = document.getElementById("errorMessage");
    if (errorMessage) {
        if (errorMessage.textContent !== "") {
            passPage.classList.remove("hidden");
        }
    }
}
