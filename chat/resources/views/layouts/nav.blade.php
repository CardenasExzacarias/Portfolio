<div class="container-fluid" style="padding: 0em !important;">
    <nav class="navbar">
        <div class="container-fluid row">
            <div class="col-2 mx-2 d-flex align-items-center justify-content-center">
                <h2>{{ session('user')['name'] }}</h2>
            </div>
            <div class="col-6 d-flex align-items-center justify-content-center">
                <input class="form-control search-input" type="text" name="user" placeholder="Buscar usuarios..."
                    data-bs-toggle="modal" data-bs-target="#find">
            </div>
            <div class="col-2 mx-2 d-flex align-items-center justify-content-end">
                <a class="d-flex justify-content-end" href="{{ secure_url('logout') }}">
                    <button class="btn btn-outline-danger bg-danger">Cerrar Sesion</button>
                </a>
            </div>
        </div>
    </nav>
</div>
<!-- Modal -->
<div class="modal fade" id="find" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="findLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content bg-dark">
            <div class="mx-5 mt-3">
                <form class="d-flex" action="{{ secure_url('search') }}" id="search">
                    {{ csrf_field() }}
                    <input class="form-control me-2" type="text" name="user" placeholder="Buscar usuarios...">
                    <input class="btn btn-outline-success bg-success" style="color:#fff !important;" type="submit"
                        value="Buscar">
                </form>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="closeModal">Close</button>
            </div>
        </div>
    </div>
</div>
