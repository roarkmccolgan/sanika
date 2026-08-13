<div class="relative z-30">
    <form class="container mx-auto flex items-center px-2 sm:px-0" action="{{ route('search') }}" method="GET">
        <input name="q" value="{{ request('q') }}" placeholder="Search" class="shadow appearance-none border rounded flex-grow py-2 px-3 mr-1">
        <button class="flex-no-shrink p-2 px-3 rounded-full bg-sanika-primary text-white border-sanika-primary mx-1 hover:bg-sanika-primary" type="submit" aria-label="Search">
            <font-awesome-icon :icon="icons.search"></font-awesome-icon>
        </button>
    </form>
</div>
