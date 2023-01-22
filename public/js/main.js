let ratingNum = 0;

window.onload = () => {
    let ratingEl = document.getElementById('rating');
    if (ratingEl) {
        ratingEl.querySelectorAll('i').forEach(i => {
            i.addEventListener('mouseover', rateMouseOver);
            i.addEventListener('mouseleave', rateMouseLeave);
            i.addEventListener('click', rateClick);
        });
    }
};

function toggleModal(id, classAnimation = '-translate-y-full') {
    let modal = document.getElementById(id);

    modal.classList.toggle(classAnimation);
}

function fileChanged(el) {
    document.getElementById('file-name').value = el.files[0].name;
}

function rateMouseOver(e) {
    rateMouseLeave();

    let cur = e.currentTarget;

    do {
        cur.classList.add('active');
    } while (cur = cur.previousElementSibling);
}

function rateMouseLeave() {
    document.getElementById('rating').querySelectorAll('i').forEach((i, index) => {
        if (index > ratingNum - 1) {
            i.classList.remove('active');
        }
    });
}

function rateClick(e) {
    let cur = e.currentTarget;

    ratingNum = [...cur.parentNode.children].indexOf(cur) + 1;
}
