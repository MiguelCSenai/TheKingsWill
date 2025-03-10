function ativarTransicao() {
    document.getElementById("overlay").classList.add("active");
    document.getElementById("overlayBackground").classList.add("activeBackground");

    // Deixe a alteração de pointerEvents para depois da transição de opacidade
    setTimeout(() => {
        document.getElementById("overlayBackground").style.pointerEvents = "all";

        clicado = false
        
        if (!clicado) {

            clicado = true;

            document.getElementById("overlay").addEventListener("click", function() {
            
                document.getElementById("overlay").classList.add("fadeOut");
                setTimeout(() => {
                    
                    window.location.href = "/TheKingsWill/php/Lore/lore.php";
            
                }, 680);
    
    
            });
            
        }
        

    }, 2000);
}

document.getElementById("overlayBackground").addEventListener("click", function() {
    
    document.getElementById("overlay").classList.remove("active");
    document.getElementById("overlayBackground").classList.remove("activeBackground");

    document.getElementById("overlayBackground").style.pointerEvents = "none";
});


function details(id) {
    let arma = document.querySelector(`.arma[onclick='details(${id})']`);
    let descricao = arma.querySelector('.descricao');
    let dano = arma.querySelector('.dano');
    let velocidade = arma.querySelector('.velocidade');
    let alcance = arma.querySelector('.alcance');
    let overlay = document.getElementById("backgroundOverlay");

    if (arma.classList.contains("expandido")) {
        arma.classList.remove("expandido");
        overlay.classList.remove("ativo");
            descricao.classList.remove("ativa");
            dano.style.display = "none";
            velocidade.style.display = "none";
            alcance.style.display = "none";
    } else {
        document.querySelectorAll(".arma.expandido").forEach(item => {
            item.classList.remove("expandido");
            item.querySelector(".descricao").classList.remove("ativa");
        });

        arma.classList.add("expandido");
        descricao.classList.add("ativa");
        dano.style.display = "block";
        velocidade.style.display = "block";
        alcance.style.display = "block";
        overlay.classList.add("ativo");
    }
}
