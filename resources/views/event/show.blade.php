<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Laravel prectical</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>

<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2> Event view</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('event.index') }}"> Back</a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Event Title: </strong>
                    {{ $event->event_title }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <table class="table table-bordered">
                    <tr>
                        <th>Date</th>
                        <th>Day Name</th>
                    </tr>

                    <?php

                    $begin = new DateTime($event->start_date);
                    $end   = new DateTime($event->end_date);

                    for ($i = $begin; $i <= $end; $i->modify('+1 day')) {
                    ?>
                        <tr>
                            <?php
                            echo "<td>" . $i->format("Y-m-d") . "</td>";
                            echo "<td>" . date('l', strtotime($i->format("Y-m-d"))) . "</td>";
                            ?>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
</body>

</html>