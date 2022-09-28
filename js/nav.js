const primaryNav = document.querySelector(".primary-navigation");
const navToggle = document.querySelector(".mobile-nav-toggle");

const avatar = document.querySelector(".nav__profile");

const dropdown = document.querySelector(".dropdown")

let counter;

dropdown.addEventListener('mouseleave', (event) => {
    counter = setTimeout(() => {
        hideDropDown();
    }, 850);

    console.log("Counter = " + counter)
})

dropdown.addEventListener('mouseenter', (event) => {

    if (counter != null) {
        clearTimeout(counter);
    }

})


avatar.addEventListener('click', () => {
    if (isDropDownOpen()) {
        hideDropDown()
    } else {
        dropdown.setAttribute('data-visible', "true");
    }
});



function hideDropDown() {
    dropdown.setAttribute('data-visible', "false");
    if (counter != null) {
        clearTimeout(counter);
    }

}

function isDropDownOpen() {
    return (dropdown.getAttribute("data-visible") == "true");
}







navToggle.addEventListener("click", () => {

    const visible = primaryNav.getAttribute("data-visible");

    if (visible == "false") {
        primaryNav.setAttribute('data-visible', "true");
        navToggle.setAttribute('aria-expanded', "true");
    } else {
        primaryNav.setAttribute('data-visible', "false");
        navToggle.setAttribute('aria-expanded', "false");
    }
});