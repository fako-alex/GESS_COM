<div :class="{'dark text-white-dark' : $store.app.semidark}">
  <nav x-data="sidebar" class="sidebar fixed bottom-0 top-0 z-50 h-full min-h-screen w-[260px] shadow-[5px_0_25px_0_rgba(94,92,154,0.1)] transition-all duration-300">
      <div class="h-full bg-white dark:bg-[#0e1726]">
          <div class="flex items-center justify-between px-4 py-3">
                <a href="{{ url('/admin/dashboard')}}" class="main-logo flex shrink-0 items-center">
                    @if (Auth::user()->profile_picture)
                        <img class="ml-[5px] w-8 flex-none" src="{{ asset('documents/users/' . Auth::user()->profile_picture)}}" alt="image">
                    @else
                        <span><img class="h-9 w-9 rounded-full object-cover saturate-50 group-hover:saturate-100" src="{{ asset('template/assets/images/user-profile.jpeg')}}" alt="image"></span>
                    @endif
                    <span class="truncate max-w-[110px] block align-middle text-2xl font-semibold ltr:ml-1.5 rtl:mr-1.5 dark:text-white-light lg:inline">
                        {{ Auth::user()->name }}
                    </span>

                </a>
              <a href="javascript:;" class="collapse-icon flex h-8 w-8 items-center rounded-full transition duration-300 hover:bg-gray-500/10 rtl:rotate-180 dark:text-white-light dark:hover:bg-dark-light/10" @click="$store.app.toggleSidebar()">
                  <svg class="m-auto h-5 w-5" width="20" height="20" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M13 19L7 12L13 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                      <path opacity="0.5" d="M16.9998 19L10.9998 12L16.9998 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                  </svg>
              </a>
          </div>
          <ul class="perfect-scrollbar relative h-[calc(100vh-80px)] space-y-0.5 overflow-y-auto overflow-x-hidden p-4 py-0 font-semibold" x-data="{ activeDropdown: 'dashboard' }">
              <li class="menu nav-item">
                  <button type="button" class="nav-link group" :class="{'active' : activeDropdown === 'dashboard'}" @click="activeDropdown === 'dashboard' ? activeDropdown = null : activeDropdown = 'dashboard'">
                      <div class="flex items-center">
                          <svg class="shrink-0 group-hover:!text-primary" width="20" height="20" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path opacity="0.5" d="M2 12.2039C2 9.91549 2 8.77128 2.5192 7.82274C3.0384 6.87421 3.98695 6.28551 5.88403 5.10813L7.88403 3.86687C9.88939 2.62229 10.8921 2 12 2C13.1079 2 14.1106 2.62229 16.116 3.86687L18.116 5.10812C20.0131 6.28551 20.9616 6.87421 21.4808 7.82274C22 8.77128 22 9.91549 22 12.2039V13.725C22 17.6258 22 19.5763 20.8284 20.7881C19.6569 22 17.7712 22 14 22H10C6.22876 22 4.34315 22 3.17157 20.7881C2 19.5763 2 17.6258 2 13.725V12.2039Z" fill="currentColor"></path>
                              <path d="M9 17.25C8.58579 17.25 8.25 17.5858 8.25 18C8.25 18.4142 8.58579 18.75 9 18.75H15C15.4142 18.75 15.75 18.4142 15.75 18C15.75 17.5858 15.4142 17.25 15 17.25H9Z" fill="currentColor"></path>
                          </svg>

                          <a href="{{url('/dashboard')}}" class="text-black ltr:pl-3 rtl:pr-3 dark:text-[#506690] dark:group-hover:text-white-dark">Dashboard</a>
                      </div>
                  </button>
              </li>

              <li class="nav-item">
                 <ul></ul>
              </li>
                <li class="menu nav-item">
                    <button type="button" class="nav-link group" :class="{'active' : activeDropdown === 'users'}" @click="activeDropdown === 'users' ? activeDropdown = null : activeDropdown = 'users'">
                        <div class="flex items-center">
                            <svg class="shrink-0 group-hover:!text-primary" width="20" height="20" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle opacity="0.5" cx="15" cy="6" r="3" fill="currentColor"></circle>
                                <ellipse opacity="0.5" cx="16" cy="17" rx="5" ry="3" fill="currentColor"></ellipse>
                                <circle cx="9.00098" cy="6" r="4" fill="currentColor"></circle>
                                <ellipse cx="9.00098" cy="17.001" rx="7" ry="4" fill="currentColor"></ellipse>
                            </svg>
                            <span class="text-black ltr:pl-3 rtl:pr-3 dark:text-[#506690] dark:group-hover:text-white-dark">Utilisateurs</span>
                        </div>
                        <div class="rtl:rotate-180" :class="{'!rotate-90' : activeDropdown === 'users'}">
                            <svg width="16" height="16" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9 5L15 12L9 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </div>
                    </button>
                    <ul x-cloak="" x-show="activeDropdown === 'users'" x-collapse="" class="sub-menu text-gray-500">
                        
                        <li>
                            <a href="{{url('users/create')}}">Ajouter utilisateurs</a>
                        </li>
                        <li>
                            <a href="{{url('users/list')}}">Lister utilisateurs</a>
                        </li>
                    </ul>
                </li>
              {{-- end user --}}

              {{-- start crud books --}}
              <!-- <li class="menu nav-item">
                  <button type="button" class="nav-link group" :class="{'active' : activeDropdown === 'books'}" @click="activeDropdown === 'books' ? activeDropdown = null : activeDropdown = 'books'">
                      <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-book-fill" viewBox="0 0 16 16">
                            <path d="M8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783"/>
                          </svg>
                          <span class="text-black ltr:pl-3 rtl:pr-3 dark:text-[#506690] dark:group-hover:text-white-dark">Gestion documents</span>
                      </div>
                      <div class="rtl:rotate-180" :class="{'!rotate-90' : activeDropdown === 'books'}">
                          <svg width="16" height="16" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M9 5L15 12L9 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                          </svg>
                      </div>
                  </button>
                  <ul x-cloak="" x-show="activeDropdown === 'books'" x-collapse="" class="sub-menu text-gray-500">
                    
                        <li>
                          <a href="{{url('genres/create')}}">Genres des livres</a>
                        </li>
                        <li>
                          <a href="{{url('types/create')}}">Types de livres</a>
                        </li>
                        <li>
                            <a href="{{url('books/create')}}">Ajouter les livres</a>
                        </li>
                        <li>
                            <a href="{{url('books/list')}}">Lister les livres</a>
                        </li>
                        {{-- <li>
                            <a href="{{url('books')}}">Voir les livres</a>
                        </li> --}}
                    
                  </ul>
              </li> -->
              {{-- end crud books --}}

              {{-- start borrow and return a book --}}
              <!-- <li class="menu nav-item">
                  <button type="button" class="nav-link group" :class="{'active' : activeDropdown === 'transactions'}" @click="activeDropdown === 'transactions' ? activeDropdown = null : activeDropdown = 'transactions'">
                      <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-book-fill" viewBox="0 0 16 16">
                            <path d="M8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783"/>
                          </svg>
                          <span class="text-black ltr:pl-3 rtl:pr-3 dark:text-[#506690] dark:group-hover:text-white-dark">Transactions</span>
                      </div>
                      <div class="rtl:rotate-180" :class="{'!rotate-90' : activeDropdown === 'transactions'}">
                          <svg width="16" height="16" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M9 5L15 12L9 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                          </svg>
                      </div>
                  </button>
                  <ul x-cloak="" x-show="activeDropdown === 'transactions'" x-collapse="" class="sub-menu text-gray-500">
                    <li>
                        <a href="{{url('loans/borrow')}}">Emprunter documents</a>
                    </li>
                    <li>
                        <a href="{{url('loans/list')}}">Liste des Demandes</a>
                    </li>
                    <li>
                        <a href="{{url('loans/return_borrow')}}">Restituer documents</a>
                    </li>
                  </ul>
              </li> -->
              {{-- end borrow and return a book --}}

              {{-- start page --}}
              <!-- <li class="menu nav-item">
                  <button type="button" class="nav-link group" :class="{'active' : activeDropdown === 'pages'}" @click="activeDropdown === 'pages' ? activeDropdown = null : activeDropdown = 'pages'">
                      <div class="flex items-center">
                          <svg class="shrink-0 group-hover:!text-primary" width="20" height="20" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path opacity="0.5" fill-rule="evenodd" clip-rule="evenodd" d="M14 22H10C6.22876 22 4.34315 22 3.17157 20.8284C2 19.6569 2 17.7712 2 14V10C2 6.22876 2 4.34315 3.17157 3.17157C4.34315 2 6.23869 2 10.0298 2C10.6358 2 11.1214 2 11.53 2.01666C11.5166 2.09659 11.5095 2.17813 11.5092 2.26057L11.5 5.09497C11.4999 6.19207 11.4998 7.16164 11.6049 7.94316C11.7188 8.79028 11.9803 9.63726 12.6716 10.3285C13.3628 11.0198 14.2098 11.2813 15.0569 11.3952C15.8385 11.5003 16.808 11.5002 17.9051 11.5001L18 11.5001H21.9574C22 12.0344 22 12.6901 22 13.5629V14C22 17.7712 22 19.6569 20.8284 20.8284C19.6569 22 17.7712 22 14 22Z" fill="currentColor"></path>
                              <path d="M6 13.75C5.58579 13.75 5.25 14.0858 5.25 14.5C5.25 14.9142 5.58579 15.25 6 15.25H14C14.4142 15.25 14.75 14.9142 14.75 14.5C14.75 14.0858 14.4142 13.75 14 13.75H6Z" fill="currentColor"></path>
                              <path d="M6 17.25C5.58579 17.25 5.25 17.5858 5.25 18C5.25 18.4142 5.58579 18.75 6 18.75H11.5C11.9142 18.75 12.25 18.4142 12.25 18C12.25 17.5858 11.9142 17.25 11.5 17.25H6Z" fill="currentColor"></path>
                              <path d="M11.5092 2.2601L11.5 5.0945C11.4999 6.1916 11.4998 7.16117 11.6049 7.94269C11.7188 8.78981 11.9803 9.6368 12.6716 10.3281C13.3629 11.0193 14.2098 11.2808 15.057 11.3947C15.8385 11.4998 16.808 11.4997 17.9051 11.4996L21.9574 11.4996C21.9698 11.6552 21.9786 11.821 21.9848 11.9995H22C22 11.732 22 11.5983 21.9901 11.4408C21.9335 10.5463 21.5617 9.52125 21.0315 8.79853C20.9382 8.6713 20.8743 8.59493 20.7467 8.44218C19.9542 7.49359 18.911 6.31193 18 5.49953C17.1892 4.77645 16.0787 3.98536 15.1101 3.3385C14.2781 2.78275 13.862 2.50487 13.2915 2.29834C13.1403 2.24359 12.9408 2.18311 12.7846 2.14466C12.4006 2.05013 12.0268 2.01725 11.5 2.00586L11.5092 2.2601Z" fill="currentColor"></path>
                          </svg>
                          <span class="text-black ltr:pl-3 rtl:pr-3 dark:text-[#506690] dark:group-hover:text-white-dark">Pages</span>
                      </div>
                      <div class="rtl:rotate-180" :class="{'!rotate-90' : activeDropdown === 'pages'}">
                          <svg width="16" height="16" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M9 5L15 12L9 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                          </svg>
                      </div>
                  </button>
                  <ul x-cloak="" x-show="activeDropdown === 'pages'" x-collapse="" class="sub-menu text-gray-500">
                      <li>
                          <a href="pages-knowledge-base.html">Knowledge Base</a>
                      </li>
                      <li>
                          <a href="pages-contact-us-boxed.html" target="_blank">Contact Us Boxed</a>
                      </li>
                      <li>
                          <a href="pages-contact-us-cover.html" target="_blank">Contact Us Cover</a>
                      </li>
                      <li>
                          <a href="pages-faq.html">Faq</a>
                      </li>
                      <li>
                          <a href="pages-coming-soon-boxed.html" target="_blank">Coming Soon Boxed</a>
                      </li>
                      <li>
                          <a href="pages-coming-soon-cover.html" target="_blank">Coming Soon Cover</a>
                      </li>
                      <li x-data="{subActive:null}">
                          <button type="button" class="before:h-[5px] before:w-[5px] before:rounund before:bg-gray-300 hover:bg-gray-100 ltr:before:mr-2 rtl:before:ml-2 dark:text-[#888ea8] dark:hover:bg-gray-900" @click="subActive === 'error' ? subActive = null : subActive = 'error'">
                              Error
                              <div class="ltr:ml-auto rtl:mr-auto rtl:rotate-180" :class="{'!rotate-90' : subActive === 'error'}">
                                  <svg width="16" height="16" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path opacity="0.5" d="M6.25 19C6.25 19.3139 6.44543 19.5946 6.73979 19.7035C7.03415 19.8123 7.36519 19.7264 7.56944 19.4881L13.5694 12.4881C13.8102 12.2073 13.8102 11.7928 13.5694 11.5119L7.56944 4.51194C7.36519 4.27364 7.03415 4.18773 6.73979 4.29662C6.44543 4.40551 6.25 4.68618 6.25 5.00004L6.25 19Z" fill="currentColor"></path>
                                      <path fill-rule="evenodd" clip-rule="evenodd" d="M10.5119 19.5695C10.1974 19.2999 10.161 18.8264 10.4306 18.5119L16.0122 12L10.4306 5.48811C10.161 5.17361 10.1974 4.70014 10.5119 4.43057C10.8264 4.161 11.2999 4.19743 11.5695 4.51192L17.5695 11.5119C17.8102 11.7928 17.8102 12.2072 17.5695 12.4881L11.5695 19.4881C11.2999 19.8026 10.8264 19.839 10.5119 19.5695Z" fill="currentColor"></path>
                                  </svg>
                              </div>
                          </button>
                          <ul class="sub-menu text-gray-500 ltr:ml-2 rtl:mr-2" x-show="subActive === 'error'" x-collapse="">
                              <li>
                                  <a href="pages-error404.html" target="_blank">404</a>
                              </li>
                              <li>
                                  <a href="pages-error500.html" target="_blank">500</a>
                              </li>
                              <li>
                                  <a href="pages-error503.html" target="_blank">503</a>
                              </li>
                          </ul>
                      </li>
                      <li>
                          <a href="pages-maintenence.html" target="_blank">Maintanence</a>
                      </li>
                  </ul>
              </li> -->
              {{-- end page --}}

                <!-- <li class="menu nav-item">
                    <button type="button" class="nav-link group" :class="{'active' : activeDropdown === 'authentication'}" @click="activeDropdown === 'authentication' ? activeDropdown = null : activeDropdown = 'authentication'">
                        <div class="flex items-center">
                            <svg class="shrink-0 group-hover:!text-primary" width="20" height="20" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.5" d="M2 16C2 13.1716 2 11.7574 2.87868 10.8787C3.75736 10 5.17157 10 8 10H16C18.8284 10 20.2426 10 21.1213 10.8787C22 11.7574 22 13.1716 22 16C22 18.8284 22 20.2426 21.1213 21.1213C20.2426 22 18.8284 22 16 22H8C5.17157 22 3.75736 22 2.87868 21.1213C2 20.2426 2 18.8284 2 16Z" fill="currentColor"></path>
                                <path d="M8 17C8.55228 17 9 16.5523 9 16C9 15.4477 8.55228 15 8 15C7.44772 15 7 15.4477 7 16C7 16.5523 7.44772 17 8 17Z" fill="currentColor"></path>
                                <path d="M12 17C12.5523 17 13 16.5523 13 16C13 15.4477 12.5523 15 12 15C11.4477 15 11 15.4477 11 16C11 16.5523 11.4477 17 12 17Z" fill="currentColor"></path>
                                <path d="M17 16C17 16.5523 16.5523 17 16 17C15.4477 17 15 16.5523 15 16C15 15.4477 15.4477 15 16 15C16.5523 15 17 15.4477 17 16Z" fill="currentColor"></path>
                                <path d="M6.75 8C6.75 5.10051 9.10051 2.75 12 2.75C14.8995 2.75 17.25 5.10051 17.25 8V10.0036C17.8174 10.0089 18.3135 10.022 18.75 10.0546V8C18.75 4.27208 15.7279 1.25 12 1.25C8.27208 1.25 5.25 4.27208 5.25 8V10.0546C5.68651 10.022 6.18264 10.0089 6.75 10.0036V8Z" fill="currentColor"></path>
                            </svg>
                            <span class="text-black ltr:pl-3 rtl:pr-3 dark:text-[#506690] dark:group-hover:text-white-dark">Authentication</span>
                        </div>
                        <div class="rtl:rotate-180" :class="{'!rotate-90' : activeDropdown === 'authentication'}">
                            <svg width="16" height="16" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9 5L15 12L9 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </div>
                    </button>
                    <ul x-cloak="" x-show="activeDropdown === 'authentication'" x-collapse="" class="sub-menu text-gray-500">
                        <li>
                            <a href="auth-boxed-signin.html" target="_blank">Login Boxed</a>
                        </li>
                        <li>
                            <a href="auth-boxed-signup.html" target="_blank">Register Boxed</a>
                        </li>
                        <li>
                            <a href="auth-boxed-lockscreen.html" target="_blank">Unlock Boxed</a>
                        </li>
                        <li>
                            <a href="auth-boxed-password-reset.html" target="_blank">Recover ID Boxed</a>
                        </li>
                        <li>
                            <a href="auth-cover-login.html" target="_blank">Login Cover</a>
                        </li>
                        <li>
                            <a href="auth-cover-register.html" target="_blank">Register Cover</a>
                        </li>
                        <li>
                            <a href="auth-cover-lockscreen.html" target="_blank">Unlock Cover</a>
                        </li>
                        <li>
                            <a href="auth-cover-password-reset.html" target="_blank">Recover ID Cover</a>
                        </li>
                    </ul>
                </li> -->

          </ul>
      </div>
  </nav>
</div>