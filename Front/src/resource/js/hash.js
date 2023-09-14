import {userInfo} from './component.js';

window.addEventListener('hashchange', loadContentBasedOnHash);

function loadContentBasedOnHash() {
    const hash = window.location.hash;
        if (hash === '#1') {
            document.getElementById('body').innerHTML= `
            <div class="container">
                 <div class="row border border-4 border-info rounded-3 mt-5" style="font-size: 25px">
                 ${userInfo()}
               </div>
            </div>

            `;
        }
        else if (hash === '#2') {
            console.log(2);
        }
}
