const btnIniciar = document.getElementById("btnIniciar");
const btnExit = document.getElementById("exit");
const telaInicial = document.getElementById("telaInicial");
const menuPrincipal = document.getElementById("menuPrincipal");
const audio = document.getElementById("background");

function fadeIn(audioElement, duration) {
    audioElement.volume = 0;
    const step = 0.01;
    const interval = duration / (1 / step);

    const fadeInterval = setInterval(() => {
    if (audioElement.volume < 1) {
        audioElement.volume = Math.min(audioElement.volume + step, 1);
    } else {
        clearInterval(fadeInterval);
    }
    }, interval);
}

function fadeOut(audioElement, duration) {
    audioElement.volume = 1;
    const step = 0.01;
    const interval = duration / (1 / step);

    const fadeInterval = setInterval(() => {
    if (audioElement.volume > 0) {
        audioElement.volume = Math.max(audioElement.volume - step, 0);
    } else {
        clearInterval(fadeInterval);
    }
    }, interval);
}

btnIniciar.addEventListener("click", () => {
    const bgLayer = document.getElementById("background-layer");

    bgLayer.style.opacity = 0;
    bgLayer.style.backgroundImage = 'url("../../resources/img/backgroundMenu.png")';

    setTimeout(() => {
    bgLayer.style.backgroundPosition = 0;
    
    bgLayer.style.opacity = 1;
    }, 500);
    
    audio.play().then(() => {
    fadeIn(audio, 6000);
    telaInicial.classList.remove("visivel");
    telaInicial.style.opacity = 0;

    menuPrincipal.style.display = "flex";

    setTimeout(() => {
        telaInicial.style.display = "none";
        menuPrincipal.classList.add("visivel");
        menuPrincipal.style.opacity = 1;
    }, 500);
    });
});

btnExit.addEventListener("click", () => {
    const bgLayer = document.getElementById("background-layer");

    bgLayer.style.opacity = 0;
    bgLayer.style.backgroundImage = 'url("../../resources/img/backgroundStart.png")';

    setTimeout(() => {
    bgLayer.style.backgroundPosition = '40px';
    
    bgLayer.style.opacity = 1;
    }, 500);

    fadeOut(audio, 3000);

    setTimeout(() => {
        audio.pause();
        audio.currentTime = 0;
    }, 3000);

    menuPrincipal.classList.remove("visivel");
    menuPrincipal.style.opacity = 0;
    
    telaInicial.style.display = "flex";

    setTimeout(() => {
        menuPrincipal.style.display = "none";
        telaInicial.classList.add("visivel");
        telaInicial.style.opacity = 1;

    }, 500);
});

