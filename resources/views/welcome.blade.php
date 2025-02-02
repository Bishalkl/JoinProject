<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student and City Table</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
  <div class="container mx-auto p-8">
    <div class="overflow-x-auto bg-white shadow-md rounded-lg">
      <table class="min-w-full table-auto text-left">
        <thead class="bg-blue-600 text-white">
          <tr>
            <th class="px-6 py-4">Student Name</th>
            <th class="px-6 py-4">Age</th>
            <th class="px-6 py-4">City</th>
            <th class="px-6 py-4">Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($students as $student)
            <tr class="border-b hover:bg-gray-50 transition-all duration-200">
              <td class="px-6 py-4 text-lg">{{ $student->name }}</td>
              <td class="px-6 py-4 text-lg">{{ $student->age }}</td>
              <td class="px-6 py-4 text-lg">
                <!-- Displaying the city's name dynamically -->
                @if($student->city)
                  {{ $student->cityName }}
                @else
                  N/A
                @endif
              </td>
              <td class="px-6 py-4 flex space-x-4 items-center">
                <!-- Edit Button -->
                <button class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition-colors duration-200">
                  Edit
                </button>
                <!-- Delete Button -->
                <button class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600 transition-colors duration-200">
                  Delete
                </button>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</body>
</html>
