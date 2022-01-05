const navLinks = document.querySelectorAll(".nav li a");
const path = location.pathname;
navLinks.forEach((nav)=>{
    let value = nav.attributes.path.value;
    if(path == value){
        nav.classList.add("active");
    }
})
