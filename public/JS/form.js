// getting the current page url
if (window.location.href == "forms") {
    const inputProductName = document.getElementById("product-name");
    const inputPrice = document.getElementById("price");
    const inputDelPrice = document.getElementById("del-price");
    const inputProductImage = document.getElementById("product-image");

    const viewOff = document.getElementById("view-off");
    const viewProductName = document.getElementById("view-name");
    const viewPrice = document.getElementById("view-price");
    const viewDelPrice = document.getElementById("view-del-price");
    const viewImage = document.getElementById("view-image");
    const viewAvailable = document.getElementById("available");

    inputProductName.addEventListener("keyup", function () {
        viewProductName.innerText = inputProductName.value;
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

    // Search script
    let search = document.getElementById("search");
    search.addEventListener("keyup", function () {
        if (!search.value == "") {
            let xhg = new XMLHttpRequest();
            xhg.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("sm-search-item").innerHTML =
                        this.responseText;
                }
            };
            xhg.open("GET", "/find/" + search.value, true);
            xhg.send();
        } else {
            document.getElementById("searched-products").innerHTML = "";
            // document.getElementById("smSearchInfo").classList.remove("hidden");
        }
    });
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
}
