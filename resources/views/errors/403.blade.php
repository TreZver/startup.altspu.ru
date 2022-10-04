@extends('layouts.main')
@section('content')
<div class="col-lg-7 mx-auto mb-5">
   <div class="row">
      <div class="col-4">
         <div class="ratio ratio-1x1">
            <object
               type="image/svg+xml"
               data="/svg/number-4.svg">
            </object>
         </div>
      </div>
      <div class="col-4">
         <div class="ratio ratio-1x1">
            <object
               type="image/svg+xml"
               data="/svg/number-0.svg">
            </object>
         </div>
      </div>
      <div class="col-4">
         <div class="ratio ratio-1x1">
            <object
               type="image/svg+xml"
               data="/svg/number-3.svg">
            </object>
         </div>
      </div>
   </div>
   <div class="row">
      <div class="display-2 col-12 text-center">
         <span id="text"></span>
      </div>
   </div>
</div>
 
<script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.12/typed.min.js"></script>
<script>

   document.addEventListener("DOMContentLoaded", ()=>{
      function TypedRun(){
         var options = {
            strings: [
               'HTTP 403 Forbidden'
               ,'Доступ запрещён'
            ],
            typeSpeed: 55,
            backSpeed: 50
         };
         var typed = new Typed('#text', options);
      }
 
      $(function(){
         TypedRun();
      });

   });
</script>
@endsection