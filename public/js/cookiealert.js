const button = document.getElementById('acceptCookie-button')
const modal = document.getElementById('modal');

button.addEventListener('click', (e) => {
    if(document.cookie.indexOf('acceptedCookieTerms') == -1) {
        document.cookie = "acceptedCookieTerms=true";
        modal.style.display = "none";
    }
})
