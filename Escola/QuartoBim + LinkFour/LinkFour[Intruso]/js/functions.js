function logout(){
    alert('Você acaba de fazer Logout');
}

function cadastro(){

    var input = document.querySelector("#fone");
    var fone = input.value;

    let msg = '';

    if(fone == null){
        msg += 'Area de Telefone VAZIA!!!';
    }

    var input = document.querySelector("#nome");
    var nome = input.value;
    if(nome == null){
        msg += ('Area de Nome VAZIA!!!');
    }

    var input = document.querySelector("#usuario");
    var usuario = input.value;
    if(usuario == null){
        msg += ('Area de Usuario VAZIA!!!');
    }

    var input = document.querySelector("#senha");
    var senha = input.value;
    if(senha == null){
        msg += ('Area de Senha VAZIA!!!');
    }

    if(msg != ""){
        alert(msg );
        return false;
    }

    return true;

}
