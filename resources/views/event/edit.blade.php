<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Event</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Edit Event</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('event.index') }}" enctype="multipart/form-data"> Back</a>
                </div>
            </div>
        </div>
        @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
        @endif
        <form action="{{ route('event.update',$event->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Event Name:</strong>
                        <input type="text" name="event_title" class="form-control" value="{{$event->event_title}}" placeholder="Event Name">
                        @error('event_title')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Event StartDate:</strong>
                        <div class='input-group date' id='startdatetimepicker'>
                            <input type="text" name="start_date" value="{{$event->start_date}}" class="form-control" placeholder="Event StartDate">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                        @error('start_date')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Event EndDate:</strong>
                        <div class='input-group date' id='enddatetimepicker'>
                            <input type="text" name="end_date" class="form-control" value="{{$event->end_date}}" placeholder="Event EndDate">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                        @error('end_date')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Event Recurrence:</strong><br>
                        <input type="radio" id="repeat" name="recurrence" {{($event->recurrence == "repeat")?"checked" :""}} value="repeat">
                        <label for="html">Repeat</label>

                        <select name="time" id="Every">
                            <option value="">Select</option>
                            <option value="1" {{($event->time == 1)? "selected" :""}}>Every</option>
                            <option value="2" {{($event->time == 2)? "selected" :""}}>Every other</option>
                            <option value="3" {{($event->time == 3)? "selected" :""}}>Every Third</option>
                            <option value="4" {{($event->time == 4)? "selected" :""}}>Every Fourth</option>
                        </select>

                        <select name="cycle" id="Every">
                            <option value="">Select</option>
                            <option value="day" {{($event->cycle == "day")? "selected" :""}}>Day</option>
                            <option value="week"{{($event->cycle == "week")? "selected" :""}}>Week</option>
                            <option value="month"{{($event->cycle == "month")? "selected" :""}}>Month</option>
                            <option value="year"{{($event->cycle == "year")? "selected" :""}}>Year</option>
                        </select>
                        <br>
                        <input type="radio" id="repeat_on" name="recurrence" {{($event->recurrence == "repeat_on")?"checked" :""}} value="repeat_on">
                        <label for="html">Repeat on the</label>
                        @if($event->recurrence == "repeat_on")
                        <select name="time" id="Every">
                            <option value="">Select</option>
                            <option value="1" {{($event->time == 1)? "selected" :""}}>Every</option>
                            <option value="2" {{($event->time == 2)? "selected" :""}}>Every other</option>
                            <option value="3" {{($event->time == 3)? "selected" :""}}>Every Third</option>
                            <option value="4" {{($event->time == 4)? "selected" :""}}>Every Fourth</option>
                        </select>
                        @else
                        <select name="time" id="Every">
                            <option value="">Select</option>
                            <option value="1">Every</option>
                            <option value="2">Every other</option>
                            <option value="3">Every Third</option>
                            <option value="4">Every Fourth</option>
                        </select>

                        @endif


                        <select name="week_of_day" id="Every">
                            <option value="">Select</option>
                            <option value="sun" {{($event->week_of_day == "sun")? "selected" :""}}>Sun</option>
                            <option value="mon"{{($event->week_of_day == "mon")? "selected" :""}}>Mon</option>
                            <option value="tue"{{($event->week_of_day == "tue")? "selected" :""}}>Tue</option>
                            <option value="wed"{{($event->week_of_day == "wed")? "selected" :""}}>Wed</option>
                            <option value="thu"{{($event->week_of_day == "thu")? "selected" :""}}>Thu</option>
                            <option value="fri"{{($event->week_of_day == "fri")? "selected" :""}}>Fri</option>
                            <option value="Sat"{{($event->week_of_day == "sat")? "selected" :""}}>Sat</option>
                        </select>

                        Of the
                        <select name="months" id="month">
                            <option value="">Select</option>
                            <option value="month" {{($event->months == "month")? "selected" :""}}>Month</option>
                            <option value="3month" {{($event->months == "3month")? "selected" :""}}>3Month</option>
                            <option value="4month" {{($event->months == "4month")? "selected" :""}}>4Month</option>
                            <option value="6month" {{($event->months == "6month")? "selected" :""}}>6Month</option>
                            <option value="year" {{($event->months == "year")? "selected" :""}}>Year</option>
                        </select>
                        <br>
                        @error('recurrence')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary ml-3">Submit</button>
            </div>
        </form>
    </div>
</body>

</html>