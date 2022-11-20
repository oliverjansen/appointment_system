<!DOCTYPE html>
<html>
<head>
<title>How to Disable Specific Dates in Bootstrap Datepicker using jQuery?</title>
    <!-- Bootstrap 4 CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Bootstrap Datepicker CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3 mt-5">
                <div class="card">
                    <div class="card-header">How to Disable Specific Dates in Bootstrap Datepicker using jQuery?</div>
                    <div class="card-body">
                        
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="date">Date</label>
                                <input type="text" class="form-control datepicker" placeholder="Date" name="date">
                            </div>
                          <button type="submit" class="btn btn-primary">Submit</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- Bootstrap 4 JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Bootstrap Datepicker JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript">

        var datesForDisable = ["08-5-2021", "08-10-2021", "08-15-2021", "08-20-2021"]

        $('.datepicker').datepicker({
            format: 'mm-dd-yyyy',
            daysOfWeekHighlighted: "0,6",
            daysOfWeekDisabled: [0, 6],
            startDate: new Date()
        });
    </script>
</body>
</html>