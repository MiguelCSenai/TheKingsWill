function elemental() {
    let container = document.querySelector('.elemental-container');
    let overlay = document.querySelector('.overlay');

    if (container.classList.contains("expandido")) {
        container.classList.remove("expandido");
        overlay.classList.remove("ativo");
    } else {
        container.classList.add("expandido");
        overlay.classList.add("ativo");
    }
}

