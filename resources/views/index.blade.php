<?php
use App\User;
?>
@extends('layouts.frontLayout.front_design')
@section('content')
<div id="right_container">
	<div class="heading">
	  <h1>Welcome</h1>
	  <h2>create new friendships, experience romance &amp; find love!</h2>
	  <div class="containt">
		<h3>In volutpat convallis dui. Nunc a quam quis dui auctor lacinia. </h3>
		<p> Nunc accumsan, risus sed viverra commodo, lorem diam luctus libero, rutrum placerat augue purus id augue. Donec ipsum eros, dictum a, bibendum quis, facilisis vitae, dolor. Sed pharetra felis vel arcu. Nulla a lectus. Sed eget nibh. Nunc velit. Donec nulla. Nunc id risus nec urna dignissim tristique. In hac habitasse platea dictumst. Mauris diam eros, adipiscing vitae, posuere non, hendrerit eu, velit. Etiam eu lorem ac odio lacinia euismod. Duis tincidunt. In urna. </p>
		<h4>why should i join?</h4>
		<ul>
		  <li><img src="{{ asset('images/frontend_images/bullet.gif') }}" alt="" />half a million members worldwide.</li>
		  <li><img src="{{ asset('images/frontend_images/bullet.gif') }}" alt="" />meet quality singles today.</li>
		  <li class="last"><img src="{{ asset('images/frontend_images/bullet.gif') }}" alt="" />free to join, free to search &amp; free to chat.</li>
		</ul>
	  </div>
	</div>
	<div class="recent_add_prifile">
		{{-- @foreach($recent_users as $user) 
			@if(!empty($user->details) && $user->details->status == 1 )
			<div class="profile_box first"> <span class="photo"><a href="#"><img src="{{ asset('images/frontend_images/pic_1.gif') }}" alt="" /></a></span>
				<p class="left">Name:</p>
				<p class="right">{{ $user->name }}</p>
				<p class="left">Location:</p>
				<p class="right"> @if(!empty($user->details->city))  {{ $user->details->city }} @endif</p>
				<a href="#"><img src="{{ asset('images/frontend_images/more_btn.gif') }}" alt="" class="more_1" /></a> 
			</div>
			@endif
		@endforeach --}}
		
		<?php $count = 1; ?>
		@foreach($recent_users as $user) 
			@if(!empty($user->details) && $user->details->status == 1 )
			{{-- {{ $key }} --}}
			{{-- {{ $count }} --}}
				@if($count <= 4)
					@if(Auth::check())
						@if(Auth::check() && Auth::User()->username != $user->details->username)
							<div class="profile_box first"> 
								<?php
									// if(Auth::check()){
									// 	// echo Auth::user()->username;
									// 	// echo "---";
									// 	echo $user->details->username;
									// }
								?>
								
								@foreach($user->photos as $key => $photo)
									@if($photo->default_photo == "Yes")
										@if(!empty($user_key[$key]->photo))
											<?php $user_photo = $user_photo[$key]->photo;  ?>
										@endif
									@else
										<?php $user_photo = $user->photos[0]->photo; ?>
									@endif
								
								@endforeach
								@if(!empty($user_photo))
									<span class="photo"><a href="{{ url('profile/'.$user->username) }}"><img src="{{ asset('images/frontend_images/photos/'.$user_photo) }}" alt="" /></a></span>
								@else 
									<span class="photo"><a href="{{ url('profile/'.$user->username) }}"><img src="{{ asset('images/frontend_images/photos/default.jpg') }}" alt="" /></a></span>
								@endif

								<p class="left">Name:</p>
								<p class="right">{{ $user->name }}</p>
								<p class="left">Age:</p>
								<p class="right">
									<?php 
										$dob = $user->details->dob;
										echo $diff= date('Y')- date('Y', strtotime($dob))	
									?>Yrs
									{{-- {{ $user->details->dob }} --}}
								</p>
								<p class="left">Location:</p>
								<p class="right"> @if(!empty($user->details->city))  {{ $user->details->city }} @endif</p>
								<a href="#"><img src="{{ asset('images/frontend_images/more_btn.gif') }}" alt="" class="more_1" /></a> 
							</div>
							@endif
						@else
							<div class="profile_box first"> 
								<?php
									// if(Auth::check()){
									// 	// echo Auth::user()->username;
									// 	// echo "---";
									// 	echo $user->details->username;
									// }
								?>
								
								@foreach($user->photos as $key => $photo)
									@if($photo->default_photo == "Yes")
										@if(!empty($user_key[$key]->photo))
											<?php $user_photo = $user_photo[$key]->photo;  ?>
										@endif
									@else
										<?php $user_photo = $user->photos[0]->photo; ?>
									@endif
								
								@endforeach
								@if(!empty($user_photo))
									<span class="photo"><a href="{{ url('profile/'.$user->username) }}"><img src="{{ asset('images/frontend_images/photos/'.$user_photo) }}" alt="" /></a></span>
								@else 
									<span class="photo"><a href="{{ url('profile/'.$user->username) }}"><img src="{{ asset('images/frontend_images/photos/default.jpg') }}" alt="" /></a></span>
								@endif

								<p class="left">Name:</p>
								<p class="right">{{ $user->name }}</p>
								<p class="left">Age:</p>
								<p class="right">
									<?php 
										$dob = $user->details->dob;
										echo $diff= date('Y')- date('Y', strtotime($dob))	
									?>Yrs
									{{-- {{ $user->details->dob }} --}}
								</p>
								<p class="left">Location:</p>
								<p class="right"> @if(!empty($user->details->city))  {{ $user->details->city }} @endif</p>
								<p>
									<?php 
										$isOnline = User::isOnline($user->id); 
										if($isOnline){
											echo "<font color ='green'><strong>Online</strong></font>";
										}else{
											echo "<font color ='red'>Offline </font>";
										}
									?>
								</p>
								<a href="#"><img src="{{ asset('images/frontend_images/more_btn.gif') }}" alt="" class="more_1" /></a> 
							</div>
						@endif
					<?php $count = $count + 1;  ?>
				@endif
			@endif
		@endforeach
	</div>
	<div class="expert_dating_tips">
	  <h4>expert dating tips</h4>
	  <h6>Nunc a quam quis dui auctor lacinia.</h6>
	  <p><span>Nunc accumsan,</span> risus sed viverra commodo, lorem diam luctus libero, rutrum placerat augue purus id augue. Donec ipsum eros, dictum a, bibendum quis, facilisis vitae, dolor. Sed pharetra felis vel arcu. Nulla a lectus. </p>
	  <h6>Consectetuer adipiscing elit</h6>
	  <p><span>Fusce tristique, nisl vel</span> gravida venenatis, risus magna eleifend pede, id bibendum mauris metus et erat. Morbi in leo. Quisque sollicitudin sagittis est. Aliquam non nulla. Fusce malesuada. Class aptent taciti sociosqu ad litora torquent.</p>
	  <h6>Lorem ipsum dolor sit amet</h6>
	  <p><span>In volutpat convallis dui.</span> Nunc a quam quis dui auctor lacinia. Nunc accumsan, risus sed viverra commodo, lorem diam luctus libero, rutrum placerat augue purus id augue. </p>
	</div>
	<div class="member_advantages">
	  <h4>member advantages</h4>
	  <ul>
		<li><a href="#">Sed gravida erat in sapien.</a></li>
		<li><a href="#">Maecenas a erat eu erat vulputate condimentum.</a></li>
		<li><a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a></li>
		<li><a href="#">In sit amet enim in odio feugiat feugiat.</a></li>
		<li><a href="#">Proin ac ligula at mi laoreet mattis.</a></li>
		<li><a href="#">Sed gravida erat in sapien.</a></li>
		<li><a href="#">Maecenas a erat eu erat vulputate condimentum.</a></li>
		<li><a href="#">Proin ac ligula at mi laoreet mattis.</a></li>
		<li><a href="#">Lorem ipsum dolor sit amet.</a></li>
		<li><a href="#">Maecenas feugiat mi nec metus.</a></li>
		<li><a href="#">In sit amet enim in odio feugiat feugiat.</a></li>
		<li><a href="#">Sed volutpat ipsum quis nisi.</a></li>
		<li><a href="#">Proin ac ligula at mi laoreet mattis.</a></li>
	  </ul>
	</div>
  </div>

  @endsection