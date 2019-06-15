function _(el){
    return document.getElementById(el);
}

function msgErro(msg, time) {
  $("#erro").show("fast");
  jQuery("#msgErro").html(msg);
  $("html,body").animate({
    scrollTop: $("#erro").offset().top
},"500");
  setTimeout(function() {
      $("#erro").fadeOut("slow");}, time);
}

function msgSucesso(msg, time) {
  $("#sucesso").show("fast");
  jQuery("#msgSucesso").html(msg);
  $("html,body").animate({
    scrollTop: $("#sucesso").offset().top
},"500");
  setTimeout(function() {
      $("#sucesso").fadeOut("slow");}, time);
}

function msgAviso(msg, time) {
  $("#aviso").show("fast");
  jQuery("#msgAviso").html(msg);
  $("html,body").animate({
    scrollTop: $("#aviso").offset().top
},"500");
  setTimeout(function() {
      $("#aviso").fadeOut("slow");}, time);
}

var menu = "#menu-dashboard";
var newMenu = function(nmenu,title){
    $(menu).toggleClass('active');
    $(nmenu).toggleClass('active');
    menu = nmenu;
    $('.page-header').html(title);
}

var loadDash = function(){
    $('#content-data').load('dash.php');
}

var deleteModelo = function(id){
    var ctz = confirm('Apagar Modelo?');
    if(ctz == true){
        $.ajax({
            url: 'actions/deleteModelo.php',
            type: 'POST',
            data: {id: id},
            success:function(data){
                $('#content-data').load('certificates.php');
                newMenu('#menu-certificados','Modelos de Certificado');
            }
        });
    }
}

var viewModelo = function(id){
    $('#content-data').load('viewModeloCertificado.php',{id:id});
}

$(document).ready(function(){
    $.ajaxSetup({
        cache: false
    });
    $(document).on('click','#menu-certificados',function(){
        $('#content-data').load('certificates.php');
        newMenu('#menu-certificados','Modelos de Certificado');
        return false;
    });
    $(document).on('click', '#menu-dashboard', function() {
        $('#content-data').load('dash.php');
        newMenu('#menu-dashboard','Início');
        return false;
    });
    $(document).on('click', '#menu-users', function() {
        $('#content-data').load('pages/users.php');
        newMenu('#menu-users','Usuários');
        return false;
    });

    $(document).on('submit','#form-cert',function(event){

        event.preventDefault();
        var fd = new FormData();
        fd.append('modelo',$('#modelo').val());
        fd.append('tipo',$('#tipo').val());
        fd.append('importacao',$('#importacao').prop('files')[0]);

        if ($('#importacao').prop('files')[0] == null){
            $.alert({
                title: 'Atenção',
                content: 'Arquivo de importação não selecionado'
            });
            return;
        }

        var tipo = $('#tipo').val();

        //loading
        $('body').loading({
            message:'Carregando...'
        });

        $.ajax({
            url:'actions/proImp.php',
            type:'POST',
            data:fd,
            dataType:"JSON",            
            contentType: false,
            cache:false,
            processData: false,
            success:function(data){

                console.log(data);

                if(data.sucesso == 1){
                    $('body').loading('stop');
                    if (tipo == 'lote'){
                        // window.open('/docert/actions/download.pdf');
                        window.open('https://tron-edu.com/docert/actions/download.pdf');
                    }else if(tipo == 'individual'){
                        // window.open('/docert/actions/certificados.zip');
                        window.open('https://tron-edu.com/docert/actions/certificados.zip');
                    }

                }

                if(data.erro){
                 if(data.erro.ERRO_EXT){
                    $.alert({
                        title: 'Erro',
                        content: 'Arquivo no formato errado'
                    });
                }
            }
        },
        error: function(error) {
            console.log(error);
        }
    });
        return false;
    });

    $(document).on('submit', '#form-modelo', function(event) {
        event.preventDefault();
        var fd = new FormData();
        fd.append('fundo',$('#fundo').prop('files')[0]);
        fd.append('nome',$('#nome').val());
        fd.append('campos',$('#campos').val());
        fd.append('texto', $('#texto').val());

        if ($('#id').val()) {fd.append('id',$('#id').val())};

        $.ajax({
            url:'receptor.php',
            type:'POST',
            data: fd,
            dataType:'JSON',
            success: function(data){
                if(data.success == 'ok'){
                    $('#new-modelo').modal('hide');
                    $.alert({
                        title: 'Sucesso',
                        content: 'Novo Modelo Salvo!'
                    });
                    setTimeout(function(){ 
                        $('#content-data').load('certificates.php');
                        newMenu('#menu-certificados','Modelos de Certificado');
                    }, 1000);
                }
            },
            contentType: false,
            cache:false,
            processData: false
        });
        return false;
    });

    $(document).on('click','#btn_novo_modelo',function(){
        $('.form-novo-modelo').show('fast');
        tinymce.init({selector:'#texto'});
    });

    $(document).on('click','#cancel-alt-modelo',function(){
        $('#content-data').load('certificates.php');
    })


    $(document).on('submit', '#form-alt-modelo', function(event) {
        event.preventDefault();
        var fd = new FormData();
        fd.append('fundo',$('#fundo').prop('files')[0]);
        fd.append('nome',$('#nome').val());
        fd.append('campos',$('#campos').val());
        fd.append('texto', $('#texto').val());
        fd.append('id', $('#id').val());

        $.ajax({
            url:'receptor.php',
            type:'POST',
            data: fd,
            dataType:'JSON',
            success: function(data){
                if(data.success == 'ok'){
                    console.log('line 208');
                    $.alert({
                        title: 'Sucesso',
                        content: 'Dados Salvos!'
                    });
                    $('#content-data').load('certificates.php');
                    newMenu('#menu-certificados','Modelos de Certificado');
                } else {
                    console.log('line 216');
                }
            },
            contentType: false,
            cache:false,
            processData: false
        });
        return false;
    });

});