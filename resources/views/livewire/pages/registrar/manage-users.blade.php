 <div class="py-6">
     <div class="px-4 mx-auto text-gray-600 max-w-7xl sm:px-6 md:px-8">
         <x-card shadow="shadow-none"
             padding="px-2 py-2.5 md:px-4 ">
             <div class="flex items-center justify-between space-x-3">
                 <div class="flex items-center space-x-3">
                     <svg xmlns="http://www.w3.org/2000/svg"
                         class="flex-shrink-0 w-8 h-8 text-dominant"
                         viewBox="0 0 20 20"
                         fill="currentColor">
                         <path
                             d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z" />
                     </svg>
                     <h1 class="text-xl font-semibold">
                         Manage Users
                     </h1>
                 </div>
                 <div class="flex items-center space-x-3">
                     <x-input placeholder="Search User" />
                 </div>
             </div>
         </x-card>
     </div>
     <div class="px-4 mx-auto max-w-7xl sm:px-6 md:px-8">
         <div class="flex flex-col mt-4">
             <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                 <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                     <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                         <table class="min-w-full divide-y divide-gray-300">
                             <thead class="bg-gray-50">
                                 <tr>
                                     <th scope="col"
                                         class="py-2 pl-4 pr-3 text-sm font-semibold text-left text-gray-900 sm:pl-6">
                                         Name
                                     </th>
                                     <th scope="col"
                                         class="py-2 pl-4 pr-3 text-sm font-semibold text-left text-gray-900 sm:pl-6">
                                         Email
                                     </th>
                                     <th scope="col"
                                         class="px-3 py-2 text-sm font-semibold text-left text-gray-900">
                                         Authentication Tpe
                                     </th>

                                     <th scope="col"
                                         class="relative py-2 pl-3 pr-4 sm:pr-6">
                                         <span class="sr-only">Edit</span>
                                     </th>
                                 </tr>
                             </thead>
                             <tbody class="bg-white divide-y divide-gray-200">
                                 @forelse ($users as $user)
                                     <tr class="hover:bg-green-100">
                                         <td
                                             class="py-2.5 pl-4 pr-3 text-sm font-medium text-gray-900 whitespace-nowrap sm:pl-6">
                                             {{ $user->name }}
                                         </td>
                                         <td
                                             class="py-2.5 pl-4 pr-3 text-sm font-medium text-gray-900 whitespace-nowrap sm:pl-6">
                                             {{ $user->email }}
                                         </td>
                                         <td class="px-3 py-2.5 text-sm text-gray-500 whitespace-nowrap">
                                             {{ $user->provider_id ? 'Oauth 2' : 'Email & Password' }}
                                         </td>

                                         <td
                                             class="relative py-2 pl-3 pr-4 text-sm font-medium text-right whitespace-nowrap sm:pr-6">
                                             <div class="flex justify-end space-x-3">
                                                 @if ($user->provider_id)
                                                     <x-button secondary>
                                                         Switch Oauth2 to Email
                                                     </x-button>
                                                 @else
                                                     <x-button amber>
                                                         Reset Password
                                                     </x-button>
                                                 @endif
                                                 <x-button negative>
                                                     Delete
                                                 </x-button>
                                             </div>
                                         </td>
                                     </tr>
                                 @empty
                                     <tr>
                                         <td colspan="4"
                                             class="py-3 text-center">
                                             No users found
                                         </td>
                                     </tr>
                                 @endforelse
                             </tbody>
                         </table>
                     </div>
                 </div>
             </div>
         </div>
         <div class="mt-3">
             {{ $users->links() }}
         </div>
     </div>
 </div>
