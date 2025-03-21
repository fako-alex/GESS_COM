@extends('admin.layouts.app')

@section('content')

    <div class="panel">
            <div class="flex items-start gap-5 px-2 pb-2 overflow-x-auto flex-nowrap">
                <div class="flex-none panel w-80">
                    <div class="flex items-center justify-between mb-5">
                        <h5 class="text-lg font-semibold dark:text-white-light">Profile</h5>
                        <a href="users-account-settings.html" class="p-2 rounded-full btn btn-primary ltr:ml-auto rtl:mr-auto">
                            <svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5">
                                <path opacity="0.5" d="M4 22H20" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                <path d="M14.6296 2.92142L13.8881 3.66293L7.07106 10.4799C6.60933 10.9416 6.37846 11.1725 6.17992 11.4271C5.94571 11.7273 5.74491 12.0522 5.58107 12.396C5.44219 12.6874 5.33894 12.9972 5.13245 13.6167L4.25745 16.2417L4.04356 16.8833C3.94194 17.1882 4.02128 17.5243 4.2485 17.7515C4.47573 17.9787 4.81182 18.0581 5.11667 17.9564L5.75834 17.7426L8.38334 16.8675L8.3834 16.8675C9.00284 16.6611 9.31256 16.5578 9.60398 16.4189C9.94775 16.2551 10.2727 16.0543 10.5729 15.8201C10.8275 15.6215 11.0583 15.3907 11.5201 14.929L11.5201 14.9289L18.3371 8.11195L19.0786 7.37044C20.3071 6.14188 20.3071 4.14999 19.0786 2.92142C17.85 1.69286 15.8581 1.69286 14.6296 2.92142Z" stroke="currentColor" stroke-width="1.5"></path>
                                <path opacity="0.5" d="M13.8879 3.66406C13.8879 3.66406 13.9806 5.23976 15.3709 6.63008C16.7613 8.0204 18.337 8.11308 18.337 8.11308M5.75821 17.7437L4.25732 16.2428" stroke="currentColor" stroke-width="1.5"></path>
                            </svg>
                        </a>
                    </div>
                    <div class="mb-5">
                        <div class="flex flex-col items-center justify-center">
                            <img src="{{ asset('documents/profil/users/' . $user->profile_picture)}}" alt="image" class="object-cover w-24 h-24 mb-5 rounded-full">
                            <p class="text-xl font-semibold text-primary">{{ $user->name ?? 'Non défini'}} {{ $user->first_name ?? ''}}</p>
                        </div>
                        <ul class="m-auto mt-5 flex max-w-[160px] flex-col space-y-4 font-semibold text-white-dark">
                            <li class="flex items-center gap-2">
                                <svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 shrink-0">
                                    <path d="M2.3153 12.6978C2.26536 12.2706 2.2404 12.057 2.2509 11.8809C2.30599 10.9577 2.98677 10.1928 3.89725 10.0309C4.07094 10 4.286 10 4.71612 10H15.2838C15.7139 10 15.929 10 16.1027 10.0309C17.0132 10.1928 17.694 10.9577 17.749 11.8809C17.7595 12.057 17.7346 12.2706 17.6846 12.6978L17.284 16.1258C17.1031 17.6729 16.2764 19.0714 15.0081 19.9757C14.0736 20.6419 12.9546 21 11.8069 21H8.19303C7.04537 21 5.9263 20.6419 4.99182 19.9757C3.72352 19.0714 2.89681 17.6729 2.71598 16.1258L2.3153 12.6978Z" stroke="currentColor" stroke-width="1.5"></path>
                                    <path opacity="0.5" d="M17 17H19C20.6569 17 22 15.6569 22 14C22 12.3431 20.6569 11 19 11H17.5" stroke="currentColor" stroke-width="1.5"></path>
                                    <path opacity="0.5" d="M10.0002 2C9.44787 2.55228 9.44787 3.44772 10.0002 4C10.5524 4.55228 10.5524 5.44772 10.0002 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M4.99994 7.5L5.11605 7.38388C5.62322 6.87671 5.68028 6.0738 5.24994 5.5C4.81959 4.9262 4.87665 4.12329 5.38382 3.61612L5.49994 3.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M14.4999 7.5L14.6161 7.38388C15.1232 6.87671 15.1803 6.0738 14.7499 5.5C14.3196 4.9262 14.3767 4.12329 14.8838 3.61612L14.9999 3.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                                {{ $user->role ?? ''}}
                            </li>
                            <li class="flex items-center gap-2">
                                <svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 shrink-0">
                                    <path d="M2 12C2 8.22876 2 6.34315 3.17157 5.17157C4.34315 4 6.22876 4 10 4H14C17.7712 4 19.6569 4 20.8284 5.17157C22 6.34315 22 8.22876 22 12V14C22 17.7712 22 19.6569 20.8284 20.8284C19.6569 22 17.7712 22 14 22H10C6.22876 22 4.34315 22 3.17157 20.8284C2 19.6569 2 17.7712 2 14V12Z" stroke="currentColor" stroke-width="1.5"></path>
                                    <path opacity="0.5" d="M7 4V2.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                    <path opacity="0.5" d="M17 4V2.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                    <path opacity="0.5" d="M2 9H22" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                </svg>
                                {{ \Carbon\Carbon::parse($user->hiring_date)->format('d/m/Y') }}

                            </li>
                            <li class="flex items-center gap-2">
                                <svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 shrink-0">
                                    <path opacity="0.5" d="M4 10.1433C4 5.64588 7.58172 2 12 2C16.4183 2 20 5.64588 20 10.1433C20 14.6055 17.4467 19.8124 13.4629 21.6744C12.5343 22.1085 11.4657 22.1085 10.5371 21.6744C6.55332 19.8124 4 14.6055 4 10.1433Z" stroke="currentColor" stroke-width="1.5"></path>
                                    <circle cx="12" cy="10" r="3" stroke="currentColor" stroke-width="1.5"></circle>
                                </svg>
                                {{ $user->neighborhood ?? ''}}
                            </li>
                            <li>
                                <a href="javascript:;" class="flex items-center gap-2">
                                    <svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 shrink-0">
                                        <path opacity="0.5" d="M2 12C2 8.22876 2 6.34315 3.17157 5.17157C4.34315 4 6.22876 4 10 4H14C17.7712 4 19.6569 4 20.8284 5.17157C22 6.34315 22 8.22876 22 12C22 15.7712 22 17.6569 20.8284 18.8284C19.6569 20 17.7712 20 14 20H10C6.22876 20 4.34315 20 3.17157 18.8284C2 17.6569 2 15.7712 2 12Z" stroke="currentColor" stroke-width="1.5"></path>
                                        <path d="M6 8L8.1589 9.79908C9.99553 11.3296 10.9139 12.0949 12 12.0949C13.0861 12.0949 14.0045 11.3296 15.8411 9.79908L18 8" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                    </svg>
                                    <span class="truncate text-primary">{{ $user->email ?? ''}}</span></a>
                            </li>
                            <li class="flex items-center gap-2">
                                <svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5">
                                    <path d="M16.1007 13.359L16.5562 12.9062C17.1858 12.2801 18.1672 12.1515 18.9728 12.5894L20.8833 13.628C22.1102 14.2949 22.3806 15.9295 21.4217 16.883L20.0011 18.2954C19.6399 18.6546 19.1917 18.9171 18.6763 18.9651M4.00289 5.74561C3.96765 5.12559 4.25823 4.56668 4.69185 4.13552L6.26145 2.57483C7.13596 1.70529 8.61028 1.83992 9.37326 2.85908L10.6342 4.54348C11.2507 5.36691 11.1841 6.49484 10.4775 7.19738L10.1907 7.48257" stroke="currentColor" stroke-width="1.5"></path>
                                    <path opacity="0.5" d="M18.6763 18.9651C17.0469 19.117 13.0622 18.9492 8.8154 14.7266C4.81076 10.7447 4.09308 7.33182 4.00293 5.74561" stroke="currentColor" stroke-width="1.5"></path>
                                    <path opacity="0.5" d="M16.1007 13.3589C16.1007 13.3589 15.0181 14.4353 12.0631 11.4971C9.10807 8.55886 10.1907 7.48242 10.1907 7.48242" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                </svg>
                                <span class="whitespace-nowrap" dir="ltr">{{ $user->phone ?? ''}}</span>
                            </li>
                        </ul>
                        <ul class="flex items-center justify-center gap-2 mt-7">
                            <li>
                                <a class="flex items-center justify-center w-10 h-10 p-0 rounded-full btn btn-info" href="javascript:;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5">
                                        <path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path>
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a class="flex items-center justify-center w-10 h-10 p-0 rounded-full btn btn-danger" href="javascript:;">
                                    <svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5">
                                        <path d="M3.33946 16.9997C6.10089 21.7826 12.2168 23.4214 16.9997 20.66C18.9493 19.5344 20.3765 17.8514 21.1962 15.9286C22.3875 13.1341 22.2958 9.83304 20.66 6.99972C19.0242 4.1664 16.2112 2.43642 13.1955 2.07088C11.1204 1.81935 8.94932 2.21386 6.99972 3.33946C2.21679 6.10089 0.578039 12.2168 3.33946 16.9997Z" stroke="currentColor" stroke-width="1.5"></path>
                                        <path opacity="0.5" d="M16.9497 20.5732C16.9497 20.5732 16.0107 13.9821 14.0004 10.5001C11.99 7.01803 7.05018 3.42681 7.05018 3.42681M7.57711 20.8175C9.05874 16.3477 16.4525 11.3931 21.8635 12.5801M16.4139 3.20898C14.926 7.63004 7.67424 12.5123 2.28857 11.4516" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a class="flex items-center justify-center w-10 h-10 p-0 rounded-full btn btn-dark" href="javascript:;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5">
                                        <path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path>
                                    </svg>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="panel lg:col-span-2 xl:col-span-3">
                    <div class="mb-5">
                        <h5 class="text-lg font-semibold dark:text-white-light">Modifier mon Profile</h5>
                    </div>
                    <div class="mb-5">
                        <div class="table-responsive font-semibold text-[#515365] dark:text-white-light">
                            <form method="post" action="{{ route('admin.users.update_profil', $user->id) }}" enctype="multipart/form-data" class="mb-5 rounded-md border border-[#ebedf2] bg-white p-4 dark:border-[#191e3a] dark:bg-[#0e1726]">
                                @csrf
                                @method('PUT')

                                <div class="flex flex-col sm:flex-row">
                                    <div class="grid flex-1 grid-cols-1 gap-5 sm:grid-cols-3">
                                        <div>
                                            <label for="name">Nom</label>
                                            <input id="name" name="name" value="{{ old('name', $user->name) }}" type="text" placeholder="Exp : FAKO" class="form-input" required readonly>
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
                                            <label for="phone">Numéro de téléphone</label>
                                            <input type="tel" id="phone" value="{{ old('phone', $user->phone) }}" name="phone" class="form-input" placeholder="(241) 77-22-71-07" maxlength="18" oninput="formatPhoneNumber(this)" required>
                                            @if($errors->has('phone'))
                                                <span class="text-red-500 badge-outline-danger">{{ $errors->first('phone') }}</span>
                                            @endif
                                        </div>

                                        <div>
                                            <label for="email">Email</label>
                                            <input type="email" id="email" value="{{ old('email', $user->email) }}" name="email" class="form-input" placeholder="Entrez votre email" required>
                                            @if($errors->has('email'))
                                                <span class="text-red-500 badge-outline-danger">{{ $errors->first('email', $user->email) }}</span>
                                            @endif
                                        </div>

                                        <div>
                                            <label for="service">Service</label>
                                            <input id="service" value="{{ $user->service->name ?? 'Non défini' }}" class="form-input" readonly></input>
                                            @if($errors->has('service'))
                                                <span class="text-red-500 badge-outline-danger">{{ $errors->first('service') }}</span>
                                            @endif
                                        </div>

                                        <div>
                                            <label for="matricule">Matricule</label>
                                            <input id="matricule" value="{{ $user->matricule ?? 'Non défini' }}" class="form-input" readonly></input>
                                            @if($errors->has('matricule'))
                                                <span class="text-red-500 badge-outline-danger">{{ $errors->first('matricule') }}</span>
                                            @endif
                                        </div>

                                        <div>
                                            <label for="birth_date">Date de naissance</label>
                                            <input id="birth_date" value="{{ old('birth_date', $user->birth_date) }}" name="birth_date" type="date" class="form-input" required>
                                            @if($errors->has('birth_date'))
                                                <span class="text-red-500 badge-outline-danger">{{ $errors->first('birth_date') }}</span>
                                            @endif
                                        </div>

                                        <div>
                                            <label for="birth_place">Lieu de naissance</label>
                                            <input id="birth_place" value="{{ old('birth_place', $user->birth_place) }}" name="birth_place" type="text" placeholder="Lieu de naissance" class="form-input" required>
                                            @if($errors->has('birth_place'))
                                                <span class="text-red-500 badge-outline-danger">{{ $errors->first('birth_place') }}</span>
                                            @endif
                                        </div>

                                        <div>
                                            <label for="country">Pays</label>
                                            <input id="country" value="{{ old('country', $user->country) }}" name="country" type="text" placeholder="Gabon" class="form-input" required>
                                            @if($errors->has('country'))
                                                <span class="text-red-500 badge-outline-danger">{{ $errors->first('country') }}</span>
                                            @endif
                                        </div>

                                        <div>
                                            <label for="city">Ville</label>
                                            <input id="city" value="{{ old('city', $user->city) }}" name="city" type="text" placeholder="Libreville" class="form-input" required>
                                            @if($errors->has('city'))
                                                <span class="text-red-500 badge-outline-danger">{{ $errors->first('city') }}</span>
                                            @endif
                                        </div>

                                        <div>
                                            <label for="neighborhood">Quartier</label>
                                            <input id="neighborhood" value="{{ old('neighborhood', $user->neighborhood) }}" name="neighborhood" type="text" placeholder="AKANDA CHATEAU" class="form-input" required>
                                            @if($errors->has('neighborhood'))
                                                <span class="text-red-500 badge-outline-danger">{{ $errors->first('neighborhood') }}</span>
                                            @endif
                                        </div>

                                        <div>
                                            <label for="hiring_date">Date d'emboche</label>
                                            <input id="hiring_date" value="{{ old('hiring_date', $user->hiring_date) }}" name="hiring_date" type="date" class="form-input" required readonly>
                                            @if($errors->has('hiring_date'))
                                                <span class="text-red-500 badge-outline-danger">{{ $errors->first('hiring_date') }}</span>
                                            @endif
                                        </div>

                                        <div>
                                            <label for="departure_date">Date de départ</label>
                                            <input id="departure_date" value="{{ old('departure_date', $user->departure_date) }}" name="departure_date" type="date" class="form-input" required readonly>
                                            @if($errors->has('departure_date'))
                                                <span class="text-red-500 badge-outline-danger">{{ $errors->first('departure_date') }}</span>
                                            @endif
                                        </div>

                                        <div>
                                            <label for="password">Mot de passe</label>
                                            <div class="relative">
                                                <input id="password" value="{{ old('password') }}" name="password" type="password" class="form-input" required>
                                                <button type="button" class="absolute transform -translate-y-1/2 right-2 top-1/2" onclick="togglePasswordVisibility()">
                                                    <svg id="eye-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12c0 3.866-3.134 7-7 7s-7-3.134-7-7 3.134-7 7-7 7 3.134 7 7z"></path>
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12l5 5M15 12l5-5"></path>
                                                    </svg>
                                                </button>
                                            </div>
                                            @if($errors->has('password'))
                                                <span class="text-red-500 badge-outline-danger">{{ $errors->first('password') }}</span>
                                            @endif
                                        </div>

                                        <div>
                                            <label for="status">Statut du compte</label>
                                            <select id="status" name="status" class="form-select" required>
                                                <option value="">Sélectionner un statut</option>
                                                <option value="Actif" {{ old('status', $user->status) == 'Actif' ? 'selected' : '' }}>Actif</option>
                                                <option value="Inactif" {{ old('status', $user->status) == 'Inactif' ? 'selected' : '' }}>Inactif</option>
                                            </select>
                                            @if($errors->has('status'))
                                                <span class="text-red-500 badge-outline-danger">{{ $errors->first('status') }}</span>
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
                                                    <p>Aucune image</p>
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
                                        Modifier mon profil
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </div>

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

@endsection
