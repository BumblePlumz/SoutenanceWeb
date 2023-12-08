document.addEventListener("DOMContentLoaded", ()=>{
    const FORM_CONTACT = document.getElementById("contact-form");
    const BTN_FORM_CONTACT = document.getElementById("btn-form");
    const FORM_CONNECT = document.getElementById("connect-form");
    const BTN_FORM_CONNECT = document.getElementById("btn-connect");

    BTN_FORM_CONTACT.addEventListener("click", (e)=>{
        FORM_CONTACT.submit();
    })
    BTN_FORM_CONNECT.addEventListener("click", (e) =>{
        FORM_CONNECT.submit();
    })

    const hearts = querySelectorAll("");
})

function sendHome(){
    window.location.href="https://home.bumblefamily.fr";
}
