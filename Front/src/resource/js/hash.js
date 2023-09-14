import {userInfo} from './component.js';
import {invoice} from './component.js';


window.addEventListener('hashchange', loadContentBasedOnHash);
window.addEventListener('popstate', handlePopState);

restoreState();

function loadContentBasedOnHash() {
    const hash = window.location.hash;
    localStorage.setItem('currentPage', hash);
    const parts = hash.split(':');
    const method = parts[0];
    const id = parts[1];
    console.log(method)
    if (method && method === '#show') {
        fetchCustomer(id).then(data =>{
            console.log(data)
            let res = '';
            data.data.invoices.forEach(function (i){
              res += invoice(i.id,i.amount,i.status,i.billedDate,i.paidDate) + '\n';
            })
            document.getElementById('body').innerHTML=`
            <div class="container">
                 <div class="row border border-4 border-info rounded-3 mt-5" style="font-size: 25px">
                 ${userInfo(data.data)}
               </div>
            </div>
            <div class="container">
                <div class="row border border-4 border-info rounded-3 mt-3" style="font-size: 25px">
                    <h1 class="mt-2">Customer Invoices</h1>
                    <div class="accordion" id="accordionExample">
                    ${res}
                    </div>
                </div>
            </div>`;
        })
    }
}
function restoreState() {
    const storedState = localStorage.getItem('currentPage');
    if (storedState) {
        window.location.hash = storedState;
        loadContentBasedOnHash();
    }
}
// Function to restore the previous content
function restorePreviousContent() {
    fetch('http://localhost:63342/Rest_Api/Front/src/resource/html/customers.html')
        .then(response => response.text())
        .then(newHTML => {
            document.open();
            document.write(newHTML);
            document.close();
        })
        .catch(error => {
            console.error('Error fetching new page content:', error);
        });
}

function handlePopState(event) {
    const hash = window.location.hash;

    if (!hash) {
        restorePreviousContent()
    }
}

function fetchCustomer(id) {
    return fetch('http://localhost:8000/api/v1/customers/' + id +'?includeInvoices=true')
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .catch(error => {
            console.error('Error:', error);
            throw error;
        });
}
