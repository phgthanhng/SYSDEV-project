let search = window.location.search;

const checkboxes = document.getElementsByClassName("form-check-input");
for (let checkbox of checkboxes) {
    const fullid = checkbox.id;

    const middle = fullid.indexOf("-");
    const type = fullid.substring(0, middle);
    const id = fullid.substring(middle + 1, fullid.length);

    // set checked if its found in the url
    if (search.indexOf(`${type}[]=${id}`) > -1) {
        checkbox.checked = true;
    }

    // set onclick
    checkbox.onclick = () => {
        if (checkbox.checked) { // if its checked, add param to url and refresh
            search += search.startsWith("?") ? `&${type}[]=${id}` : search += `${type}[]=${id}`;
        } else { // if its unchecked, remove that param from url and refresh
            search = search.replace(`?${type}[]=${id}`, "");
            search = search.replace(`&${type}[]=${id}`, "");
        }
        window.location.search = search;
    };
};

const dropdownButton = document.getElementById("dropdownMenuButton1");
const sortPriceASC = document.getElementById("sort-0");
const sortPriceDESC = document.getElementById("sort-1");

if (search.indexOf("sort=0") > -1) dropdownButton.innerText = "Price Low to High";
sortPriceASC.onclick = (event) => {
    event.preventDefault();

    if (search.indexOf("sort=0") === -1) {
        search += search.startsWith("?") ? '&sort=0' : search += 'sort=0';
        search = search.replace("&sort=1", "");
        search = search.replace("?sort=1", "");
    }

    window.location.search = search;
}

if (search.indexOf("sort=1") > -1) dropdownButton.innerText = "Price High to low";
sortPriceDESC.onclick = (event) => {
    event.preventDefault();

    if (search.indexOf("sort=1") === -1) {
        search += search.startsWith("?") ? '&sort=1' : search += 'sort=1';
        search = search.replace("&sort=0", "");
        search = search.replace("?sort=0", "");
    }

    window.location.search = search;
}

paramsString = new URLSearchParams(search);
let currentSearchTerm = paramsString.get("name");
const searchInput = document.getElementById("search");
searchInput.onkeydown = (event) => {
    const text = searchInput.value;
    const keycode = event.keyCode ? event.keyCode : event.which;
    if (keycode == 13 && text.length !== 0) {
        search += search.startsWith("?") ? `&name=${text}` : search += `name=${text}`;
        search = search.replace(`&name=${currentSearchTerm}`, "");
        search = search.replace(`?name=${currentSearchTerm}`, "");

        currentSearchTerm = text;

        window.location.search = search;
    }
}