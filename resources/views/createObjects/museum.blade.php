
    <style>
        div {
            margin-bottom: 10px;
        }
    </style>

    <h2>Register</h2>
    <form method="POST" action="/museum">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>

        <div class="form-group">
            <label for="location">Location:</label>
            <input type="text" class="form-control" id="location" name="location">
        </div>

        <div class="form-group">
            <label for="adress">Adress:</label>
            <input type="text" class="form-control" id="adress" name="adress">
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>

        <div class="form-group">
            <button style="cursor:pointer" type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>

