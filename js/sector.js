let sector = document.querySelector('#sector');
let btnSector = document.querySelector('#btnSector');

let checkInput = () => {
    if (sector.value != '') btnSector.disabled = false;  
    else btnSector.disabled = true;
}

sector.addEventListener('keydown', checkInput);