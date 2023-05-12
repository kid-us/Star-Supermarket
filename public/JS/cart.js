// cart page script
window.addEventListener("load", () => {
    let store = jar.get("store");
    if (store) {
        store = JSON.parse(store);
        const cartNumber = Object.keys(store).length.toString();
        // const itemInCart = Object.keys(store).length;
        cartAdd(store, cartNumber);
    } else {
        badge.innerText = "0";
        smallBadge.textContent = "0";
        document.getElementById("cart-num").textContent = "0";
        emptyCart();
    }
});
// cart badge
const badge = document.getElementById("counter");
const smallBadge = document.getElementById("small-counter");
function emptyCart() {
    const emptyContainer = document.createElement("div");
    emptyContainer.className = "text-center p-5 rounded";

    const emptyImage = document.createElement("img");
    emptyImage.className = "mt-5 pt-4 rounded";
    emptyImage.setAttribute("src", "http://127.0.0.1:8000/Img/empty.png");
    emptyImage.setAttribute("width", "200px");

    emptyContainer.appendChild(emptyImage);
    document.querySelector(".multiple-item").appendChild(emptyContainer);
    document.getElementById("cart-checkout-btn").classList.add("hidden");
}

function cartAdd(store, cartNumber) {
    document.getElementById("item-length").setAttribute("value", cartNumber);
    document.getElementById("cart-checkout-btn").classList.remove("hidden");
    badge.textContent = cartNumber;
    smallBadge.textContent = cartNumber;
    document.getElementById("cart-num").textContent = cartNumber;
    document.getElementById("cart-section").innerHTML = "";

    const row = document.createElement("div");
    row.className = "row rounded cart-items cart-item-page border pt-2";
    let totPrice = 0;
    // const form = document.createElement("form");
    // form.setAttribute("action", "#");
    // form.setAttribute("method", "");

    Object.keys(store).forEach((d) => {
        const cartName = store[d].name;
        const cartPrice = store[d].price;
        const cartImage = store[d].image;
        const cartQuant = store[d].quantity;
        const cartPN = store[d].productNo;
        const itemQuant = store[d].remainingQuantity;

        // Hidden input type sender
        const nameOfItem = document.createElement("input");
        nameOfItem.setAttribute("value", cartName);
        nameOfItem.setAttribute("hidden", true);
        nameOfItem.setAttribute("name", "Item-name[]");

        const itemPrice = document.createElement("input");
        itemPrice.setAttribute("value", cartPrice);
        itemPrice.setAttribute("hidden", true);
        itemPrice.setAttribute("name", "Item-price[]");

        const itemImage = document.createElement("input");
        itemImage.setAttribute("value", cartImage);
        itemImage.setAttribute("hidden", true);
        itemImage.setAttribute("name", "Item-image[]");

        const itemProNum = document.createElement("input");
        itemProNum.setAttribute("value", cartPN);
        itemProNum.setAttribute("hidden", true);
        itemProNum.setAttribute("name", "Item-productNo[]");

        // total Price
        let price = parseFloat(cartPrice);
        totPrice = totPrice + price * cartQuant;
        //Column 1
        const col1 = document.createElement("div");
        col1.className = "col-4";
        const img1 = document.createElement("img");
        img1.setAttribute("src", `http://127.0.0.1:8000/uploads/${cartImage}`);
        img1.setAttribute("width", "100px");
        // Column 2

        const col2 = document.createElement("div");
        col2.className = "col-4";
        const itemLabel = document.createElement("p");
        itemLabel.className = "fw-semibold text-center";
        itemLabel.textContent = cartName;

        const inputGroup = document.createElement("div");
        inputGroup.className = "input-group";
        const input1 = document.createElement("input");
        input1.setAttribute("type", "number");
        input1.setAttribute("name", "Item-quant[]");
        input1.setAttribute("min", "1");
        input1.setAttribute("max", itemQuant);
        // input1.setAttribute("name", "kg");
        input1.setAttribute("value", cartQuant);
        input1.className = "form-control";
        // const kgLabel = document.createElement("span");
        // kgLabel.className = " input-group-text bg-light kg-label";
        // kgLabel.textContent = "kg";
        // Column 3
        const col3 = document.createElement("div");
        col3.className = "col-2";
        const priceLabel = document.createElement("h6");
        priceLabel.className = "mt-5";
        priceLabel.textContent = cartPrice;

        // Column 4
        const col4 = document.createElement("div");
        col4.className = "col-2";
        const itemRemove = document.createElement("a");
        itemRemove.setAttribute("href", "#");
        itemRemove.setAttribute("data-name", cartName);
        itemRemove.className =
            "remove-link-cart mt-4 btn pt-2 text-danger fw-semibold fs-4";
        itemRemove.textContent = "x";

        const hr = document.createElement("hr");
        hr.className = "my-4 text-dark";

        col1.appendChild(img1);
        col2.appendChild(itemLabel);
        col2.appendChild(inputGroup);
        inputGroup.appendChild(input1);
        // inputGroup.appendChild(kgLabel);
        col3.appendChild(priceLabel);
        col4.appendChild(itemRemove);

        row.appendChild(col1);
        row.appendChild(col2);
        row.appendChild(col3);
        row.appendChild(col4);
        row.appendChild(hr);
        row.appendChild(nameOfItem);
        row.appendChild(itemPrice);
        row.appendChild(itemImage);
        row.appendChild(itemProNum);

        // row.appendChild(form);

        document.querySelector(".multiple-item").appendChild(row);
    });
    // total price
    let totalPrice = totPrice + 10;
    document.getElementById("total-price").textContent = totalPrice + "$";
    document
        .getElementById("total-input-price")
        .setAttribute("value", totalPrice);
    const cartDelete = document.querySelectorAll(".remove-link-cart");
    cartDelete.forEach(function (rem) {
        rem.addEventListener("click", function () {
            if (cartNumber === "1") {
                jar.remove("store");
                window.location.reload();
            } else {
                const cookieItemName = rem.getAttribute("data-name");
                const item = Object.keys(store).find(
                    (id) => id === cookieItemName
                );
                delete store[cookieItemName];
                jar.set("store", JSON.stringify(store));
                window.location.reload();
            }
        });
    });
}
// Adding to cart Script
let addToCart = document.querySelectorAll(".add-cart");
addToCart.forEach(function (add) {
    add.addEventListener("click", function () {
        const itemName = this.children[0].getAttribute("data-name");
        const itemImage = this.children[0].getAttribute("data-image");
        const itemPrice = this.children[0].getAttribute("data-price");
        const itemPN = this.children[0].getAttribute("data-PN");
        const itemQuantity = this.children[0].getAttribute("data-quantity");

        // addingToCart(itemName, itemPrice, itemImage);
        const stores = jar.get("store");

        if (!stores) {
            const data = {
                [itemName]: {
                    name: itemName,
                    price: itemPrice,
                    image: itemImage,
                    productNo: itemPN,
                    remainingQuantity: itemQuantity,
                    quantity: 1,
                },
            };
            // viewPrint(itemName, itemPrice, itemImage);
            badge.textContent = "1";
            smallBadge.textContent = "1";
            jar.set("store", JSON.stringify(data));
        } else {
            let data = jar.get("store");
            data = JSON.parse(data);

            const item = Object.keys(data).find((id) => id === itemName);
            const cartCounter = Object.keys(data).length;

            if (item) {
                data[item].quantity++;
                badge.textContent = cartCounter.toString();
                smallBadge.textContent = cartCounter.toString();
            } else {
                data[itemName] = {
                    name: itemName,
                    price: itemPrice,
                    image: itemImage,
                    productNo: itemPN,
                    remainingQuantity: itemQuantity,
                    quantity: 1,
                };

                badge.textContent = (cartCounter + 1).toString();
                smallBadge.textContent = (cartCounter + 1).toString();
            }
            jar.set("store", JSON.stringify(data));
        }
        let store = JSON.parse(jar.get("store"));
        const cartNumber = Object.keys(store).length;
        cartAdd(store, cartNumber);
    });
});

const overlay = document.getElementById("overlay");
const body = document.getElementById("body");
// cart btn script
const cartBtn = document.getElementById("cart-link");
const cartClose = document.getElementById("close-cart");
const cartPage = document.getElementById("cart-page");
const cartClear = document.getElementById("clear-cart");
cartBtn.addEventListener("click", function () {
    overlay.classList.remove("hidden");
    cartPage.classList.remove("hidden");
    body.style.overflow = "hidden";
    document.getElementById("nav-bar").classList.remove("fixed-top");
    document.getElementById("carousel").classList.remove("carousel-m");
});

cartClose.addEventListener("click", function () {
    overlay.classList.add("hidden");
    cartPage.classList.add("hidden");
    body.removeAttribute("style");
    document.getElementById("nav-bar").classList.add("fixed-top");
    document.getElementById("carousel").classList.add("carousel-m");
});

overlay.addEventListener("click", function () {
    overlay.classList.add("hidden");
    cartPage.classList.add("hidden");
    menuPage.classList.add("hidden");
    body.removeAttribute("style");
    document.getElementById("nav-bar").classList.add("fixed-top");
    document.getElementById("carousel").classList.add("carousel-m");
    document.getElementById("small-nav-bar").classList.add("fixed-top");
    filterPage.classList.add("hidden");
    if (searchPage) {
        searchPage.classList.add("hidden");
    }
});
// cart clear
cartClear.addEventListener("click", function () {
    jar.remove("store");
    window.location.reload();
});

// filter btn
const filterBtn = document.getElementById("filter-link");
const filterClose = document.getElementById("close-filter");
const filterPage = document.getElementById("filter-page");

// filter btn script
if (filterBtn) {
    filterBtn.addEventListener("click", function () {
        overlay.classList.remove("hidden");
        filterPage.classList.remove("hidden");
        body.style.overflow = "hidden";
        if (document.getElementById("small-nav-bar")) {
            document
                .getElementById("small-nav-bar")
                .classList.remove("fixed-top");
        }
        document.getElementById("nav-bar").classList.remove("fixed-top");
        document.getElementById("carousel").classList.remove("carousel-m");
    });
}

filterClose.addEventListener("click", function () {
    overlay.classList.add("hidden");
    filterPage.classList.add("hidden");
    body.removeAttribute("style");
    if (document.getElementById("small-nav-bar")) {
        document.getElementById("small-nav-bar").classList.add("fixed-top");
    }
    document.getElementById("nav-bar").classList.add("fixed-top");
    document.getElementById("carousel").classList.add("carousel-m");
});

// // cookie remover after buying multiple items
// if (jar.get("message") === "yess") {
//     jar.remove("message");
//     jar.remove("store");
// }

// scroll btn script
const scrollBtn = document.getElementById("scroll-btn");

window.addEventListener("scroll", function () {
    if (window.scrollY > window.innerHeight) {
        scrollBtn.classList.remove("hidden");
    } else {
        scrollBtn.classList.add("hidden");
    }
});

scrollBtn.addEventListener("click", function () {
    window.scrollTo(0, 0);
});
