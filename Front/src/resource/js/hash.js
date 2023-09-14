window.addEventListener('hashchange', loadContentBasedOnHash);

function loadContentBasedOnHash() {
    const hash = window.location.hash;
        if (hash === '#1') {
            document.getElementById('body').innerHTML= '';
        }
        else if (hash === '#2') {
            console.log(2);
        }
}
