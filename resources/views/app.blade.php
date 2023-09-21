<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Información de vuelos</title>

    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        crossorigin="anonymous">
    <link href="{{ URL::asset('assets/css/theme.css') }}" rel="stylesheet" />

    <link href="{{ URL::asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/css/custom.css') }}" rel="stylesheet" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">

    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->

    <script defer src="{{ URL::asset('assets/vendors/bootstrap/bootstrap.min.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.5/jquery-ui.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@200;300;400;500;600;700;800;900&amp;display=swap"
        rel="stylesheet">

    <script defer src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

    @routes
</head>

<body>

    <div class="customNavbar">
        <div class="container-fluid">
            <div class="row">
                <div class="col-4">
                    <form class="row col-12">
                        <div class="text-center col-6 px-5 py-2">
                            <div class="input-group date" data-provide="datepicker">
                                <span class="input-group-text bg-light d-block">
                                    <i class="fa-solid fa-arrow-left"></i>
                                </span>
                                <input type="text" class="form-control" id="date" />
                                <div class="input-group-append">
                                    <span class="input-group-text bg-light d-block">
                                        <i class="fa-solid fa-arrow-right"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="py-1">
                                <button class="btn py-1">
                                    <span>Today</span>
                                </button>
                            </div>
                        </div>
                        <div class="col-2 py-2">
                            <select class="form-select select" aria-label="Default select example">
                                <option selected>TFS</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                            </select>
                        </div>
                    </form>

                    <div class="col-6 px-2 py-2">
                        <div class="input-group">
                            <input type="search" class="form-control rounded"
                                placeholder="Flight, Orig, Dest, Reg, etc" aria-label="Search"
                                aria-describedby="search-addon" />
                            <span class="input-group-text border-0" id="search-addon">
                                <i class="fas fa-search"></i>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="text-center py-5 col-8">
                    <span class="operations">Operations</span>
                </div>
            </div>
        </div>
    </div>

    <div class="divider">

    </div>

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-1 py-3">
                <!-- Sidebar -->
                <div class="sidebar bg-white list-group list-group-flush mx-5 mt-4">
                    <a href="#" class="list-group-item list-group-item-action py-2 ripple" aria-current="true">
                        <i class="fa-solid fa-plus"></i>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action py-2 ripple">
                        <i class="fa-solid fa-share-nodes"></i>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action py-2 ripple">
                        <i class="fa-solid fa-lock"></i>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action py-2 ripple">
                        <i class="fa-solid fa-eye-slash"></i>
                    </a>
                </div>
            </div>
            <div class="col-11 p-0">
                <div class="row">
                    <div class="col-5 p-0">
                        <table class="table border table-condensed m-0">
                            <h4>Flight Information</h4>
                            <thead>
                                <tr>
                                    <th>Ident</th>
                                    <th>Status</th>
                                    <th>Gate Origin</th>
                                    <th>Progress Percent</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($flights as $flight)
                                <tr>
                                    <td>{{ $flight->ident }}</td>
                                    <td>{{ $flight->status }}</td>
                                    <td>{{ $flight->gate_origin }}</td>
                                    <td>{{ $flight->progress_percent }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-3 p-0">
                        <!-- Contenido de la segunda columna -->
                        <table class="table border table-condensed m-0">

                            <h4>Arrivals</h4>

                            <thead>
                                <tr>
                                    <th>Origin City</th>
                                    <th>Origin Code</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($flights as $flight)
                                <tr>
                                    <td>{{ $flight->origin_city }}</td>
                                    <td>{{ $flight->origin_code }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                
                    <div class="col-3 p-0">
                        <table class="table border table-condensed m-0">
                            <h4>Departures</h4>
                            <thead>
                                <tr>
                                    <th>Destination City</th>
                                    <th>Destination Code</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($flights as $flight)
                                <tr>
                                    <td>{{ $flight->destination_city }}</td>
                                    <td>{{ $flight->destination_code }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>

<script>
    $(function() {
        $("#datepicker").datepicker();
    });
</script>

<script type="text/javascript">
    $(function() {
        // Obtener la fecha actual en el formato deseado (por ejemplo, YYYY-MM-DD)
        var today = new Date();
        var year = today.getFullYear();
        var month = String(today.getMonth() + 1).padStart(2,
            '0'); // Añadir ceros a la izquierda si es necesario
        var day = String(today.getDate()).padStart(2, '0'); // Añadir ceros a la izquierda si es necesario
        var currentDate = year + '-' + month + '-' + day;

        // Establecer la fecha actual en el campo de entrada
        $('#date').val(currentDate);

        // Inicializar el datepicker si aún no lo has hecho
        $('#datepicker').datepicker();
    });
</script>
