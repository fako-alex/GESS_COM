@extends('admin.layouts.app')


@section('content')
    <form method="post" action="{{ route('admin.planning.update.submit', $planning->id) }}"
        class="mb-5 rounded-md border border-[#ebedf2] bg-white p-4 dark:border-[#191e3a] dark:bg-[#0e1726]">
        @csrf
        @method('PUT')
        <div class="panel">
            <div class="flex items-center justify-between mb-5">
                <h5 class="text-lg font-semibold dark:text-white-light">Modifier des plannings</h5>
            </div>
            <div class="mb-5">
                <ol class="flex font-semibold text-primary dark:text-white-dark">
                    <li class="bg-[#ebedf2] ltr:rounded-l-md rtl:rounded-r-md dark:bg-[#1b2e4b]">
                        <a href="javascript:;"
                            class="relative flex h-full items-center p-1.5 before:absolute before:inset-y-0 before:z-[1] before:m-auto before:h-0 before:w-0 before:border-[16px] before:border-l-[15px] before:border-r-0 before:border-t-transparent before:border-b-transparent before:border-l-[#ebedf2] hover:text-primary/70 ltr:pl-3 ltr:pr-2 ltr:before:-right-[15px] rtl:pr-3 rtl:pl-2 rtl:before:-left-[15px] rtl:before:rotate-180 dark:before:border-l-[#1b2e4b] dark:hover:text-white-dark/70">Planning</a>
                    </li>
                    <li class="bg-[#ebedf2] dark:bg-[#1b2e4b]">
                        <a
                            class="relative flex h-full items-center bg-primary p-1.5 text-white-light before:absolute before:inset-y-0 before:z-[1] before:m-auto before:h-0 before:w-0 before:border-[16px] before:border-l-[15px] before:border-r-0 before:border-t-transparent before:border-b-transparent before:border-l-primary ltr:pl-6 ltr:pr-2 ltr:before:-right-[15px] rtl:pr-6 rtl:pl-2 rtl:before:-left-[15px] rtl:before:rotate-180">Modifier
                            un planning</a>
                    </li>
                </ol>
            </div>
            <div class="flex justify-end"> <!-- Ajout de mb-4 pour l'espacement -->
                <a href="{{ url('planning/list') }}" class="btn btn-primary">
                    <!-- SVG for Add Book Icon -->
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                        class="w-5 h-5 mr-2">
                        <path d="M2 5.5L3.21429 7L7.5 3" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round"></path>
                        <path opacity="0.5" d="M2 12.5L3.21429 14L7.5 10" stroke="currentColor" stroke-width="1.5"
                            stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M2 19.5L3.21429 21L7.5 17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round"></path>
                        <path d="M22 19L12 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                        <path opacity="0.5" d="M22 12L12 12" stroke="currentColor" stroke-width="1.5"
                            stroke-linecap="round"></path>
                        <path d="M22 5L12 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                    </svg>
                    Liste des plannings
                </a>
            </div>
        </div>

        <div class="flex items-center px-6 py-4">

        </div>

        {{-- sexion 1 --}}
        <div class="grid flex-auto grid-cols-2 gap-5 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xxl:grid-cols-5">
            <div class="col-span-1">
                <label for="name_model_planning">Nom <span class="text-danger">*</span></label>
                <input id="name_model_planning" name="name_model_planning"
                    value="{{ old('name_model_planning', $planning->name_model_planning ? $planning->name_model_planning : '') }}"
                    type="text" placeholder="Exp : travailler de 07H30 - 15H30" class="w-full form-input">
                @if ($errors->has('name_model_planning'))
                    <span class="text-danger badge-outline-danger">{{ $errors->first('name_model_planning') }}</span>
                @endif
            </div>

            <div class="col-span-1">
                <label for="type_model_planning">Type de planning <span class="text-danger">*</span></label>
                <select id="type_model_planning" name="type_model_planning" class="w-full form-select" required>
                    {{-- <option value="">--Sélectionnez type planning--</option> --}}
                    <option value="flex_1"
                        {{ old('type_model_planning', $planning->type_model_planning) == 'flex_1' ? 'selected' : '' }}>Flex
                        1 Plage
                    </option>
                    <option value="flex_2"
                        {{ old('type_model_planning', $planning->type_model_planning) == 'flex_2' ? 'selected' : '' }}>Flex
                        2 Plages
                    </option>
                </select>
                @if ($errors->has('type_model_planning'))
                    <span class="text-danger badge-outline-danger">{{ $errors->first('type_model_planning') }}</span>
                @endif
            </div>

            <div class="col-span-1">
                <label for="duree_calculer_model_planning">Durée calculée <span class="text-danger">*</span></label>
                <input id="duree_calculer_model_planning" name="duree_calculer_model_planning"
                    value="{{ old('duree_calculer_model_planning', isset($planning->duree_calculer_model_planning) ? \Carbon\Carbon::parse($planning->duree_calculer_model_planning)->format('H:i') : '') }}"
                    type="text" placeholder="Ex : 08:30 de travail" class="w-full text-gray-800 bg-gray-200 form-input"
                    oninput="validateHour(this)" maxlength="5" readonly>

                @if ($errors->has('duree_calculer_model_planning'))
                    <span
                        class="text-danger badge-outline-danger">{{ $errors->first('duree_calculer_model_planning') }}</span>
                @endif
            </div>

            <div class="col-span-1">
                <label for="status">Status <span class="text-danger">*</span></label>
                <select id="status" name="status" class="w-full form-select" required>
                    <option value="">--Sélectionnez status planning--</option>
                    <option value="Actif" {{ old('status', $planning->status) == 'Actif' ? 'selected' : '' }}>Actif
                    </option>
                    <option value="Inactif" {{ old('status', $planning->status) == 'Inactif' ? 'selected' : '' }}>Inactif
                    </option>
                </select>
                @if ($errors->has('status'))
                    <span class="text-danger badge-outline-danger">{{ $errors->first('status') }}</span>
                @endif
            </div>
        </div>

        {{-- sexion 2 --}}
        <div id="section_2"
            class="grid flex-auto grid-cols-2 gap-5 mt-4 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xxl:grid-cols-5">
            <div class="col-span-1">
                <label for="heure_arriver_un_model_planning">Heure d'entrée 1</label>
                <input id="heure_arriver_un_model_planning" name="heure_arriver_un_model_planning"
                    value="{{ old('heure_arriver_un_model_planning', isset($planning->heure_arriver_un_model_planning) ? \Carbon\Carbon::parse($planning->heure_arriver_un_model_planning)->format('H:i') : '') }}"
                    type="text" placeholder="Ex : 12:30" class="w-full form-input" oninput="validateHour(this)"
                    maxlength="5">
                <small class="text-gray-500">Format : HH:MM (00:00 à 23:59)</small>

                @if ($errors->has('heure_arriver_un_model_planning'))
                    <span
                        class="text-danger badge-outline-danger">{{ $errors->first('heure_arriver_un_model_planning') }}</span>
                @endif
            </div>

            <div class="col-span-1">
                <label for="heure_depart_un_model_planning">Heure de sortie 1</label>
                <input id="heure_depart_un_model_planning" name="heure_depart_un_model_planning"
                    value="{{ old('heure_depart_un_model_planning', !empty($planning->heure_depart_un_model_planning) ? \Carbon\Carbon::parse($planning->heure_depart_un_model_planning)->format('H:i') : '') }}"
                    type="text" placeholder="Ex : 12:30" class="w-full form-input"
                    oninput="validateAndFormatHour(this)" maxlength="5">
                <small class="text-gray-500">Format : HH:MM (00:00 à 23:59)</small>

                @if ($errors->has('heure_depart_un_model_planning'))
                    <span
                        class="text-danger badge-outline-danger">{{ $errors->first('heure_depart_un_model_planning') }}</span>
                @endif
            </div>


            <div class="col-span-1">
                <label for="av_dep_un">Av. Heure d'entrée 1</label>
                <input id="av_dep_un" name="av_dep_un"
                    value="{{ old('av_dep_un', $planning->av_dep_un ? $planning->av_dep_un : '') }}" type="text"
                    placeholder="Exp : OFT" class="w-full form-input">
                @if ($errors->has('av_dep_un'))
                    <span class="text-danger badge-outline-danger">{{ $errors->first('av_dep_un') }}</span>
                @endif
            </div>

            <div class="col-span-1">
                <label for="ap_dep_un">Ap. Heure de sortie 1</label>
                <input id="ap_dep_un" name="ap_dep_un"
                    value="{{ old('ap_dep_un', $planning->ap_dep_un ? $planning->ap_dep_un : '') }}" type="text"
                    placeholder="Exp : OFT" class="w-full form-input">
                @if ($errors->has('ap_dep_un'))
                    <span class="text-danger badge-outline-danger">{{ $errors->first('ap_dep_un') }}</span>
                @endif
            </div>

            <div class="col-span-1">
                <label for="debut_ap_un">À partir de</label>
                <input id="debut_ap_un" name="debut_ap_un"
                    value="{{ old('debut_ap_un', !empty($planning->debut_ap_un) ? \Carbon\Carbon::parse($planning->debut_ap_un)->format('H:i') : '') }}"
                    type="text" placeholder="Ex : 12:30" class="w-full form-input"
                    oninput="validateAndFormatHour(this)" maxlength="5">
                <small class="text-gray-500">Format : HH:MM (00:00 à 23:59)</small>

                @if ($errors->has('debut_ap_un'))
                    <span class="text-danger badge-outline-danger">{{ $errors->first('debut_ap_un') }}</span>
                @endif
            </div>

            <div class="col-span-1">
                <label for="fin_ap_un">Jusqu'à</label>
                <input id="fin_ap_un" name="fin_ap_un"
                    value="{{ old('fin_ap_un', !empty($planning->fin_ap_un) ? \Carbon\Carbon::parse($planning->fin_ap_un)->format('H:i') : '') }}"
                    type="text" placeholder="Ex : 12:30" class="w-full form-input"
                    oninput="validateAndFormatHour(this)" maxlength="5">
                <small class="text-gray-500">Format : HH:MM (00:00 à 23:59)</small>

                @if ($errors->has('fin_ap_un'))
                    <span class="text-danger badge-outline-danger">{{ $errors->first('fin_ap_un') }}</span>
                @endif
            </div>

            <div class="hidden col-span-1 extra_section">
                <label for="heure_arriver_deux_model_planning">Heure d'entrée 2</label>
                <input id="heure_arriver_deux_model_planning" name="heure_arriver_deux_model_planning"
                    value="{{ old('heure_arriver_deux_model_planning', !empty($planning->heure_arriver_deux_model_planning) ? \Carbon\Carbon::parse($planning->heure_arriver_deux_model_planning)->format('H:i') : '') }}"
                    type="text" placeholder="Ex : 12:30" class="w-full form-input"
                    oninput="validateAndFormatHour(this)" maxlength="5">
                <small class="text-gray-500">Format : HH:MM (00:00 à 23:59)</small>

                @if ($errors->has('heure_arriver_deux_model_planning'))
                    <span
                        class="text-danger badge-outline-danger">{{ $errors->first('heure_arriver_deux_model_planning') }}</span>
                @endif
            </div>

            <div class="hidden col-span-1 extra_section">
                <label for="heure_depart_deux_model_planning">Heure de sortie 2</label>
                <input id="heure_depart_deux_model_planning" name="heure_depart_deux_model_planning"
                    value="{{ old('heure_depart_deux_model_planning', !empty($planning->heure_depart_deux_model_planning) ? \Carbon\Carbon::parse($planning->heure_depart_deux_model_planning)->format('H:i') : '') }}"
                    type="text" placeholder="Ex : 12:30" class="w-full form-input"
                    oninput="validateAndFormatHour(this)" maxlength="5">
                <small class="text-gray-500">Format : HH:MM (00:00 à 23:59)</small>

                @if ($errors->has('heure_depart_deux_model_planning'))
                    <span
                        class="text-danger badge-outline-danger">{{ $errors->first('heure_depart_deux_model_planning') }}</span>
                @endif
            </div>


            <div class="hidden col-span-1 extra_section">
                <label for="av_dep_deux">Av. Heure d'entrée 2</label>
                <input id="av_dep_deux" name="av_dep_deux"
                    value="{{ old('av_dep_deux', $planning->av_dep_deux ? $planning->av_dep_deux : '') }}" type="text"
                    placeholder="Exp : OFT" class="w-full form-input">
                @if ($errors->has('av_dep_deux'))
                    <span class="text-danger badge-outline-danger">{{ $errors->first('av_dep_deux') }}</span>
                @endif
            </div>

            <div class="hidden col-span-1 extra_section">
                <label for="ap_dep_deux">Ap. Heure de sortie 2</label>
                <input id="ap_dep_deux" name="ap_dep_deux"
                    value="{{ old('ap_dep_deux', $planning->ap_dep_deux ? $planning->ap_dep_deux : '') }}" type="text"
                    placeholder="Exp : OFT" class="w-full form-input">
                @if ($errors->has('ap_dep_deux'))
                    <span class="text-danger badge-outline-danger">{{ $errors->first('ap_dep_deux') }}</span>
                @endif
            </div>

            <div class="hidden col-span-1 extra_section">
                <label for="debut_ap_deux">À partir de</label>
                <input id="debut_ap_deux" name="debut_ap_deux"
                    value="{{ old('debut_ap_deux', !empty($planning->debut_ap_deux) ? \Carbon\Carbon::parse($planning->debut_ap_deux)->format('H:i') : '') }}"
                    type="text" placeholder="Ex : 12:30" class="w-full form-input"
                    oninput="validateAndFormatHour(this)" maxlength="5">
                <small class="text-gray-500">Format : HH:MM (00:00 à 23:59)</small>

                @if ($errors->has('debut_ap_deux'))
                    <span class="text-danger badge-outline-danger">{{ $errors->first('debut_ap_deux') }}</span>
                @endif
            </div>

            <div class="hidden col-span-1 extra_section">
                <label for="fin_ap_deux">Jusqu'à</label>
                <input id="fin_ap_deux" name="fin_ap_deux"
                    value="{{ old('fin_ap_deux', !empty($planning->fin_ap_deux) ? \Carbon\Carbon::parse($planning->fin_ap_deux)->format('H:i') : '') }}"
                    type="text" placeholder="Ex : 12:30" class="w-full form-input"
                    oninput="validateAndFormatHour(this)" maxlength="5">
                <small class="text-gray-500">Format : HH:MM (00:00 à 23:59)</small>

                @if ($errors->has('fin_ap_deux'))
                    <span class="text-danger badge-outline-danger">{{ $errors->first('fin_ap_deux') }}</span>
                @endif
            </div>

        </div>

        <div class="flex justify-start mt-4">
            <button type="submit" class="btn btn-success">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 shrink-0 ltr:mr-2 rtl:ml-2">
                    <path
                        d="M3.46447 20.5355C4.92893 22 7.28595 22 12 22C16.714 22 19.0711 22 20.5355 20.5355C22 19.0711 22 16.714 22 12C22 11.6585 22 11.4878 21.9848 11.3142C21.9142 10.5049 21.586 9.71257 21.0637 9.09034C20.9516 8.95687 20.828 8.83317 20.5806 8.58578L15.4142 3.41944C15.1668 3.17206 15.0431 3.04835 14.9097 2.93631C14.2874 2.414 13.4951 2.08581 12.6858 2.01515C12.5122 2 12.3415 2 12 2C7.28595 2 4.92893 2 3.46447 3.46447C2 4.92893 2 7.28595 2 12C2 16.714 2 19.0711 3.46447 20.5355Z"
                        stroke="currentColor" stroke-width="2"></path>
                    <path
                        d="M17 22V21C17 19.1144 17 18.1716 16.4142 17.5858C15.8284 17 14.8856 17 13 17H11C9.11438 17 8.17157 17 7.58579 17.5858C7 18.1716 7 19.1144 7 21V22"
                        stroke="currentColor" stroke-width="1.5"></path>
                    <path opacity="0.5" d="M7 8H13" stroke="currentColor" stroke-width="1.5" stroke-linecap="round">
                    </path>
                </svg>
                Enregistrer
            </button>
        </div>

        <script>
            function validateAndFormatHour(input) {
                let value = input.value.replace(/[^0-9:]/g, ''); // Supprime tout sauf chiffres et ':'

                if (value.length === 2 && !value.includes(':')) {
                    value += ':'; // Ajoute ':' après les 2 premiers chiffres
                }

                let parts = value.split(':');
                let hours = parts[0] ? parseInt(parts[0]) : NaN;
                let minutes = parts[1] ? parseInt(parts[1]) : NaN;

                if (parts.length > 2 || (parts[1] && parts[1].length > 2)) {
                    value = value.slice(0, -1); // Supprime tout caractère en trop
                }

                if (!isNaN(hours) && (hours < 0 || hours > 23)) {
                    value = "23" + (parts[1] ? ":" + parts[1] : ""); // Corrige l'heure
                }

                if (!isNaN(minutes) && (minutes < 0 || minutes > 59)) {
                    value = parts[0] + ":59"; // Corrige les minutes
                }

                input.value = value;
            }

            function timeToMinutes(time) {
                if (!time) return null;
                let parts = time.split(":");
                if (parts.length !== 2) return null;
                let hours = parseInt(parts[0]);
                let minutes = parseInt(parts[1]);

                if (isNaN(hours) || isNaN(minutes) || hours < 0 || hours > 23 || minutes < 0 || minutes > 59) {
                    return null; // Retourne null si le format est invalide
                }

                return hours * 60 + minutes;
            }

            function minutesToTime(minutes) {
                let hours = Math.floor(minutes / 60);
                let mins = minutes % 60;
                return (hours < 10 ? "0" : "") + hours + ":" + (mins < 10 ? "0" : "") + mins;
            }

            function showError(message, fieldId) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Erreur',
                    text: message,
                    confirmButtonText: 'OK'
                }).then(() => {
                    document.getElementById(fieldId).value = ""; // Efface le champ en erreur
                    document.getElementById(fieldId).focus(); // Remet le focus pour correction
                });
            }

            function calculateWorkDuration() {
                let arrivee1 = timeToMinutes(document.getElementById("heure_arriver_un_model_planning").value);
                let depart1 = timeToMinutes(document.getElementById("heure_depart_un_model_planning").value);
                let arrivee2 = timeToMinutes(document.getElementById("heure_arriver_deux_model_planning").value);
                let depart2 = timeToMinutes(document.getElementById("heure_depart_deux_model_planning").value);

                let totalMinutes = 0;

                // Vérification : entrée 2 doit être après sortie 1
                if (arrivee2 !== null && depart1 !== null && arrivee2 <= depart1) {
                    showError("L'heure d'entrée 2 doit être après l'heure de sortie 1 !", "heure_arriver_deux_model_planning");
                    return;
                }

                // Calcul du premier shift
                if (arrivee1 !== null && depart1 !== null) {
                    if (depart1 >= arrivee1) {
                        totalMinutes += depart1 - arrivee1; // Travail normal
                    } else {
                        totalMinutes += (1440 - arrivee1) + depart1; // Travail sur 2 jours
                    }
                }

                // Calcul du deuxième shift
                if (arrivee2 !== null && depart2 !== null) {
                    if (depart2 >= arrivee2) {
                        totalMinutes += depart2 - arrivee2; // Travail normal
                    } else {
                        totalMinutes += (1440 - arrivee2) + depart2; // Travail sur 2 jours
                    }
                }

                // Vérification si le total dépasse 48h
                if (totalMinutes > 2880) {
                    showError("Le temps total de travail ne peut pas dépasser 48h !", "heure_arriver_un_model_planning");
                    return;
                }

                // Mettre à jour le champ de durée
                let resultField = document.getElementById("duree_calculer_model_planning");
                resultField.value = totalMinutes > 0 ? minutesToTime(totalMinutes) : "";
            }

            // Ajouter des écouteurs d'événements sur les champs d'heure
            let timeInputs = [
                "heure_arriver_un_model_planning",
                "heure_depart_un_model_planning",
                "heure_arriver_deux_model_planning",
                "heure_depart_deux_model_planning"
            ];

            timeInputs.forEach(id => {
                let input = document.getElementById(id);
                if (input) {
                    input.addEventListener("input", function() {
                        validateAndFormatHour(this);
                        calculateWorkDuration();
                    });
                }
            });
        </script>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                let typePlanning = document.getElementById("type_model_planning");
                let extraSections = document.querySelectorAll(".extra_section"); // On récupère la liste des éléments

                function toggleSections() {
                    if (typePlanning.value === "flex_1") {
                        extraSections.forEach(el => el.classList.add("hidden")); // Cacher tous les éléments
                    } else {
                        extraSections.forEach(el => el.classList.remove("hidden")); // Afficher tous les éléments
                    }
                }

                typePlanning.addEventListener("change", toggleSections);
                toggleSections(); // Exécuter au chargement pour gérer le cas de la valeur pré-sélectionnée
            });
        </script>

    </form>
@endsection
