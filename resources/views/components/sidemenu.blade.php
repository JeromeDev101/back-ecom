<aside id="logo-sidebar" class="fixed top-0 left-0 z-40 h-screen pt-20 transition-transform -translate-x-full bg-green-100 border-r border-green-200 w-80 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700" aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-gradient-to-t from-green-300 to-green-100">

        <ul class="space-y-2 font-medium">
            <li>
                <button type="button" class="flex items-center w-full p-2 transition duration-75 rounded-lg group dark:text-white hover:bg-green-400 hover:text-green-50 dark:hover:bg-gray-700"
                    aria-controls="dropdown-example" data-collapse-toggle="dropdown-example" >

                    <svg class="w-6 h-6 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13v-2a1 1 0 0 0-1-1h-.757l-.707-1.707.535-.536a1 1 0 0 0 0-1.414l-1.414-1.414a1 1 0 0 0-1.414 0l-.536.535L14 4.757V4a1 1 0 0 0-1-1h-2a1 1 0 0 0-1 1v.757l-1.707.707-.536-.535a1 1 0 0 0-1.414 0L4.929 6.343a1 1 0 0 0 0 1.414l.536.536L4.757 10H4a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h.757l.707 1.707-.535.536a1 1 0 0 0 0 1.414l1.414 1.414a1 1 0 0 0 1.414 0l.536-.535 1.707.707V20a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-.757l1.707-.708.536.536a1 1 0 0 0 1.414 0l1.414-1.414a1 1 0 0 0 0-1.414l-.535-.536.707-1.707H20a1 1 0 0 0 1-1Z"/>
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
                    </svg>

                    <span class="flex-1 text-left ms-3 rtl:text-right whitespace-nowrap">Settings</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                    </svg>
                </button>

                <ul id="dropdown-example" class="{{
                        request()->is('settings/departments') ||
                        request()->is('settings/departments/*') ||
                        request()->is('settings/programs') ||
                        request()->is('settings/programs/*')
                        ? '' : 'hidden'
                    }} py-2 space-y-2">
                      <li>
                         <a href="{{ route('departments.index') }}" wire:navigate class="group flex items-center p-2
                            {{
                                request()->is('settings/departments') || request()->is('settings/departments/*')
                                ? 'text-green-50 bg-green-500' : ''
                            }}
                            transition duration-75 pl-11 rounded-lg dark:text-white hover:bg-green-400 hover:text-green-50 dark:hover:bg-gray-700 group">Departments</a>
                      </li>
                      <li>
                         <a href="{{ route('programs.index') }}" wire:navigate class="group flex items-center p-2
                            {{
                                request()->is('settings/programs') || request()->is('settings/programs/*')
                                ? 'text-green-50 bg-green-500' : ''
                            }}
                            transition duration-75 pl-11 rounded-lg dark:text-white hover:bg-green-400 hover:text-green-50 dark:hover:bg-gray-700 group">Program (Courses)</a>
                      </li>
                </ul>
            </li>

            <li>
                <a href="{{ route('roles-permission.index') }}" wire:navigate class="group flex items-center p-2
                    {{
                        request()->is('roles-and-permission') || request()->is('roles-and-permission/*')
                        ? 'text-green-50 bg-green-500' : ''
                    }}
                        rounded-lg dark:text-white hover:bg-green-400 hover:text-green-50 dark:hover:bg-gray-700 group">
                    <svg class="w-6 h-6 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M17 10v1.126c.367.095.714.24 1.032.428l.796-.797 1.415 1.415-.797.796c.188.318.333.665.428 1.032H21v2h-1.126c-.095.367-.24.714-.428 1.032l.797.796-1.415 1.415-.796-.797a3.979 3.979 0 0 1-1.032.428V20h-2v-1.126a3.977 3.977 0 0 1-1.032-.428l-.796.797-1.415-1.415.797-.796A3.975 3.975 0 0 1 12.126 16H11v-2h1.126c.095-.367.24-.714.428-1.032l-.797-.796 1.415-1.415.796.797A3.977 3.977 0 0 1 15 11.126V10h2Zm.406 3.578.016.016c.354.358.574.85.578 1.392v.028a2 2 0 0 1-3.409 1.406l-.01-.012a2 2 0 0 1 2.826-2.83ZM5 8a4 4 0 1 1 7.938.703 7.029 7.029 0 0 0-3.235 3.235A4 4 0 0 1 5 8Zm4.29 5H7a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h6.101A6.979 6.979 0 0 1 9 15c0-.695.101-1.366.29-2Z" clip-rule="evenodd"/>
                    </svg>

                    <span class="ms-3">Roles and Permission</span>
                </a>
            </li>

            <li>
                <a href="{{ route('users.index') }}" wire:navigate class="group flex items-center p-2
                    {{
                        request()->is('users') || request()->is('users/*')
                        ? 'text-green-50 bg-green-500' : ''
                    }}
                        rounded-lg dark:text-white hover:bg-green-400 hover:text-green-50 dark:hover:bg-gray-700 group">
                    <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M12 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4h-4Z" clip-rule="evenodd"/>
                    </svg>


                    <span class="ms-3">Users</span>
                </a>
            </li>
        </ul>

        @php
            $list = [
                'roles-and-permission-update',
                'roles-and-permission-create',
                'roles-and-permission-delete',
                'roles-and-permission-read'
            ];
        @endphp

        @if(auth()->user()->canany($list))
            <hr class="pt-4 mt-4 border-t border-green-300" />
        @endif

        <ul class="space-y-2 font-medium ">

                <li>
                    <a href="{{ route('faculty.index') }}" wire:navigate class="group flex items-center p-2 {{ request()->routeIs('faculty.index') || request()->is('faculty-profile/*') ? 'text-green-50 bg-green-500' : ''}}  rounded-lg dark:text-white hover:bg-green-400 hover:text-green-50 dark:hover:bg-gray-700 group">
                        <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M12 6a3.5 3.5 0 1 0 0 7 3.5 3.5 0 0 0 0-7Zm-1.5 8a4 4 0 0 0-4 4 2 2 0 0 0 2 2h7a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-3Zm6.82-3.096a5.51 5.51 0 0 0-2.797-6.293 3.5 3.5 0 1 1 2.796 6.292ZM19.5 18h.5a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-1.1a5.503 5.503 0 0 1-.471.762A5.998 5.998 0 0 1 19.5 18ZM4 7.5a3.5 3.5 0 0 1 5.477-2.889 5.5 5.5 0 0 0-2.796 6.293A3.501 3.501 0 0 1 4 7.5ZM7.1 12H6a4 4 0 0 0-4 4 2 2 0 0 0 2 2h.5a5.998 5.998 0 0 1 3.071-5.238A5.505 5.505 0 0 1 7.1 12Z" clip-rule="evenodd"/>
                        </svg>

                        <span class="ms-3">Faculty Profile</span>
                    </a>
                </li>



                <li>
                    <a href="{{ route('curriculum.index') }}" wire:navigate class="group flex items-center p-2 {{ request()->routeIs('curriculum.index') || request()->is('curriculum/*') ? 'text-green-50 bg-green-500' : ''}}  rounded-lg dark:text-white hover:bg-green-400 hover:text-green-50 dark:hover:bg-gray-700 group">
                        <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M6 2a2 2 0 0 0-2 2v15a3 3 0 0 0 3 3h12a1 1 0 1 0 0-2h-2v-2h2a1 1 0 0 0 1-1V4a2 2 0 0 0-2-2h-8v16h5v2H7a1 1 0 1 1 0-2h1V2H6Z" clip-rule="evenodd"/>
                        </svg>

                        <span class="ms-3">Curriculum</span>
                    </a>

                </li>

                <li>
                    <button type="button" class="flex items-center w-full p-2 transition duration-75 rounded-lg group dark:text-white hover:bg-green-400 hover:text-green-50 dark:hover:bg-gray-700"
                        aria-controls="student-profile" data-collapse-toggle="student-profile" >

                        <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M12 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4h-4Z" clip-rule="evenodd"/>
                        </svg>

                        <span class="flex-1 text-left ms-3 rtl:text-right whitespace-nowrap">Student Profile</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                        </svg>
                    </button>

                    <ul id="student-profile" class="{{
                            request()->is('student-profile/enrolments') ||
                            request()->is('student-profile/enrolments/*') ||
                            request()->is('student-profile/graduates') ||
                            request()->is('student-profile/graduates/*') ||
                            request()->is('student-profile/scholarship') ||
                            request()->is('student-profile/scholarship/*') ||
                            request()->is('student-profile/foreign-student') ||
                            request()->is('student-profile/foreign-student/*') ||
                            request()->is('student-profile/recognition-and-awards') ||
                            request()->is('student-profile/recognition-and-awards/*')
                            ? '' : 'hidden'
                        }} py-2 space-y-2">
                          <li>
                             <a href="{{ route('enrollment.index') }}" wire:navigate class="group flex items-center p-2
                                {{
                                    request()->is('student-profile/enrolments') || request()->is('student-profile/enrolments/*')
                                    ? 'text-green-50 bg-green-500' : ''
                                }}
                                transition duration-75 pl-11 rounded-lg dark:text-white hover:bg-green-400 hover:text-green-50 dark:hover:bg-gray-700 group">Enrolment</a>
                          </li>
                          <li>
                             <a href="{{ route('graduates.index') }}" wire:navigate class="group flex items-center p-2
                                {{
                                    request()->is('student-profile/graduates') || request()->is('student-profile/graduates/*')
                                    ? 'text-green-50 bg-green-500' : ''
                                }}
                                transition duration-75 pl-11 rounded-lg dark:text-white hover:bg-green-400 hover:text-green-50 dark:hover:bg-gray-700 group">Graduates</a>
                          </li>
                          <li>
                            <a href="{{ route('foreign.index') }}" wire:navigate class="group flex items-center p-2
                               {{
                                   request()->is('student-profile/foreign-student') || request()->is('student-profile/foreign-student/*')
                                   ? 'text-green-50 bg-green-500' : ''
                               }}
                               transition duration-75 pl-11 rounded-lg dark:text-white hover:bg-green-400 hover:text-green-50 dark:hover:bg-gray-700 group">Foreign Students</a>
                         </li>
                         <li>
                            <a href="{{ route('scholarship.index') }}" wire:navigate class="group flex items-center p-2
                               {{
                                   request()->is('student-profile/scholarship') || request()->is('student-profile/scholarship/*')
                                   ? 'text-green-50 bg-green-500' : ''
                               }}
                               transition duration-75 pl-11 rounded-lg dark:text-white hover:bg-green-400 hover:text-green-50 dark:hover:bg-gray-700 group">Scholarship</a>
                         </li>
                         <li>
                            <a href="{{ route('awards.index') }}" wire:navigate class="group flex items-center p-2
                               {{
                                   request()->is('student-profile/recognition-and-awards') || request()->is('student-profile/recognition-and-awards/*')
                                   ? 'text-green-50 bg-green-500' : ''
                               }}
                               transition duration-75 pl-11 rounded-lg dark:text-white hover:bg-green-400 hover:text-green-50 dark:hover:bg-gray-700 group">Recognition and Awards</a>
                         </li>
                    </ul>
                </li>

                <li>
                    <a href="{{ route('faculty-staff.index') }}" wire:navigate class="group flex items-center p-2 {{ request()->routeIs('faculty-staff.index') ? 'text-green-50 bg-green-500' : ''}}  rounded-lg dark:text-white hover:bg-green-400 hover:text-green-50 dark:hover:bg-gray-700 group">
                        <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M8 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4H6Zm7.25-2.095c.478-.86.75-1.85.75-2.905a5.973 5.973 0 0 0-.75-2.906 4 4 0 1 1 0 5.811ZM15.466 20c.34-.588.535-1.271.535-2v-1a5.978 5.978 0 0 0-1.528-4H18a4 4 0 0 1 4 4v1a2 2 0 0 1-2 2h-4.535Z" clip-rule="evenodd"/>
                        </svg>

                        <span class="ms-3">Faculty Staff</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('student-development.index') }}" wire:navigate class="group flex items-center p-2 {{ request()->routeIs('student-development.index') ? 'text-green-50 bg-green-500' : ''}}  rounded-lg dark:text-white hover:bg-green-400 hover:text-green-50 dark:hover:bg-gray-700 group">
                        <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M17 10v1.126c.367.095.714.24 1.032.428l.796-.797 1.415 1.415-.797.796c.188.318.333.665.428 1.032H21v2h-1.126c-.095.367-.24.714-.428 1.032l.797.796-1.415 1.415-.796-.797a3.979 3.979 0 0 1-1.032.428V20h-2v-1.126a3.977 3.977 0 0 1-1.032-.428l-.796.797-1.415-1.415.797-.796A3.975 3.975 0 0 1 12.126 16H11v-2h1.126c.095-.367.24-.714.428-1.032l-.797-.796 1.415-1.415.796.797A3.977 3.977 0 0 1 15 11.126V10h2Zm.406 3.578.016.016c.354.358.574.85.578 1.392v.028a2 2 0 0 1-3.409 1.406l-.01-.012a2 2 0 0 1 2.826-2.83ZM5 8a4 4 0 1 1 7.938.703 7.029 7.029 0 0 0-3.235 3.235A4 4 0 0 1 5 8Zm4.29 5H7a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h6.101A6.979 6.979 0 0 1 9 15c0-.695.101-1.366.29-2Z" clip-rule="evenodd"/>
                        </svg>

                        <span class="flex-1 ms-3 whitespace-nowrap">Student Development</span>
                    </a>
                </li>



                <li>
                    <a href="{{ route('research-extension.index') }}" wire:navigate class="group flex items-center p-2 {{ request()->routeIs('research-extension.index') ? 'text-green-50 bg-green-500' : ''}}  rounded-lg dark:text-white hover:bg-green-400 hover:text-green-50 dark:hover:bg-gray-700 group">
                        <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M9 2.221V7H4.221a2 2 0 0 1 .365-.5L8.5 2.586A2 2 0 0 1 9 2.22ZM11 2v5a2 2 0 0 1-2 2H4v11a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2h-7ZM8 16a1 1 0 0 1 1-1h6a1 1 0 1 1 0 2H9a1 1 0 0 1-1-1Zm1-5a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2H9Z" clip-rule="evenodd"/>
                        </svg>

                        <span class="ms-3">Research and Extension</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('linkages.index') }}" wire:navigate class="group flex items-center p-2 {{ request()->routeIs('linkages.index') ? 'text-green-50 bg-green-500' : ''}}  rounded-lg dark:text-white hover:bg-green-400 hover:text-green-50 dark:hover:bg-gray-700 group">
                        <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.213 9.787a3.391 3.391 0 0 0-4.795 0l-3.425 3.426a3.39 3.39 0 0 0 4.795 4.794l.321-.304m-.321-4.49a3.39 3.39 0 0 0 4.795 0l3.424-3.426a3.39 3.39 0 0 0-4.794-4.795l-1.028.961"/>
                        </svg>

                        <span class="ms-3">Linkages</span>
                    </a>

                </li>

                <li>
                    <a href="{{ route('infrastructure-development.index') }}" wire:navigate class="group flex items-center p-2 {{ request()->routeIs('infrastructure-development.index') ? 'text-green-50 bg-green-500' : ''}}  rounded-lg dark:text-white hover:bg-green-400 hover:text-green-50 dark:hover:bg-gray-700 group">
                        <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 4h12M6 4v16M6 4H5m13 0v16m0-16h1m-1 16H6m12 0h1M6 20H5M9 7h1v1H9V7Zm5 0h1v1h-1V7Zm-5 4h1v1H9v-1Zm5 0h1v1h-1v-1Zm-3 4h2a1 1 0 0 1 1 1v4h-4v-4a1 1 0 0 1 1-1Z"/>
                        </svg>

                        <span class="ms-3">Infastructure Development</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('events-accomplishment.index') }}" wire:navigate class="group flex items-center p-2 {{ request()->routeIs('events-accomplishment.index') ? 'text-green-50 bg-green-500' : ''}}  rounded-lg dark:text-white hover:bg-green-400 hover:text-green-50 dark:hover:bg-gray-700 group">
                        <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M11 9a1 1 0 1 1 2 0 1 1 0 0 1-2 0Z"/>
                            <path fill-rule="evenodd" d="M9.896 3.051a2.681 2.681 0 0 1 4.208 0c.147.186.38.282.615.255a2.681 2.681 0 0 1 2.976 2.975.681.681 0 0 0 .254.615 2.681 2.681 0 0 1 0 4.208.682.682 0 0 0-.254.615 2.681 2.681 0 0 1-2.976 2.976.681.681 0 0 0-.615.254 2.682 2.682 0 0 1-4.208 0 .681.681 0 0 0-.614-.255 2.681 2.681 0 0 1-2.976-2.975.681.681 0 0 0-.255-.615 2.681 2.681 0 0 1 0-4.208.681.681 0 0 0 .255-.615 2.681 2.681 0 0 1 2.976-2.975.681.681 0 0 0 .614-.255ZM12 6a3 3 0 1 0 0 6 3 3 0 0 0 0-6Z" clip-rule="evenodd"/>
                            <path d="M5.395 15.055 4.07 19a1 1 0 0 0 1.264 1.267l1.95-.65 1.144 1.707A1 1 0 0 0 10.2 21.1l1.12-3.18a4.641 4.641 0 0 1-2.515-1.208 4.667 4.667 0 0 1-3.411-1.656Zm7.269 2.867 1.12 3.177a1 1 0 0 0 1.773.224l1.144-1.707 1.95.65A1 1 0 0 0 19.915 19l-1.32-3.93a4.667 4.667 0 0 1-3.4 1.642 4.643 4.643 0 0 1-2.53 1.21Z"/>
                        </svg>


                        <span class="ms-3">Events and Accomplishments</span>
                    </a>
                </li>

         </ul>
    </div>
</aside>
