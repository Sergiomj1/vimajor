
@extends ('layouts.admin')
@section('content')


    <div class="mainView" role="main" style="min-height:400px;">
        @if(Auth::user()->hasRole('admin'))
            <a class="btn btn-primary links-cortos" href="{{route('propiedades.create')}}">Crear Propiedad </a>
        @endif

        <div class="admin-container">
            <div style="text-align:center;">
                <h1 class="admin-header">Panel de administración</h1>
                <div class="responsive-account-content">
                    <section class="collapsable-section-content account-section-content">
                        <a class="btn hero-cta-btn btn-large btn-blue" role="link" style="width:256px;" href="{{route('verusuarios.index')}}">Administrar Usuarios</a>
                        <a class="btn hero-cta-btn btn-large btn-blue" role="link" style="width:256px;" href="{{route('vervideos.index')}}">Administrar Videos</a><br/>

                    </section>
                </div>
            </div>
        </div>
    </div>

@endsection
