@extends('admin.layouts.app')


@section('content')
    <form method="post" action="{{ route('admin.absences.save') }}"
        class="mb-5 rounded-md border border-[#ebedf2] bg-white p-4 dark:border-[#191e3a] dark:bg-[#0e1726]">
        @csrf
        <div class="panel">
            <div class="flex items-center justify-between mb-5">
                <h5 class="text-lg font-semibold dark:text-white-light">Ajouter un motif d'absence</h5>
            </div>
            <div class="mb-5">
                <ol class="flex font-semibold text-primary dark:text-white-dark">
                    <li class="bg-[#ebedf2] ltr:rounded-l-md rtl:rounded-r-md dark:bg-[#1b2e4b]">
                        <a href="javascript:;"
                            class="relative flex h-full items-center p-1.5 before:absolute before:inset-y-0 before:z-[1] before:m-auto before:h-0 before:w-0 before:border-[16px] before:border-l-[15px] before:border-r-0 before:border-t-transparent before:border-b-transparent before:border-l-[#ebedf2] hover:text-primary/70 ltr:pl-3 ltr:pr-2 ltr:before:-right-[15px] rtl:pr-3 rtl:pl-2 rtl:before:-left-[15px] rtl:before:rotate-180 dark:before:border-l-[#1b2e4b] dark:hover:text-white-dark/70">
                            Raisons d'absence
                        </a>
                    </li>
                    <li class="bg-[#ebedf2] dark:bg-[#1b2e4b]">
                        <a
                            class="relative flex h-full items-center bg-primary p-1.5 text-white-light before:absolute before:inset-y-0 before:z-[1] before:m-auto before:h-0 before:w-0 before:border-[16px] before:border-l-[15px] before:border-r-0 before:border-t-transparent before:border-b-transparent before:border-l-primary ltr:pl-6 ltr:pr-2 ltr:before:-right-[15px] rtl:pr-6 rtl:pl-2 rtl:before:-left-[15px] rtl:before:rotate-180">
                            Ajouter un motif d'absence
                        </a>
                    </li>
                </ol>
            </div>
            <div class="flex justify-end"> <!-- Ajout de mb-4 pour l'espacement -->
                <a href="{{ url('absences/list') }}" class="btn btn-primary">
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
                    Liste d'absence
                </a>
            </div>
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
        <div class="grid grid-cols-3 gap-5">
            <div class="col-span-1">
                <label for="name">Motif d'absence <span class="text-danger">*</span></label>
                <input id="name" name="name" value="{{ old('name') }}" type="text"
                    placeholder="Exp : Congé de maternité" class="w-full form-input" required>
                @if ($errors->has('name'))
                    <span class="text-danger badge-outline-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>

            <div class="col-span-1">
                <label for="start_date">Date de début <span class="text-danger">*</span></label>
                <input id="start_date" name="start_date" value="{{ old('start_date') }}" type="date"
                    placeholder="Exp : Licenciement" class="w-full form-input" required>
                @if ($errors->has('start_date'))
                    <span class="text-danger badge-outline-danger">{{ $errors->first('start_date') }}</span>
                @endif
            </div>

            <div class="col-span-1">
                <label for="end_date">Date de fin <span class="text-danger">*</span></label>
                <input id="end_date" name="end_date" value="{{ old('end_date') }}" type="date"
                    placeholder="Exp : Licenciement" class="w-full form-input" required>
                @if ($errors->has('end_date'))
                    <span class="text-danger badge-outline-danger">{{ $errors->first('end_date') }}</span>
                @endif
            </div>

            <div class="col-span-2">
                <label for="detail">Description du motif d'absence <span class="text-danger"></span></label>
                <textarea id="detail" name="detail" value="{{ old('detail') }}" class="w-full form-textarea"
                    placeholder="Exp : Pour les congés de maternit......."></textarea>
                @if ($errors->has('detail'))
                    <span class="text-danger badge-outline-danger">{{ $errors->first('detail') }}</span>
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
            document.addEventListener("DOMContentLoaded", function() {
                let startDateInput = document.getElementById("start_date");
                let endDateInput = document.getElementById("end_date");

                function validateDates() {
                    let startDate = new Date(startDateInput.value);
                    let endDate = new Date(endDateInput.value);

                    if (startDate && endDate && startDate >= endDate) {
                        alert("La date de fin doit être supérieure à la date de début.");
                        endDateInput.value = ""; // Réinitialise la valeur de end_date
                        return false;
                    }
                    return true;
                }

                startDateInput.addEventListener("change", validateDates);
                endDateInput.addEventListener("change", validateDates);
            });
        </script>

    </form>
@endsection
