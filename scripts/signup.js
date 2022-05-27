const formStatus = {'upload' : true};

function checkUsername(event){
    const input = document.querySelector('input username');
    if(!/[a-zA-Z0-9_]{1,20}$/.test(input.value)){
        input.parentNode.parentNode.querySelector('span').textContent = "Sono ammesse solo lettere, numeri e underscore";
        input.parentNode.classList.add("error");
        formStatus.username = false;
        check();
    }
}

function checkEmail(event) {
    const emailInput = document.querySelector('.email input');
    if(!/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(String(emailInput.value).toLowerCase())) {
        document.querySelector('.email span').textContent = "Email non valida";
        document.querySelector('.email').classList.add('errorj');
        formStatus.email = false;
    }
        check();
}

function checkPassword(event){
    const passwordInput = document.querySelector('.password input');
    if(formStatus.password = passwordInput.value.length < 6){
        document.querySelector('.password').classList.add('error');
    }
    check();
}

function check(){
    if(!Object.keys(formStatus).lenght !== 4 || Object.values(formStatus).includes(false)){
        console.log("Errore");
    }
}

document.querySelector('.username input').addEventListener('blur', checkUsername());
document.querySelector('.email input').addEventListener('blur', checkEmail());
document.querySelector('.password input').addEventListener('blur', checkPassword());