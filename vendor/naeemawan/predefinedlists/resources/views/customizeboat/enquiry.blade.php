@if ($boat_enquiry)
	<p>User Email: <i>{{ $boat_enquiry->customer->email }}</i></p>
    <p>User Name: <b><i>{{ $boat_enquiry->customer->name }}</i></b></p>
    <p>User Phone Number: <b><i>{{ $boat_enquiry->customer->phone }}</i></b></p>
    <p>Submitted At: <i>{{ $boat_enquiry->created_at }}</i></p>
    <p>Boat Name: <b><i>{{ $boat_enquiry->boat->ltitle }}</i></b></p>
    <p>Boat Customization Details: <b><i>{{ $boat_enquiry->message ?? '' }}</i></b></p>
    <div class="row" id="summary-end">
        <!-- start -->
                <!-- the selected options will be shown here -->
		<!-- end -->
	    <div class="card-footer">
	      <div class="row m-2">
	        <div class="col text-end">
	          <hr/>
	          <p><b>Boat Price</b>: <span class="sub-total">{{ format_price($boat_enquiry->boat->price) }}</span></p>
	          <p><b>Total Price</b>: <span class="sub-total">{{ format_price($boat_enquiry->total_price) }}</span></p>
	          <p><b>Total Price with 5% Vat</b>: <span class="sub-total">{{ format_price($boat_enquiry->vat_total) }}</span></p>
	          <p><b>Paid</b>: <span class="boat-price">{{ format_price($boat_enquiry->paid_amount) }}</span></p>
	          <p><b>Remaining Price</b>: <span class="boat-price">{{ format_price($boat_enquiry->vat_total - $boat_enquiry->paid_amount) }}</span></p>
	        </div>
	      </div>
	    </div>
	  </div>
	</div>
@endif
<style>
.carousel-control-prev {
    top: 80%;
    left: 40%;
}
.carousel-control-next {
    top: 80%;
    left: 50%;
}
.carousel-control-next-icon{
	background-image:none;
}
.carousel-control-prev-icon{
	background-image:none;
}
.custom-boat .carousel-control-next-icon {
    width: 20px;
    height: 20px;
    border: 4px solid #182955;
    border-left: 0;
    border-bottom: 0;
    transform: rotate(45deg);
}
.custom-boat .carousel-control-prev-icon {
    width: 20px;
    height: 20px;
    border: 4px solid #182955;
    border-right: 0;
    border-top: 0;
    transform: rotate(45deg);
}
</style>
