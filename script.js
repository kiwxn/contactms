
var ids = 0;

function list(page) {
  // Define the URL to fetch data from
  const apiUrl = 'list.php';
  frm = $(".form-control")
  var formData = new FormData();
  if (page == "fav") {
    formData.append('type', "fav");
  }
  else {
    formData.append('type', "contacts");
  }
  const options = {
    method: 'post',
    body: formData
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
function param(obj, page) {
  //pass param to pageview
  obj = obj.parentElement
  if (page == "edit") {
    obj = obj.parentNode
  }
  var id = obj.childNodes[1].innerText;
  var fullname = obj.childNodes[2].innerText;
  var phone = obj.childNodes[3].innerText;
  var email = obj.childNodes[4].innerText;
  // console.log(id,fullname,phone,email,"here")
  if (page == "edit") {
    console.log(obj)
    ids = id
    rm('addfav.php')
    // location = `edit.html?id=${id}&fullname=${fullname}&phone=${phone}&email=${email}`;

  }
  else {
    location = `contactview.html?id=${id}&fullname=${fullname}&phone=${phone}&email=${email}`;
  }
}
function viewInsert() {
  var u = window.location.href;
  var u = u.slice(u.indexOf('?'));
  q = new URLSearchParams(u);
  for (const [key, value] of q.entries()) {
    if (key == "id") {
      ids = parseInt(value);
    }
    if (key == "fullname") {
      $("#fullname").text(value)
    }
    if (key == "email") {
      $("#email").text(value)
    }
    if (key == "phone") {
      $("#phone").text(value)
    }
  }
}
function editInsert() {
  var u = window.location.href;
  var u = u.slice(u.indexOf('?'));
  q = new URLSearchParams(u);
  for (const [key, value] of q.entries()) {
    if (key == "id") {
      ids = parseInt(value);
    }
    if (key == "fullname") {
      $("#Ename").val(value)
      window.parent.document.title = value
      $("#Efullname").text(value)
    }
    if (key == "email") {
      $("#EemailAddress").val(value)
    }
    if (key == "phone") {
      $("#Ephone").val(value)
    }
  }
}
function rm(url) {
  var formData = new FormData();
  formData.append('id', ids);
  const options = {
    method: 'post',
    body: formData
  };
  console.log(url,formData)
  fetch(url, options)
    .then(response => {
      if (response.ok) {
        return response.json();
      }
      throw new Error('Network response was not ok.');
    })
    .then(data => {
      if (data == ids) {
        window.parent.$('#myModal').show()
      }
    })
    .catch(error => {
      console.error('There was a problem with the fetch operation:', error);
    });

}

function save(url) {

  frm = $(".form-control")
  name = frm[0].value
  email = frm[1].value
  phone = frm[2].value
  var formData = new FormData();
  formData.append('id', ids);
  formData.append('fullname', name)
  formData.append('email', email);
  formData.append('phone', phone);

  const options = {
    method: 'post',
    body: formData
  };
  if (url == "view") {
        
        location = `contactview.html?id=${ids}&fullname=${name}&phone=${phone}&email=${email}`;
      }

  fetch(url, options)
    .then(response => {
      if (response.ok) {
        
        return response.json();
        
      }
      throw new Error('Network response was not ok.');
    })
    .then(data => {
      // if (url == "update.php") {
        
      //   // location = `contactview.html?id=${ids}&fullname=${name}&phone=${phone}&email=${email}`;
      // }
      location ="contacts.html"
      // `contactview.html?id=${ids}&fullname=${name}&phone=${phone}&email=${email}`;
    })
    .catch(error => {
      console.error('There was a problem with the fetch operation:', error);
    });

}

$("#fav").click(() => {
  rm('addfav.php')
})
$("#favEdit").click(() => {
  rm('addfav.php')
})
$("#cid1").click(() => {
  var u = window.location.href;
  var u = u.slice(u.indexOf('?'));
  location = `edit.html${u}`;
})
function modalFav(){
  window.parent.$('#myModal3').show()
  setTimeout(function () {
    window.parent.$('#myModal3').hide()
  }, 3000);
}
$("#cid2").click(() => {

  rm('http://localhost/delete.php')

  setTimeout(function () {
    window.parent.$('#myModal').hide()
    location="contacts.html"
  }, 3000);
})
$("#update").click(() => {
  window.parent.$('#myModal2').show()
  setTimeout(function () {
    window.parent.$('#myModal2').hide()
  }, 3000);
  setTimeout(function () {
    save("view")
  }, 4000);
  
})
function refresh(page) {
    $('.responsive-iframe').attr('src', page);
}
function action(a, obj) {
  if (a == 'del') {
    ids = obj.parentElement.parentElement.childNodes[1].innerText
    rm('http://localhost/delete.php')
    setTimeout(function () {
      window.parent.$('#myModal').hide()
      location.reload()
    }, 3000);

  }
  else if (a == 'edit') {
    param(obj, a)
  }

}

var options = {
  valueNames: ['contact_id', 'fullname', 'phone', 'email'],
  item: ' <tr> <td class= "contact_id" style="display:none;" ></td><td class="fullname" onclick="param(this)"></td><td class="phone" onclick="param(this)"></td><td class="email" onclick=param(this)></td><td class="edit"><a onclick=action("edit",this);modalFav()><i class="bi bi-star h3"></i></button> <a onclick=action("del",this)> <i class="bi bi-trash h3"></i> </a></td></tr>',
  fuzzySearch: {
    searchClass: "fuzzy-search",
    location: 0,
    distance: 100,
    threshold: 0.4,
    multiSearch: true
  }
};

contactList = new List('users', options);
viewInsert()
document.getElementById("search-field").addEventListener("keyup", displayDate(this));

function displayDate(obj) {
  console.log(obj)
  var searchString = $(obj).val();
  listObj.search(searchString);
}
  
