function logar() {
      var login = _('usuario').value;      
      var senha = _('senha').value;

      $.ajax({
            cache: false,
            type: "POST",
            url: "login.php",
            data:{login:login, senha:senha},
            success:function(data){
                  console.log(data);
                  if (data == 'sucesso') {
                        msgSucesso('Logado', 3000);
                        location.href = 'home.php';
                  } 
                  else {
                        _('senha').value = '';
                        msgErro('Usuário ou Senha Inválidos', 3000);
                  }
                  
            },
            error: function(data){
                  msgErro('Usuário ou Senha Inválidos', 3000);
            }
      });    
}