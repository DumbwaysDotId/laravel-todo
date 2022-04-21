<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <!-- Bootstrap CSS -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
            crossorigin="anonymous"
        />

        <title>Todo App</title>
    </head>
    <body>
        <div
            class="d-flex justify-content-center align-items-center bg-light"
            style="height: 100vh"
        >
            <div class="card shadow" style="width: 400px">
                <div class="card-body">
                    <form action="/login/create" method="post">
                        @csrf
                        <div class="h4 text-center mb-3">Login</div>
                        <div class="mb-3">
                            <label
                                for="exampleFormControlInput1"
                                class="form-label"
                                >Email</label
                            >
                            <input
                                type="email"
                                class="form-control"
                                id="exampleFormControlInput1"
                                placeholder="name@example.com"
                                name="email"
                            />
                            @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label
                                for="exampleFormControlInput1"
                                class="form-label"
                                >Password</label
                            >
                            <input
                                type="password"
                                class="form-control"
                                id="exampleFormControlInput1"
                                placeholder="********"
                                name="password"
                            />
                            @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="d-grid gap-2 mt-4">
                            <button
                                class="btn btn-primary btn-sm"
                                type="submit"
                            >
                                Submit
                            </button>
                            <a
                                href="/register"
                                class="text-success mx-auto"
                                style="text-decoration: none"
                                >register</a
                            >
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
