document.getElementById('numAlumnos1').addEventListener('keyup', function() {

    var alumnos1 = document.getElementById('numAlumnos1').value;
    var alumnos2 = document.getElementById('numAlumnos2').value;
    alumnos1 = parseInt(alumnos1);

    if (alumnos2 == '') alumnos2 = 0;

    alumnos2 = parseInt(alumnos2);
    var suma = alumnos1 + alumnos2;
    document.getElementById('totalAlumn').value = suma;
})



document.getElementById('numAlumnos2').addEventListener('keyup', function() {

    var alumnos1 = document.getElementById('numAlumnos1').value;
    var alumnos2 = document.getElementById('numAlumnos2').value;
    alumnos1 = parseInt(alumnos1);

    if (alumnos2 == '') alumnos2 = 0;

    alumnos2 = parseInt(alumnos2);
    var suma = alumnos1 + alumnos2;
    document.getElementById('totalAlumn').value = suma;
})

document.getElementById('numAlumnos1').addEventListener('click', function() {

    var alumnos1 = document.getElementById('numAlumnos1').value;
    var alumnos2 = document.getElementById('numAlumnos2').value;
    alumnos1 = parseInt(alumnos1);

    if (alumnos2 == '') alumnos2 = 0;

    alumnos2 = parseInt(alumnos2);
    var suma = alumnos1 + alumnos2;
    document.getElementById('totalAlumn').value = suma;
})

document.getElementById('totalAlumn').addEventListener('click', function() {

    var alumnos1 = document.getElementById('numAlumnos1').value;
    var alumnos2 = document.getElementById('numAlumnos2').value;
    alumnos1 = parseInt(alumnos1);

    if (alumnos2 == '') alumnos2 = 0;

    alumnos2 = parseInt(alumnos2);
    var suma = alumnos1 + alumnos2;
    document.getElementById('totalAlumn').value = suma;
})