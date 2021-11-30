<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add Event Form - Laravel 8 CRUD</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css">
</head>

<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left mb-2">
                    <h2>Add Event</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('event.index') }}"> Back</a>
                </div>
            </div>
        </div>
        @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
        @endif
        <form action="{{ route('event.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Event Name:</strong>
                        <input type="text" name="event_title" class="form-control" placeholder="Event Name">
                        @error('event_title')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Event StartDate:</strong>
                        <div class='input-group date' id='startdatetimepicker'>
                            <input type="text" name="start_date" class="form-control" placeholder="Event StartDate">
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
                            <input type="text" name="end_date" class="form-control" placeholder="Event EndDate">
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
                        <input type="radio" id="recurrence" name="recurrence" value="repeat">
                        <label for="html">Repeat</label>
                        <!-- <label for="cars">Choose a car:</label> -->

                        <select name="repeat_time" id="Every">
                            <option value="">Select</option>
                            <option value="1">Every</option>
                            <option value="2">Every other</option>
                            <option value="3">Every Third</option>
                            <option value="4">Every Fourth</option>
                        </select>

                        <select name="cycle" id="Every">
                            <option value="">Select</option>
                            <option value="day">Day</option>
                            <option value="week">Week</option>
                            <option value="month">Month</option>
                            <option value="year">Year</option>
                        </select>
                        <br>
                        <input type="radio" id="Every_other" name="recurrence" value="repeat_on">
                        <label for="html">Repeat on the</label>

                        <select name="repeat_on_time" id="Every">
                            <option value="">Select</option>
                            <option value="1">First</option>
                            <option value="2">Second</option>
                            <option value="3">Third</option>
                            <option value="4">Fourth</option>
                        </select>


                        <select name="week_of_day" id="Every">
                            <option value="">Select</option>
                            <option value="sun">Sun</option>
                            <option value="mon">Mon</option>
                            <option value="tue">Tue</option>
                            <option value="wed">Wed</option>
                            <option value="thu">Thu</option>
                            <option value="fri">Fri</option>
                            <option value="Sat">Sat</option>
                        </select>

                        of the 
                        <select name="months" id="month">
                            <option value="">Select</option>
                            <option value="month">Month</option>
                            <option value="3month">3Month</option>
                            <option value="4month">4Month</option>
                            <option value="6month">6Month</option>
                            <option value="year">Year</option>
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
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript">
    $(function() {
        $('#startdatetimepicker').datetimepicker({
            format: 'Y-M-D'
        });
        $('#enddatetimepicker').datetimepicker({
            format: 'Y-M-D'
        });
    });
</script>

</html>