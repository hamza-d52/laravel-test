<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet"  href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">

    <title>Hello, world!</title>
  </head>
  <body>
    <div class="container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <h1 class="text-center">{{ $country->country_name }} Companies and User</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>Company</th>
                        <th>User</th>
                        <th>Joining Date</th>
                    </tr>

                </thead>
                <tbody>
                    @foreach($country->companies as $company)
                        @forelse($company->users as $user)
                            <tr>
                                <td>{!!$company->company_name !!}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->pivot->joining_date }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td>{!! $company->copmany_name !!}</td>
                                <td></td>
                                <td></td>
                            </tr>

                        @endforelse
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('table').DataTable();
        });
    </script>
  </body>
</html>