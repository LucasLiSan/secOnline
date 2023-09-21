$(document).ready(function(){
    $("#Bt1").mouseenter(function(){
        $("#request-choice").attr("src", "../db_imgs/_pictures/contract.png");
    });
    $("#Bt1").mouseleave(function(){
        $("#request-choice").attr("src", "../db_imgs/_pictures/test.png");
    });
});

$(document).ready(function(){
    $("#Bt2").mouseenter(function(){
        $("#request-choice").attr("src", "../db_imgs/_pictures/education.png");
    });
    $("#Bt2").mouseleave(function(){
        $("#request-choice").attr("src", "../db_imgs/_pictures/test.png");
    });
});

$(document).ready(function(){
    $("#Bt3").mouseenter(function(){
        $("#request-choice").attr("src", "../db_imgs/_pictures/school-bag.png");
    });
    $("#Bt3").mouseleave(function(){
        $("#request-choice").attr("src", "../db_imgs/_pictures/test.png");
    });
});

$(document).ready(function(){
    $("#Bt4").mouseenter(function(){
        $("#request-choice").attr("src", "../db_imgs/_pictures/biology.png");
    });
    $("#Bt4").mouseleave(function(){
        $("#request-choice").attr("src", "../db_imgs/_pictures/test.png");
    });
});

$(document).ready(function(){
    $("#Bt5").mouseenter(function(){
        $("#request-choice").attr("src", "../db_imgs/_pictures/scholarship.png");
    });
    $("#Bt5").mouseleave(function(){
        $("#request-choice").attr("src", "../db_imgs/_pictures/test.png");
    });
});

$(document).ready(function(){
    $("#Bt6").mouseenter(function(){
        $("#request-choice").attr("src", "../db_imgs/_pictures/desk-chair.png");
    });
    $("#Bt6").mouseleave(function(){
        $("#request-choice").attr("src", "../db_imgs/_pictures/test.png");
    });
});

document.getElementById("Bt1").addEventListener("click", function() {
    // Enviar uma solicitação AJAX para o servidor PHP para gerar o documento
    // Você pode passar os parâmetros necessários, como o ID do aluno, na solicitação.
    // Certifique-se de ajustar isso de acordo com a sua estrutura de dados no banco.
    var alunoID = 1; // Exemplo de ID do aluno
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "gerar_documento.php?alunoID=" + alunoID, true);
    xhr.send();
});