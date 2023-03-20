<nav
  class="md:hidden relative flex w-full flex-nowrap items-center justify-between bg-neutral-100 py-4 text-neutral-500 shadow-lg hover:text-neutral-700 focus:text-neutral-700 lg:flex-wrap lg:justify-start"
  data-te-navbar-ref>
  <div class="flex w-full flex-wrap items-center justify-between px-6">
    <button
      class="block border-0 bg-transparent py-2 px-2.5 text-neutral-500 hover:no-underline hover:shadow-none focus:no-underline focus:shadow-none focus:outline-none focus:ring-0 lg:hidden"
      type="button"
      data-te-collapse-init
      data-te-target="#navbarSupportedContent3"
      aria-controls="navbarSupportedContent3"
      aria-expanded="false"
      aria-label="Toggle navigation">
      <span class="[&>svg]:w-7">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          viewBox="0 0 24 24"
          fill="currentColor"
          class="h-7 w-7">
          <path
            fill-rule="evenodd"
            d="M3 6.75A.75.75 0 013.75 6h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 6.75zM3 12a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 12zm0 5.25a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75a.75.75 0 01-.75-.75z"
            clip-rule="evenodd" />
        </svg>
      </span>
    </button>
    <div
      class="!visible hidden flex-grow basis-[100%] items-center lg:!flex lg:basis-auto"
      id="navbarSupportedContent3"
      data-te-collapse-item>
      
      <a class="font-bold text-xl text-black tracking-widest flex" href="/"><img src="{{asset('images/hau-logo.png')}}" alt="" class="w-16">FACULTY RANKING AND PROMOTION PORTAL</a>
      <!-- Left links -->
      <ul
        class="list-style-none mr-auto flex flex-col pl-0 lg:flex-row"
        data-te-navbar-nav-ref>
        <li class="lg:px-2" data-te-nav-item-ref>
          <a
            class="active font-bold disabled:text-black/30 lg:px-2 [&.active]:text-black/90 dark:[&.active]:text-neutral-400"
            aria-current="page"
            href="{{route('home')}}"
            data-te-nav-link-ref
            >Dashboard</a
          >
        </li>
        <li class="lg:pr-2" data-te-nav-item-ref>
          <a
            class="p-0 font-bold text-neutral-500 hover:text-neutral-700 focus:text-neutral-700 disabled:text-black/30 lg:px-2 [&.active]:text-black/90 dark:[&.active]:text-neutral-400"
            href="{{route('profile.show', auth()->user()->id)}}"
            data-te-nav-link-ref
            >My Information</a
          >
        </li>
        <li class="lg:pr-2" data-te-nav-item-ref>
          <a
            class="p-0 font-bold text-neutral-500 hover:text-neutral-700 focus:text-neutral-700 disabled:text-black/30 lg:px-2 [&.active]:text-black/90 dark:[&.active]:text-neutral-400"
            href="{{route('edubg')}}"
            data-te-nav-link-ref
            >Educational Background</a
          >
        </li>
        <li class="lg:pr-2" data-te-nav-item-ref>
            <a
              class="p-0 font-bold text-neutral-500 hover:text-neutral-700 focus:text-neutral-700 disabled:text-black/30 lg:px-2 [&.active]:text-black/90 dark:[&.active]:text-neutral-400"
              href="{{route('prc.index')}}"
              data-te-nav-link-ref
              >PRC License</a
            >
          </li>
          <li class="lg:pr-2" data-te-nav-item-ref>
            <a
              class="p-0 font-bold text-neutral-500 hover:text-neutral-700 focus:text-neutral-700 disabled:text-black/30 lg:px-2 [&.active]:text-black/90 dark:[&.active]:text-neutral-400"
              href="{{route('mpo.index')}}"
              data-te-nav-link-ref
              >Membership in Professional Organization</a
            >
          </li>
          <li class="lg:pr-2" data-te-nav-item-ref>
            <a
              class="p-0 font-bold text-neutral-500 hover:text-neutral-700 focus:text-neutral-700 disabled:text-black/30 lg:px-2 [&.active]:text-black/90 dark:[&.active]:text-neutral-400"
              href="{{route('training.index')}}"
              data-te-nav-link-ref
              >Trainings /Seminars /Webinars</a
            >
          </li>
      </ul>
      <!-- Left links -->
    </div>
    <!-- Collapsible wrapper -->
  </div>
</nav>