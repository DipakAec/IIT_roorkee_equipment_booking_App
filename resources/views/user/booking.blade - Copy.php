@extends('user.master')
@section('section')
<div id="content-wrapper" class="d-flex flex-column">

<!-- Main Content -->
<div id="content">


    <!-- End of Topbar -->

   <div class="wrapper wrapper-content">
       
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Booking</h5>
                    
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-lg-6">
						@php
						//print_r($equiptment_data);
						@endphp
						<ul>
								<li><h4>Officer/Lab In-charge :- <b>{{ $equiptment_data->incharge_name }}</b></h4></li>
								<li><h4>In-charge Email/Phone :- <b>{{ $equiptment_data->incharge_email }} ({{ $equiptment_data->incharge_phone }})</b></h4></li>
								<li><h4>Location :- <b>{{ $equiptment_data->incharge_email }}</b></h4></li>
								<li><h4>Status :- <b>@if($equiptment_data->status == 0) InActive @else Active @endif</b></h4></li>
								<li><h4>Sample Requirements :- <b>{{ $equiptment_data->sample_requirements }}</b></h4></li>
								<li><h4>Accessories :- </h4>
									<p>{{ $equiptment_data->additional_accessories }}</p>
									</li>
								
                            </ul>
                            
                        </div>
                        <div class="col-lg-6">
                            <img onerror="this.src='https://iicbooking.iitr.ac.in/admin_asset/img/probe_lab_photo.jpg';" src="{{ url('/public/website/equipment/') }}{{ $equiptment_data->image }}" style="width: 100%">
                        </div>
                    </div>
					<div class="row">
					  <div class="col-md-12">
					   <h2 style="color:green; margin-top:80px; margin-bottom:50px;"><center><b>New slots will open on every wednesday at 9 PM.</b></center></h2>
					  </div>
					</div>
					<div class="row">
					   <div class="col-md-12 text-center">
					       <table class="table table-striped table-bordered table-hover slot_list" id="slot_list" style="width:100%; text-align: center">
        <thead>
            <tr>
                <th>Date / Time</th>
                                    <th>Sunday<br>1st,Sep</th>
                                        <th>Monday<br>2nd,Sep</th>
                                        <th>Tuesday<br>3rd,Sep</th>
                                        <th>Wednesday<br>4th,Sep</th>
                                        <th>Thursday<br>5th,Sep</th>
                                        <th>Friday<br>6th,Sep</th>
                                        <th>Saturday<br>7th,Sep</th>
                                </tr>
        </thead>
        <tbody>
                            <tr>
                    <td class="tabheading">9:30AM - 11:00AM</td>
                                                    <td class="slot_td" index="0" color="#DC143C" title="" duration="90" status="holiday" style="background-color:#DC143C; color:#fff; position: relative;" start_time="1725163200" end_time="1725168600">
                                    <div class="desp"><b>Public Holiday</b></div>
                                </td>
                                                            <td class="slot_td" index="6" color="#0000ff" title="User:Diksha Booking-ID:APR-56678" duration="90" status="Booked" style="background-color:#0000ff; color:#fff; position: relative;" start_time="1725249600" end_time="1725255000">
                                    <div class="desp">Booked</div>
                                </td>
                                                            <td class="slot_td" index="12" color="#0000ff" title="User:Irfan Mushtaq Wani Booking-ID:APR-56873" duration="90" status="Booked" style="background-color:#0000ff; color:#fff; position: relative;" start_time="1725336000" end_time="1725341400">
                                    <div class="desp">Booked</div>
                                </td>
                                                            <td class="slot_td" index="18" color="#0000ff" title="User:Jyoti Ranjan Sahoo Booking-ID:APR-57139" duration="90" status="Booked" style="background-color:#0000ff; color:#fff; position: relative;" start_time="1725422400" end_time="1725427800">
                                    <div class="desp">Booked</div>
                                </td>
                                                            <td class="slot_td" index="24" color="#0000ff" title="User:Aaqib Mohammad Mir Booking-ID:APR-57468" duration="90" status="Booked" style="background-color:#0000ff; color:#fff; position: relative;" start_time="1725508800" end_time="1725514200">
                                    <div class="desp">Booked</div>
                                </td>
                                                            <td class="slot_td" index="30" color="#0000ff" title="User:Sunidhi Mishra Booking-ID:APR-57320" duration="90" status="Booked" style="background-color:#0000ff; color:#fff; position: relative;" start_time="1725595200" end_time="1725600600">
                                    <div class="desp">Booked</div>
                                </td>
                                                            <td class="slot_td" index="36" color="#DC143C" title="" duration="90" status="holiday" style="background-color:#DC143C; color:#fff; position: relative;" start_time="1725681600" end_time="1725687000">
                                    <div class="desp"><b>Public Holiday</b></div>
                                </td>
                                            </tr>
                            <tr>
                    <td class="tabheading">11:30AM - 1:00PM</td>
                                                    <td class="slot_td" index="1" color="#DC143C" title="" duration="90" status="holiday" style="background-color:#DC143C; color:#fff; position: relative;" start_time="1725170400" end_time="1725175800">
                                    <div class="desp"><b>Public Holiday</b></div>
                                </td>
                                                            <td class="slot_td" index="7" color="#0000ff" title="User:Anvi Agarwal Booking-ID:APR-56634" duration="90" status="Booked" style="background-color:#0000ff; color:#fff; position: relative;" start_time="1725256800" end_time="1725262200">
                                    <div class="desp">Booked</div>
                                </td>
                                                            <td class="slot_td" index="13" color="#0000ff" title="User:Shardendu Shukla Booking-ID:APR-56629" duration="90" status="Booked" style="background-color:#0000ff; color:#fff; position: relative;" start_time="1725343200" end_time="1725348600">
                                    <div class="desp">Booked</div>
                                </td>
                                                            <td class="slot_td" index="19" color="#0000ff" title="User:Muhammad Imtiaz Hussain Booking-ID:APR-57038" duration="90" status="Booked" style="background-color:#0000ff; color:#fff; position: relative;" start_time="1725429600" end_time="1725435000">
                                    <div class="desp">Booked</div>
                                </td>
                                                            <td class="slot_td" index="25" color="#0000ff" title="User:Jay Sharma Booking-ID:APR-56771" duration="90" status="Booked" style="background-color:#0000ff; color:#fff; position: relative;" start_time="1725516000" end_time="1725521400">
                                    <div class="desp">Booked</div>
                                </td>
                                                            <td class="slot_td" index="31" color="#0000ff" title="User:Rachit Trivedi Booking-ID:APR-57575" duration="90" status="Booked" style="background-color:#0000ff; color:#fff; position: relative;" start_time="1725602400" end_time="1725607800">
                                    <div class="desp">Booked</div>
                                </td>
                                                            <td class="slot_td" index="37" color="#DC143C" title="" duration="90" status="holiday" style="background-color:#DC143C; color:#fff; position: relative;" start_time="1725688800" end_time="1725694200">
                                    <div class="desp"><b>Public Holiday</b></div>
                                </td>
                                            </tr>
                            <tr>
                    <td class="tabheading">2:00PM - 3:30PM</td>
                                                    <td class="slot_td" index="2" color="#DC143C" title="" duration="90" status="holiday" style="background-color:#DC143C; color:#fff; position: relative;" start_time="1725179400" end_time="1725184800">
                                    <div class="desp"><b>Public Holiday</b></div>
                                </td>
                                                            <td class="slot_td" index="8" color="#0000ff" title="User:Pankaj rawat Booking-ID:APR-55147" duration="90" status="Booked" style="background-color:#0000ff; color:#fff; position: relative;" start_time="1725265800" end_time="1725271200">
                                    <div class="desp">Booked</div>
                                </td>
                                                            <td class="slot_td" index="14" color="#0000ff" title="User:Jallu Harishbabu Booking-ID:APR-57039" duration="90" status="Booked" style="background-color:#0000ff; color:#fff; position: relative;" start_time="1725352200" end_time="1725357600">
                                    <div class="desp">Booked</div>
                                </td>
                                                            <td class="slot_td" index="20" color="#0000ff" title="User:Yash Srivastava Booking-ID:APR-56639" duration="90" status="Booked" style="background-color:#0000ff; color:#fff; position: relative;" start_time="1725438600" end_time="1725444000">
                                    <div class="desp">Booked</div>
                                </td>
                                                            <td class="slot_td" index="26" color="#0000ff" title="User:Anand Omar Booking-ID:APR-56627" duration="90" status="Booked" style="background-color:#0000ff; color:#fff; position: relative;" start_time="1725525000" end_time="1725530400">
                                    <div class="desp">Booked</div>
                                </td>
                                                            <td class="slot_td" index="32" color="#0000ff" title="User:Susmit Chitransh Booking-ID:APR-57141" duration="90" status="Booked" style="background-color:#0000ff; color:#fff; position: relative;" start_time="1725611400" end_time="1725616800">
                                    <div class="desp">Booked</div>
                                </td>
                                                            <td class="slot_td" index="38" color="#DC143C" title="" duration="90" status="holiday" style="background-color:#DC143C; color:#fff; position: relative;" start_time="1725697800" end_time="1725703200">
                                    <div class="desp"><b>Public Holiday</b></div>
                                </td>
                                            </tr>
                            <tr>
                    <td class="tabheading">4:00PM - 5:30PM</td>
                                                    <td class="slot_td" index="3" color="#DC143C" title="" duration="90" status="holiday" style="background-color:#DC143C; color:#fff; position: relative;" start_time="1725186600" end_time="1725192000">
                                    <div class="desp"><b>Public Holiday</b></div>
                                </td>
                                                            <td class="slot_td" index="9" color="#0000ff" title="User:Dr. Sachin Tyagi Booking-ID:APR-56583" duration="90" status="Booked" style="background-color:#0000ff; color:#fff; position: relative;" start_time="1725273000" end_time="1725278400">
                                    <div class="desp">Booked</div>
                                </td>
                                                            <td class="slot_td" index="15" color="#0000ff" title="User:Gopal Ji Rai Booking-ID:APR-56682" duration="90" status="Booked" style="background-color:#0000ff; color:#fff; position: relative;" start_time="1725359400" end_time="1725364800">
                                    <div class="desp">Booked</div>
                                </td>
                                                            <td class="slot_td" index="21" color="#0000ff" title="User:Apurba Mahato Booking-ID:APR-56741" duration="90" status="Booked" style="background-color:#0000ff; color:#fff; position: relative;" start_time="1725445800" end_time="1725451200">
                                    <div class="desp">Booked</div>
                                </td>
                                                            <td class="slot_td" index="27" color="#0000ff" title="User:Priya E Booking-ID:APR-57037" duration="90" status="Booked" style="background-color:#0000ff; color:#fff; position: relative;" start_time="1725532200" end_time="1725537600">
                                    <div class="desp">Booked</div>
                                </td>
                                                            <td class="slot_td" index="33" color="#0000ff" title="User:Shakshi Bhardwaj Booking-ID:APR-56636" duration="90" status="Booked" style="background-color:#0000ff; color:#fff; position: relative;" start_time="1725618600" end_time="1725624000">
                                    <div class="desp">Booked</div>
                                </td>
                                                            <td class="slot_td" index="39" color="#DC143C" title="" duration="90" status="holiday" style="background-color:#DC143C; color:#fff; position: relative;" start_time="1725705000" end_time="1725710400">
                                    <div class="desp"><b>Public Holiday</b></div>
                                </td>
                                            </tr>
                            <tr>
                    <td class="tabheading">5:45PM - 7:15PM</td>
                                                    <td class="slot_td" index="4" color="#DC143C" title="" duration="90" status="holiday" style="background-color:#DC143C; color:#fff; position: relative;" start_time="1725192900" end_time="1725198300">
                                    <div class="desp"><b>Public Holiday</b></div>
                                </td>
                                                            <td class="slot_td" index="10" color="#0000ff" title="User:SARAAH IMRAN Booking-ID:APR-56833" duration="90" status="Booked" style="background-color:#0000ff; color:#fff; position: relative;" start_time="1725279300" end_time="1725284700">
                                    <div class="desp">Booked</div>
                                </td>
                                                            <td class="slot_td" index="16" color="#0000ff" title="User:REENU RANI Booking-ID:APR-57044" duration="90" status="Booked" style="background-color:#0000ff; color:#fff; position: relative;" start_time="1725365700" end_time="1725371100">
                                    <div class="desp">Booked</div>
                                </td>
                                                            <td class="slot_td" index="22" color="#0000ff" title="User:Nitesh Booking-ID:APR-57142" duration="90" status="Booked" style="background-color:#0000ff; color:#fff; position: relative;" start_time="1725452100" end_time="1725457500">
                                    <div class="desp">Booked</div>
                                </td>
                                                            <td class="slot_td" index="28" color="#0000ff" title="User:Mohit Kulshrestha Booking-ID:APR-57527" duration="90" status="Booked" style="background-color:#0000ff; color:#fff; position: relative;" start_time="1725538500" end_time="1725543900">
                                    <div class="desp">Booked</div>
                                </td>
                                                            <td class="slot_td" index="34" color="#0000ff" title="User:BOLLA MADHU SUDHAN Booking-ID:APR-56770" duration="90" status="Booked" style="background-color:#0000ff; color:#fff; position: relative;" start_time="1725624900" end_time="1725630300">
                                    <div class="desp">Booked</div>
                                </td>
                                                            <td class="slot_td" index="40" color="#DC143C" title="" duration="90" status="holiday" style="background-color:#DC143C; color:#fff; position: relative;" start_time="1725711300" end_time="1725716700">
                                    <div class="desp"><b>Public Holiday</b></div>
                                </td>
                                            </tr>
                            <tr>
                    <td class="tabheading">7:30PM - 9:00PM</td>
                                                    <td class="slot_td" index="5" color="#DC143C" title="" duration="90" status="holiday" style="background-color:#DC143C; color:#fff; position: relative;" start_time="1725199200" end_time="1725204600">
                                    <div class="desp"><b>Public Holiday</b></div>
                                </td>
                                                            <td class="slot_td" index="11" color="#808080" title="0" duration="90" status="Busy" style="background-color:#808080; color:#fff; position: relative;" start_time="1725285600" end_time="1725291000">
                                    <div class="desp"><b>Not available</b></div>
                                </td>
                                                            <td class="slot_td" index="17" color="#808080" title="0" duration="90" status="Busy" style="background-color:#808080; color:#fff; position: relative;" start_time="1725372000" end_time="1725377400">
                                    <div class="desp"><b>Not available</b></div>
                                </td>
                                                            <td class="slot_td" index="23" color="#808080" title="0" duration="90" status="Busy" style="background-color:#808080; color:#fff; position: relative;" start_time="1725458400" end_time="1725463800">
                                    <div class="desp"><b>Not available</b></div>
                                </td>
                                                            <td class="slot_td" index="29" color="#808080" title="0" duration="90" status="Busy" style="background-color:#808080; color:#fff; position: relative;" start_time="1725544800" end_time="1725550200">
                                    <div class="desp"><b>Not available</b></div>
                                </td>
                                                            <td class="slot_td" index="35" color="#808080" title="0" duration="90" status="Busy" style="background-color:#808080; color:#fff; position: relative;" start_time="1725631200" end_time="1725636600">
                                    <div class="desp"><b>Not available</b></div>
                                </td>
                                                            <td class="slot_td" index="41" color="#DC143C" title="" duration="90" status="holiday" style="background-color:#DC143C; color:#fff; position: relative;" start_time="1725717600" end_time="1725723000">
                                    <div class="desp"><b>Public Holiday</b></div>
                                </td>
                                            </tr>
                    </tbody>
    </table>
					   </div>
					</div>
                </div>
            </div>
        </div>
    </div>
 
</div>
@endsection
