// Pega o input pelo ID
const input = document.getElementById('player');
const btnLeft = document.getElementById('btnLeft');
const btnRight = document.getElementById('btnRight');

if (!input.value) {
    input.value = 1;
    btnLeft.style.opacity = 0;

}
function menos(event) {
    event.preventDefault();
    let value = parseInt(input.value);
    if (value > 1) {
        input.value = value - 1;
            if (input.value > 1) {
    
                btnLeft.style.opacity = 1;
                btnRight.style.opacity = 1;
                
            }else{
    
                btnLeft.style.opacity = 0;
    
            }
        
    }
}

function mais(event) {
    event.preventDefault();
    let value = parseInt(input.value);
    if (value < 3) {
        input.value = value + 1;
        if (input.value < 3) {

            btnLeft.style.opacity = 1;
            btnRight.style.opacity = 1;
            
        }else{

            btnRight.style.opacity = 0;

        }
    }
}

