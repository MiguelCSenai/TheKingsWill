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
    // Remove as classes para reverter a animação
    document.getElementById("overlay").classList.remove("active");
    document.getElementById("overlayBackground").classList.remove("activeBackground");

    // Restaura pointer-events para "none" enquanto a transição ocorre
    document.getElementById("overlayBackground").style.pointerEvents = "none";
});
