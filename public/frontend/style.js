
import Swiper from'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.mjs'


var swiper = new Swiper(".mySwiper", {
    spaceBetween: 35,
    centeredSlides: true,
    autoplay: {
      delay: 2000,
      disableOnInteraction: false,
    },
    speed: 2000,
    pagination: {
        
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });


  let section=document.querySelectorAll('section');
  let navlink = document.querySelectorAll('.navbar a');
  window.onscroll=()=>
  {
    section.forEach(sec=>{
      let top=window.scrollY;
      let offset=sec.offsetTop-150;
      let height=sec.offsetHeight;
      let id=sec.getAttribute('id');
      if(top > offset && top < offset +height){
        navlink.forEach(Links=>{
          Links.classList.remove('active')
          document.querySelector('header nav a[href*='+id+']').classList.add('active')
        })
      }
    })
  }
