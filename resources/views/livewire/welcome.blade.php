<div class="flex-1 grid place-items-center">
    <div class="flex md:gap-8 gap-4 flex-col md:flex-row items-center">
        <img class="md:w-60 w-32 rounded-full" src="{{ asset('images/eso.jpg') }}" alt="eso logo">
        <div class="flex flex-col items-center">
            <h1 class="md:text-6xl text-3xl font-bold">ALUMNITRACER</h1>
            <div class="flex md:gap-8 gap-2 flex-col md:flex-row w-full md:justify-center mt-4">
                <a href="{{ route('login') }}" class="border md:w-44 border-primary-600 dark:bg-slate-700 bg-white hover:bg-primary-300 font-semibold inline-block p-2 text-center" href="">LOGIN</a>
                <a href="{{ route('register') }}" class="border md:w-44 border-primary-600 dark:bg-slate-700 bg-white hover:bg-primary-300 font-semibold inline-block p-2 text-center" href="">REGISTER</a>
            </div>
        </div>
    </div>
</div>
