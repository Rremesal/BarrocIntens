<x-app-layout>
    <div class="container mx-auto py-10">
        <div class="bg-white shadow-lg rounded-md p-8">
            <header>
                <h2 class="text-3xl font-bold text-gray-800">Create Meeting</h2>
            </header>
            <form action="{{route('fullcalendar.store')}}" method="post" class="mt-4 flex flex-col" enctype="multipart/form-data">
                @csrf
                <label for="eventTitle">Titel:</label>
                <input class="text-black" type="text" name="title" id="eventTitle" required>

                <label for="eventDescription">Description:</label>
                <input class="text-black" type="text" name="description" id="eventDescription" required>

                <label for="eventStart">Starttijd:</label>
                <input class="text-black" type="datetime-local" name="start_tijd" id="eventStart" required>

                <label for="eventEnd">Eindtijd:</label>
                <input class="text-black" type="datetime-local" name="eind_tijd" id="eventEnd" required>

                <button type="submit">Voeg evenement toe</button>
            </form>
        </div>
    </div>
</x-app-layout>