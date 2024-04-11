<style>
    .input-form {
      position: relative;
      font-family: Arial, Helvetica, sans-serif;
    }
  
    .input-form input, .input-form textarea, .input-form select {
      border: solid 1.9px #9e9e9e;
      border-radius: 1.3rem;
      background: none;
      padding: 1rem;
      font-size: 1rem;
      color: #000000;
      transition: border 150ms cubic-bezier(0.4, 0, 0.2, 1);
      width: 100%;
    }
  
    .textUser {
      position: absolute;
      left: 15px;
      color: #666666;
      pointer-events: none;
      transform: translateY(1rem);
      transition: 150ms cubic-bezier(0.4, 0, 0.2, 1);
    }
  
    .input-form input:focus, .input-form input:valid, .input-form textarea:focus, .input-form textarea:valid,
    .input-form select:focus, .input-form select:valid {
      outline: none;
      box-shadow: 1px 2px 5px rgba(133, 133, 133, 0.523);
      background-image: linear-gradient(to top, rgba(182, 182, 182, 0.199), rgba(252, 252, 252, 0));
      transition: background 4s ease-in-out;
    }
  
    .input-form input:focus ~ label, .input-form input:valid ~ label,
    .input-form textarea:focus ~ label, .input-form textarea:valid ~ label,
    .input-form select:focus ~ label, .input-form select:valid ~ label {
      transform: translateY(-95%) scale(0.9);
      padding: 0 .2em;
      color: #000000be;
      left: 10%;
      font-size: 14pt;
      visibility: visible!important;
    }
  
    .input-form input:hover, .input-form textarea:hover, .input-form select:hover {
      border: solid 1.9px #000002;
      transform: scale(1.03);
      box-shadow: 1px 1px 5px rgba(133, 133, 133, 0.523);
      transition: border-color 1s ease-in-out;
    }
  
  
  
    .container2 {
      height: 300px;
      width: 300px;
      border-radius: 10px;
      box-shadow: 4px 4px 30px rgba(0, 0, 0, .2);
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: space-between;
      padding: 10px;
      gap: 5px;
      background-color: rgba(0, 110, 255, 0.041);
    }
  
    .header {
      flex: 1;
      width: 100%;
      border: 2px dashed royalblue;
      border-radius: 10px;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
      background-size: contain;
      background-position: center;
      background-repeat: no-repeat;
    }
  
    .header svg {
      height: 100px;
    }
  
    .header p {
      text-align: center;
      color: black;
    }
  
    .footer {
      background-color: rgba(0, 110, 255, 0.075);
      width: 100%;
      height: 40px;
      padding: 8px;
      border-radius: 10px;
      cursor: pointer;
      display: flex;
      align-items: center;
      justify-content: flex-end;
      color: black;
      border: none;
    }
  
    .footer svg {
      height: 130%;
      fill: royalblue;
      background-color: rgba(70, 66, 66, 0.103);
      border-radius: 50%;
      padding: 2px;
      cursor: pointer;
      box-shadow: 0 2px 30px rgba(0, 0, 0, 0.205);
    }
  
    .footer p {
      flex: 1;
      text-align: center;
    }
  
    #file {
      display: none;
    }
  
    .label-container {
            display: inline-block;
            width: 150px; /* Ajusta el ancho según lo que necesites */
            height: 150px; /* Ajusta la altura según lo que necesites */
            border: 1px solid #ccc; /* Agrega un borde para que sea visible */
  
        }

        .header img {
    max-width: 100%;
    max-height: 100%;
}
  
    </style>
  
  @extends('layout.template')
  
  @section('content')
      <div class="container">
          <div class="row justify-content-center">
              <div class="col-lg-11">
                  <div class="card">
                      <div class="card-header">
                          <h2 class="card-title">Actualizar Cuenta: {{ $user->id}}</h2>
                      </div>
  
                      <div class="card-body">
                          <div class="row">
                              <div class="col-lg-11">
                                  <!-- Formulario para actualizar la cuenta de usuario -->

                                  <form action="{{ route('userInfoUpdate', ['id' => $user->id]) }}" method="POST" enctype="multipart/form-data"
                                      class="role-form" onsubmit="mostrarLoader()">
                                      @csrf
                                      @method('PUT')
  
  
                                      <div class="row mb-5">
                                        
                                        <div class="col-md-6">
                                          <div class="input-form">
                                            <input type="text" id="email" name="email" value="{{ $user->email }}" required >
                                            <label for="email" class="textUser ">Correo electrónico:</label>
                                          </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-form">
                                                <input type="text" id="seguroMedico" name="seguroMedico" class="user-fields" value="{{ $paciente != null ? $paciente->seguro_medico : '' }}" required="true">
                                                <label for="seguroMedico" class="textUser">Seguro medico</label>
                                            </div>
                                          </div>
                                      </div>
              
                                      <div class="row mb-5"  >
                                        <div class="col-md-3">
                                          <div class="input-form">
                                            <input type="text" id="name" name="name" class="others-fields" 
                                            value="{{ $paciente->primer_nombre }}" required="true">
                                              <label for="name" class="textUser">Primer Nombre</label>
                                          </div>
                                      </div>
                                        <div class="col-md-3">
                                          <div class="input-form">
                                            <input type="text" id="secondname" name="secondname" class="others-fields" 
                                            value="{{ $paciente->segundo_nombre }}"
                                            >
                                              <label for="name" class="textUser">Segundo Nombre</label>
                                          </div>
                                      </div>
                                      <div class="col-md-3">
                                        <div class="input-form">
                                          <input type="text" id="lastname" name="lastname" class="others-fields"
                                          value="{{  $paciente->primer_apellido }}"
                                          required="true">
                                            <label for="name" class="textUser">Apellido Paterno</label>
                                        </div>
                                    </div>
                                      <div class="col-md-3">
                                        <div class="input-form"> 
                                          <input type="text" id="secondlastname" name="secondlastname" class="others-fields"
                                          value="{{ $paciente->segundo_apellido }}"
                                          >
                                          
                                            <label for="name" class="textUser">Apellido materno</label>
                                        </div>
                                      </div>
                                      </div>
                                      <div class="row mb-5">
                                        <div class="col-md-3">
                                          <div class="input-form">
                                            <input type="date" id="fecha" name="fecha" class="others-fields"
                                            value="{{  date('Y-m-d', strtotime($paciente->fecha_nacimiento)) }}"
                                            required="true">
                                            <label for="fecha" class="textUser" style="visibility: hidden">Fecha de nacimiento</label>
                                        </div>
                                      </div>
                                      <div class="col-md-3">
                                        <div class="input-form">
                                          <select id="genero" name="genero" class="others-fields" required="true">
                                              <option value="">Seleccionar género</option>
                                              <option value="masculino" {{  $paciente->genero  === 'masculino' ? 'selected' : '' }}>Masculino</option>
                                              <option value="femenino" {{  $paciente->genero  === 'femenino' ? 'selected' : '' }}>Femenino</option>
                                          </select>
                                          <label for="genero" class="textUser" style="visibility: hidden">Género</label>
                                      </div>
                                      </div>
                                      <div class="col-md-3">
                                        <div class="input-form">
                                          <input type="tel" id="telefono" name="numeroTelefono" class="others-fields" 
                                          value="{{  $paciente->telefono }}"
                                          required="true" >
                                          
                                          <label for="telefono" class="textUser fixed-label">Numero del telefono</label>
                                        </div>                          
                                      </div>
                                      <div class="col-md-3">
                                        <div class="input-form">
                                          <input type="text" id="direccion" name="direccion" 
                                          value="{{  $paciente->dirreccion }}"
                                           class="others-fields" required="true">
                                          
                                            <label for="direccion" class="textUser">Direccion</label>
                                        </div>
                                      </div>
                                    </div>


                                    <div class="row mb-5">
                                      <div class="container2 col-md-4">
                                          <label for="file" class="header" id="image_label" style="height: 100%">
                                              <svg id="svg" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                  <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                  <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                                  <g id="SVGRepo_iconCarrier"> 
                                                      <path d="M7 10V9C7 6.23858 9.23858 4 12 4C14.7614 4 17 6.23858 17 9V10C19.2091 10 21 11.7909 21 14C21 15.4806 20.1956 16.8084 19 17.5M7 10C4.79086 10 3 11.7909 3 14C3 15.4806 3.8044 16.8084 5 17.5M7 10C7.43285 10 7.84965 10.0688 8.24006 10.1959M12 12V21M12 12L15 15M12 12L9 15" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                  </g>
                                              </svg> 
                                              <strong id="subir">Selecciona una imagen desde tu computadora</strong>
                                              <img id="image_preview" src="{{ $paciente->foto ? asset('storage/' . $paciente->foto) : '' }}">
                                              <input type="file" name="profile_image" id="file" style="display:none;" accept="image/*">
                                          </label>
                                      </div>
                                  </div>
                                  
            
                                      <button type="submit" class="btn btn-primary">Actualizar Cuenta</button>
                                  </form>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  
      @include('layout.footer')
  </main>
  @endsection

  <script>
    document.addEventListener("DOMContentLoaded", function() {
        // Obtener referencia a los elementos
        var fileInput = document.getElementById('file');
        var imagePreview = document.getElementById('image_preview');
        var subirLabel = document.getElementById('subir');
        var svg = document.getElementById('svg');

        // Manejar cambios en el input de archivo
        fileInput.addEventListener('change', function() {
            var file = this.files[0];
            if (file) {
                // Mostrar la imagen seleccionada
                var reader = new FileReader();
                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                    imagePreview.style.display = 'block';
                };
                reader.readAsDataURL(file);
                
                // Ocultar el strong y el SVG
                subirLabel.style.display = 'none';
                svg.style.display = 'none';
            } else {
                // Si no se selecciona ningún archivo, restaurar la vista predeterminada
                imagePreview.src = '';
                imagePreview.style.display = 'none';
                subirLabel.style.display = 'block';
                svg.style.display = 'block';
            }
        });

        // Verificar si ya hay una imagen presente
        if (imagePreview.src !== '' && imagePreview.src !== 'data:') {
            subirLabel.style.display = 'none';
            svg.style.display = 'none';
        }
    });
</script>
