<!DOCTYPE html>
<html>
<head>
    <title>Editar Tipo de Mercancía - SenaDelivery</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-warning text-dark">
                <h4 class="mb-0">
                    <i class="bi bi-pencil-square"></i> Editar Tipo de Mercancía
                </h4>
            </div>
            <div class="card-body">
                <form action="/tipos-mercancia/{{ $tipoMercancia->id }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-3">
                        <label for="tipo" class="form-label">Tipo de Mercancía:</label>
                        <input type="text" name="tipo" id="tipo" class="form-control" 
                               value="{{ old('tipo', $tipoMercancia->tipo) }}" required>
                        @if($errors->has('tipo'))
                            <div class="text-danger mt-1">{{ $errors->first('tipo') }}</div>
                        @endif
                    </div>
                    
                    <div class="d-flex justify-content-between">
                        <a href="/tipos-mercancia" class="btn btn-secondary">
                            <i class="bi bi-arrow-left"></i> Cancelar
                        </a>
                        <button type="submit" class="btn btn-warning">
                            <i class="bi bi-save"></i> Actualizar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
