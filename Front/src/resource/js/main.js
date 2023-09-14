import {tableRecord} from './component.js';

fetchCustomers()
    .then(customers => {
        populateTable(customers)
    })
    .catch(error => {
        console.error('Error fetching customers:', error);
    });

function fetchCustomers() {
    return fetch('http://localhost:8000/api/v1/customers')
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

function populateTable(customers) {
    const tbody = document.getElementById('table-body');
    let i = 1;
    customers.data.forEach(customer => {
        const row = document.createElement('tr');
        row.innerHTML = tableRecord(customer, i);
        i++;
        tbody.appendChild(row);
    });
}
