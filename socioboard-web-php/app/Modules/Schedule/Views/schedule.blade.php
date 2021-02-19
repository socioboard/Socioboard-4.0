@extends('User::dashboard.master')
@section('title')
    <title>SocioBoard | Schedule Message</title>
@endsection

@section('schedule')

    <main>
        <div class="container margin-top-60">
            <div class="row margin-top-10">
                <div class="col-md-12">
                    <h4>Schedule Message</h4>
                </div>
            </div>

            <div class="row">
                <div class="col-md-7">
                    <div class="card border-0">
                        <div class="card-body shadow p-2">
                            <form id="scheduleForm">
                                <!-- post input box -->
                                <div class="form-group">
                                    <textarea name="sMessage" class="form-control border border-light" id="schedule_post_area" rows="3"
                                              placeholder="Write something !" ></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control border border-light" name="sLink" id="outgoing_link" placeholder="Enter outgoing link">
                                </div>
                                <p id="messageError" style="color: red" ></p>
                                <!-- image and video upload -->
                                <div class="row">
                                    <div class="col-12" id="option_upload">
                                        <small>Note: Add only 4 items at a single time.</small>
                                        <ul class="btn-nav">
                                            <li>
                                                <span>
                                                    <i class="far fa-image text-secondary"></i>
                                                    <input type="file" name="imageName[]" click-type="type1" class="picupload"
                                                           multiple accept="image/*" />
                                                </span>
                                            </li>
                                            <li>
                                                <span>
                                                    <i class="fas fa-video text-secondary"></i>
                                                    <input type="file" name="videoupload[]" click-type="type1" class="picupload"
                                                           multiple accept="video/*" />
                                                </span>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="col-12" id="hint_brand">
                                        <ul id="media-list" class="clearfix">
                                            <li class="myupload">
                                                <span>
                                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                                    <input type="file" click-type="type2" id="picupload"
                                                           class="picupload" multiple>
                                                </span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- end of image and video upload -->
                                <hr>
                                <!-- user or pages add list -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="button" class="btn btn-fb btn-sm all_social_btn">Add
                                            Accounts</button>
                                        <div class="all_social_div">
                                            <div>
                                                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                                    <li class="nav-item">
                                                        <a class="nav-link active" id="pills-facebook-profile-tab"
                                                           data-toggle="pill" href="#pills-facebook-profile" role="tab"
                                                           aria-controls="pills-facebook-profile"
                                                           aria-selected="true"><i class="fab fa-facebook-f"></i></a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" id="pills-twitter-profile-tab"
                                                           data-toggle="pill" href="#pills-twitter-profile" role="tab"
                                                           aria-controls="pills-twitter-profile"
                                                           aria-selected="false"><i class="fab fa-twitter"></i></a>
                                                    </li>
                                                    {{--<li class="nav-item">--}}
                                                        {{--<a class="nav-link" id="pills-linkedin-profile-tab"--}}
                                                           {{--data-toggle="pill" href="#pills-linkedin-profile" role="tab"--}}
                                                           {{--aria-controls="pills-linkedin-profile"--}}
                                                           {{--aria-selected="false"><i class="fab fa-linkedin-in"></i></a>--}}
                                                    {{--</li>--}}
{{--                                                    <li class="nav-item">--}}
{{--                                                        <a class="nav-link" id="pills-pinterest-profile-tab"--}}
{{--                                                           data-toggle="pill" href="#pills-pinterest-profile"--}}
{{--                                                           role="tab" aria-controls="pills-pinterest-profile"--}}
{{--                                                           aria-selected="false"><i class="fab fa-pinterest-p"></i></a>--}}
{{--                                                    </li>--}}
                                                </ul>
                                                <div class="tab-content" id="pills-tabContent">
                                                    <div class="tab-pane fade show active" id="pills-facebook-profile"
                                                         role="tabpanel" aria-labelledby="pills-facebook-profile-tab">
                                                        <div class="card margin-top-10">
                                                            <div class="card-body bg-white p-2">
                                                                <h6><b>Choose Facebook Pages for posting</b></h6>
                                                                <div>
                                                                    <ul class="list-group">
                                                                        @for($i=0;$i<count($socialAccount);$i++)
                                                                            @if( $socialAccount[$i]->account_type == env('FACEBOOKPAGE'))
                                                                                @if($socialAccount[$i]->join_table_teams_social_accounts->is_account_locked == false)
                                                                                    <li class="list-group-item page_list">
                                                                                        <div class="media">
                                                                                            <img class="mr-3 pp_50 rounded-circle"  src="{{$socialAccount[$i]->profile_pic_url}}"  alt="page title">
                                                                                            <div class="media-body">
																				<span  class="float-right badge badge-light" id="checkboxes">
																					<div class="custom-control custom-checkbox">
                                                                                        <input type="checkbox"   class="custom-control-input"  id="{{$socialAccount[$i]->social_id}}" name="{{$socialAccount[$i]->account_id}}--{{$socialAccount[$i]->account_type}}">
                                                                                        <label  class="custom-control-label"  for="{{$socialAccount[$i]->social_id}}"><span style="display: flex; margin-top: 6px;">Add</span></label>
                                                                                    </div>
																				</span>
                                                                                                <h5 class="mt-2 mb-0 page_name"> {{$socialAccount[$i]->first_name}}</h5>
                                                                                                <b   style="font-size: 12px;">Follower:</b>
                                                                                                {{$socialAccount[$i]->friendship_counts}}

                                                                                            </div>
                                                                                        </div>
                                                                                    </li>
                                                                                @endif

                                                                            @endif
                                                                        @endfor
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade" id="pills-twitter-profile" role="tabpanel"
                                                         aria-labelledby="pills-twitter-profile-tab">
                                                        <div class="card margin-top-10">
                                                            <div class="card-body bg-white p-2">
                                                                <h6><b>Choose Twitter profile for posting</b></h6>
                                                                <div>
                                                                    <ul class="list-group">
                                                                        @for($i=0;$i<count($socialAccount);$i++)
                                                                            @if($socialAccount[$i]->account_type == env('TWITTER') )
                                                                                @if($socialAccount[$i]->join_table_teams_social_accounts->is_account_locked == false)
                                                                                    <li class="list-group-item page_list">
                                                                                        <div class="media">
                                                                                            <img class="mr-3 pp_50 rounded-circle"
                                                                                                 src="{{$socialAccount[$i]->profile_pic_url}}"
                                                                                                 alt="page title">

                                                                                            <div class="media-body">
																				<span class="float-right badge badge-light">
																					<div class="custom-control custom-checkbox"
                                                                                         id="checkboxes">
                                                                                        <input type="checkbox"
                                                                                               class="custom-control-input"
                                                                                               id="{{$socialAccount[$i]->social_id}}"
                                                                                               name="{{$socialAccount[$i]->account_id}}--{{$socialAccount[$i]->account_type}}">
                                                                                        <label class="custom-control-label"
                                                                                               for="{{$socialAccount[$i]->social_id}}"><span
                                                                                                    style="display: flex; margin-top: 6px;">Add</span></label>
                                                                                    </div>
																				</span>
                                                                                                <h5 class="mt-2 mb-0 page_name"> {{$socialAccount[$i]->first_name}}</h5>
                                                                                                <b style="font-size: 12px;">Follower:</b>
                                                                                                {{$socialAccount[$i]->friendship_counts}}

                                                                                            </div>
                                                                                        </div>
                                                                                    </li>
                                                                                @endif
                                                                            @endif
                                                                        @endfor
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade" id="pills-linkedin-profile" role="tabpanel"
                                                         aria-labelledby="pills-linkedin-profile-tab">
                                                        <div class="card margin-top-10">
                                                            <div class="card-body bg-white p-2">
                                                                <h6><b>Choose Linkedin Profile and Pages for posting</b>
                                                                </h6>
                                                                <div>
                                                                    <ul class="list-group">
                                                                        @for($i=0;$i<count($socialAccount);$i++)
                                                                            @if($socialAccount[$i]->account_type == env('LINKEDIN') || $socialAccount[$i]->account_type == env('LINKEDINCOMPANY'))
                                                                                {{--should give a condition for lock--}}
                                                                                <li class="list-group-item page_list">
                                                                                    <div class="media">
                                                                                        <img class="mr-3 pp_50 rounded-circle"  src="{{$socialAccount[$i]->profile_pic_url}}"  alt="page title">
                                                                                        <div class="media-body">
																				<span  class="float-right badge badge-light">
																					<div class="custom-control custom-checkbox" id="checkboxes">
                                                                                        <input type="checkbox"   class="custom-control-input"  id="{{$socialAccount[$i]->social_id}}" name="{{$socialAccount[$i]->account_id}}--{{$socialAccount[$i]->account_type}}">
                                                                                        <label  class="custom-control-label"  for="{{$socialAccount[$i]->social_id}}"><span style="display: flex; margin-top: 6px;">Add</span></label>
                                                                                    </div>
																				</span>
                                                                                            <h5 class="mt-2 mb-0 page_name"> {{$socialAccount[$i]->first_name}}</h5>
                                                                                            <b   style="font-size: 12px;">Follower:</b>
                                                                                            {{$socialAccount[$i]->friendship_counts}}

                                                                                        </div>
                                                                                    </div>
                                                                                </li>
                                                                            @endif
                                                                        @endfor
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
    {{--                                                    <div class="tab-pane fade" id="pills-pinterest-profile"--}}
    {{--                                                         role="tabpanel" aria-labelledby="pills-pinterest-profile-tab">--}}
    {{--                                                        <div class="card margin-top-10">--}}
    {{--                                                            <div class="card-body bg-white p-2">--}}
    {{--                                                                <h6><b>Choose Pinterest Profile for posting</b></h6>--}}
    {{--                                                                <div class="accordion" id="accordionExample">--}}
    {{--                                                                    @for($i=0;$i<count($socialAccount);$i++)--}}
    {{--                                                                        @if( $socialAccount[$i]->account_type == env('PINTEREST'))--}}
    {{--                                                                            @if($socialAccount[$i]->join_table_teams_social_accounts->is_account_locked == false)--}}
    {{--                                                                                <div class="card border-0">--}}
    {{--                                                                                    <div class="card-header bg-danger text-white p-1 m-0"--}}
    {{--                                                                                         id="headingOne" style="cursor: pointer;">--}}
    {{--                                                                                        <div data-toggle="collapse"--}}
    {{--                                                                                             data-target="#profile_pin_1"--}}
    {{--                                                                                             aria-expanded="true"--}}
    {{--                                                                                             aria-controls="profile_pin_1">--}}
    {{--                                                                                            <div class="media">--}}
    {{--                                                                                                <img src="{{$socialAccount[$i]->profile_pic_url}}"--}}
    {{--                                                                                                     class="mr-3 pp_50 rounded-circle"--}}
    {{--                                                                                                     alt="avatar">--}}
    {{--                                                                                                <div class="media-body">--}}
    {{--                                                                                                    <h5 class="mt-0 mb-0">{{$socialAccount[$i]->first_name}}</h5>--}}

    {{--                                                                                                </div>--}}
    {{--                                                                                            </div>--}}
    {{--                                                                                        </div>--}}
    {{--                                                                                    </div>--}}
    {{--                                                                                    @if($i == 0)--}}
    {{--                                                                                        <div id="profile_pin_1" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">--}}
    {{--                                                                                            @else--}}
    {{--                                                                                                <div id="profile_pin_1" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">--}}
    {{--                                                                                                    @endif--}}

    {{--                                                                                                    <div class="card-body p-2">--}}
    {{--                                                                                                        <ul class="list-group">--}}
    {{--                                                                                                            @for($j=0;$j<count($pinterestBoards);$j++)--}}

    {{--                                                                                                                @if($pinterestBoards[$j]->account_id == $socialAccount[$i]->account_id)--}}

    {{--                                                                                                                    @for($l=0;$l<count($pinterestBoards[$j]->boards);$l++)--}}
    {{--                                                                                                                        <li class="list-group-item page_list">--}}
    {{--                                                                                                                            <div class="media">--}}
    {{--                                                                                                                                --}}{{--<img class="mr-3 pp_50 rounded-circle"--}}
    {{--                                                                                                                                --}}{{--src="{{$pinterestBoards[$j]->boards[$l]->board_url}}"--}}
    {{--                                                                                                                                --}}{{--alt="page title">--}}
    {{--                                                                                                                                <div class="media-body">--}}
    {{--                                                                                                                <span class="float-right badge badge-light">--}}
    {{--                                                                                                                    <div class="custom-control custom-checkbox" id="boardsCheckbox">--}}
    {{--                                                                                                                        <input type="checkbox" class="custom-control-input" id="{{$pinterestBoards[$j]->account_id}}_{{$pinterestBoards[$j]->boards[$l]->board_id}}" name="{{$pinterestBoards[$j]->account_id}}_{{$pinterestBoards[$j]->boards[$l]->board_id}}">--}}
    {{--                                                                                                                        <label class="custom-control-label" for="{{$pinterestBoards[$j]->account_id}}_{{$pinterestBoards[$j]->boards[$l]->board_id}}">--}}
    {{--                                                                                                                            <span style="display: flex; margin-top: 6px;">Add</span>--}}
    {{--                                                                                                                        </label>--}}
    {{--                                                                                                                    </div>--}}
    {{--                                                                                                                </span>--}}
    {{--                                                                                                                                    <h5 class="mt-2 mb-0 page_name">{{$pinterestBoards[$j]->boards[$l]->board_name}}</h5>--}}
    {{--                                                                                                                                </div>--}}
    {{--                                                                                                                            </div>--}}
    {{--                                                                                                                        </li>--}}
    {{--                                                                                                                    @endfor--}}
    {{--                                                                                                                @endif--}}
    {{--                                                                                                            @endfor--}}
    {{--                                                                                                        </ul>--}}
    {{--                                                                                                    </div>--}}
    {{--                                                                                                </div>--}}
    {{--                                                                                        </div>--}}
    {{--                                                                                    @endif--}}
    {{--                                                                                    @endif--}}
    {{--                                                                                    @endfor--}}
    {{--                                                                </div>--}}
    {{--                                                            </div>--}}
    {{--                                                        </div>--}}
    {{--                                                    </div>--}}
                                                  {{--todo take from np--}}
                                                </div>
                                                {{--todo take from np--}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card border-0">
                        <div class="card-body shadow">
                            <label><b>Schedule Type</b></label>
                            <div class="mb-2">
                                <div class="custom-control custom-checkbox" id="normalChecked">
                                    <input type="checkbox" class="custom-control-input schedule_normal_post"
                                           id="schedule_post" name="schedule_normal_post">
                                    <label class="custom-control-label" for="schedule_post">Normal
                                        Schedule Post</label>
                                </div>
                                <div class="custom-control custom-checkbox" id="dayChecked">
                                    <input type="checkbox" class="custom-control-input day_schedule_post"
                                           id="day_schedule" name="day_schedule_post">
                                    <label class="custom-control-label" for="day_schedule">Day Wise Schedule
                                        Post</label>
                                </div>
                            </div>
                            <div class="card-body p-1 bg-light mb-2" id="schedule_normal_div">
                                <label for="schedule_normal_post">Select Date and Time</label>
                                <input type="text" name="normalDateTime" class="form-control border border-light " id="schedule_normal_post"
                                       placeholder="dd-mm-yyyy">
                            </div>
                            <div class="card-body p-1 bg-light mb-2" id="day_wise_schedule_div">
                                <label>Select Days</label>
                                <div class="btn-group btn-group-toggle col-12" data-toggle="buttons" id="daywiseDayCheck">
                                    <label class="btn btn-secondary active">
                                        <input type="checkbox" name="0" autocomplete="off" checked>
                                        Sun
                                    </label>
                                    <label class="btn btn-secondary">
                                        <input type="checkbox" name="1" autocomplete="off"> Mon
                                    </label>
                                    <label class="btn btn-secondary">
                                        <input type="checkbox" name="2" autocomplete="off"> Tues
                                    </label>
                                    <label class="btn btn-secondary">
                                        <input type="checkbox" name="3" autocomplete="off"> Wed
                                    </label>
                                    <label class="btn btn-secondary">
                                        <input type="checkbox" name="4" autocomplete="off"> Thu
                                    </label>
                                    <label class="btn btn-secondary">
                                        <input type="checkbox" name="5" autocomplete="off"> Fri
                                    </label>
                                    <label class="btn btn-secondary">
                                        <input type="checkbox" name="6" autocomplete="off"> Sat
                                    </label>
                                </div>
                                <hr />
                                <div>
                                    <div class="form-group">
                                        <label for="day_schedule_post">Select Time</label>
                                        <input type="text" class="form-control border border-light"
                                               id="day_schedule_post" placeholder="dd-mm-yyyy">
                                    </div>
                                </div>
                                <hr>
                                {{--<div>--}}
                                    {{--<label>Select types</label>--}}
                                    {{--<div class="custom-control custom-radio">--}}
                                        {{--<input type="radio" id="all_imgs" name="customRadio"--}}
                                               {{--class="custom-control-input">--}}
                                        {{--<label class="custom-control-label" for="all_imgs">All images</label>--}}
                                    {{--</div>--}}
                                    {{--<div class="custom-control custom-radio">--}}
                                        {{--<input type="radio" id="single_img" name="customRadio"--}}
                                               {{--class="custom-control-input">--}}
                                        {{--<label class="custom-control-label" for="single_img">Single image</label>--}}
                                    {{--</div>--}}
                                    {{--<div class="custom-control custom-radio">--}}
                                        {{--<input type="radio" id="random_imgs" name="customRadio"--}}
                                               {{--class="custom-control-input">--}}
                                        {{--<label class="custom-control-label" for="random_imgs">Random images</label>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            </div>

                            <div class="row m-0 p-0">
                                <button type="button" onclick="schedule(1)" class="btn btn-primary btn-sm col-5 mr-3"><i id="test" class="fa fa-spinner fa-spin" style="display: none"></i> <span id="testText">Schedule Post</span></button>
                                <button type="button" onclick="schedule(5)" class="btn btn-secondary btn-sm col-5"><i id="draftspinstyle" class="fa fa-spinner fa-spin" style="display: none"></i> <span id="draftspin">Draft</span></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </main>

    @endsection


@section('script')
    <script>
        //for GA
        var eventCategory = 'Schedule';
        var eventAction = 'Schedule-Messages';
        var normalChecked =0;
        var daywsiseChecked =0;
        // schedule post emoji
        $("#schedule_post_area").emojioneArea({
            pickerPosition: "right",
            tonesStyle: "bullet"
        });

        // schedule_post
        $(function () {
            // schedule_post normal
            $('#schedule_normal_post').datetimepicker({
                minDate:moment(),
                format: 'YYYY/MM/DD - H:mm'
            });
            // day wise schedule post
            $('#day_schedule_post').datetimepicker({
                minDate:moment(),
                format: 'YYYY/MM/DD - H:mm'
            });
        });

        // --------------------- //
        // schedule div toggle
        // --------------------- //
        $("#schedule_normal_div").hide();
        $(".schedule_normal_post").click(function () {
            if ($(this).is(":checked")) {
                normalChecked = 1;
                $("#schedule_normal_div").show();
            } else {
                normalChecked = 0;
                $("#schedule_normal_div").hide();
            }
        });

        $("#day_wise_schedule_div").hide();
        $(".day_schedule_post").click(function () {
            if ($(this).is(":checked")) {
                daywsiseChecked = 1;
                $("#day_wise_schedule_div").show();
            } else {
                daywsiseChecked = 0;
                $("#day_wise_schedule_div").hide();
            }
        });

        // all social list div open
        $('.all_social_div').css({
            'display': 'none'
        });
        $('.all_social_btn').click(function () {
            $('.all_social_div').css({
                'display': 'block'
            });
            $('.all_social_btn').css({
                'display': 'none'
            });
        });


        //    images and videos upload
        $(function () {

            var names = [];
            $('#hint_brand').css("display", "none");
            $('body').on('change', '.picupload', function (event) {

                var getAttr = $(this).attr('click-type');
                var files = event.target.files;
                var output = document.getElementById("media-list");
                var z = 0
                if (getAttr == 'type1') {
                    $('#media-list').html('');
//                $('#media-list').html('<li class="myupload"><span><i class="fa fa-plus" aria-hidden="true"></i><input type="file" click-type="type2" id="picupload" class="picupload" multiple></span></li>');
                    $('#hint_brand').css("display", "block");
                    $('#option_upload').css("display", "none");
                    for (var i = 0; i < files.length; i++) {
                        var file = files[i];
                        names.push($(this).get(0).files[i].name);
                        if (file.type.match('image')) {
                            var picReader = new FileReader();
                            picReader.fileName = file.name
                            picReader.addEventListener("load", function (event) {
                                var picFile = event.target;
                                var div = document.createElement("li");
                                div.innerHTML = "<img src='" + picFile.result + "'" +
                                        "title='" + picFile.name + "'/><div  class='post-thumb'><div class='inner-post-thumb'><a href='javascript:void(0);' data-id='" + event.target.fileName + "' class='remove-pic'><i class='fa fa-times' aria-hidden='true'></i></a><div></div>";
                                $("#media-list").prepend(div);
                            });
                        } else {
                            var picReader = new FileReader();
                            picReader.fileName = file.name
                            picReader.addEventListener("load", function (event) {
                                var picFile = event.target;
                                var div = document.createElement("li");
                                div.innerHTML = "<video src='" + picFile.result + "'" +
                                        "title='" + picFile.name + "'></video><div id='" + z + "'  class='post-thumb'><div  class='inner-post-thumb'><a data-id='" + event.target.fileName + "' href='javascript:void(0);' class='remove-pic'><i class='fa fa-times' aria-hidden='true'></i></a><div></div>";
                                $("#media-list").prepend(div);
                            });
                        }
                        picReader.readAsDataURL(file);
                    }
                } else if (getAttr == 'type2') {
                    for (var i = 0; i < files.length; i++) {
                        var file = files[i];
                        names.push($(this).get(0).files[i].name);
                        if (file.type.match('image')) {
                            var picReader = new FileReader();
                            picReader.fileName = file.name
                            picReader.addEventListener("load", function (event) {
                                var picFile = event.target;
                                var div = document.createElement("li");
                                div.innerHTML = "<img src='" + picFile.result + "'" +
                                        "title='" + picFile.name + "'/><div  class='post-thumb'><div class='inner-post-thumb'><a href='javascript:void(0);' data-id='" + event.target.fileName + "' class='remove-pic'><i class='fa fa-times' aria-hidden='true'></i></a><div></div>";
                                $("#media-list").prepend(div);

                            });
                        } else {
                            var picReader = new FileReader();
                            picReader.fileName = file.name
                            picReader.addEventListener("load", function (event) {

                                var picFile = event.target;

                                var div = document.createElement("li");

                                div.innerHTML = "<video src='" + picFile.result + "'" +
                                        "title='" + picFile.name + "'></video><div class='post-thumb'><div  class='inner-post-thumb'><a href='javascript:void(0);' data-id='" + event.target.fileName + "' class='remove-pic'><i class='fa fa-times' aria-hidden='true'></i></a><div></div>";
                                $("#media-list").prepend(div);

                            });
                        }
                        picReader.readAsDataURL(file);
                    }
                    // return array of file name
                }
                console.log("bfe---->",names);
            });
            images = [];
            $('body').on('click', '.remove-pic', function () {
                $(this).parent().parent().parent().remove();
                var removeItem = $(this).attr('data-id');
                var yet = names.indexOf(removeItem);
                if (yet != -1) {
                    names.splice(yet, 1);
                }
                // return array of file name
                $('#option_upload').css("display", "block");
                images = names;

            });
            $('#hint_brand').on('hide', function (e) {
                names = [];
                z = 0;
            });
        });

    </script>
    <script>
        function schedule(scheduleType){
            var form = document.getElementById('scheduleForm');
//var checking = $('')
            var formData = new FormData(form);
            var selectDays = [];
            var selected = [];
            var selectedBoards = [];

            //for accounts
            $('#checkboxes input:checked').each(function() {
                selected.push($(this).attr('name'));
            });
            $('#boardsCheckbox input:checked').each(function() {
                selectedBoards.push($(this).attr('name'));
            });
            //for days selected
            $('#daywiseDayCheck input:checked').each(function() {
                selectDays.push($(this).attr('name'));
            });


            formData.append('checked',selected);
            formData.append('selectDays',selectDays);
            formData.append('scheduleType',scheduleType);
            formData.append('daywsiseChecked',daywsiseChecked);
            formData.append('normalChecked',normalChecked);
            formData.append('normalDateTime',$('#schedule_normal_post').val());
            formData.append('dayWiseDateTime',$('#day_schedule_post').val());
            formData.append('selectedBoards',selectedBoards);
            formData.append('draftToSchedule', 0);
            formData.append('scheduleStatus', scheduleType);
            // formData.append('med',images);




            $.ajax({
                url: "/schedule_post",
                data: formData,
                cache: false,
                processData: false,
                contentType: false,
                type: 'POST',
                beforeSend:function(){
                    $('#messageError').text("");

                    if(scheduleType == 1){
                        $('#test').show();
                        $('#testText').html('Uploading');
                    }else if(scheduleType == 0){
                        $('#draftspinstyle').show();
                        $('#draftspin').html('Uploading');
                    }
                },
                success: function (response) {

                    $('#test').hide();
                    $('#testText').html('Post');
                    $("#test").attr("disabled", true);
                    if(scheduleType == 1){
                        $('#test').hide();
                        $('#testText').html('Schedule Post');
                        $("#test").attr("disabled", true);
                    }else if(scheduleType == 0){
                        $('#draftspinstyle').hide();
                        $('#draftspin').html('Draft');
                        $("#draftspinstyle").attr("disabled", true);
                    }
                    if(response.code == 404){
                        console.log(response.message)
                        $('#messageError').text(response.message);
                    }else if(response.code == 400){
                        swal(response.message);
                    }else if(response.code == 200){
//                        document.getElementById("scheduleForm").reset();
                        swal(response.message);
                        document.getElementById("scheduleForm").reset();
                        $('#normalChecked').attr('checked', false);
                        $('#dayChecked').attr('checked', false);
                        $("#schedule_normal_post").text("");
                        $("#day_schedule_postt").text("");
                        $(".emojionearea-editor").text("");
                        $("#hint_brand").css("display","none");
                        $("#option_upload").css("display","block");
                        window.location.href = "{{env('APP_URL')}}post_history";
                    }else if(response.code == 405) {
                        swal({text: response.message,
                            icon: "error",
                            buttons: true,
                            dangerMode: true});
                    }
                    else if(response.code == 500){
                        swal("Something went wrong... Please try again after sometime");
                        document.getElementById("scheduleForm").reset();
                        $(".emojionearea-editor").text("");
                        $("#schedule_normal_post").text("");
                        $("#day_schedule_postt").text("");
                        $('#normalChecked').attr('checked', false);
                        $('#dayChecked').attr('checked', false);
                        $("#hint_brand").css("display","none");
                        $("#option_upload").css("display","block");
                    }
                },
                error:function(error){
                    console.log(error)
                    swal("Something went wrong... Please try again after sometime");
                    $('#scheduleForm').trigger("reset");
                    $(".emojionearea-editor").text("");
                    $("#schedule_normal_post").text("");
                    $("#day_schedule_postt").text("");
                    $('#normalChecked').attr('checked', false);
                    $('#dayChecked').attr('checked', false);
                    $("#hint_brand").css("display","none");
                    $("#option_upload").css("display","block");
                }
            })

        }
    </script>
    @endsection
