//Login

    //Identificar botones
    const signUpButton = document.getElementById('signUp');
    const signInButton = document.getElementById('signIn');
    const container = document.getElementById('container');
    //Desplegar
    signUpButton.addEventListener('click', () => {
        container.classList.add("right-panel-active");
    });
    //Devolver
    signInButton.addEventListener('click', () => {
        container.classList.remove("right-panel-active");
    });