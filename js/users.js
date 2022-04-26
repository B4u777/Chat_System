 const searchBar = document.querySelector(".search input"),
searchIcon = document.querySelector(".search button"),
usersList = document.querySelector(".users-list");
 
/* var searchBar=$(".search input").html();
var searchIcon=$(".search button").html();
var userList=$(".users-list").html();
 */

/* $(".search button").onclick = ()=>{
  $(".search input").toggle("show");
  $(".search button").toggle("active");
  $(".search input").focus();
  if($(".search input").contains("active")){
    $(".search input").val() = "";
    $(".search input").remove("active");
  }
}

$(".search input").onkeyup = ()=>{
  var searchTerm = $(".search input").val();
  if(searchTerm != ""){
    $(".search input").add("active");
  }else{
    $(".search input").remove("active");
  }
  $.ajax({
    type: "post",
    url: "search.php",
    data: "searchTerm=" + searchTerm,
    contentType:"application/x-www-form-urlencoded",
    processData: false,
    dataType: "json",

    success: function (data){
      $(".users-list").html(data);

    }
  })
}

setInterval(() =>{
  $.ajax({
    type: "get",
    url: "UserList.php",
    processData: false,
    dataType: "json",

    success: function (data){
      if(!$(".search input").contains("active")){
        $(".users-list").html(data);
      }

    }
  })
}, 500);

 */

searchIcon.onclick = ()=>{
  searchBar.classList.toggle("show");
  searchIcon.classList.toggle("active");
  searchBar.focus();
  if(searchBar.classList.contains("active")){
    searchBar.value = "";
    searchBar.classList.remove("active");
  }
} 

 searchBar.onkeyup = ()=>{
  let searchTerm = searchBar.value;
  if(searchTerm != ""){
    searchBar.classList.add("active");
  }else{
    searchBar.classList.remove("active");
  }
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "search.php", true);
  xhr.onload = ()=>{
    if(xhr.readyState === XMLHttpRequest.DONE){
        if(xhr.status === 200){
          let data = xhr.response;
          usersList.innerHTML = data;
        }
    }
  }
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send("searchTerm=" + searchTerm);
} 

 setInterval(() =>{
  let xhr = new XMLHttpRequest();
  xhr.open("GET", "UserList.php", true);
  xhr.onload = ()=>{
    if(xhr.readyState === XMLHttpRequest.DONE){
        if(xhr.status === 200){
          let data = xhr.response;
          if(!searchBar.classList.contains("active")){
            usersList.innerHTML = data;
          }
        }
    }
  }
  xhr.send();
}, 500);
 
































