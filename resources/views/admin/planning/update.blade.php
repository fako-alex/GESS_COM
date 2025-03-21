@extends('admin.layouts.app')


@section('content')

<form method="post" action="{{ route('admin.planning.save') }}" class="mb-5 rounded-md border border-[#ebedf2] bg-white p-4 dark:border-[#191e3a] dark:bg-[#0e1726]">
    @csrf
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
                        class="relative flex h-full items-center bg-primary p-1.5 text-white-light before:absolute before:inset-y-0 before:z-[1] before:m-auto before:h-0 before:w-0 before:border-[16px] before:border-l-[15px] before:border-r-0 before:border-t-transparent before:border-b-transparent before:border-l-primary ltr:pl-6 ltr:pr-2 ltr:before:-right-[15px] rtl:pr-6 rtl:pl-2 rtl:before:-left-[15px] rtl:before:rotate-180">Modifier un planning</a>
                </li>
            </ol>
        </div>
        <div class="flex justify-end"> <!-- Ajout de mb-4 pour l'espacement -->
            <a href="{{ url('planning/list') }}" class="btn btn-primary">
                <!-- SVG for Add Book Icon -->
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2">
                    <path d="M2 5.5L3.21429 7L7.5 3" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path opacity="0.5" d="M2 12.5L3.21429 14L7.5 10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path d="M2 19.5L3.21429 21L7.5 17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path d="M22 19L12 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                    <path opacity="0.5" d="M22 12L12 12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                    <path d="M22 5L12 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                </svg>
                Liste des plannings
            </a>
        </div>
    </div>

    <div class="flex items-center px-6 py-4">

    </div>

    <div class="grid grid-cols-3 gap-5">
        <div class="col-span-1">
            <label for="service_id">Service spécifique <span class="text-danger">*</span></label>
            <input id="service_id" name="service_id" value="{{ $planning->service->name }}" type="text" class="w-full form-input" required readonly>
            @if($errors->has('service_id'))
                <span class="text-danger badge-outline-danger">{{ $errors->first('service_id') }}</span>
            @endif
        </div>

        <div class="col-span-1">
            <label for="user_id">Personnel concerné <span class="text-danger">*</span></label>
            <input id="user_id" name="user_id" value="{{ $planning->user->name }} {{ $planning->user->first_name }}" type="text" class="w-full form-input" required readonly>
            @if($errors->has('user_id'))
                <span class="text-danger badge-outline-danger">{{ $errors->first('user_id') }}</span>
            @endif
        </div>

        <div class="col-span-1">
            <label for="planning_type">Type de planification <span class="text-danger">*</span></label>
            <select id="planning_type" name="planning_type" class="w-full form-select" required>
                {{-- <option value="">-- Sélectionnez un type de planning --</option> --}}
                <option value="jour" {{ old('planning_type', $planning->planning_type) == 'jour' ? 'selected' : '' }}>Jour</option>
                <option value="semaine" {{ old('planning_type', $planning->planning_type) == 'semaine' ? 'selected' : '' }}>Semaine</option>
                <option value="mois" {{ old('planning_type', $planning->planning_type) == 'mois' ? 'selected' : '' }}>Mois</option>
                <option value="annee" {{ old('planning_type', $planning->planning_type) == 'annee' ? 'selected' : '' }}>Année</option>
            </select>

            @if($errors->has('planning_type'))
                <span class="text-danger badge-outline-danger">{{ $errors->first('planning_type') }}</span>
            @endif
        </div>

        <div class="col-span-1">
            <label for="start_date">Date de début <span class="text-danger">*</span></label>
            <input id="start_date" name="start_date" value="{{ old('start_date') }}" type="date" placeholder="Exp : Service SOFT" class="w-full form-input" required>
            @if($errors->has('start_date'))
                <span class="text-danger badge-outline-danger">{{ $errors->first('start_date') }}</span>
            @endif
        </div>

        <div class="col-span-1">
            <label for="start_time">Heure de début</label>
            <input id="start_time" name="start_time" value="{{ old('start_time') }}"
                   type="number" min="0" max="23" placeholder="Ex : 12"
                   class="w-full form-input" oninput="validateHour(this)">
            {{-- <small class="text-gray-500">Format : HH (00 à 23)</small> --}}
            @if($errors->has('start_time'))
                <span class="text-danger badge-outline-danger">{{ $errors->first('start_time') }}</span>
            @endif
        </div>

        <div class="col-span-1">
            <label for="end_date">Date de fin</label>
            <input id="end_date" name="end_date" value="{{ old('end_date') }}" type="date"
                   placeholder="Exp : Service SOFT" class="w-full form-input">
            @if($errors->has('end_date'))
                <span class="text-danger badge-outline-danger">{{ $errors->first('end_date') }}</span>
            @endif
        </div>

        <div class="col-span-1">
            <label for="end_time">Heure de fin</label>
            <input id="end_time" name="end_time" value="{{ old('end_time') }}"
                   type="number" min="0" max="23" placeholder="Ex : 12"
                   class="w-full form-input" oninput="validateHour(this)">
            {{-- <small class="text-gray-500">Format : HH (00 à 23)</small> --}}
            @if($errors->has('end_time'))
                <span class="text-danger badge-outline-danger">{{ $errors->first('end_time') }}</span>
            @endif
        </div>

        <div class="col-span-1">
            <label for="event_location">Adresse de l'évènement</label>
            <input id="event_location" name="event_location" value="{{ old('event_location') }}" type="text"
                   placeholder="Exp : Service SOFT, SEEG, BGFI" class="w-full form-input">
            @if($errors->has('event_location'))
                <span class="text-danger badge-outline-danger">{{ $errors->first('event_location') }}</span>
            @endif
        </div>

        <div class="col-span-1">
            {{-- Liste des statuts possibles --}}
            <label for="status">Statut de l'événement <span class="text-danger">*</span></label>
            <select id="status" name="status" class="w-full form-input" required>
                <option value="" disabled selected>Choisissez un statut</option>
                <option value="en_attente" {{ old('status') == 'en_attente' ? 'selected' : '' }}>En attente</option>
                <option value="confirme" {{ old('status') == 'confirme' ? 'selected' : '' }}>Confirmé</option>
                <option value="annule" {{ old('status') == 'annule' ? 'selected' : '' }}>Annulé</option>
            </select>
            @if($errors->has('status'))
                <span class="text-danger badge-outline-danger">{{ $errors->first('status') }}</span>
            @endif
        </div>

        <div>
            <label for="detail_planning">Description du planning <span class="text-danger"></span></label>
            <textarea id="detail_planning" name="detail_planning" value="{{ old('detail_planning') }}" class="w-full form-textarea"
                      placeholder="Exp : Dans le service SOFT nous travaillons comme suite ..."></textarea>
            @if($errors->has('detail_planning'))
                <span class="text-danger badge-outline-danger">{{ $errors->first('detail_planning') }}</span>
            @endif
        </div>
    </div>

    <div class="flex justify-start mt-4">
        <button type="submit" class="btn btn-success">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 shrink-0 ltr:mr-2 rtl:ml-2">
                <path d="M3.46447 20.5355C4.92893 22 7.28595 22 12 22C16.714 22 19.0711 22 20.5355 20.5355C22 19.0711 22 16.714 22 12C22 11.6585 22 11.4878 21.9848 11.3142C21.9142 10.5049 21.586 9.71257 21.0637 9.09034C20.9516 8.95687 20.828 8.83317 20.5806 8.58578L15.4142 3.41944C15.1668 3.17206 15.0431 3.04835 14.9097 2.93631C14.2874 2.414 13.4951 2.08581 12.6858 2.01515C12.5122 2 12.3415 2 12 2C7.28595 2 4.92893 2 3.46447 3.46447C2 4.92893 2 7.28595 2 12C2 16.714 2 19.0711 3.46447 20.5355Z" stroke="currentColor" stroke-width="2"></path>
                <path d="M17 22V21C17 19.1144 17 18.1716 16.4142 17.5858C15.8284 17 14.8856 17 13 17H11C9.11438 17 8.17157 17 7.58579 17.5858C7 18.1716 7 19.1144 7 21V22" stroke="currentColor" stroke-width="1.5"></path>
                <path opacity="0.5" d="M7 8H13" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
            </svg>
            Enregistrer
        </button>
    </div>

    <script>
        function validateHour(input) {
            let value = input.value;

            value = value.replace(/\D/g, '');

            if (value.length > 2) {
                value = value.substring(0, 2);
            }

            let num = parseInt(value);
            if (num > 23) {
                value = "23";
            }
            input.value = value;
        }
    </script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#service_id').on('change', function () {
            var serviceId = $(this).val();
            var userSelect = $('#user_id');

            userSelect.empty(); // Vider la liste des personnels

            if (serviceId) {
                $.ajax({
                    url: '/get-users/' + serviceId,
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        if (data.length > 0) {
                            userSelect.append('<option value="">-- Sélectionnez un membre du personnel --</option>');
                            $.each(data, function (key, user) {
                                userSelect.append('<option value="' + user.id + '">' + user.name + ' ' + user.first_name + '</option>');
                            });
                        } else {
                            userSelect.append('<option value="">Aucun personnel trouvé</option>');
                        }
                    }
                });
            } else {
                userSelect.append('<option value="">-- Sélectionnez un membre du personnel --</option>');
            }
        });
    });
</script>

</form>

@endsection
