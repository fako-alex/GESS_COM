@extends('admin.layouts.app')


@section('content')
  <!-- start main content section -->
  <div class="animate__animated p-6" :class="[$store.app.animation]">
      <div x-data="finance">
          <ul class="flex space-x-2 rtl:space-x-reverse">
              <li>
                  <a href="javascript:;" class="text-primary hover:underline">Dashboard</a>
              </li>
              <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
                  <span>Finance</span>
              </li>
          </ul>
          <div class="pt-5">
              <div class="mb-6 grid grid-cols-1 gap-6 text-white sm:grid-cols-2 xl:grid-cols-4">
                  <!-- Users Visit -->
                  <div class="panel bg-gradient-to-r from-cyan-500 to-cyan-400">
                      <div class="flex justify-between">
                          <div class="text-md font-semibold ltr:mr-1 rtl:ml-1">Users Visit</div>
                          <div x-data="dropdown" @click.outside="open = false" class="dropdown">
                              <a href="javascript:;" @click="toggle">
                                  <svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 opacity-70 hover:opacity-80">
                                      <circle cx="5" cy="12" r="2" stroke="currentColor" stroke-width="1.5"></circle>
                                      <circle opacity="0.5" cx="12" cy="12" r="2" stroke="currentColor" stroke-width="1.5"></circle>
                                      <circle cx="19" cy="12" r="2" stroke="currentColor" stroke-width="1.5"></circle>
                                  </svg>
                              </a>
                              <ul x-cloak="" x-show="open" x-transition="" x-transition.duration.300ms="" class="text-black ltr:right-0 rtl:left-0 dark:text-white-dark">
                                  <li><a href="javascript:;" @click="toggle">View Report</a></li>
                                  <li><a href="javascript:;" @click="toggle">Edit Report</a></li>
                              </ul>
                          </div>
                      </div>
                      <div class="mt-5 flex items-center">
                          <div class="text-3xl font-bold ltr:mr-3 rtl:ml-3">$170.46</div>
                          <div class="badge bg-white/30">+ 2.35%</div>
                      </div>
                      <div class="mt-5 flex items-center font-semibold">
                          <svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0 ltr:mr-2 rtl:ml-2">
                              <path opacity="0.5" d="M3.27489 15.2957C2.42496 14.1915 2 13.6394 2 12C2 10.3606 2.42496 9.80853 3.27489 8.70433C4.97196 6.49956 7.81811 4 12 4C16.1819 4 19.028 6.49956 20.7251 8.70433C21.575 9.80853 22 10.3606 22 12C22 13.6394 21.575 14.1915 20.7251 15.2957C19.028 17.5004 16.1819 20 12 20C7.81811 20 4.97196 17.5004 3.27489 15.2957Z" stroke="currentColor" stroke-width="1.5"></path>
                              <path d="M15 12C15 13.6569 13.6569 15 12 15C10.3431 15 9 13.6569 9 12C9 10.3431 10.3431 9 12 9C13.6569 9 15 10.3431 15 12Z" stroke="currentColor" stroke-width="1.5"></path>
                          </svg>
                          Last Week 44,700
                      </div>
                  </div>

                  <!-- Sessions -->
                  <div class="panel bg-gradient-to-r from-violet-500 to-violet-400">
                      <div class="flex justify-between">
                          <div class="text-md font-semibold ltr:mr-1 rtl:ml-1">Sessions</div>
                          <div x-data="dropdown" @click.outside="open = false" class="dropdown">
                              <a href="javascript:;" @click="toggle">
                                  <svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 opacity-70 hover:opacity-80">
                                      <circle cx="5" cy="12" r="2" stroke="currentColor" stroke-width="1.5"></circle>
                                      <circle opacity="0.5" cx="12" cy="12" r="2" stroke="currentColor" stroke-width="1.5"></circle>
                                      <circle cx="19" cy="12" r="2" stroke="currentColor" stroke-width="1.5"></circle>
                                  </svg>
                              </a>
                              <ul x-cloak="" x-show="open" x-transition="" x-transition.duration.300ms="" class="text-black ltr:right-0 rtl:left-0 dark:text-white-dark">
                                  <li><a href="javascript:;" @click="toggle">View Report</a></li>
                                  <li><a href="javascript:;" @click="toggle">Edit Report</a></li>
                              </ul>
                          </div>
                      </div>
                      <div class="mt-5 flex items-center">
                          <div class="text-3xl font-bold ltr:mr-3 rtl:ml-3">74,137</div>
                          <div class="badge bg-white/30">- 2.35%</div>
                      </div>
                      <div class="mt-5 flex items-center font-semibold">
                          <svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0 ltr:mr-2 rtl:ml-2">
                              <path opacity="0.5" d="M3.27489 15.2957C2.42496 14.1915 2 13.6394 2 12C2 10.3606 2.42496 9.80853 3.27489 8.70433C4.97196 6.49956 7.81811 4 12 4C16.1819 4 19.028 6.49956 20.7251 8.70433C21.575 9.80853 22 10.3606 22 12C22 13.6394 21.575 14.1915 20.7251 15.2957C19.028 17.5004 16.1819 20 12 20C7.81811 20 4.97196 17.5004 3.27489 15.2957Z" stroke="currentColor" stroke-width="1.5"></path>
                              <path d="M15 12C15 13.6569 13.6569 15 12 15C10.3431 15 9 13.6569 9 12C9 10.3431 10.3431 9 12 9C13.6569 9 15 10.3431 15 12Z" stroke="currentColor" stroke-width="1.5"></path>
                          </svg>
                          Last Week 84,709
                      </div>
                  </div>

                  <!-- Time On-Site -->
                  <div class="panel bg-gradient-to-r from-blue-500 to-blue-400">
                      <div class="flex justify-between">
                          <div class="text-md font-semibold ltr:mr-1 rtl:ml-1">Time On-Site</div>
                          <div x-data="dropdown" @click.outside="open = false" class="dropdown">
                              <a href="javascript:;" @click="toggle">
                                  <svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 opacity-70 hover:opacity-80">
                                      <circle cx="5" cy="12" r="2" stroke="currentColor" stroke-width="1.5"></circle>
                                      <circle opacity="0.5" cx="12" cy="12" r="2" stroke="currentColor" stroke-width="1.5"></circle>
                                      <circle cx="19" cy="12" r="2" stroke="currentColor" stroke-width="1.5"></circle>
                                  </svg>
                              </a>
                              <ul x-cloak="" x-show="open" x-transition="" x-transition.duration.300ms="" class="text-black ltr:right-0 rtl:left-0 dark:text-white-dark">
                                  <li><a href="javascript:;" @click="toggle">View Report</a></li>
                                  <li><a href="javascript:;" @click="toggle">Edit Report</a></li>
                              </ul>
                          </div>
                      </div>
                      <div class="mt-5 flex items-center">
                          <div class="text-3xl font-bold ltr:mr-3 rtl:ml-3">38,085</div>
                          <div class="badge bg-white/30">+ 1.35%</div>
                      </div>
                      <div class="mt-5 flex items-center font-semibold">
                          <svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0 ltr:mr-2 rtl:ml-2">
                              <path opacity="0.5" d="M3.27489 15.2957C2.42496 14.1915 2 13.6394 2 12C2 10.3606 2.42496 9.80853 3.27489 8.70433C4.97196 6.49956 7.81811 4 12 4C16.1819 4 19.028 6.49956 20.7251 8.70433C21.575 9.80853 22 10.3606 22 12C22 13.6394 21.575 14.1915 20.7251 15.2957C19.028 17.5004 16.1819 20 12 20C7.81811 20 4.97196 17.5004 3.27489 15.2957Z" stroke="currentColor" stroke-width="1.5"></path>
                              <path d="M15 12C15 13.6569 13.6569 15 12 15C10.3431 15 9 13.6569 9 12C9 10.3431 10.3431 9 12 9C13.6569 9 15 10.3431 15 12Z" stroke="currentColor" stroke-width="1.5"></path>
                          </svg>
                          Last Week 37,894
                      </div>
                  </div>

                  <!-- Bounce Rate -->
                  <div class="panel bg-gradient-to-r from-fuchsia-500 to-fuchsia-400">
                      <div class="flex justify-between">
                          <div class="text-md font-semibold ltr:mr-1 rtl:ml-1">Bounce Rate</div>
                          <div x-data="dropdown" @click.outside="open = false" class="dropdown">
                              <a href="javascript:;" @click="toggle">
                                  <svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 opacity-70 hover:opacity-80">
                                      <circle cx="5" cy="12" r="2" stroke="currentColor" stroke-width="1.5"></circle>
                                      <circle opacity="0.5" cx="12" cy="12" r="2" stroke="currentColor" stroke-width="1.5"></circle>
                                      <circle cx="19" cy="12" r="2" stroke="currentColor" stroke-width="1.5"></circle>
                                  </svg>
                              </a>
                              <ul x-cloak="" x-show="open" x-transition="" x-transition.duration.300ms="" class="text-black ltr:right-0 rtl:left-0 dark:text-white-dark">
                                  <li><a href="javascript:;" @click="toggle">View Report</a></li>
                                  <li><a href="javascript:;" @click="toggle">Edit Report</a></li>
                              </ul>
                          </div>
                      </div>
                      <div class="mt-5 flex items-center">
                          <div class="text-3xl font-bold ltr:mr-3 rtl:ml-3">49.10%</div>
                          <div class="badge bg-white/30">- 0.35%</div>
                      </div>
                      <div class="mt-5 flex items-center font-semibold">
                          <svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0 ltr:mr-2 rtl:ml-2">
                              <path opacity="0.5" d="M3.27489 15.2957C2.42496 14.1915 2 13.6394 2 12C2 10.3606 2.42496 9.80853 3.27489 8.70433C4.97196 6.49956 7.81811 4 12 4C16.1819 4 19.028 6.49956 20.7251 8.70433C21.575 9.80853 22 10.3606 22 12C22 13.6394 21.575 14.1915 20.7251 15.2957C19.028 17.5004 16.1819 20 12 20C7.81811 20 4.97196 17.5004 3.27489 15.2957Z" stroke="currentColor" stroke-width="1.5"></path>
                              <path d="M15 12C15 13.6569 13.6569 15 12 15C10.3431 15 9 13.6569 9 12C9 10.3431 10.3431 9 12 9C13.6569 9 15 10.3431 15 12Z" stroke="currentColor" stroke-width="1.5"></path>
                          </svg>
                          Last Week 50.01%
                      </div>
                  </div>
              </div>

          

              <div class="grid grid-cols-1 gap-6 xl:grid-cols-1">
                  <div class="grid gap-6 xl:grid-flow-row">

                  <!-- Recent Transactions -->
                  <div class="panel">
                      <div class="mb-5 text-lg font-bold">Recent Transactions</div>
                      <div class="table-responsive">
                          <table>
                              <thead>
                                  <tr>
                                      <th class="ltr:rounded-l-md rtl:rounded-r-md">ID</th>
                                      <th>DATE</th>
                                      <th>NAME</th>
                                      <th>AMOUNT</th>
                                      <th class="text-center ltr:rounded-r-md rtl:rounded-l-md">STATUS</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <tr>
                                      <td class="font-semibold">#01</td>
                                      <td class="whitespace-nowrap">Oct 08, 2021</td>
                                      <td class="whitespace-nowrap">Eric Page</td>
                                      <td>$1,358.75</td>
                                      <td class="text-center">
                                          <span class="badge rounded-full bg-success/20 text-success hover:top-0">Completed</span>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td class="font-semibold">#02</td>
                                      <td class="whitespace-nowrap">Dec 18, 2021</td>
                                      <td class="whitespace-nowrap">Nita Parr</td>
                                      <td>-$1,042.82</td>
                                      <td class="text-center">
                                          <span class="badge rounded-full bg-info/20 text-info hover:top-0">In Process</span>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td class="font-semibold">#03</td>
                                      <td class="whitespace-nowrap">Dec 25, 2021</td>
                                      <td class="whitespace-nowrap">Carl Bell</td>
                                      <td>$1,828.16</td>
                                      <td class="text-center">
                                          <span class="badge rounded-full bg-danger/20 text-danger hover:top-0">Pending</span>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td class="font-semibold">#04</td>
                                      <td class="whitespace-nowrap">Nov 29, 2021</td>
                                      <td class="whitespace-nowrap">Dan Hart</td>
                                      <td>$1,647.55</td>
                                      <td class="text-center">
                                          <span class="badge rounded-full bg-success/20 text-success hover:top-0">Completed</span>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td class="font-semibold">#05</td>
                                      <td class="whitespace-nowrap">Nov 24, 2021</td>
                                      <td class="whitespace-nowrap">Jake Ross</td>
                                      <td>$927.43</td>
                                      <td class="text-center">
                                          <span class="badge rounded-full bg-success/20 text-success hover:top-0">Completed</span>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td class="font-semibold">#06</td>
                                      <td class="whitespace-nowrap">Jan 26, 2022</td>
                                      <td class="whitespace-nowrap">Anna Bell</td>
                                      <td>$250.00</td>
                                      <td class="text-center">
                                          <span class="badge rounded-full bg-info/20 text-info hover:top-0">In Process</span>
                                      </td>
                                  </tr>
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- end main content section -->
</div>

@endsection
