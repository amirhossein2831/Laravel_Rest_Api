export function tableRecord(customer,i){
    return`
      <th scope="row">${i++}</th>
      <td>${customer.name}</td>
      <td>${customer.email}</td>
      <td>${customer.address}</td>
      <td>${customer.city}</td>
      <td>${customer.state}</td>
      <td>${customer.type}</td>
      <td>${customer.postalCode}</td>
       <td>
            <a class="btn" href='#show:${customer.id}'><i class="fas fa-eye text-info"></i></a>
            <button class="btn"><i class="fas fa-edit text-success"></i></button>
            <button class="btn"><i class="fas fa-trash text-danger"></i></button>
        </td>
    `;
}

export function userInfo(user) {
    return `
     <h1 class="mt-4">Customer Information</h1>
        <div class="col-6 ps-4">
            <span class="d-block">Name: ${user.name}</span>
            <span class="d-block">Email: ${user.email}</span>
            <span class="d-block">Type: ${user.type}</span>
            <span class="d-block">PostalCode: ${user.postalCode}</span>
        </div>
        <div class="col-6">
            <span class="d-block">Address: ${user.address}</span>
            <span class="d-block">City: ${user.city}</span>
            <span class="d-block">State: ${user.state}</span>
        </div>

    `;
}

export function invoice(id,amount,status,billedDate,paidDate) {
    return `
        <div class="accordion-item mb-3">
            <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse${id}">
                invoice ${id}
                </button>
            </h2>
            <div id="collapse${id}" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                        <span class="d-block my-2">Name:</span>
                        <span class="d-block my-2">Amount: ${amount}</span>
                        <span class="d-block my-2">Status: ${status}</span>
                        <span class="d-block my-2">billedDate: ${billedDate}</span>
                        <span class="d-block my-2">PaidDate: ${paidDate}</span>
                        <span class="d-block my-2">InvoiceId: ${id}</span>
                </div>
            </div>
        </div>
    `;
}

