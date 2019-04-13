@extends('layouts.home')


@section('content')


<div class="container-fluid">
	<div class="row offer-main-header">
		<div class="col-md-1 ">
			<a href="{{ URL::to('/').'/'.App::getLocale('locale') }}/about">
				<i class="fa fa-long-arrow-left circlogo timep hand"></i>
			</a>
		</div>
		<div class="col-md-11 ">
			<center><h1 class="offer-header font-65">{{ $vacancys->TextTrans('title') }}</h1></center>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4 inpad">
			<div class="cardp">
				<p class="projec"><img src="{{ asset('assets/img/employee.png') }}" class="circlogo"> <span class="text-22">Main Duties</span></p>
				<div class="paddiv">
					{{ $vacancys->TextTrans('mainduties') }}
				</div>
			</div>
		</div>
		<div class="col-md-4 inpad">
			<div class="cardp">
				<p class="projec"><img src="{{ asset('assets/img/employee.png') }}" class="circlogo"> <span class="text-22">Experience Desired</span></p>
				<div class="paddiv">
					{{ $vacancys->TextTrans('experiencedesired') }}
				</div>
			</div>
		</div>
		<div class="col-md-4 inpad">
			<div class="cardp">
				<p class="projec"> <img src="{{ asset('assets/img/employee.png') }}" class="circlogo"> <span class="text-22">Requirements</span></p>
				<div class="paddiv">
					{{ $vacancys->TextTrans('requirements') }}
				</div>
			</div>
		</div>
	</div>
</div>

<br>
<center>
	<img class="fa fa-clock-o circlogo timep time-logo" src="{{ asset('assets/img/clock.png') }}"></img>
	<p>Deadline {{ $vacancys->deadline }}</p>
</center>


@endsection