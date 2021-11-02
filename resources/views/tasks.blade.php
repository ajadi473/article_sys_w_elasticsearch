<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tasks') }}
        </h2>
    </x-slot>

    <main
		class="flex-1 bg-gray-200 dark:bg-gray-900 overflow-y-auto transition
		duration-500 ease-in-out">
		<div
			class="px-24 py-12 text-gray-700 dark:text-gray-500 transition
			duration-500 ease-in-out">
			<h2 class="text-4xl font-medium capitalize">Tasks ({{ count($t)}})</h2>
			<div class="mt-1 mb-4 flex items-center justify-between">
				<span class="text-sm">
					
					<strong></strong>
				</span>

				<div class="flex items-center select-none">
					<span class="hover:text-pink-500 cursor-pointer mr-3">

						<svg viewBox="0 0 512 512" class="h-5 w-5 fill-current">
							<path
								d="M505 442.7L405.3
								343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7
								44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1
								208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4
								2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9
								0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7
								0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0
								128 57.2 128 128 0 70.7-57.2 128-128 128z"></path>
						</svg>
					</span>

					<input
						class="bg-transparent focus:outline-none"
						placeholder="Search in activity" />

				</div>

				<button
					class="flex items-center focus:outline-none border
					rounded-full py-2 px-6 leading-none border-gray-500
					select-none hover:text-pink-600 hover:bg-pink-300">
					<svg class="h-5 w-5 fill-current mr-1" viewBox="0 0 24 24">
						<path
							d="M12 1L8 5h3v9h2V5h3m2 18H6a2 2 0 01-2-2V9a2 2 0
							012-2h3v2H6v12h12V9h-3V7h3a2 2 0 012 2v12a2 2 0 01-2
							2z"></path>
					</svg>
					<span>Export</span>
				</button>

				<div class="flex items-center select-none">
					<span>Filter</span>
					<button
						class="ml-3 bg-gray-400 dark:bg-gray-600
						dark:text-gray-400 rounded-full p-2 focus:outline-none
						hover:text-pink-500 hover:bg-pink-300 transition
						duration-500 ease-in-out">
						<svg class="h-5 w-5 fill-current" viewBox="0 0 24 24">
							<path
								d="M14 12v7.88c.04.3-.06.62-.29.83a.996.996 0
								01-1.41 0l-2.01-2.01a.989.989 0
								01-.29-.83V12h-.03L4.21 4.62a1 1 0
								01.17-1.4c.19-.14.4-.22.62-.22h14c.22 0
								.43.08.62.22a1 1 0 01.17 1.4L14.03 12H14z"></path>
						</svg>
					</button>
					<button
						class="ml-2 bg-gray-400 dark:bg-gray-600
						dark:text-gray-400 rounded-full p-2 focus:outline-none
						hover:text-pink-500 hover:bg-pink-300 transition
						duration-500 ease-in-out">
						<svg class="h-5 w-5 fill-current" viewBox="0 0 24 24">
							<path
								d="M18 21l-4-4h3V7h-3l4-4 4 4h-3v10h3M2
								19v-2h10v2M2 13v-2h7v2M2 7V5h4v2H2z"></path>
						</svg>
					</button>
					<button
						class="ml-2 bg-gray-400 dark:bg-gray-600
						dark:text-gray-400 rounded-full p-2 focus:outline-none
						hover:text-pink-500 hover:bg-pink-300 transition
						duration-500 ease-in-out">
						<svg class="h-5 w-5 fill-current" viewBox="0 0 24 24">
							<path
								d="M12 4a4 4 0 014 4 4 4 0 01-4 4 4 4 0 01-4-4 4
								4 0 014-4m0 10c4.42 0 8 1.79 8 4v2H4v-2c0-2.21
								3.58-4 8-4z"></path>
						</svg>
					</button>
				</div>
			</div>

			<div
				class="border dark:border-gray-700 transition duration-500
				ease-in-out"></div>
			<div class="flex flex-col mt-2">
                <div class="font-sans">
                    <div class="relative min-h-screen flex flex-col sm:justify-center items-center bg-gray-100 ">
                        <div class="relative sm:max-w-sm w-full">
                            <div class="card bg-blue-400 shadow-lg  w-full h-full rounded-3xl absolute  transform -rotate-6"></div>
                            <div class="card bg-red-400 shadow-lg  w-full h-full rounded-3xl absolute  transform rotate-6"></div>
                            <div class="relative w-full rounded-3xl  px-6 py-4 bg-gray-100 shadow-md">
                                <label for="" class="block text-sm text-gray-700 text-center font-semibold">
                                    Add New Task
                                </label>
                                <form action="{{ url('add_tasks') }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div>
                                        <input type="text" name="task_type" placeholder="Task Type" class="mt-1 block w-full border-none bg-gray-100 h-11 rounded-xl shadow-lg hover:bg-blue-100 focus:bg-blue-100 focus:ring-0">
                                    </div>

                                    <div>
                                        <input type="text" name="task_author" value="{{ config('app.name') }}" placeholder="Task Author" class="mt-1 block w-full border-none bg-gray-100 h-11 rounded-xl shadow-lg hover:bg-blue-100 focus:bg-blue-100 focus:ring-0">
                                    </div>

                                    <div>
                                        <input type="text" name="task_title"  placeholder="Task Title" class="mt-1 block w-full border-none bg-gray-100 h-11 rounded-xl shadow-lg hover:bg-blue-100 focus:bg-blue-100 focus:ring-0">
                                    </div>

                                    <div>
                                        <input type="text"  name=""  placeholder="2021-02-03" class="mt-1 block w-full border-none bg-gray-100 h-11 rounded-xl shadow-lg hover:bg-blue-100 focus:bg-blue-100 focus:ring-0">
                                    </div>

                                    <div>
                                        <select  name="task_start" class="mt-1 block w-full border-none bg-gray-100 h-11 rounded-xl shadow-lg hover:bg-blue-100 focus:bg-blue-100 focus:ring-0">
                                            <option value="today">Today</option>
                                            <option value="tomorrow">Tomorrow</option>
                                        </select>
                                    </div>

                                    <div>
                                        <input type="file" name="task_image"  placeholder="Task Title" class="mt-1 block w-full ">
                                    </div>

                                    <div>
                                        <textarea name="task_text"  placeholder="Task Information" class="mt-1 block w-full border-none bg-gray-100 h-11 rounded-xl shadow-lg hover:bg-blue-100 focus:bg-blue-100 focus:ring-0">
                                        </textarea>
                                    </div>

                                    <div class="mt-7">
                                        <button class="bg-blue-500 w-full py-3 rounded-xl text-white shadow-xl hover:shadow-inner focus:outline-none transition duration-500 ease-in-out  transform hover:-translate-x hover:scale-105">
                                            Update
                                        </button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>


			</div>
		</div>
	</main>
</x-app-layout>
