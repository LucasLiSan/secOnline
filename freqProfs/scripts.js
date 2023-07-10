const source = 'data.json';

function loginFreq() {
    getData();
    var senha = document.getElementById('password').value;
    var font = source;
    var result = font.filter(function(obj, index){
        return obj.userID===senha;
    })

    console.log(result);
}

function getData() {
    fetch(source)
    .then(rep => rep.json())
    .then(data => {
        outData(data);
    })
}

function outData(val) {
    console.log(val);
    let html = '';

    val.forEach((ele) => {
        console.log(ele);
        html += `<h2 class="name" id="userName">${ele.name} <strong id="lastName">${ele.lastName}</strong></h2>`;
    })
    userName.innerHTML = html;
}