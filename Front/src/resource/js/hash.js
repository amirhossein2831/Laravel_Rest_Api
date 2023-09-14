import {userInfo} from './component.js';
import {invoice} from './component.js';


window.addEventListener('hashchange', loadContentBasedOnHash);
restoreState();

function loadContentBasedOnHash() {
    const hash = window.location.hash;
    localStorage.setItem('currentPage', hash);

    if (hash === '#1') {
            document.getElementById('body').innerHTML= `
            <div class="container">
                 <div class="row border border-4 border-info rounded-3 mt-5" style="font-size: 25px">
                 ${userInfo()}
               </div>
            </div>
            <div class="container">
                <div class="row border border-4 border-info rounded-3 mt-3" style="font-size: 25px">
                    <h1 class="mt-2">Customer Invoices</h1>
                    <div class="accordion" id="accordionExample">
                    ${invoice()}
                    ${invoice()}
                    ${invoice()}
                    </div>
                </div>
            </div>
            `;
        }
        else if (hash === '#2') {
            console.log(2);
        }
}
function restoreState() {
    const storedState = localStorage.getItem('currentPage');
    if (storedState) {
        window.location.hash = storedState;
        loadContentBasedOnHash(); // Handle the hash change and load content
    }
}

