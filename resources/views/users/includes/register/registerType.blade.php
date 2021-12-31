<style type="text/css">
  
/* Full-width input fields */





/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  left: 0;
  top: 0;
  right: 6
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */

}

/* The Close Button (x) */
.close {
  position: absolute;
  right: 25px;
  top: 0;
  color: #000;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: red;
  cursor: pointer;
}

/* Add Zoom Animation */
.animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)} 
  to {-webkit-transform: scale(1)}
}
  
@keyframes animatezoom {
  from {transform: scale(0)} 
  to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
.social-icons {
    list-style: none;
    padding: 0;
    margin: 0;
}

.social-icons > li {
    display: inline-block;
}

.social-icons > li > a {
    background: #f5f5f5;
    display: block;
    margin: 0 8px 8px 0;
    text-align: center;
    line-height: 25px;
    font-size: 25px;
    height: 150px;
    width: 220px;
    color: #777777;
}

.social-icons > li > a:hover,
.social-icons > li > a:focus {
    background: #27CBC0;
    color: #ffffff;
}



.social-icons-circle > li > a {
    border-radius: 70%;
}

/* --- [ Social Icons Colored ] --- */

.social-icons-colored > li > a {
    color: #ffffff;
}

.social-icons-colored > li > a:hover,
.social-icons-colored > li > a:focus {
    opacity: 0.85;
}

/* --- [ Social Icons Simple ] --- */
.bg-facebook {
    background-color: #3b5998 !important;
}

.bg-twitter {
    background-color: #00aced !important;
}

.bg-google {
    background-color: #dd4b39 !important;
}

.bg-linkedin {
    background-color: #007bb6 !important;
}
</style>

<div id="type_register" class="modal text-center">
   <div class="modal-content animate">
    <div class="imgcontainer">
      <span onclick="document.getElementById('type_register').style.display='none'" class="close" title="Close Modal">&times;</span>
    </div>

    <div class="">
      <p style="height: 20px"></p>
     
<section class="module divider-bottom">
      

        <div class="row">

          <div class="col-sm-12 ">           

            <ul class="social-icons social-icons-colored social-icons-circle m-t-50">
            <li>
                <a href="{{route('register')}}" class="bg-white" style="font-size: 16px;color: black">
                  <img src="{{asset('users/img/home/store.svg')}}" style="height: 100px;width: 90px;margin-top: 5px">
                 <br>
                  {{__('users/auth.boutique')}}
                </a>
            </li>
            <li>
                <a href="{{route('register.ingenieur')}}" class="bg-white" style="font-size: 16px;color: black">
                  <img src="{{asset('users/img/home/proff.svg')}}" style="height: 100px;width: 90px;margin-top: 5px">
                  <br>
                  {{__('users/auth.ingenieur')}}
                </a>
            </li>
            <li>
               	<a href="{{route('register.artisant')}}" class="bg-white" style="font-size: 16px;color: black">
                  <img src="{{asset('users/img/home/artisanatR.png')}}" style="height: 100px;width: 90px;margin-top: 5px">
                  <br>
                  {{__('users/auth.artisant')}}
               	</a>
            </li>
            <li>
                <a href="{{route('register.artisanat')}}" class="bg-white" style="font-size: 16px;color: black">
                  <img src="{{asset('users/img/home/artisanat.png')}}" style="height: 100px;width: 90px;margin-top: 5px">
                 <br>
                  {{__('users/auth.artisanat')}}
                </a>
            </li>
            <li>
                <a href="{{route('register.particulier')}}" class="bg-white" style="font-size: 16px;color: black">
                  <img src="{{asset('users/img/home/artisan.png')}}" style="height: 100px;width: 90px;margin-top: 5px">
                 <br>
                  {{__('users/auth.particulier')}}
                </a>
            </li>
            <li>
                <a href="{{route('register.clients')}}" class="bg-white" style="font-size: 16px;color: black">
                  <img src="{{asset('users/img/home/cliente.svg')}}" style="height: 100px;width: 90px;margin-top: 5px">
                 <br>
                  {{__('users/auth.clients')}}
                </a>
            </li>
             
            </ul>

          </div>

        </div><!-- .row -->


    </section>
        

       
      
    </div>

   
  </div>
</div>

<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
