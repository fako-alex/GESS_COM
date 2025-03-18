@extends('admin.layouts.app')


@section('content')

<form method="post" action="{{ route('admin.services.update.submit', $service->id)}}" enctype="multipart/form-data" class="mb-5 rounded-md border border-[#ebedf2] bg-white p-4 dark:border-[#191e3a] dark:bg-[#0e1726]">
    @csrf
    @method('PUT')

    <div class="panel">
        <div class="flex items-center justify-between mb-5">
            <h5 class="text-lg font-semibold dark:text-white-light">Modifier un service</h5>
        </div>
        <div class="mb-5">
            <ol class="flex font-semibold text-primary dark:text-white-dark">
                <li class="bg-[#ebedf2] ltr:rounded-l-md rtl:rounded-r-md dark:bg-[#1b2e4b]">
                    <a href="javascript:;"
                        class="relative flex h-full items-center p-1.5 before:absolute before:inset-y-0 before:z-[1] before:m-auto before:h-0 before:w-0 before:border-[16px] before:border-l-[15px] before:border-r-0 before:border-t-transparent before:border-b-transparent before:border-l-[#ebedf2] hover:text-primary/70 ltr:pl-3 ltr:pr-2 ltr:before:-right-[15px] rtl:pr-3 rtl:pl-2 rtl:before:-left-[15px] rtl:before:rotate-180 dark:before:border-l-[#1b2e4b] dark:hover:text-white-dark/70">Services</a>
                </li>
                <li class="bg-[#ebedf2] dark:bg-[#1b2e4b]">
                    <a
                        class="relative flex h-full items-center bg-primary p-1.5 text-white-light before:absolute before:inset-y-0 before:z-[1] before:m-auto before:h-0 before:w-0 before:border-[16px] before:border-l-[15px] before:border-r-0 before:border-t-transparent before:border-b-transparent before:border-l-primary ltr:pl-6 ltr:pr-2 ltr:before:-right-[15px] rtl:pr-6 rtl:pl-2 rtl:before:-left-[15px] rtl:before:rotate-180">Modifier service</a>
                </li>
            </ol>
        </div>
        <div class="flex justify-end"> <!-- Ajout de mb-4 pour l'espacement -->
            <a href="{{ url('services/list') }}" class="btn btn-primary">
                <!-- SVG for Add Book Icon -->
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2">
                    <path d="M2 5.5L3.21429 7L7.5 3" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path opacity="0.5" d="M2 12.5L3.21429 14L7.5 10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path d="M2 19.5L3.21429 21L7.5 17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path d="M22 19L12 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                    <path opacity="0.5" d="M22 12L12 12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                    <path d="M22 5L12 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                </svg>
                Liste des services
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
                <input id="name" name="name" value="{{ old('name', $service->name) }}" type="text" placeholder="Exp : FAKO" class="form-input">
                @if($errors->has('name'))
                    <span class="text-red-500 badge-outline-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>
            <div class="col-span-2">
                <label for="detail">Description du service<span class="text-danger"></span></label>
                <textarea id="detail" name="detail" class="w-full form-textarea" placeholder="Exp : Service SOFT">{{ old('detail', $service->detail) }}</textarea>
                @if($errors->has('detail'))
                    <span class="text-danger badge-outline-danger">{{ $errors->first('detail') }}</span>
                @endif
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

    // Fonction qui gère l'affichage dynamique des champs
    function toggleFields() {
        var role = document.getElementById('role').value;
        var classLevelField = document.getElementById('class_level_field');
        var departmentField = document.getElementById('department_field');

        // Afficher/Masquer les champs en fonction du rôle sélectionné
        if (role === 'Élève') {
            classLevelField.style.display = 'block';
            departmentField.style.display = 'none';
        } else if (role === 'Professeur') {
            departmentField.style.display = 'block';
            classLevelField.style.display = 'none';
        } else if (role === 'Bibliothécaire') {
            classLevelField.style.display = 'none';
            departmentField.style.display = 'none';
        } else {
            // Masque les deux champs si aucun rôle n'est sélectionné
            classLevelField.style.display = 'none';
            departmentField.style.display = 'none';
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
@endsection
