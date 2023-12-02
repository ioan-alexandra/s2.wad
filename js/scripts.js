(function () {
  let onpageLoad = localStorage.getItem("theme") || "";
  let element = document.body;
  element.classList.add(onpageLoad);
})();



var modal = document.getElementById("myModal");

// Get the buttons that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];
btn.onclick = function () {
  modal.style.display = "block";
};
// When the user clicks on <span> (x), close the modal

span.onclick = function () {
  modal.style.display = "none";
};
// When the user clicks anywhere outside of the modal, close it

window.onclick = function (event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
};



function dark() {
  document.body.classList.toggle("dark-theme");
  let theme = localStorage.getItem("theme");
  if (theme && theme === "dark-theme") {
    localStorage.setItem("theme", "");
  } else {
    localStorage.setItem("theme", "dark-theme");
  }
}

function myFunction() {
  var x = document.getElementById("resp");
  if (x.className === "main-menu") {
    x.className += " responsive";
  } else {
    x.className = "main-menu";
  }
}

function filterPosts(str) {
  var xhttp;
  xhttp = new XMLHttpRequest();
  if (str == "") {
    xhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("data-div").innerHTML = this.responseText;
      }
    };
    xhttp.open("GET", "feedPage.php?all", true);
    xhttp.send();
  } else {
    xhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("data-div").innerHTML = this.responseText;
      }
    };
    xhttp.open("GET", "feedPage.php?label=" + str, true);
    xhttp.send();
  }
}

function filterPostsByDate(to, from) {
  var xhttp;
  xhttp = new XMLHttpRequest();

  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("data-div").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "feedPage.php?to=" + to + "&from=" + from, true);
  xhttp.send();

}

function deletePosts(id) {
  var xhttp;
  xhttp = new XMLHttpRequest();
  var result = confirm("Are you sure you want to delete the post?");
  if (result) {
    xhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("data-div").innerHTML = this.responseText;
      }
    };
    xhttp.open("GET", "feedPage.php?del=" + id, true);
    xhttp.send();
  }
}

function searchKeyPress(e) {
  var searchString = document.getElementById('searchString').value;

  var xhttp;
  xhttp = new XMLHttpRequest();
  // look for window.event in case event isn't passed in
  e = e || window.event;
  if (e.keyCode == 13) {
    xhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("data-div").innerHTML = this.responseText;
      }
    };
    xhttp.open("POST", "feedPage.php?search=" + searchString, true);
    xhttp.send();
    return false;
  }
  return true;
}

function toggleShowPassword() {
  var password = document.getElementById("password");
  if (password.type === "password") {
    password.type = "text";
  } else {
    password.type = "password";
  }
}

function logout() {
  var result = confirm("Are you sure you want to log out?");
  if (result) {
    window.location.href = "../formHandlers/logout.php";
  }

  

}function deleteUser(id) 
{
  var xhttp;
  xhttp = new XMLHttpRequest();
  var result = confirm("Are you sure you want to delete the user?");
  if (result) {
    xhttp.onreadystatechange = function () 
    {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("data-div").innerHTML = this.responseText;
      }
    };
    xhttp.open("GET", "adminUsersView.php?del=" + id, true);
    xhttp.send();
  }
}