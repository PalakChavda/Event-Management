<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Laravel prectical</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazyload/1.9.1/jquery.lazyload.js"></script>


    <style type="text/css">
        table {
            width: 100%;
            height: 20px;
            border: 1px solid #e1e1e1;
        }

        .col-md-4 {
            padding-bottom: 70px;
        }

        h2 {
            padding-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Laravel Prectical</h2>
                </div>
                <div class="pull-right mb-2">
                    <a class="btn btn-success" href="{{ route('event.create') }}"> Create event</a>
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif
        <table class="table table-bordered">
            <tr>
                <th>S.No</th>
                <th>Event Name</th>
                <th>Event Date</th>
                <th>Event Occurrence</th>
                <th width="280px">Action</th>
            </tr>

            @foreach ($event as $evt)
            <tr>
                <td>{{ $evt->id }}</td>
                <td>{{ $evt->event_title }}</td>
                <td>{{ $evt->start_date }} to {{ $evt->end_date }}</td>
                @if($evt->recurrence == "repeat")
                    @if($evt->repeat_time == 1)
                    <td>Every  {{ $evt->cycle }}</td>
                    @elseif($evt->repeat_time == 2)
                    <td>Every other  {{ $evt->cycle }}</td>
                    @elseif($evt->repeat_time == 3)
                    <td>Every Third {{ $evt->cycle }}</td>
                    @else($evt->repeat_time == 4)
                    <td>Every Fourth {{ $evt->cycle }}</td>
                    @endif
                @else
                    @if($evt->repeat_on_time == 1)
                    <td>First {{ $evt->week_of_day }} of the {{ $evt->months }}</td>
                    @elseif($evt->repeat_on_time == 2)
                    <td>Second {{ $evt->week_of_day }} of the {{ $evt->months }}</td>
                    @elseif($evt->repeat_on_time == 3)
                    <td>Third {{ $evt->week_of_day }} of the {{ $evt->months }}</td>
                    @else($evt->repeat_on_time == 4)
                    <td>Fourth {{ $evt->week_of_day }} of the {{ $evt->months }}</td>
                    @endif
                <!-- <td>{{ $evt->time }} {{ $evt->week_of_day }} of the {{ $evt->months }} </td> -->
                @endif
                <td>
                    <form action="{{ route('event.destroy',$evt->id) }}" method="Post">
                        <a class="btn btn-primary" href="{{ route('event.show',$evt->id) }}">View</a>
                        <a class="btn btn-primary" href="{{ route('event.edit',$evt->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
        {!! $event->links() !!}
    </div>
    
</body>
<script type="text/javascript">
    $("table").lazyload({
        effect: "fadeIn"
    });

    //     $(document).ready(function() {
    //    var table = $('.table').DataTable({
    //      "language": {
    //                     "processing": '<i class="fa fa-spinner fa-spin" style="font-size:24px;color:rgb(75, 183, 245);"></i>'
    //                  }
    //    });
    //  });
</script>

</html>