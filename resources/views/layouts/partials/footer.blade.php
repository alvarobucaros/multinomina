
<footer class="site-footer">
    <div class="container">
     <div class="row">
       <div class="col-md-8 col-sm-6 col-xs-12">
        <p class="copyright-text"> 
        @php
          if (!empty(auth()->user()->name)) {
           echo ' Agrupación:  ('.auth()->user()->empresa.') '.config(['constants.NOM_EMPRESA']);
          }
         @endphp
            {{config('constants.EMPRESA')}}
            {{config('constants.NOM_EMPRESA')}}
            Copyright &copy; 20123 All Rights Reserved by <a href="https://www.aortizc.com/" ><img src="/img/logo.png"  width="60" height="20" alt="" srcset=""></a>
         </p>
       </div>
     </div>
   </div>
</footer>