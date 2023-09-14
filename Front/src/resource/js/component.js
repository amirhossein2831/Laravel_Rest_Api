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
            <a class="btn" href='#${customer.id}'><i class="fas fa-eye text-info"></i></a>
            <button class="btn"><i class="fas fa-edit text-success"></i></button>
            <button class="btn"><i class="fas fa-trash text-danger"></i></button>
        </td>
    `;
}

export function userInfo() {
    return `
     <h1 class="mt-4">Customer Information</h1>
        <div class="col-6 ps-4">
            <span class="d-block">Name: sjj</span>
            <span class="d-block">Email:</span>
            <span class="d-block">Type:</span>
            <span class="d-block">PostalCode:</span>
        </div>
        <div class="col-6">
            <span class="d-block">Address:</span>
            <span class="d-block">City:</span>
            <span class="d-block">State:</span>
        </div>

    `;
}

