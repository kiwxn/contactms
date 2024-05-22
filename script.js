
function list() {
  // Define the URL to fetch data from
  const apiUrl = 'list.php';

  const options = {
    method: 'post', // HTTP method (GET, POST, etc.)
  };

  fetch(apiUrl, options)
    .then(response => {
      if (response.ok) {
        return response.json();
      }
      throw new Error('Network response was not ok.');
    })
    .then(data => {

      contactList.add(data);
    })
    .catch(error => {
      console.error('There was a problem with the fetch operation:', error);
    });

}
function param(obj){
  var id=obj.childNodes[1].innerText;
  var fullname = obj.childNodes[2].innerText;
  var phone = obj.childNodes[3].innerText;
  var email = obj.childNodes[4].innerText;
  location =`contactview.html?id=${id}&fullname=${fullname}&phone=${phone}&email=${email}`;
  
}
var options = {
    valueNames: ['contact_id', 'fullname', 'phone', 'email'],
    item: ' <tr onclick="param(this)"> <td class= "contact_id" style="display:none;" ></td><td class="fullname"></td><td class="phone"></td><td class="email"></td><td class="edit"><button type="button" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-edit"></span> Edit</button> <button class="fab fa-facebook">Remove</button></td></tr >'
    // item: ' <tr> <td class= "contact_id" style="display:none;" ></td><td class="fullname"></td><td class="phone"></td><td class="email"></td><td class="edit"><button class="edit-item-btn">Edit</button></td><td class="remove"><button class="remove-item-btn">Remove</button></td></tr >'
};
{/* <i class="bi bi-pencil"></i> */ }
var idField = $('#contact_id-field'),
    nameField = $('#fullname-field'),
    ageField = $('#phone-field'),
    cityField = $('#email-field'),
    addBtn = $('#add-btn'),
    editBtn = $('#edit-btn').hide(),
    removeBtns = $('.remove-item-btn'),
    editBtns = $('.edit-item-btn');

var contactList = new List('users', options);

$('#search-field').on('keyup', function () {
    var searchString = $(this).val();
    contactList.search(searchString);
});

list()

refreshCallbacks();

addBtn.click(function () {
    contactList.add({
        contact_id: Math.floor(Math.random() * 110000),
        fullname: nameField.val(),
        phone: ageField.val(),
        email: cityField.val()
    });
    clearFields();
    refreshCallbacks();
});

editBtn.click(function () {
    var item = contactList.get('contact_id', idField.val())[0];
    item.values({
        contact_id: idField.val(),
        fullname: nameField.val(),
        phone: ageField.val(),
        email: cityField.val()
    });
    clearFields();
    editBtn.hide();
    addBtn.show();
});

function refreshCallbacks() {
    // Needed to add new buttons to jQuery-extended object
    removeBtns = $(removeBtns.selector);
    editBtns = $(editBtns.selector);

    removeBtns.click(function () {
        var itemId = $(this).closest('tr').find('.contact_id').text();
        contactList.remove('contact_id', itemId);
    });

    editBtns.click(function () {
        var itemId = $(this).closest('tr').find('.contact_id').text();
        var itemValues = contactList.get('contact_id', itemId)[0].values();
        idField.val(itemValues.contact_id);
        nameField.val(itemValues.fullname);
        ageField.val(itemValues.phone);
        cityField.val(itemValues.email);

        editBtn.show();
        addBtn.hide();
    });
}

function clearFields() {
    nameField.val('');
    ageField.val('');
    cityField.val('');
}