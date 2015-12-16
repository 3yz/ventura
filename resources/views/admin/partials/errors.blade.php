@if (count($errors) > 0)
  <div class="alert alert-danger">
    <strong>Atenção</strong>
    Verifique os problemas abaixo antes de continuar.<br><br>
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif