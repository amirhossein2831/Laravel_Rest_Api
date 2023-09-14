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
