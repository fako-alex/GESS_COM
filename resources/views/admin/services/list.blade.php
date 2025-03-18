@extends('admin.layouts.app')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="p-6 animate__animated" :class="[$store.app.animation]">
    <!-- start main content section -->

    <div x-data="contacts">
        <div class="flex flex-wrap items-center justify-between gap-4">
            <div class="flex flex-wrap items-center justify-between gap-4">
                <ol class="flex font-semibold text-primary dark:text-white-dark">
                    <li class="bg-[#ebedf2] ltr:rounded-l-md rtl:rounded-r-md dark:bg-[#1b2e4b]">
                        <a href="javascript:;"
                            class="relative flex h-full items-center p-1.5 before:absolute before:inset-y-0 before:z-[1] before:m-auto before:h-0 before:w-0 before:border-[16px] before:border-l-[15px] before:border-r-0 before:border-t-transparent before:border-b-transparent before:border-l-[#ebedf2] hover:text-primary/70 ltr:pl-3 ltr:pr-2 ltr:before:-right-[15px] rtl:pr-3 rtl:pl-2 rtl:before:-left-[15px] rtl:before:rotate-180 dark:before:border-l-[#1b2e4b] dark:hover:text-white-dark/70">Services</a>
                    </li>
                    <li class="bg-[#ebedf2] dark:bg-[#1b2e4b]">
                        <a
                            class="relative flex h-full items-center bg-primary p-1.5 text-white-light before:absolute before:inset-y-0 before:z-[1] before:m-auto before:h-0 before:w-0 before:border-[16px] before:border-l-[15px] before:border-r-0 before:border-t-transparent before:border-b-transparent before:border-l-primary ltr:pl-6 ltr:pr-2 ltr:before:-right-[15px] rtl:pr-6 rtl:pl-2 rtl:before:-left-[15px] rtl:before:rotate-180">Liste des services</a>
                    </li>
                </ol>
            </div>
            <div class="flex flex-col w-full gap-4 sm:w-auto sm:flex-row sm:items-center sm:gap-3">
                <div class="flex gap-3">
                    <div>
                        <a href="{{route('admin.services.create')}}" class="btn btn-primary">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ltr:mr-2 rtl:ml-2">
                                <circle cx="10" cy="6" r="4" stroke="currentColor" stroke-width="1.5"></circle>
                                <path opacity="0.5" d="M18 17.5C18 19.9853 18 22 10 22C2 22 2 19.9853 2 17.5C2 15.0147 5.58172 13 10 13C14.4183 13 18 15.0147 18 17.5Z" stroke="currentColor" stroke-width="1.5"></path>
                                <path d="M21 10H19M19 10H17M19 10L19 8M19 10L19 12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                            </svg>
                            Ajouter un service
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex flex-wrap items-center mt-5 mb-5 " x-data="exportTable()" x-init="initTable()">
            <button type="button" class="m-1 btn btn-primary btn-sm" @click="exportTable('txt')">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ltr:mr-2 rtl:ml-2">
                    <path d="M15.3929 4.05365L14.8912 4.61112L15.3929 4.05365ZM19.3517 7.61654L18.85 8.17402L19.3517 7.61654ZM21.654 10.1541L20.9689 10.4592V10.4592L21.654 10.1541ZM3.17157 20.8284L3.7019 20.2981H3.7019L3.17157 20.8284ZM20.8284 20.8284L20.2981 20.2981L20.2981 20.2981L20.8284 20.8284ZM14 21.25H10V22.75H14V21.25ZM2.75 14V10H1.25V14H2.75ZM21.25 13.5629V14H22.75V13.5629H21.25ZM14.8912 4.61112L18.85 8.17402L19.8534 7.05907L15.8947 3.49618L14.8912 4.61112ZM22.75 13.5629C22.75 11.8745 22.7651 10.8055 22.3391 9.84897L20.9689 10.4592C21.2349 11.0565 21.25 11.742 21.25 13.5629H22.75ZM18.85 8.17402C20.2034 9.3921 20.7029 9.86199 20.9689 10.4592L22.3391 9.84897C21.9131 8.89241 21.1084 8.18853 19.8534 7.05907L18.85 8.17402ZM10.0298 2.75C11.6116 2.75 12.2085 2.76158 12.7405 2.96573L13.2779 1.5653C12.4261 1.23842 11.498 1.25 10.0298 1.25V2.75ZM15.8947 3.49618C14.8087 2.51878 14.1297 1.89214 13.2779 1.5653L12.7405 2.96573C13.2727 3.16993 13.7215 3.55836 14.8912 4.61112L15.8947 3.49618ZM10 21.25C8.09318 21.25 6.73851 21.2484 5.71085 21.1102C4.70476 20.975 4.12511 20.7213 3.7019 20.2981L2.64124 21.3588C3.38961 22.1071 4.33855 22.4392 5.51098 22.5969C6.66182 22.7516 8.13558 22.75 10 22.75V21.25ZM1.25 14C1.25 15.8644 1.24841 17.3382 1.40313 18.489C1.56076 19.6614 1.89288 20.6104 2.64124 21.3588L3.7019 20.2981C3.27869 19.8749 3.02502 19.2952 2.88976 18.2892C2.75159 17.2615 2.75 15.9068 2.75 14H1.25ZM14 22.75C15.8644 22.75 17.3382 22.7516 18.489 22.5969C19.6614 22.4392 20.6104 22.1071 21.3588 21.3588L20.2981 20.2981C19.8749 20.7213 19.2952 20.975 18.2892 21.1102C17.2615 21.2484 15.9068 21.25 14 21.25V22.75ZM21.25 14C21.25 15.9068 21.2484 17.2615 21.1102 18.2892C20.975 19.2952 20.7213 19.8749 20.2981 20.2981L21.3588 21.3588C22.1071 20.6104 22.4392 19.6614 22.5969 18.489C22.7516 17.3382 22.75 15.8644 22.75 14H21.25ZM2.75 10C2.75 8.09318 2.75159 6.73851 2.88976 5.71085C3.02502 4.70476 3.27869 4.12511 3.7019 3.7019L2.64124 2.64124C1.89288 3.38961 1.56076 4.33855 1.40313 5.51098C1.24841 6.66182 1.25 8.13558 1.25 10H2.75ZM10.0298 1.25C8.15538 1.25 6.67442 1.24842 5.51887 1.40307C4.34232 1.56054 3.39019 1.8923 2.64124 2.64124L3.7019 3.7019C4.12453 3.27928 4.70596 3.02525 5.71785 2.88982C6.75075 2.75158 8.11311 2.75 10.0298 2.75V1.25Z" fill="currentColor"></path>
                    <path opacity="0.5" d="M6 14.5H14" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                    <path opacity="0.5" d="M6 18H11.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                    <path opacity="0.5" d="M13 2.5V5C13 7.35702 13 8.53553 13.7322 9.26777C14.4645 10 15.643 10 18 10H22" stroke="currentColor" stroke-width="1.5"></path>
                </svg>
                TEXTE
            </button>
            <button type="button" class="m-1 btn btn-primary btn-sm" @click="exportTable('excel')">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ltr:mr-2 rtl:ml-2">
                    <path d="M15.3929 4.05365L14.8912 4.61112L15.3929 4.05365ZM19.3517 7.61654L18.85 8.17402L19.3517 7.61654ZM21.654 10.1541L20.9689 10.4592V10.4592L21.654 10.1541ZM3.17157 20.8284L3.7019 20.2981H3.7019L3.17157 20.8284ZM20.8284 20.8284L20.2981 20.2981L20.2981 20.2981L20.8284 20.8284ZM14 21.25H10V22.75H14V21.25ZM2.75 14V10H1.25V14H2.75ZM21.25 13.5629V14H22.75V13.5629H21.25ZM14.8912 4.61112L18.85 8.17402L19.8534 7.05907L15.8947 3.49618L14.8912 4.61112ZM22.75 13.5629C22.75 11.8745 22.7651 10.8055 22.3391 9.84897L20.9689 10.4592C21.2349 11.0565 21.25 11.742 21.25 13.5629H22.75ZM18.85 8.17402C20.2034 9.3921 20.7029 9.86199 20.9689 10.4592L22.3391 9.84897C21.9131 8.89241 21.1084 8.18853 19.8534 7.05907L18.85 8.17402ZM10.0298 2.75C11.6116 2.75 12.2085 2.76158 12.7405 2.96573L13.2779 1.5653C12.4261 1.23842 11.498 1.25 10.0298 1.25V2.75ZM15.8947 3.49618C14.8087 2.51878 14.1297 1.89214 13.2779 1.5653L12.7405 2.96573C13.2727 3.16993 13.7215 3.55836 14.8912 4.61112L15.8947 3.49618ZM10 21.25C8.09318 21.25 6.73851 21.2484 5.71085 21.1102C4.70476 20.975 4.12511 20.7213 3.7019 20.2981L2.64124 21.3588C3.38961 22.1071 4.33855 22.4392 5.51098 22.5969C6.66182 22.7516 8.13558 22.75 10 22.75V21.25ZM1.25 14C1.25 15.8644 1.24841 17.3382 1.40313 18.489C1.56076 19.6614 1.89288 20.6104 2.64124 21.3588L3.7019 20.2981C3.27869 19.8749 3.02502 19.2952 2.88976 18.2892C2.75159 17.2615 2.75 15.9068 2.75 14H1.25ZM14 22.75C15.8644 22.75 17.3382 22.7516 18.489 22.5969C19.6614 22.4392 20.6104 22.1071 21.3588 21.3588L20.2981 20.2981C19.8749 20.7213 19.2952 20.975 18.2892 21.1102C17.2615 21.2484 15.9068 21.25 14 21.25V22.75ZM21.25 14C21.25 15.9068 21.2484 17.2615 21.1102 18.2892C20.975 19.2952 20.7213 19.8749 20.2981 20.2981L21.3588 21.3588C22.1071 20.6104 22.4392 19.6614 22.5969 18.489C22.7516 17.3382 22.75 15.8644 22.75 14H21.25ZM2.75 10C2.75 8.09318 2.75159 6.73851 2.88976 5.71085C3.02502 4.70476 3.27869 4.12511 3.7019 3.7019L2.64124 2.64124C1.89288 3.38961 1.56076 4.33855 1.40313 5.51098C1.24841 6.66182 1.25 8.13558 1.25 10H2.75ZM10.0298 1.25C8.15538 1.25 6.67442 1.24842 5.51887 1.40307C4.34232 1.56054 3.39019 1.8923 2.64124 2.64124L3.7019 3.7019C4.12453 3.27928 4.70596 3.02525 5.71785 2.88982C6.75075 2.75158 8.11311 2.75 10.0298 2.75V1.25Z" fill="currentColor"></path>
                    <path opacity="0.5" d="M13 2.5V5C13 7.35702 13 8.53553 13.7322 9.26777C14.4645 10 15.643 10 18 10H22" stroke="currentColor" stroke-width="1.5"></path>
                    <path opacity="0.5" d="M7 14L6 15L7 16M11.5 16L12.5 17L11.5 18M10 14L8.5 18" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
                EXCEL
            </button>
            <button type="button" class="m-1 btn btn-primary btn-sm" @click="printTable">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ltr:mr-2 rtl:ml-2">
                    <path d="M6 17.9827C4.44655 17.9359 3.51998 17.7626 2.87868 17.1213C2 16.2426 2 14.8284 2 12C2 9.17157 2 7.75736 2.87868 6.87868C3.75736 6 5.17157 6 8 6H16C18.8284 6 20.2426 6 21.1213 6.87868C22 7.75736 22 9.17157 22 12C22 14.8284 22 16.2426 21.1213 17.1213C20.48 17.7626 19.5535 17.9359 18 17.9827" stroke="currentColor" stroke-width="1.5"></path>
                    <path opacity="0.5" d="M9 10H6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                    <path d="M19 14L5 14" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                    <path d="M18 14V16C18 18.8284 18 20.2426 17.1213 21.1213C16.2426 22 14.8284 22 12 22C9.17157 22 7.75736 22 6.87868 21.1213C6 20.2426 6 18.8284 6 16V14" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                    <path opacity="0.5" d="M17.9827 6C17.9359 4.44655 17.7626 3.51998 17.1213 2.87868C16.2427 2 14.8284 2 12 2C9.17158 2 7.75737 2 6.87869 2.87868C6.23739 3.51998 6.06414 4.44655 6.01733 6" stroke="currentColor" stroke-width="1.5"></path>
                    <circle opacity="0.5" cx="17" cy="10" r="1" fill="currentColor"></circle>
                    <path opacity="0.5" d="M15 16.5H9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                    <path opacity="0.5" d="M13 19H9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                </svg>
                IMPRIMER
            </button>
        </div>
        <div class="p-0 mt-5 overflow-hidden border-0">
            <template x-if="displayType === 'list'">
                <div class="table-responsive">
                    <table id="myTable" class="table-striped table-hover">
                        <thead>
                            <tr>
                                <th>N°</th>
                                <th>Nom du service</th>
                                <th>Date de creation</th>
                                <th>Créer par</th>
                                <th>Description du service</th>
                                <th class="!text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($services as $service)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $service->name }}</td>
                                    <td>{{ $service->created_at ? \Carbon\Carbon::parse($service->created_at)->format('d/m/Y') : ' ' }}</td>
                                    <td>{{ $service->addedByservice ? $service->addedByservice->name . ' ' . $service->addedByservice->first_name : 'Non défini' }}</td>
                                    <td>{{ $service->detail ?? 'Non défini'}}</td>
                                    <td class="text-center">
                                        <ul class="flex items-center justify-center gap-2">
                                            <div x-data="{ open: false, selectedType: '' }">
                                                <!-- Bouton Modifier avec modale -->
                                                <li>
                                                    <a href="{{ route('admin.services.update',['id'=> $service->id]) }}"x-tooltip="Modifier">
                                                       <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5 text-success">
                                                            <path
                                                                d="M15.2869 3.15178L14.3601 4.07866L5.83882 12.5999L5.83881 12.5999C5.26166 13.1771 4.97308 13.4656 4.7249 13.7838C4.43213 14.1592 4.18114 14.5653 3.97634 14.995C3.80273 15.3593 3.67368 15.7465 3.41556 16.5208L2.32181 19.8021L2.05445 20.6042C1.92743 20.9852 2.0266 21.4053 2.31063 21.6894C2.59466 21.9734 3.01478 22.0726 3.39584 21.9456L4.19792 21.6782L7.47918 20.5844L7.47919 20.5844C8.25353 20.3263 8.6407 20.1973 9.00498 20.0237C9.43469 19.8189 9.84082 19.5679 10.2162 19.2751C10.5344 19.0269 10.8229 18.7383 11.4001 18.1612L11.4001 18.1612L19.9213 9.63993L20.8482 8.71306C22.3839 7.17735 22.3839 4.68748 20.8482 3.15178C19.3125 1.61607 16.8226 1.61607 15.2869 3.15178Z"
                                                                stroke="currentColor" stroke-width="1.5"></path>
                                                            <path opacity="0.5"
                                                                d="M14.36 4.07812C14.36 4.07812 14.4759 6.04774 16.2138 7.78564C17.9517 9.52354 19.9213 9.6394 19.9213 9.6394M4.19789 21.6777L2.32178 19.8015"
                                                                stroke="currentColor" stroke-width="1.5"></path>
                                                        </svg>
                                                    </a>
                                                </li>
                                            </div>
                                            <div>
                                                <li>
                                                    <a onclick="confirmation(event)" href="{{ route('admin.services.delete', $service->id) }}"  x-tooltip="Supprimer">
                                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-danger">
                                                            <path d="M20.5001 6H3.5" stroke="currentColor" stroke-width="1.5"
                                                                stroke-linecap="round"></path>
                                                            <path
                                                                d="M18.8334 8.5L18.3735 15.3991C18.1965 18.054 18.108 19.3815 17.243 20.1907C16.378 21 15.0476 21 12.3868 21H11.6134C8.9526 21 7.6222 21 6.75719 20.1907C5.89218 19.3815 5.80368 18.054 5.62669 15.3991L5.16675 8.5"
                                                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                                            <path opacity="0.5" d="M9.5 11L10 16" stroke="currentColor"
                                                                stroke-width="1.5" stroke-linecap="round"></path>
                                                            <path opacity="0.5" d="M14.5 11L14 16" stroke="currentColor"
                                                                stroke-width="1.5" stroke-linecap="round"></path>
                                                            <path opacity="0.5"
                                                                d="M6.5 6C6.55588 6 6.58382 6 6.60915 5.99936C7.43259 5.97849 8.15902 5.45491 8.43922 4.68032C8.44784 4.65649 8.45667 4.62999 8.47434 4.57697L8.57143 4.28571C8.65431 4.03708 8.69575 3.91276 8.75071 3.8072C8.97001 3.38607 9.37574 3.09364 9.84461 3.01877C9.96213 3 10.0932 3 10.3553 3H13.6447C13.9068 3 14.0379 3 14.1554 3.01877C14.6243 3.09364 15.03 3.38607 15.2493 3.8072C15.3043 3.91276 15.3457 4.03708 15.4286 4.28571L15.5257 4.57697C15.5433 4.62992 15.5522 4.65651 15.5608 4.68032C15.841 5.45491 16.5674 5.97849 17.3909 5.99936C17.4162 6 17.4441 6 17.5 6"
                                                                stroke="currentColor" stroke-width="1.5"></path>
                                                        </svg>
                                                    </a>
                                                </li>
                                            </div>
                                        </ul>
                                    </td>
                                </tr>
                            @empty
                                <tr class="text-center">
                                    <td colspan="3">Pas de services</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </template>
        </div>
    </div>
    <!-- end main content section -->

</div>

<script>
    document.addEventListener('alpine:init', () => {
        // main section
        Alpine.data('scrollToTop', () => ({
            showTopButton: false,
            init() {
                window.onscroll = () => {
                    this.scrollFunction();
                };
            },

            scrollFunction() {
                if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
                    this.showTopButton = true;
                } else {
                    this.showTopButton = false;
                }
            },

            goToTop() {
                document.body.scrollTop = 0;
                document.documentElement.scrollTop = 0;
            },
        }));
        //contacts

        Alpine.data('contacts', () => ({

            displayType: 'list',

            setDisplayType(type) {
                this.displayType = type;
            },

        }));
    });
</script>

<script>
    function confirmation(ev) {
       ev.preventDefault();
       var urlToRedirect = ev.currentTarget.getAttribute('href');
       console.log(urlToRedirect);

       Swal.fire({
           title: "Êtes-vous sûr ?",
           text: "Cette action est irréversible !",
           icon: "warning",
           showCancelButton: true,
           confirmButtonColor: "#d33",
           cancelButtonColor: "#3085d6",
           confirmButtonText: "Oui, supprimer !",
           cancelButtonText: "Annuler"
       }).then((result) => {
           // Vérifier si l'utilisateur a confirmé la suppression
           if (result.isConfirmed) {
               window.location.href = urlToRedirect;
           }
   });
}
</script>




<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest"></script>
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>

<script>
   document.addEventListener('alpine:init', () => {
       Alpine.data('exportTable', () => ({
       datatable: null,

        initTable() {
            setTimeout(() => {  // Ajout d'un léger délai pour s'assurer que la table est bien chargée
                let table = document.querySelector("#myTable");
                if (!table) {
                    console.error("Table non trouvée !");
                    return;
                }

                this.datatable = new simpleDatatables.DataTable(table, {
                    labels: {
                        placeholder: "Rechercher...",
                        perPage: "Afficher {select} entrées par page",
                        noRows: "Aucune donnée trouvée",
                        info: "Affichage de {start} à {end} sur {rows} entrées",
                        noResults: "Aucun résultat pour votre recherche",
                        next: "Suivant",
                        prev: "Précédent",
                    }
                });
            }, 500);  // 500ms de délai pour laisser le DOM se charger
        },
        exportTable(eType) {
            if (!this.datatable) {
                console.error("DataTable non initialisé !");
                return;
            }

            if (eType === 'excel') {
                let table = document.querySelector("#myTable");
                if (!table) {
                    console.error("Table non trouvée pour export !");
                    return;
                }
                let wb = XLSX.utils.table_to_book(table, { sheet: "Données" });
                XLSX.writeFile(wb, "table.xlsx");
                return;
            }

            this.datatable.export({ type: eType, filename: 'table', download: true });
        },
        printTable() {
            if (!this.datatable) {
                console.error("DataTable non initialisé !");
                return;
            }

            // console.log("Impression du tableau...");
            this.datatable.print();
        },
   }));
});
</script>
@endsection
