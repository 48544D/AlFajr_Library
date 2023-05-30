// select #check and .bottom-section elements
const check = document.querySelector("#check");
const bottomSection = document.querySelector(".bottom-section");

// add event listener to #check
check.addEventListener("change", () => {
    // if #check is checked
    if (check.checked) {
        // set left property of .bottom-section to 100%
        bottomSection.style.left = "0";
    } else {
        // set left property of .bottom-section to -100%
        bottomSection.style.left = "-100%";
    }
});