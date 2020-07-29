<section id="careers">
	<div class="container" data-aos="fade-up">
		
		<div class="section-title">
			<p>Build your career with us</p>
			<hr style="background-color:#0001f9; width:50%; float:left;">
		</div>
		@if (count($jobs) == 0)
		<h3>Sory, There is not any job opening for now.</h3>
		@else
		<h4>
			We are one Indonesian electronic manufacture company, is looking for candidates for the following positions:
		</h4>
		
		@foreach ($jobs as $index => $job)
		<button class="accordion-job_vacancy">{{$index+=1}}. {{ $job->title }}</button>
		<div class="panel-job_vacancy">
			<div class="card">
				<div class="card-body">
					<div class="text-center">
						<h3 class="card-title">{{ $job->title }}</h3>
						<span  class="card-title">Posted on {{ date_format(date_create($job->valid_from),'d M Y') }}</span>
					</div>
					<p class="card-text">
						{!! $job->content !!}
					</p>
					<hr>
					<h5 class="card-title">Apply before {{ date_format(date_create($job->valid_to), 'd M Y') }}</h5>
					<div class="text-right">
						<button id="show_modal" type="button" class="btn btn-primary" data-toggle="modal" data-target="#applyModal" job_id="{{ $job->id }}" job_title="{{ $job->title }}" data-whatever="@getbootstrap">Apply Now</button>
					</div>
				</div>
			</div>
		</div>
		@endforeach
		@endif
	</div>
</section>

<div class="modal fade" id="applyModal" tabindex="-1" role="dialog" aria-labelledby="applyModal" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-notify modal-info" role="document">
		<div class="modal-content text-center">
			<div class="modal-header d-flex justify-content-center">
				<p class="heading">Apply For <span id="jobname"></span></p>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="post" action="{{ url('/apply-job') }}"  enctype="multipart/form-data">
				<div class="modal-body text-center">
					@csrf
					<div class="form-group">
						<label for="name" class="col-form-label">Name:</label>
						<input type="text" placeholder="Your Name" value="{{ old('name') }}" class="form-control" id="name" name="name" required="1">
					</div>
					<div class="form-group">
						<label for="email" class="col-form-label">Email:</label>
						<input type="email" placeholder="Your Email" class="form-control" value="{{ old('email') }}"  id="email" name="email" required="1" >
					</div>
					<div class="form-group">
						<label for="phone" class="col-form-label">Phone Number:</label>
						<input type="number" placeholder="Your Phone Number" class="form-control" value="{{ old('phone') }}"  id="phone" name="phone" required="1" >
					</div>
					<div class="form-group">
						<label  class="col-form-label">Attach Your file Here:</label>
						<div class="custom-file">
							<input type="file" class="custom-file-input" name="uploaded_file" id="validatedCustomFile" required>
							<label class="custom-file-label" id="file-label" for="validatedCustomFile">Choose file...</label>
							<div class="invalid-feedback">Example invalid custom file feedback</div>
						</div>
					</div>
					<div class="form-group">
						<label  class="col-form-label">Captcha:</label>

						<div class="captcha">
							<span>{!! captcha_img() !!}</span>
							<button type="button" class="btn btn-success btn-refresh"  id="refresh"><i class="fa fa-refresh"></i></button>
						</div>
						<input id="captcha" type="text" class="form-control" placeholder="Enter Captcha" name="captcha">


						{{-- @if ($errors->has('captcha'))
						<span class="help-block">
							<strong>{{ $errors->first('captcha') }}</strong>
						</span>
						@endif --}}
					</div>
					<input type="hidden" id="job_title" name="job_title" value="" >
					<input type="hidden" id="job_id" name="job_id" value="">
				</div>
				<div class="modal-footer flex-center">
					<input type="submit" class="btn btn-success" value="Submit">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</form>
		</div>
	</div>
</div>
