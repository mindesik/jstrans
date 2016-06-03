var jstrans = function (key) {
    if (selector = document.querySelector('input[name="jstrans-' + key + '"]')) {
        return selector.value;
    } else {
        return null;
    }
}
