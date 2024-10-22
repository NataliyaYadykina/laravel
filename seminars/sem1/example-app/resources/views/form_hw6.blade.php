<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Books. HW 6</title>
    <style>
        .invalid {
            border: 1px solid red;
        }
    </style>
</head>

<body>
    <div class="add-books__form-wrapper">
        <form action="{{ route('store_book_hw6') }}" name="add-new-book" id="add-new-book" method="POST">
            @csrf
            <div class="form-section">
                <label @error('title')
                class="invalid"
            @enderror for="title">Title
                    @error('title')
                        {{ $message }}
                    @enderror
                </label>
                <input type="text" id="title" name="title" class="form_control">
            </div>
            <div class="form-section">
                <label @error('author')
                class="invalid"
            @enderror for="author">Author
                    @error('author')
                        {{ $message }}
                    @enderror
                </label>
                <input type="text" id="author" name="author" class="form_control">
            </div>
            <div class="form-section">
                <label @error('genre')
                class="invalid"
            @enderror for="genre">Choose
                    Genre: @error('genre')
                        {{ $message }}
                    @enderror
                </label>
                <select id="genre" name="genre" class="form_control">
                    <option value="fantasy">Fantasy</option>
                    <option value="sci-Fi">Sci-Fi</option>
                    <option value="mystery">Mystery</option>
                    <option value="adventure">Adventure</option>
                </select>
            </div>
            <input type="submit" value="Submit">
        </form>
    </div>
</body>

</html>
