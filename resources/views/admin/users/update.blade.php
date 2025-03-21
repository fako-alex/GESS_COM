@extends('admin.layouts.app')


@section('content')

<form method="post" action="{{ route('admin.users.update.submit', $user->id)}}" enctype="multipart/form-data" class="mb-5 rounded-md border border-[#ebedf2] bg-white p-4 dark:border-[#191e3a] dark:bg-[#0e1726]">
    @csrf
    @method('PUT')

    <div class="panel">
        <div class="flex items-center justify-between mb-5">
            <h5 class="text-lg font-semibold dark:text-white-light">Modifier un personnel</h5>
        </div>
        <div class="mb-5">
            <ol class="flex font-semibold text-primary dark:text-white-dark">
                <li class="bg-[#ebedf2] ltr:rounded-l-md rtl:rounded-r-md dark:bg-[#1b2e4b]">
                    <a href="javascript:;"
                        class="relative flex h-full items-center p-1.5 before:absolute before:inset-y-0 before:z-[1] before:m-auto before:h-0 before:w-0 before:border-[16px] before:border-l-[15px] before:border-r-0 before:border-t-transparent before:border-b-transparent before:border-l-[#ebedf2] hover:text-primary/70 ltr:pl-3 ltr:pr-2 ltr:before:-right-[15px] rtl:pr-3 rtl:pl-2 rtl:before:-left-[15px] rtl:before:rotate-180 dark:before:border-l-[#1b2e4b] dark:hover:text-white-dark/70">personnels</a>
                </li>
                <li class="bg-[#ebedf2] dark:bg-[#1b2e4b]">
                    <a
                        class="relative flex h-full items-center bg-primary p-1.5 text-white-light before:absolute before:inset-y-0 before:z-[1] before:m-auto before:h-0 before:w-0 before:border-[16px] before:border-l-[15px] before:border-r-0 before:border-t-transparent before:border-b-transparent before:border-l-primary ltr:pl-6 ltr:pr-2 ltr:before:-right-[15px] rtl:pr-6 rtl:pl-2 rtl:before:-left-[15px] rtl:before:rotate-180">Modifier des personnels</a>
                </li>
            </ol>
        </div>
        <div class="flex justify-end"> <!-- Ajout de mb-4 pour l'espacement -->
            <a href="{{ url('users/list') }}" class="btn btn-primary">
                <!-- SVG for Add Book Icon -->
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2">
                    <path d="M2 5.5L3.21429 7L7.5 3" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path opacity="0.5" d="M2 12.5L3.21429 14L7.5 10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path d="M2 19.5L3.21429 21L7.5 17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path d="M22 19L12 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                    <path opacity="0.5" d="M22 12L12 12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                    <path d="M22 5L12 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                </svg>
                Liste du personnel
            </a>
        </div>

        <template x-if="codeArr.includes('code3')">
            <pre class="code overflow-auto rounded-md !bg-[#191e3a] p-4 text-white">&lt;!-- arrowed --&gt;
            &lt;ol class="flex font-semibold text-primary dark:text-white-dark"&gt;
            &lt;li class="bg-[#ebedf2] rounded-tl-md rounded-bl-md dark:bg-[#1b2e4b]"&gt;&lt;a href="javascript:;" class="p-1.5 ltr:pl-3 rtl:pr-3 ltr:pr-2 rtl:pl-2 relative  h-full flex items-center before:absolute ltr:before:-right-[15px] rtl:before:-left-[15px] rtl:before:rotate-180 before:inset-y-0 before:m-auto before:w-0 before:h-0 before:border-[16px] before:border-l-[15px] before:border-r-0 before:border-t-transparent before:border-b-transparent before:border-l-[#ebedf2] before:z-[1] dark:before:border-l-[#1b2e4b] hover:text-primary/70 dark:hover:text-white-dark/70"&gt;Home&lt;/a&gt;&lt;/li&gt;
            &lt;li class="bg-[#ebedf2] dark:bg-[#1b2e4b]"&gt;&lt;a class="bg-primary text-white-light p-1.5 ltr:pl-6 rtl:pr-6 ltr:pr-2 rtl:pl-2 relative  h-full flex items-center before:absolute ltr:before:-right-[15px] rtl:before:-left-[15px] rtl:before:rotate-180 before:inset-y-0 before:m-auto before:w-0 before:h-0 before:border-[16px] before:border-l-[15px] before:border-r-0 before:border-t-transparent before:border-b-transparent before:border-l-primary before:z-[1]"&gt;Components&lt;/a&gt;&lt;/li&gt;
            &lt;li class="bg-[#ebedf2] dark:bg-[#1b2e4b]"&gt;&lt;a href="javascript:;" class="p-1.5 px-3 ltr:pl-6 rtl:pr-6 relative  h-full flex items-center before:absolute ltr:before:-right-[15px] rtl:before:-left-[15px] rtl:before:rotate-180 before:inset-y-0 before:m-auto before:w-0 before:h-0 before:border-[16px] before:border-l-[15px] before:border-r-0 before:border-t-transparent before:border-b-transparent before:border-l-[#ebedf2] before:z-[1] dark:before:border-l-[#1b2e4b] hover:text-primary/70 dark:hover:text-white-dark/70"&gt;UI Kit&lt;/a&gt;&lt;/li&gt;
            &lt;/ol&gt;
            </pre>
        </template>
    </div>

    <div class="flex items-center px-6 py-4">
        <button type="button" class="block hover:text-primary ltr:mr-3 rtl:ml-3 xl:hidden"
            @click="isShowMailMenu = !isShowMailMenu">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                class="w-6 h-6">
                <path d="M20 7L4 7" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                <path opacity="0.5" d="M20 12L4 12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round">
                </path>
                <path d="M20 17L4 17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
            </svg>
        </button>
    </div>
    <div class="flex flex-col sm:flex-row">
        <div class="grid flex-1 grid-cols-1 gap-5 sm:grid-cols-3">
            <div>
                <label for="name">Nom</label>
                <input id="name" name="name" value="{{ old('name', $user->name) }}" type="text" placeholder="Exp : FAKO" class="form-input">
                @if($errors->has('name'))
                    <span class="text-red-500 badge-outline-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>

            <div>
                <label for="first_name">Prénom(s)</label>
                <input id="first_name" name="first_name" value="{{ old('first_name', $user->first_name) }}" type="text" placeholder="Exp : Alex" class="form-input">
                @if($errors->has('first_name'))
                    <span class="text-red-500 badge-outline-danger">{{ $errors->first('first_name') }}</span>
                @endif
            </div>

            <div>
                <label for="gender">Sexe</label>
                <select id="gender" name="gender" class="form-select">
                    <option value="">Sélectionner un sexe</option>
                    <option value="Feminin" {{ old('gender', $user->gender) == 'Feminin' ? 'selected' : '' }}>Féminin</option>
                    <option value="Masculin" {{ old('gender', $user->gender) == 'Masculin' ? 'selected' : '' }}>Masculin</option>
                </select>
                @if($errors->has('gender'))
                    <span class="text-red-500 badge-outline-danger">{{ $errors->first('gender') }}</span>
                @endif
            </div>

            <div>
                <label for="phone">N° de téléphone <span class="text-danger">*</span></label>
                <input type="tel" id="phone" value="{{ old('first_name', $user->phone) }}" name="phone" class="form-input" placeholder="(241) 77-22-71-07" maxlength="18" oninput="formatPhoneNumber(this)" required>
                @if($errors->has('phone'))
                    <span class="text-danger badge-outline-danger">{{ $errors->first('phone') }}</span>
                @endif
            </div>

            <div>
                <label for="email">Email <span class="text-danger">*</span></label>
                <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" class="form-input" placeholder="Entrez votre email" required>
                @if($errors->has('email'))
                    <span class="text-danger badge-outline-danger">{{ $errors->first('email') }}</span>
                @endif
            </div>

            <div>
                <label for="service">Service <span class="text-danger">*</span></label>
                <select id="service" name="service" class="form-input" required>
                    <option value="">Choisissez un service</option>
                    @foreach($services as $service)
                        <option value="{{ $service->id }}" {{ (old('service', $user->service_id) == $service->id) ? 'selected' : '' }}>
                            {{ $service->name }}
                        </option>
                    @endforeach
                </select>
                @if($errors->has('service'))
                    <span class="text-danger badge-outline-danger">{{ $errors->first('service') }}</span>
                @endif
            </div>

            <div>
                <label for="matricule">Matricule <span class="text-danger">*</span></label>
                <input type="matricule" id="matricule" name="matricule" value="{{ old('matricule', $user->matricule) }}" class="form-input" placeholder="Entrez votre matricule" required>
                @if($errors->has('matricule'))
                    <span class="text-danger badge-outline-danger">{{ $errors->first('matricule') }}</span>
                @endif
            </div>

            <div>
                <label for="birth_date">Date de naissance <span class="text-danger">*</span></label>
                <input id="birth_date" value="{{ old('birth_date', $user->birth_date) }}" name="birth_date" type="date" class="form-input" required>
                @if($errors->has('birth_date'))
                    <span class="text-danger badge-outline-danger">{{ $errors->first('birth_date') }}</span>
                @endif
            </div>

            <div>
                <label for="birth_place">Lieu de naissance</label>
                <input id="birth_place" value="{{ old('birth_place', $user->birth_place) }}" name="birth_place" type="text" placeholder="Lieu de naissance" class="form-input">
                @if($errors->has('birth_place'))
                    <span class="text-danger badge-outline-danger">{{ $errors->first('birth_place') }}</span>
                @endif
            </div>

            <div>
                <label for="country">Pays</label>
                <input id="country" value="{{ old('country', $user->country) }}" name="country" type="text" placeholder="Lieu de naissance" class="form-input">
                @if($errors->has('country'))
                    <span class="text-danger badge-outline-danger">{{ $errors->first('country') }}</span>
                @endif
            </div>

            <div>
                <label for="city">Ville</label>
                <input id="city" value="{{ old('city', $user->city) }}" name="city" type="text" placeholder="Lieu de naissance" class="form-input">
                @if($errors->has('city'))
                    <span class="text-danger badge-outline-danger">{{ $errors->first('city') }}</span>
                @endif
            </div>

            <div>
                <label for="neighborhood">Quartier <span class="text-danger">*</span></label>
                <input id="neighborhood" value="{{ old('neighborhood', $user->neighborhood) }}" name="neighborhood" type="text" placeholder="Lieu de naissance" class="form-input" required>
                @if($errors->has('neighborhood'))
                    <span class="text-danger badge-outline-danger">{{ $errors->first('neighborhood') }}</span>
                @endif
            </div>

            <div>
                <label for="hiring_date">Date d'emboche</label>
                <input id="hiring_date" value="{{ old('hiring_date', $user->hiring_date) }}" name="hiring_date" type="date" class="form-input">
                @if($errors->has('hiring_date'))
                    <span class="text-danger badge-outline-danger">{{ $errors->first('hiring_date') }}</span>
                @endif
            </div>

            <div>
                <label for="departure_date">Date de départ</label>
                <input id="departure_date" value="{{ old('departure_date', $user->departure_date) }}" name="departure_date" type="date" class="form-input" onchange="toggleDepartureDiv()">
                @if($errors->has('departure_date'))
                    <span class="text-danger badge-outline-danger">{{ $errors->first('departure_date') }}</span>
                @endif
            </div>

            <!-- Le div contenant la raison du départ, il sera affiché si departure_date est non vide -->
            <div id="departure_div" style="display: {{ $user->departure_date || old('departure_date') || request('departure_date') ? 'block' : 'none' }};">
                <label for="departure_id">Motif du départ <span class="text-danger">*</span></label>
                <select id="departure_id" name="departure_id" class="form-input" required>
                    <option value="">Sélectionner un motif de départ</option>
                    @foreach($departures as $departure)
                        <option value="{{ $departure->id }}" {{ old('departure_id', $user->departure_id) == $departure->id ? 'selected' : '' }}>
                            {{ $departure->name }}
                        </option>
                    @endforeach
                </select>
                @if($errors->has('departure_id'))
                    <span class="text-danger badge-outline-danger">{{ $errors->first('departure_id') }}</span>
                @endif
            </div>

            <div>
                <label for="role">Rôle <span class="text-danger">*</span></label>
                <select id="role" name="role" class="form-select" onchange="toggleFields()" required>
                    <option value="">Sélectionner un rôle</option>
                    <option value="Personnel" {{ old('role', $user->role) == 'Personnel' ? 'selected' : '' }}>Personnel</option>
                    <option value="Admin" {{ old('role', $user->role) == 'Admin' ? 'selected' : '' }}>Administrateur</option>
                </select>
                @if($errors->has('role'))
                    <span class="text-danger badge-outline-danger">{{ $errors->first('role') }}</span>
                @endif
            </div>

            <!-- Champ du mot de passe masqué par défaut -->
            <div id="password-field" style="display: none;">
                <label for="password">Mot de passe</label>
                <div class="relative">
                    <input id="password" value="{{ old('password') }}" name="password" type="password" class="form-input">
                    <button type="button" class="absolute transform -translate-y-1/2 right-2 top-1/2" onclick="togglePasswordVisibility()">
                        <svg id="eye-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12c0 3.866-3.134 7-7 7s-7-3.134-7-7 3.134-7 7-7 7 3.134 7 7z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12l5 5M15 12l5-5"></path>
                        </svg>
                    </button>
                </div>
                @if($errors->has('password'))
                    <span class="text-danger badge-outline-danger">{{ $errors->first('password') }}</span>
                @endif
            </div>

            <div>
                <label for="status">Statut du compte <span class="text-danger">*</span></label>
                <select id="status" name="status" class="form-select text-white-dark" required>
                    <option value="">Sélectionner un statut</option>
                    <option value="Actif" {{ old('status', $user->status) == 'Actif' ? 'selected' : '' }}>Actif</option>
                    <option value="Inactif" {{ old('status', $user->status) == 'Inactif' ? 'selected' : '' }}>Inactif</option>
                </select>
                @if($errors->has('status'))
                    <span class="text-danger badge-outline-danger">{{ $errors->first('status') }}</span>
                @endif
            </div>

            <!-- Importer une image de profil-->
            <div>
                <label for="profile_picture">Photo de profil</label>

                <input id="profile_picture" name="profile_picture" type="file" accept=".jpeg,.jpg,.png" class="form-input" onchange="previewImage(event)">
                <!-- Si une image existe, affichez-la -->
                <div id="currentImageContainer">
                    @if ($user->profile_picture)
                        <img src="{{ asset('documents/profil/users/' . $user->profile_picture) }}" alt="Photo de profil actuelle" class="w-full h-auto max-w-[150px] max-h-[100px] object-contain rounded-md shadow-md">
                    @else
                        <p>Aucune image actuelle</p>
                    @endif
                </div>
                <!-- Aperçu de l'image téléchargée -->
                <div id="imagePreviewContainer" class="hidden mt-2">
                    <img id="imagePreview" src="" alt="Aperçu de l'image" class="w-full h-auto max-w-[150px] max-h-[100px] object-contain rounded-md shadow-md">
                </div>
            </div>

        </div>
    </div>
    <div class="mt-3 sm:col-span-2">
        <button type="submit" class="btn btn-success sm:col-span-2">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 shrink-0 ltr:mr-2 rtl:ml-2">
                <path d="M3.46447 20.5355C4.92893 22 7.28595 22 12 22C16.714 22 19.0711 22 20.5355 20.5355C22 19.0711 22 16.714 22 12C22 11.6585 22 11.4878 21.9848 11.3142C21.9142 10.5049 21.586 9.71257 21.0637 9.09034C20.9516 8.95687 20.828 8.83317 20.5806 8.58578L15.4142 3.41944C15.1668 3.17206 15.0431 3.04835 14.9097 2.93631C14.2874 2.414 13.4951 2.08581 12.6858 2.01515C12.5122 2 12.3415 2 12 2C7.28595 2 4.92893 2 3.46447 3.46447C2 4.92893 2 7.28595 2 12C2 16.714 2 19.0711 3.46447 20.5355Z" stroke="currentColor" stroke-width="2"></path>
                <path d="M17 22V21C17 19.1144 17 18.1716 16.4142 17.5858C15.8284 17 14.8856 17 13 17H11C9.11438 17 8.17157 17 7.58579 17.5858C7 18.1716 7 19.1144 7 21V22" stroke="currentColor" stroke-width="1.5"></path>
                <path opacity="0.5" d="M7 8H13" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
            </svg>
            Mettre à jour
        </button>
    </div>
</form>
<script>

    function previewImage(event) {
        let file = event.target.files[0];
        if (file) {
            let reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('imagePreview').src = e.target.result;
                document.getElementById('imagePreviewContainer').classList.remove('hidden');
            };
            reader.readAsDataURL(file);
        }
    }

    function formatPhoneNumber(input) {
        // Retire tout ce qui n'est pas un chiffre (le + est déjà inclus)
        let phoneNumber = input.value.replace(/\D/g, '');

        // Formate le numéro au fur et à mesure de la saisie
        if (phoneNumber.length <= 3) {
            input.value = `+(${phoneNumber}`;
        } else if (phoneNumber.length <= 5) {
            input.value = `+(${phoneNumber.slice(0, 3)}) ${phoneNumber.slice(3)}`;
        } else if (phoneNumber.length <= 7) {
            input.value = `+(${phoneNumber.slice(0, 3)}) ${phoneNumber.slice(3, 5)}-${phoneNumber.slice(5)}`;
        } else if (phoneNumber.length <= 9) {
            input.value = `+(${phoneNumber.slice(0, 3)}) ${phoneNumber.slice(3, 5)}-${phoneNumber.slice(5, 7)}-${phoneNumber.slice(7)}`;
        } else if (phoneNumber.length <= 11) {
            input.value = `+(${phoneNumber.slice(0, 3)}) ${phoneNumber.slice(3, 5)}-${phoneNumber.slice(5, 7)}-${phoneNumber.slice(7, 9)}-${phoneNumber.slice(9, 11)}`;
        } else {
            input.value = `+(${phoneNumber.slice(0, 3)}) ${phoneNumber.slice(3, 5)}-${phoneNumber.slice(5, 7)}-${phoneNumber.slice(7, 9)}-${phoneNumber.slice(9, 11)}`;
        }
    }

    function togglePasswordVisibility() {
        var passwordField = document.getElementById('password');
        var eyeIcon = document.getElementById('eye-icon');

        if (passwordField.type === "password") {
            passwordField.type = "text";
            // Change the eye icon to 'open'
            eyeIcon.setAttribute('d', 'M15 12l5 5M15 12l5-5');
        } else {
            passwordField.type = "password";
            // Change the eye icon back to 'closed'
            eyeIcon.setAttribute('d', 'M15 12c0 3.866-3.134 7-7 7s-7-3.134-7-7 3.134-7 7-7 7 3.134 7 7z');
        }
    }

    // Appeler la fonction pour initialiser l'état des champs selon le rôle sélectionné
    toggleFields();
</script>
<script>
    function toggleFields() {
        var role = document.getElementById("role").value;
        var passwordField = document.getElementById("password-field");

        if (role === "Admin") {
            passwordField.style.display = "block";
        } else {
            passwordField.style.display = "none";
        }
    }

    // Exécuter au chargement pour gérer la valeur de old('role')
    document.addEventListener("DOMContentLoaded", function() {
        toggleFields();
    });
</script>

<script>
    function toggleDepartureDiv() {
        const departureDate = document.getElementById('departure_date').value;
        const departureDiv = document.getElementById('departure_div');

        // Si une date de départ est sélectionnée, afficher la section
        if (departureDate) {
            departureDiv.style.display = 'block';
        } else {
            departureDiv.style.display = 'none';
        }
    }

    // Initialiser l'affichage en fonction de la valeur de departure_date au chargement de la page
    window.onload = function() {
        toggleDepartureDiv(); // Vérifie si la date de départ est déjà sélectionnée au chargement
    };
</script>

@endsection
