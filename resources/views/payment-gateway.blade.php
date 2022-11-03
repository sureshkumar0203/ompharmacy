<div class="about-area mtb-50">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-sm-12">
        <div class="entry-content">
          <div style="text-align:center;">
           <img src="{{ asset('public/images/ajax-loader.gif') }}">
           <h2 style="color:#666;">
             Please Wait....<br />
             Please do not refresh the page while we're redirecting you to Payment.
           </h2><br /><br />
           
            <form method="POST" name="frm_usr_payment" id="frm_usr_payment" action="user-payment-process">
            <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />


            </form>
		 <script type="text/javascript">
          document.frm_usr_payment.submit();
         </script>
         </div>
        </div>
      </div>
    </div>
  </div>
</div>
