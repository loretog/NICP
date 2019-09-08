@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Member Registration') }}</div>

                <div class="card-body">
                    <form method="POST" action="/members" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                          <div class="col-8">
                            <div class="form-group row">
                                <label for="name" class="col-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-8">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus onkeyup="pressText(this, 'your_name')">

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-8">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="affiliation" class="col-4 col-form-label text-md-right">{{ __('School / Company') }}</label>

                                <div class="col-8">
                                    <input id="affiliation" type="text" class="form-control @error('affiliation') is-invalid @enderror" name="affiliation" value="{{ old('affiliation') }}" autocomplete="affiliation" autofocus onkeyup="pressText(this, 'your_aff')">

                                    @error('affiliation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="contact_number" class="col-4 col-form-label text-md-right">{{ __('Contact Number') }}</label>

                                <div class="col-8">
                                    <input id="contact_number" type="text" class="form-control @error('contact_number') is-invalid @enderror" name="contact_number" value="{{ old('contact_number') }}" autocomplete="contact_number" autofocus onkeyup="pressText(this, 'your_contact_number')">

                                    @error('contact_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                              <input type="hidden" id="photo" name="photo" value="" class="form-control @error('photo') is-invalid @enderror">
                                <div class="col-6 offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Save') }}
                                    </button>
                                    <input class="btn btn-success" type=button value="Take Snapshot" onClick="take_snapshot()">
                                    <!-- <input class="btn btn-success" type=button value="Print ID" onClick="printID()"> -->
                                    <a href="/members" class="btn btn-danger">Back</a>

                                    @error('photo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                          </div>

                          <div class="col-4">
                            <div class="row card-id">
                              <div id="id-wrapper">
                                <div id="your_id">00000</div>
                                <div id="your_name">Your Name</div>
                                <div id="your_aff">Your School</div>
                                <div id="your_contact_number">Contact</div>
                                <div id="results"></div>
                              </div>
                            </div>

                            <div id="my_camera" style="display: none;"></div>

                          	<!-- First, include the Webcam.js JavaScript Library -->
                          	<script type="text/javascript" src="/js/webcam.min.js"></script>

                          	<!-- Configure a few settings and attach camera -->
                          	<script>
                          		Webcam.set({
                          			width: 320,
                          			height: 240,
                          			image_format: 'jpeg',
                          			jpeg_quality: 90
                          		});
                          		Webcam.attach( '#my_camera' );
                          	</script>

                          	<!-- A button for taking snaps -->

                          	<!-- Code to handle taking the snapshot and displaying it locally -->
                          	<script>
                          		function take_snapshot() {
                          			// take snapshot and get image data
                          			Webcam.snap( function(data_uri) {
                          				// display results in page
                                  document.getElementById('photo').value = data_uri;
                          				document.getElementById('results').innerHTML = '<img style="width: 94px; border-radius: 50%; height: 94px; position: relative; top: 56px; left: 43px;" src="'+data_uri+'"/>';
                          			} );
                          		}
                              function printID() {
                                var c = document.getElementById('results');
                                var t = c.getContext('2d');

                                window.open('', document.getElementById('results').toDataURL());

                              }

                              function pressText( e, name ) {
                                //console.log( this );
                                document.getElementById( name ).innerHTML = e.value;
                              };
                          	</script>
                          </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
