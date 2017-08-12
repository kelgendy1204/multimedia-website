@extends('layouts.adminapp')

@section('content')
<div class="container">
    <div class="row">
    <div class="col-md-12">
      <div class="panel panel-primary">
        <div class="panel-heading text-center"><h4>Site advertisement</h4></div>
        <div class="panel-body">

          <form method="POST" action="{{ route('updateads') }}" enctype="multipart/form-data">

          {{ csrf_field() }}

            <div class="panel panel-default">
              <div class="panel-heading"> <h3 class="text-center"> Home page </h3></div>
              <div class="panel-body">


                @if ($ads->get('home_top'))
                  <div class="row form-group">
                    <h4 class="text-center">Home top advertisement</h4>
                    <div class="col-md-12">
                      <img src="{{$ads->get('home_top')->photo_url}}" class="img-rounded img-responsive">
                    </div>
                  </div>

                  <div class="mb-15">
                    <label for="home_top_link">Link</label>
                    <input type="text" class="form-control" id="home_top_link" name="home_top_link" placeholder="enter link" value="{{$ads->get('home_top')->link}}">
                  </div>

                  <div class="mb-15">
                    <label for="home_top_photolink">Photo link</label>
                    <input type="text" class="form-control" id="home_top_photolink" name="home_top_photolink" placeholder="enter photo link" value="{{$ads->get('home_top')->photo_url}}">
                  </div>

                  <div class="form-check mb-15">
                    <label class="form-check-label">
                      <input name="home_top_isphotofile" type="checkbox" class="form-check-input">
                      Is file uploaded?
                    </label>
                  </div>

                  <div class="form-group row">
                    <label for="home_top_photo" class="col-xs-12">Upload photo</label>
                    <input type="file" class="form-control-file col-xs-12" name="home_top_photo" id="home_top_photo">
                  </div>
                  <hr />
                @endif



                @if ($ads->get('home_bottom'))
                  <div class="row form-group">
                    <h4 class="text-center">Home bottom advertisement</h4>
                    <div class="col-md-12">
                      <img src="{{$ads->get('home_bottom')->photo_url}}" class="img-rounded img-responsive">
                    </div>
                  </div>

                  <div class="mb-15">
                    <label for="home_bottom_link">Link</label>
                    <input type="text" class="form-control" id="home_bottom_link" name="home_bottom_link" placeholder="enter link" value="{{$ads->get('home_bottom')->link}}">
                  </div>

                  <div class="mb-15">
                    <label for="home_bottom_photolink">Photo link</label>
                    <input type="text" class="form-control" id="home_bottom_photolink" name="home_bottom_photolink" placeholder="enter photo link" value="{{ $ads->get('home_bottom')->photo_url }}">
                  </div>

                  <div class="form-check mb-15">
                    <label class="form-check-label">
                      <input name="home_bottom_isphotofile" type="checkbox" class="form-check-input">
                      Is file uploaded?
                    </label>
                  </div>

                  <div class="form-group row">
                    <label for="home_bottom_photo" class="col-xs-12">Upload photo</label>
                    <input type="file" class="form-control-file col-xs-12" name="home_bottom_photo" id="home_bottom_photo">
                  </div>
                  <hr />
                @endif

                @if ($ads->get('home_right'))
                  <div class="row form-group">
                    <h4 class="text-center">Home right advertisement</h4>
                    <div class="col-md-4 col-sm-4 col-md-offset-4">
                      <img src="{{$ads->get('home_right')->photo_url}}" class="img-rounded img-responsive">
                    </div>
                  </div>

                  <div class="mb-15">
                    <label for="home_right_link">Link</label>
                    <input type="text" class="form-control" id="home_right_link" name="home_right_link" placeholder="enter link" value="{{$ads->get('home_right')->link}}">
                  </div>

                  <div class="mb-15">
                    <label for="home_right_photolink">Photo link</label>
                    <input type="text" class="form-control" id="home_right_photolink" name="home_right_photolink" placeholder="enter photo link" value="{{$ads->get('home_right')->photo_url}}">
                  </div>

                  <div class="form-check mb-15">
                    <label class="form-check-label">
                      <input name="home_right_isphotofile" type="checkbox" class="form-check-input">
                      Is file uploaded?
                    </label>
                  </div>

                  <div class="form-group row">
                    <label for="home_right_photo" class="col-xs-12">Upload photo</label>
                    <input type="file" class="form-control-file col-xs-12" name="home_right_photo" id="home_right_photo">
                  </div>
                  <hr />
                @endif

                @if ($ads->get('home_left'))
                  <div class="row form-group">
                    <h4 class="text-center">Home left advertisement</h4>
                    <div class="col-md-4 col-sm-4 col-md-offset-4">
                      <img src="{{$ads->get('home_left')->photo_url}}" class="img-rounded img-responsive">
                    </div>
                  </div>

                  <div class="mb-15">
                    <label for="home_left_link">Link</label>
                    <input type="text" class="form-control" id="home_left_link" name="home_left_link" placeholder="enter link" value="{{$ads->get('home_left')->link}}">
                  </div>

                  <div class="mb-15">
                    <label for="home_left_photolink">Photo link</label>
                    <input type="text" class="form-control" id="home_left_photolink" name="home_left_photolink" placeholder="enter photo link" value="{{$ads->get('home_left')->photo_url}}">
                  </div>


                  <div class="form-check mb-15">
                    <label class="form-check-label">
                      <input name="home_left_isphotofile" type="checkbox" class="form-check-input">
                      Is file uploaded?
                    </label>
                  </div>

                  <div class="form-group row">
                    <label for="home_left_photo" class="col-xs-12">Upload photo</label>
                    <input type="file" class="form-control-file col-xs-12" name="home_left_photo" id="home_left_photo">
                  </div>
                @endif
              </div>
            </div>


            <div class="panel panel-default">
              <div class="panel-heading"> <h3 class="text-center"> Show post page </h3></div>
              <div class="panel-body">


                  @if ($ads->get('showpost_right'))
                    <div class="row form-group">
                      <h4 class="text-center">Show post right advertisement</h4>
                      <div class="col-md-4 col-sm-4 col-md-offset-4">
                        <img src="{{$ads->get('showpost_right')->photo_url}}" class="img-rounded img-responsive">
                      </div>
                    </div>

                    <div class="mb-15">
                      <label for="showpost_right_link">Link</label>
                      <input type="text" class="form-control" id="showpost_right_link" name="showpost_right_link" placeholder="enter link" value="{{$ads->get('showpost_right')->link}}">
                    </div>

                    <div class="mb-15">
                      <label for="showpost_right_photolink">Photo link</label>
                      <input type="text" class="form-control" id="showpost_right_photolink" name="showpost_right_photolink" placeholder="enter photo link" value="{{$ads->get('showpost_right')->photo_url}}">
                    </div>


                    <div class="form-check mb-15">
                      <label class="form-check-label">
                        <input name="showpost_right_isphotofile" type="checkbox" class="form-check-input">
                        Is file uploaded?
                      </label>
                    </div>

                    <div class="form-group row">
                      <label for="showpost_right_photo" class="col-xs-12">Upload photo</label>
                      <input type="file" class="form-control-file col-xs-12" name="showpost_right_photo" id="showpost_right_photo">
                    </div>
                    <hr />
                  @endif


                  @if ($ads->get('showpost_left'))
                    <div class="row form-group">
                      <h4 class="text-center">Show post left advertisement</h4>
                      <div class="col-md-4 col-sm-4 col-md-offset-4">
                        <img src="{{$ads->get('showpost_left')->photo_url}}" class="img-rounded img-responsive">
                      </div>
                    </div>

                    <div class="mb-15">
                      <label for="showpost_left_link">Link</label>
                      <input type="text" class="form-control" id="showpost_left_link" name="showpost_left_link" placeholder="enter link" value="{{$ads->get('showpost_left')->link}}">
                    </div>

                    <div class="mb-15">
                      <label for="showpost_left_photolink">Photo link</label>
                      <input type="text" class="form-control" id="showpost_left_photolink" name="showpost_left_photolink" placeholder="enter photo link" value="{{$ads->get('showpost_left')->photo_url}}">
                    </div>


                    <div class="form-check mb-15">
                      <label class="form-check-label">
                        <input name="showpost_left_isphotofile" type="checkbox" class="form-check-input">
                        Is file uploaded?
                      </label>
                    </div>

                    <div class="form-group row">
                      <label for="showpost_left_photo" class="col-xs-12">Upload photo</label>
                      <input type="file" class="form-control-file col-xs-12" name="showpost_left_photo" id="showpost_left_photo">
                    </div>
                  @endif


              </div>
            </div>




            <div class="form-check text-center">
              <button type="submit" class="btn btn-primary btn-lg">Edit advertisements</button>
            </div>

          </form>
        </div>
      </div>
    </div>
    </div>
</div>
@endsection
