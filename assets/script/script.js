function sessio(){
    return console.log('hola');
}

function confirmElim(){ //Confirmar eliminació d'usuari
    let x = confirm("Estàs segur que vols eliminar l'usuari?\n Aquesta acció no es pot revertir.");

    if (x){
        return true;
    } else {
        return false;
    }
}

function modificarProf(){ //Confirmar modificació de professor
    let x = confirm("Estàs segur que vols guardar els canvis?");

    if (x){
        return true;
    } else {
        return false;
    }
}

function confirmEstat(){ //Confirmar convi d'estat d'usuari
    let x = confirm("Estàs segur que vols canviar l'estat de l'usuari?");

    if (x){
        return true;
    } else {
        return false;
    }
}

function desmatricular(){ // Confirmar desmatrículació
    let x = confirm('Estàs segur que vols desmatricular-te del curs?');
    return x ?  true :  false;
}

function matricularAlumne(){ // Confirmar matriculació
    let x = confirm('Estàs segur que vols matricularte-te al curs?');
    return x ?  true :  false;
}

function confirmarTancarSessio(){ // Confirmar tancament de sessió
    let x = confirm('Estàs segur que vols tancar la sessió?');
    return x ?  true : false;
}

function confirmElimCurs(){ //Confirmar eliminació d'usuari
    let x = confirm("Estàs segur que vols eliminar el curs?\n Aquesta acció no es pot revertir.");

    if (x){
        return true;
    } else {
        return false;
    }
}