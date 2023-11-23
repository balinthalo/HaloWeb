<div class="flex justify-center mt-10">
    <form class="flex flex-col gap-4 bg-slate-200 p-8" action="{{ route($action, $array) }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="flex p-4">
            <input class="p-2 bg-slate-50 placeholder:text-black" type="email" name="email" placeholder="email">
        </div>
        <div class="flex p-4">
            <input class="p-2 bg-slate-50 placeholder:text-black" type="password" name="password" placeholder="password">
        </div>
        <div class="flex justify-center p-4">
            <input class="bg-green-500 hover:text-gray-100 text-gray-900 p-2 px-5 rounded-xl" type="submit" value="Save changes">
        </div>
    </form>
    <div class="bg-blue-300 w-5"></div>
</div>
