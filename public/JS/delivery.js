// let onTheWayBtn = document.querySelectorAll(".on-the-way");

// onTheWayBtn.forEach(function (way) {
//     way.addEventListener("click", function () {
//         let num = way.getAttribute("data-id");
//         let fieldset = document.querySelectorAll(".on-road" + num);
//         fieldset.forEach(function (f) {
//             f.classList.add("disabled");
//             let icon = document.getElementById("ico" + num);
//             let trigger = icon.setAttribute("trigger", "loop");
//         });
//     });
// });

let toaster = document.getElementById("toaster");
let closeToast = document.getElementById("close-toast");

if (closeToast) {
    closeToast.addEventListener("click", function () {
        toaster.classList.add("hidden");
    });
}
