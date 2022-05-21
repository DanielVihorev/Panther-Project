const NavSlide = ()=>{
    const burger = document.querySelector('.burger');
    const nav = document.querySelector('.vihorev-links');
    const navLinks = document.querySelectorAll('.vihorev-links li');

    //Toggles The Nav Bar 
    burger.addEventListener('click', () =>{
        nav.classList.toggle('vihorev-active');

    
        // Animate Links 
        navLinks.forEach((link, index) => {
            if(link.style.animation){
                link.style.animation = ''
            }
            else{
            link.style.animation = `navLinkFade 0.5s ease forwards ${index / 7}s`;
            }
            //console.log(index / 5 );
        });
    });
    //Burger Animation 
    burger.classList.toggle('toggle');
}

NavSlide();