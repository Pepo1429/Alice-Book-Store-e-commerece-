src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js";

function hidden(){
    document.getElementById("educ").style.display = 'none';
    document.getElementById("company").style.display = 'none';
}



function mode(organization, check) {       
 
   let name = document.getElementById(organization);
   let opt = document.getElementById(check);
   if (name.style.display === "none" && opt.style.display === "none") {
       name.style.display = "block";

       
   }

   else if (name.style.display === "none" && opt.style.display === "block"){
    name.style.display = "block";
    opt.style.display = "none"


   }
   }
  
function cleaning(){
     document.getElementById("educ").style.display = 'none';
     document.getElementById("company").style.display = 'none';    
}


function loadDoc(check1) {
    let xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
      document.getElementById("adminOptions").innerHTML = this.responseText;
    }
    switch(check1){
        case "appr":
            xhttp.open("GET", "/approvals.php");
            xhttp.send();
            break;
            case "staff":
        xhttp.open("GET", "/staff.php");
        xhttp.send();
        break;
    }
    }

     function getLocation() {
        if(navigator.geolocation) {
         navigator.geolocation.getCurrentPosition( async function(position) {
                console.log(position.coords.latitude, position.coords.longitude)
                lat = position.coords.latitude
                long = position.coords.longitude
               initMap(lat, long);
            })
        }
    }

  function initMap(lat,long) {

     let myOptions = {
        zoom: 9,
        center: { lat: lat, lng: long }
     };
      map = new google.maps.Map(document.getElementById('map'), myOptions),
      // Instantiate a directions service.
    
      markerA = new google.maps.Marker({
        position:  new google.maps.LatLng(lat, long),
        title: "My Location",
        label: "You are Here",
        type:"point",
        icon:"http://maps.google.com/mapfiles/ms/micons/blue.png",
        map: map
      }),
      markerB = new google.maps.Marker({
        position: { lat: 51.507831302, lng: -0.155332712 },
        title: "Alice Book Store",
        label: "Alice Book Store",
        map: map
      });
  
    calculateAndDisplayRoute(markerA.position, markerB.position);
    
  }
  
  function calculateAndDisplayRoute(pointA, pointB) {
    directionsService = new google.maps.DirectionsService,
    directionsDisplay = new google.maps.DirectionsRenderer({
        suppressMarkers: true,
       map: map
    });
    directionsService.route({
      origin: pointA,
      destination: pointB,
      travelMode: google.maps.TravelMode.DRIVING
    }, function(response, status) {
      if (status == google.maps.DirectionsStatus.OK) {
        directionsDisplay.setDirections(response);
      } else {
        window.alert('Directions request failed due to ' + status);
      }
    });
  }
//   function insToArr(){
//     const element = document.getElementById("intro");
//     const element = document.getElementById("intro");
//     const element = document.getElementById("intro");
//     const element = document.getElementById("intro");
//     const element = document.getElementById("intro");

//   }


  let itemArray = [];
  var itemCount = itemArray.length;


function addtoCart(value){
        itemArray.push(value);
        itemCount += 1;
        document.getElementById("itemCount").innerHTML = itemCount;

      //  $.cookie('name', JSON.stringify(itemArray));
        // if (sessionStorage.getItem("autosave")) {
        //     // Restore the contents of the text field
        //   JSON.parse(localStorage.getItem("name"));
        //  } //get them back          }
};

 function sendToCart(){
//console.log(itemArray[1]);
  //  var jsonString = JSON.stringify(itemArray);
if(itemArray.length !== 0 ){
    $.ajax({
        
        type    : 'POST',
        url     : 'cart.php',
        async: true,
        data    : {itemArray:itemArray},
        success : function(response) {
            window.location.href = "cart-list.php";

        }    
        
    });
}
else{
    window.location.href = "cart-list.php";
}

}

// $(document).on('click','#ajaxSend',function(e) {
//     /*Initializing array with Checkbox checked values*/
//     });
// $.ajax({
//      data:  {
//          itemArray:itemArray
//      },
//      type: "post",
//      url: "cart.php",
//      success: function(data){
//           alert(data);
//      }
// });




function deleteCart(){
    itemCount = 0;
    document.getElementById("itemCount").innerHTML = itemCount;
}