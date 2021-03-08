var currentSection = 0;
mostrarSection(currentSection);

function mostrarSection(n) {
    var x = document.getElementsByClassName("form-section");
    x[n].style.display = "block";

    if (n == 0) {
        document.getElementById('anterior').style.display = "none";
    } else {
        document.getElementById('anterior').style.display = "inline";
    }

    if (n != (x.length - 1)) {
        document.getElementById('registrar').disabled = true;
        document.getElementById('siguiente').disabled = false;
    } else {
        document.getElementById('registrar').disabled = false;
        document.getElementById('siguiente').disabled = true;
    }

}

function sigForm(n) {
    var x = document.getElementsByClassName('form-section');
    x[currentSection].style.display = "none";
    currentSection = currentSection + n;
    console.log(currentSection);
    if (currentSection >= x.length) {
        document.getElementById('form-solicitud').submit();
        return false;
    }

    mostrarSection(currentSection);
}