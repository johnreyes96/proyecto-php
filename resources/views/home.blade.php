@extends('layouts.app')

@section('contenido')
<div class="card bg-dark text-white">
  <img src="img/banner-car-4.jpg" class="card-img">
  <div class="card-img-overlay">
  </div>
</div>
<br>
<div class="row">
    <div class="col-md-8 blog-main">
        <h3 class="pb-4 mb-4 font-italic border-bottom">
            Caracteristicas
        </h3>

        <div class="blog-post">
            <ul>
                <li>Control y gestión del personal que labora en el parqueadero.</li>
                <li>Control y consultas de horarios de turnos laborales del personal, y servicios atendidos.</li>
                <li>Control y gestión del servicio de parqueo y lavado de vehículos (motocicleta, automóvil, campero, camioneta y similares).</li>
                <li>Consultas del detalle de los servicios ofrecidos por el parqueadero.</li>
                <li>Estado de espacios o cupos disponibles en el parqueadero dependiendo del tipo de vehículo.</li>
                <li>Estado de turnos o cupos disponibles en el servicio de lavado dependiendo del tipo de vehículo.</li>
                <li>Generación del recibo de pago para los clientes, con el detalle del servicio del que han hecho uso.</li>
                <li>Consultas y reportes de ingresos de dinero por concepto de venta de servicios.</li>
            </ul>
        </div><!-- /.blog-post -->
    </div><!-- /.blog-main -->
    <aside class="col-md-4 blog-sidebar">
    <div class="p-4 mb-3 bg-light rounded">
        <h4 class="font-italic">Acerca de</h4>
        <p class="mb-0">SOVEHI es un sistema web para la gestión de un parqueadero y lavadero de vehículos.</p>
    </div>
    </aside><!-- /.blog-sidebar -->

</div><!-- /.row -->
@endsection
