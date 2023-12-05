<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>
      Campi.tn - the most comprehensive resource for beautiful private campsites.
    </title>
<link href="./assets/css3/style.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://use.fontawesome.com/07b0ce5d10.js"></script>
<link rel="icon" type="image/png" href="./assets/images/logo.png" />
</head>
<body>
<script src="//unpkg.com/alpinejs" defer></script>

<nav x-data aria-label="Site Navbar">
  <div class="border-b bg-gray-100">
    <div class="mx-auto max-w-screen-xl px-4 py-3">
      <div class="flex items-center justify-between gap-x-4">
        <ul class="flex items-center gap-x-3">
          <li class="hidden sm:block"><a class="cursor-pointer text-sm font-medium text-gray-900 hover:text-gray-900/70">How to use</a></li>
          <li><a class="cursor-pointer text-sm font-medium text-gray-900 hover:text-gray-900/70">Careers</a></li>
          <li><a class="cursor-pointer text-sm font-medium text-gray-900 hover:text-gray-900/70">Blogs</a></li>
        </ul>
        <ul class="flex items-center gap-x-3">
          <li>
            <a class="cursor-pointer text-gray-900 hover:text-gray-900/70">
              <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="h-5 w-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
              </svg>
            </a>
          </li>
          <li>
            <a class="cursor-pointer text-gray-900 hover:text-gray-900/70">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="h-5 w-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
              </svg>
            </a>
          </li>
          <li>
            <a class="cursor-pointer text-gray-900 hover:text-gray-900/70">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="h-5 w-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
              </svg>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <hr />
    <div class="mx-auto max-w-screen-xl px-4 py-4">
      <div class="flex items-center justify-between gap-x-8">
        <a class="flex cursor-pointer items-center gap-x-1">
          <img width="28" height="28" class="object-cover" src="https://ankitcodes.com/uploads/fAPFuFMfl3vI8NS7wgTPopqD9FBtgt-metaZmF2aWNvbi5wbmc=-.png" alt="logo" />
          <span class="text-lg font-black text-gray-900">CODES</span>
        </a>
        <ul class="flex items-center gap-x-6">
          <li class="hidden md:block">
            <a class="cursor-pointer text-sm font-medium text-gray-900 hover:text-gray-900/70">Home</a>
          </li>
          <li class="hidden md:block">
            <a class="cursor-pointer text-sm font-medium text-gray-900 hover:text-gray-900/70">Products</a>
          </li>
          <li class="hidden md:block">
            <a class="cursor-pointer text-sm font-medium text-gray-900 hover:text-gray-900/70">Service</a>
          </li>
          <li class="hidden md:block">
            <a class="cursor-pointer text-sm font-medium text-gray-900 hover:text-gray-900/70">Contacts</a>
          </li>
          <li class="flex items-center gap-x-4 md:hidden">
            <button
              @click="
                        $refs.dropdown.classList.toggle('h-[180px]')
                        $refs.menu.classList.toggle('hidden')
                        $refs.close.classList.toggle('hidden')
                        "
              class="block cursor-pointer p-2 text-sm font-medium hover:border-gray-900/70 hover:text-gray-900/70"
            >
              <svg x-ref="menu" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="h-6 w-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
              </svg>
              <svg x-ref="close" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="hidden h-6 w-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
              </svg>
            </button>
          </li>
        </ul>
      </div>
    </div>
    <div x-ref="dropdown" class="duration-900 h-0 overflow-y-hidden transition-all md:hidden">
      <hr />
      <ul class="mx-auto max-w-screen-xl px-4 py-4">
        <li>
          <a class="block cursor-pointer rounded-full p-2 text-center text-sm font-medium hover:bg-gray-900 hover:text-gray-50">HOME</a>
        </li>
        <li>
          <a class="block cursor-pointer rounded-full p-2 text-center text-sm font-medium hover:bg-gray-900 hover:text-gray-50">PRODUCTS</a>
        </li>
        <li>
          <a class="block cursor-pointer rounded-full p-2 text-center text-sm font-medium hover:bg-gray-900 hover:text-gray-50">SERVICE</a>
        </li>
        <li>
          <a class="block cursor-pointer rounded-full p-2 text-center text-sm font-medium hover:bg-gray-900 hover:text-gray-50">CONTACTS</a>
        </li>
      </ul>
    </div>
  </div>
</nav>