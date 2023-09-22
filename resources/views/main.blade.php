<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Información de vuelos</title>

    <!-- ===============================================-->
    <!-- Stylesheets -->
    <!-- ===============================================-->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        crossorigin="anonymous">
    <link href="{{ URL::asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/css/custom.css') }}" rel="stylesheet" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <link rel="icon" type="image/jpg" href="{{ URL::asset('assets/img/logo.png')}}"/>

    <!-- ===============================================-->
    <!-- JavaScripts -->
    <!-- ===============================================-->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>

    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@200;300;400;500;600;700;800;900&amp;display=swap"
        rel="stylesheet">
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
                                <input type="date" class="form-control text-center" id="date" />
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
                            <select class="form-select select py-1" aria-label="Default select example">
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
                    <span class="operations">Seville Arrivals</span>
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
            <div class="col-11 p-0" id="reload">
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
                                <tr>
                                    @foreach ($flights as $flight)
                                <tr>
                                    <td class="flight-ident">{{ $flight->ident }}</td>
                                    <td class="flight-status">{{ $flight->status }}</td>
                                    <td class="flight-gate-origin">{{ $flight->gate_origin }}</td>
                                    <td class="flight-progress">{{ $flight->progress_percent }}</td>
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

    <div class="modal fade" id="newFlightModal" tabindex="-1" role="dialog" aria-labelledby="newFlightModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newFlightModalLabel">Nuevo Registro de Vuelo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Ident: <span id="flightIdent">{{ $flight->ident }} - Origin: {{$flight->origin_city}}</span></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>


    <script>
        var isNewFlight = true; 

        if (isNewFlight) {
            $('#newFlightModal').modal('show');
        }
    </script>

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
    
<script>
    // Función para obtener el estado anterior de la página desde una cookie
    function obtenerEstadoAnterior() {
        var estadoAnterior = {};

        // Obtener el valor de la cookie que almacena el estado anterior
        var cookieValue = document.cookie.replace(/(?:(?:^|.*;\s*)estadoAnterior\s*=\s*([^;]*).*$)|^.*$/, "$1");

        if (cookieValue) {
            estadoAnterior = JSON.parse(cookieValue);
        }

        return estadoAnterior;
    }

    // Comparar el estado anterior con el estado actual y aplicar la clase changed-color si hay cambios
    $(document).ready(function() {
        var estadoAnterior = obtenerEstadoAnterior();

        // Iterar sobre las filas de vuelo y comparar con el estado anterior
        $('.flight-ident').each(function(index, element) {
            var ident = $(element).text();
            var status = $(element).closest('tr').find('.flight-status').text();
            var gateOrigin = $(element).closest('tr').find('.flight-gate-origin').text();
            var progressPercent = $(element).closest('tr').find('.flight-progress').text();

            if (
                estadoAnterior[ident] &&
                (estadoAnterior[ident].status !== status ||
                estadoAnterior[ident].gateOrigin !== gateOrigin ||
                estadoAnterior[ident].progressPercent !== progressPercent)
            ) {
                // Hay un cambio en esta fila, aplica la clase CSS changed-color
                $(element).closest('tr').addClass('changed-color');
            }
        });

        // Guardar el estado actual en una cookie
        var estadoActual = {};

        $('.flight-ident').each(function(index, element) {
            var ident = $(element).text();
            var status = $(element).closest('tr').find('.flight-status').text();
            var gateOrigin = $(element).closest('tr').find('.flight-gate-origin').text();
            var progressPercent = $(element).closest('tr').find('.flight-progress').text();

            estadoActual[ident] = {
                status: status,
                gateOrigin: gateOrigin,
                progressPercent: progressPercent
            };
        });

        document.cookie = "estadoAnterior=" + JSON.stringify(estadoActual);
    });
</script>

    {{-- <script>
        function autoReload() {
            location.reload();
        }

        setInterval(autoReload, 20000);
    </script> --}}

</body>

</html>
