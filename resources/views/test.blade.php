<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</head>
<body>

    @if(session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('status') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="clearFlashSession()"></button>
        </div>
    @elseif(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="clearFlashSession()"></button>
        </div>
    @endif

<script>
    function clearFlashSession() {
        // Make an AJAX request to the route that clears the session data
        fetch('/clear-flash-session', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}' // Include the CSRF token for Laravel's CSRF protection
            }
        });

        // Hide the flash message
        document.querySelector('.alert').style.display = 'none';
    }
</script>

    <form action="{{route('test.store')}}" method="POST">
        @csrf
        <input name="name" type="text" value="{{old('name')}}">
        <button type="submit">Add</button>
    </form>

    <!-- Modal for success message -->
    <div id="successModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Success!</h2>
            <p>Thank you for submitting successfully.</p>
        </div>
    </div>

    <!-- Modal for error message -->
    <div id="errorModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Error!</h2>
            <p id="errorText"></p>
        </div>
    </div>

</body>
</html>
