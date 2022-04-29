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
            window.location.search = search;
        } else { // if its unchecked, remove that param from url and refresh
            search = search.replace(`?${type}[]=${id}`, "");
            search = search.replace(`&${type}[]=${id}`, "");
            window.location.search = search;
        }
    };
};
