import './bootstrap';

document.addEventListener("DOMContentLoaded",(function(){const navbarMenuBtn=document.querySelector(".navbar-menu-btn"),navbarMenuList=document.querySelector(".navbar-menu-list");navbarMenuBtn.addEventListener("click",(function(){window.innerWidth>=320&&window.innerWidth<=997&&navbarMenuList.classList.toggle("active")})),document.addEventListener("click",(function(event){const target=undefined;event.target.closest(".navbar-menu")||navbarMenuList.classList.remove("active")}))}));
import 'pusher-js'
import './echo.js'
window.Pusher = require('pusher-js');

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: process.env.MIX_PUSHER_APP_KEY,
    cluster: process.env.MIX_PUSHER_APP_CLUSTER,
    encrypted: true
});