
<style>


   .slider_wrapper{
      padding: 0 20px;
      max-width: 1240px;
      margin: 0 auto;
     
   }
   .splide__arrow{
      opacity: 1;
      width: 2.5rem;
      height: 2.5rem;
      background: #fbc531;
   }
   .splide__pagination
   {
      bottom: -1.5rem;
   }
.slider_wrapper .splide__pagination__page.is-active
{
 opacity: 1;
   background-color: #fbc531;
}
@media screen and (min-width: 640px)
{
.slider_wrapper .splide{
padding: 0 4rem;
}

</style>

<div class="slider_wrapper">

<div class="splide mt-3 mb-4">
   <div class="splide__track">
       <div class="splide__list">
           <div class="splide__slide">
               <div class="img_box">
                   <img src="{{ asset('frontend/img/5.png') }}" style="width: 230px; height: 230px;">
               </div>
           </div>
           <div class="splide__slide">
               <div class="img_box">
                   <img src="{{ asset('frontend/img/8.png') }}" style="width: 230px; height: 230px;">
               </div>
           </div>
           <div class="splide__slide">
               <div class="img_box">
                   <img src="{{ asset('frontend/img/3.png') }}" style="width: 230px; height: 230px;">
               </div>
           </div>
           <div class="splide__slide">
               <div class="img_box">
                   <img src="{{ asset('frontend/img/4.png') }}" style="width: 230px; height: 230px;">
               </div>
           </div>
           <div class="splide__slide">
               <div class="img_box">
                   <img src="{{ asset('frontend/img/5.png') }}" style="width: 230px; height: 230px;">
               </div>
           </div>
           <div class="splide__slide">
               <div class="img_box">
                   <img src="{{ asset('frontend/img/3.png') }}" style="width: 230px; height: 230px;">
               </div>
           </div>
           <div class="splide__slide">
               <div class="img_box">
                   <img src="{{ asset('frontend/img/1.png') }}" style="width: 230px; height: 230px;">
               </div>
           </div>
           <div class="splide__slide">
               <div class="img_box">
                   <img src="{{ asset('frontend/img/2.png') }}" style="width: 230px; height: 230px;">
               </div>
           </div>
           <div class="splide__slide">
               <div class="img_box">
                   <img src="{{ asset('frontend/img/6.png') }}" style="width: 230px; height: 230px;">
               </div>
           </div>
       </div>
   </div>
</div>
</div>
<br>


